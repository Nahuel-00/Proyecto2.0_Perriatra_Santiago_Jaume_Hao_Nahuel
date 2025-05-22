
<?php
include '../services/database.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff8f0;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #d35400;
            text-align: center;
        }

        .boton-anadir {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 20px;
            background-color: #e67e22;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .boton-anadir:hover {
            background-color: #ca6f1e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #f2f2f2;
        }

        th {
            background-color: #ffa559;
            color: white;
        }

        tr:hover {
            background-color: #f9e1d6;
        }

        td a {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 5px;
            margin: 0 2px;
            color: white;
        }

        .editar {
            background-color: #27ae60;
        }

        .editar:hover {
            background-color: #1e8449;
        }

        .borrar {
            background-color: #c0392b;
        }

        .borrar:hover {
            background-color: #922b21;
        }
    </style>    
</head>
<body>
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

