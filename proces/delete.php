<?php
include '../services/database.php';


// Eliminacion de Propietario
if (isset($_GET['id_propietario'])) {
    $id = $_GET['id_propietario'];

        $sql_eliminar_propietario = "DELETE FROM tbl_propietario WHERE id= ?";
        $stmt_propietario = mysqli_prepare($conn, $sql_eliminar_propietario);
        mysqli_stmt_bind_param($stmt_propietario, "i", $id);
        $res_propietario = mysqli_stmt_execute($stmt_propietario);
        mysqli_stmt_close($stmt_propietario); // Commit para confirmar la eliminacion

        if($res_propietario){
            header("Location: ../views/index.php");
        } else {
            echo "<p>Error al eliminar al porpietario</p>";
        }

}

// Eliminacion de Mascota
if (isset($_GET['id_mascota'])) {
    $id = $_GET['idmascota'];

        $sql_eliminar_mascota = "DELETE FROM tbl_mascota WHERE id_mascota= ?";
        $stmt_mascota = mysqli_prepare($conn, $sql_eliminar_mascota);
        mysqli_stmt_bind_param($stmt_mascota, "i", $id);
        $res_mascota = mysqli_stmt_execute($stmt_mascota);
        mysqli_stmt_close($stmt_mascota); // Commit para confirmar la eliminacion

        if($res_mascota){
            header("Location: ../views/index.php");
        } else {
            echo "<p>Error al eliminar al animal</p>";
        }

}

?>