<?php
session_start();

// Conexión BBDD
include '../services/database.php';

// Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Validar que la petición sea POST y contenga los campos esperados
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../views/login.php");
    exit();
}

if (!isset($_POST['dni_login']) || !isset($_POST['password'])) {
    echo "DNI y contraseña son obligatorios.";
    exit();
}

// Recoger datos del formulario
$dni = trim($_POST['dni_login']);
$password = trim($_POST['password']);

// Validación básica
if (empty($dni) || empty($password)) {
    echo "DNI y contraseña son obligatorios.";
    exit;
}

// Buscar veterinario por DNI
$query = "SELECT * FROM tbl_veterinario WHERE dni_veterinario = '$dni'";
$resultado = mysqli_query($conn, $query);

if ($fila = mysqli_fetch_assoc($resultado)) {
    // Verificar contraseña (encriptada)
    if (password_verify($password, $fila['password'])) {
        // Iniciar sesión
        $_SESSION['dni_veterinario'] = $fila['dni_veterinario'];
        $_SESSION['nombre_veterinario'] = $fila['nombre_veterinario'];

        // Redirigir
        header("Location: ../index.php");
        exit;
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "No existe un veterinario con ese DNI.";
}

// Cerrar conexión
mysqli_close($conn);
