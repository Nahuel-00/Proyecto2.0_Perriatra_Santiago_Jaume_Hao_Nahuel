<?php
// Iniciar sesión
session_start();

// Conexión BBDD
include "../services/database.php";

// Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Recoger datos del formulario
$dni = trim($_POST['dni_veterinario']);
$nombre = trim($_POST['nombre_veterinario']);
$apellido1 = trim($_POST['apellido_primario_veterinario']);
$apellido2 = trim($_POST['apellido_secundario_veterinario']);
$telefono = trim($_POST['telefono']);
$email = trim($_POST['email']);
$fecha = $_POST['fecha_contratacion']; 
$activo = $_POST['activo'];
$password = trim($_POST['passwordRegister']);
$confirm_password = trim($_POST['confirm_password']);

// Validar contraseñas
if ($password !== $confirm_password) {
    echo "Las contraseñas no coinciden.";
    exit;
}

// Encriptar contraseña
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Validacion campos
if (empty($dni) || empty($nombre) || empty($apellido1) || empty($apellido2) || empty($telefono) || empty($email) || empty($fecha) || $activo === "") {
    echo "Todos los campos son obligatorios.";
    exit;
}

// Verificar si ya existe ese DNI
$sql_check = "SELECT dni_veterinario FROM tbl_veterinario WHERE dni_veterinario = '$dni'";
$result = mysqli_query($conn, $sql_check);
if (mysqli_num_rows($result) > 0) {
    echo "Ya existe un veterinario registrado con ese DNI.";
    exit;
}

// Insertar en la base de datos
$sql = "INSERT INTO tbl_veterinario (dni_veterinario, nombre_veterinario, apellido_primario_veterinario, apellido_secundario_veterinario, telefono, email, fecha_contratacion, activo, password) 
VALUES ('$dni', '$nombre', '$apellido1', '$apellido2', '$telefono', '$email', '$fecha', $activo, '$password_hash')";


if (mysqli_query($conn, $sql)) {
    // Guardar la sesión e iniciar sesión automáticamente
    $_SESSION['dni_veterinario'] = $dni;
    $_SESSION['nombreVeterinario'] = $nombre;

    echo "Registro exitoso. Redirigiendo...";
    header("Location: ../index.php");
    exit;
} else {
    echo "Error al registrar veterinario: " . mysqli_error($conn);
}

// Cerrar conexión
mysqli_close($conn);
?>
