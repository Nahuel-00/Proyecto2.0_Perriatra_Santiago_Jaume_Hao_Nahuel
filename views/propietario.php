
<?php
session_start();
include '../services/database.php';

// Comprobamos si hay sesión iniciada
if (!isset($_SESSION['nombre_veterinario'])) {
    header("Location: ./login.php");
    exit();
}

// Guardamos el nombre en una variable local
$usuario = $_SESSION['nombre_veterinario'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Propietario</title>
    
</head>
<body>

<nav>
    <a href="../index.php">Inicio</a>
    <a href="../views/propietario.php">Propietarios</a>
    <a href="../views/mascota.php">Mascotas</a>
    <a href="../views/mostrar_medicamento.php">Medicamentos</a>
    <a href="../proces/logout.php" class="cerrar">Cerrar sesión</a>
</nav>

    <h2>Listado de propietarios</h2>
    <a href='../forms/form_propietario.php' class='boton-anadir'>➕ Añadir propietario</a>
    <a href='../index.php' class='boton-anadir'>🏠 Volver a inicio</a>

<table>
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Fecha de Registro</th>
        <th>Acciones</th>
    </tr>
    <?php
    $sql = "SELECT * FROM tbl_propietario ORDER BY apellido_primario_propietario, apellido_secundario_propietario, nombre_propietario";
    $resultado = mysqli_query($conn, $sql);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila["dni_propietario"] . "</td>";
        echo "<td>" . $fila["nombre_propietario"] . "</td>";
        echo "<td>" . $fila["apellido_primario_propietario"] . "</td>";
        echo "<td>" . $fila["apellido_secundario_propietario"] . "</td>";
        echo "<td>" . $fila["direccion"] . "</td>";
        echo "<td>" . $fila["telefono"] . "</td>";
        echo "<td>" . $fila["email"] . "</td>";
        echo "<td>" . $fila["fecha_registro"] . "</td>";
        echo "<td class='acciones'>";
        echo "<a href='../forms/editar_propietario.php?dni=" . $fila["dni_propietario"] . "' class='editar'>Editar</a>";
        echo "<a href='../proces/delete_propietario.php?dni=" . $fila["dni_propietario"] . "' class='borrar'>Borrar</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

