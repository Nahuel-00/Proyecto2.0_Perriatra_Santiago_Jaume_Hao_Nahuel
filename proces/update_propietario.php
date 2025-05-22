<?php
session_start();
include "../services/database.php";

// Comprobamos si hay sesión iniciada
if (!isset($_SESSION['nombre_veterinario'])) {
    header("Location: ../views/login.php");
    exit();
}

// Guardamos el nombre en una variable local
$usuario = $_SESSION['nombre_veterinario'];

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset(
        $_POST['dni_propietario'],
        $_POST['nombre_propietario'],
        $_POST['apellido_primario_propietario'],
        $_POST['apellido_secundario_propietario'],
        $_POST['telefono'],
        $_POST['email'],
        $_POST['direccion']
    )
) {
    $dni = $_POST['dni_propietario'];
    $nombre = $_POST['nombre_propietario'];
    $apellido1 = $_POST['apellido_primario_propietario'];
    $apellido2 = $_POST['apellido_secundario_propietario'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE tbl_propietario SET nombre_propietario = ?, apellido_primario_propietario = ?, apellido_secundario_propietario = ?, telefono = ?, email = ?, direccion = ?
            WHERE dni_propietario = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $nombre, $apellido1, $apellido2, $telefono, $email, $direccion, $dni);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../views/propietario.php");
        exit();
    } else {
        echo "<p>Error al actualizar el propietario: " . mysqli_error($conn) . "</p>";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "<p>Datos incompletos para actualizar el propietario.</p>";
}

mysqli_close($conn);
?>
