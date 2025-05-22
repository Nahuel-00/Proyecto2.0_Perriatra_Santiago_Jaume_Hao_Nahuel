<?php
// delete_propietario.php
include("../services/database.php");

if (isset($_GET['dni'])) {
    $dni = $_GET['dni'];

    $sql = "DELETE FROM tbl_propietario WHERE dni_propietario = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $dni);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    if ($resultado) {
        header("Location: ../views/propietario.php");
        exit();
    } else {
        echo "<p>Error al eliminar el propietario</p>";
    }
}
