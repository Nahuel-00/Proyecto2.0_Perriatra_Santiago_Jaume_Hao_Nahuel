<?php
// update_mascota.php
session_start();
include '../services/database.php';

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
        $_POST['chip'],
        $_POST['nombre'],
        $_POST['sexo'],
        $_POST['fecha_nacimiento'],
        $_POST['peso'],
        $_POST['vacunado'],
        $_POST['id_especie'],
        $_POST['dni_propietario'],
        $_POST['dni_veterinario']
    )
) {
    $chip = trim($_POST['chip']);
    $nombre = trim($_POST['nombre']);
    $sexo = strtoupper(trim($_POST['sexo']));
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $peso = floatval($_POST['peso']);
    $vacunado = intval($_POST['vacunado']);
    $id_especie = intval($_POST['id_especie']);
    $dni_propietario = trim($_POST['dni_propietario']);
    $dni_veterinario = trim($_POST['dni_veterinario']);

    if (!in_array($sexo, ['M', 'F'])) {
        echo "Valor de sexo inválido.";
        exit;
    }

    $sql = "UPDATE tbl_animal SET nombre = ?, sexo = ?, fecha_nacimiento = ?, peso = ?, vacunado = ?, id_especie = ?, dni_propietario = ?, dni_veterinario = ? WHERE chip = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssdiiiss", $nombre, $sexo, $fecha_nacimiento, $peso, $vacunado, $id_especie, $dni_propietario, $dni_veterinario, $chip);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../views/mascota.php");
        exit();
    } else {
        echo "<p>Error al actualizar la mascota: " . mysqli_error($conn) . "</p>";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "<p>Datos incompletos para actualizar la mascota.</p>";
}
mysqli_close($conn);