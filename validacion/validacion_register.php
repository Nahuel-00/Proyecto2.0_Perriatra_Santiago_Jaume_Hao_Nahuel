<?php
include '../services/database.php'; // conectar con archivo de la dase de datos
session_start();

// verificar si el formulario fue enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['nombre'] ?? ''); // Guarda el nombre del usuario, quitando espacios.
    $ape = trim($_POST['apellidos'] ?? '');
    $pass = $_POST['password'] ?? ''; // Guarda la contraseña del formulario.       (?? '' para evitar errores si falta el dato).
    $confipass = $_POST['confirm-password'] ?? '';
    $gmail = trim($_POST['correo'] ?? ''); // Guarda el correo electrónico, quitando espacios.

    // Validacion del nombre de user minimo 3 caracteres
    if (strlen($user) < 3) {
        header("Location: ../view/register.html");
        exit();
    }
    // Validacion del apellidos de user minimo 3 caracteres
    if (strlen($ape) < 3) {
        header("Location: ../view/register.html");
        exit();
    }
    // Validación de la contraseña: mínimo 8 caracteres, al menos una mayúscula, una minúscula y un número
    if (strlen($pass) < 8 ||
        !preg_match("/[A-Z]/", $pass) ||
        !preg_match("/[a-z]/", $pass) ||
        !preg_match("/[0-9]/", $pass)) {
        header("Location: ../view/register.html");
        exit();
    }
    // verifica si las congtraseñas son iguales
    if ($pass !== $confipass) {
        header("Location: ../view/register.html");
        exit();
    }
    // verifica si el formato de correo son correcto
    if (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../view/register.html");
        exit();
    }

    // Comprobar si el usuario ya existe usando consulta preparada
    $stmt = mysqli_prepare($conn, "SELECT id_usuario FROM tbl_usuarios WHERE nombre_usuario = ?");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        // Usuario ya existe
        mysqli_stmt_close($stmt);
        header("Location: ../view/register.html");
        exit();
    }
    mysqli_stmt_close($stmt);

    //  Hash de la contraseña antes de guardarla en la base de datos
    $passwordHash = password_hash($pass, PASSWORD_DEFAULT);
    // Insertar nuevo usuario en la base de datos
    $stmt = mysqli_prepare($conn, "INSERT INTO tbl_usuarios (nombre_usuario, contra_usuario, email_usuario) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $user, $passwordHash, $gmail);

    // si esta bien nos lleva al inicio
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ../index.php");
        exit();
        // si falla, vulvemos al registro
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ../view/register.html");
        exit();
    }
}
?>