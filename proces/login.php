<?php
session_start();
include '../services/database.php';

// Solo aceptar método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../views/login.php");
    exit();
}

// Validación de campos obligatorios
$dni = trim($_POST['dni_login'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($dni) || empty($password)) {
    echo "DNI y contraseña son obligatorios.";
    exit();
}

// Consulta segura con prepared statement
$sql = "SELECT dni_veterinario, nombre_veterinario, password FROM tbl_veterinario WHERE dni_veterinario = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $dni);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($fila = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $fila['password'])) {
        // Crear variables de sesión
        $_SESSION['dni_veterinario'] = $fila['dni_veterinario'];
        $_SESSION['nombre_veterinario'] = $fila['nombre_veterinario'];
        
        // Redirigir a inicio
        header("Location: ../index.php");
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "No existe un veterinario con ese DNI.";
}

mysqli_close($conn);
?>
