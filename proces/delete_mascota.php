<?php
session_start();

// Comprobamos si hay sesión iniciada
if (!isset($_SESSION['nombre_veterinario'])) {
    header("Location: ../views/login.php");
    exit();
}

// Guardamos el nombre en una variable local
$usuario = $_SESSION['nombre_veterinario'];

if (isset($_GET['chip'])) {
    include("../services/database.php");
    $chip = $_GET['chip'];

    $sql = "DELETE FROM tbl_animal WHERE chip = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $chip);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    if ($resultado) {
        header("Location: ../views/mascota.php");
        exit();
    } else {
        echo "<p>Error al eliminar la mascota</p>";
    }
}
?>
