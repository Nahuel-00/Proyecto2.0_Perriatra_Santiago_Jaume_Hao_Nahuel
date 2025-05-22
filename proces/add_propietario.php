<?php
include '../services/database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dni = $_POST['dni_propietario'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $telefono = $_POST['telefono'];
    $email = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $fecha = date("Y-m-d"); // Fecha de registro actual

    $sql = "INSERT INTO tbl_propietario 
            (dni_propietario, nombre_propietario, apellido_primario_propietario, apellido_secundario_propietario, direccion, telefono, email, fecha_registro) 
            VALUES 
            ('$dni', '$nombre', '$apellido1', '$apellido2', '$direccion', '$telefono', '$email', '$fecha')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Propietario registrado correctamente.";
        header("Location: ../views/propietario.php");
        exit();
    } else {
        $_SESSION['error'] = "Error al registrar propietario: " . mysqli_error($conn);
        header("Location: ../forms/form_propietario.html");
        exit();
    }

    mysqli_close($conn);
} else {
    $_SESSION['error'] = "Método no permitido.";
    header("Location: ../forms/form_propietario.html");
    exit();
}
?>
