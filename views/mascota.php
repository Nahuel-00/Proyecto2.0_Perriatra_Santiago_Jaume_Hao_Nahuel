<?php
include '../services/database.php';
?>


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
        
    <h2>Listado de Mascotas</h2>
    <a href='../forms/form_mascota.php' class='boton-anadir'>➕ Añadir Mascota</a>
    <a href='../index.php' class='boton-anadir'> Volver a inicio</a>

    <table border="1">
    <tr>
        <th>Chip</th>
        <th>Nombre</th>
        <th>Sexo</th>
        <th>Fecha de Nacimiento</th>
        <th>Peso (kg)</th>
        <th>Vacunado</th>
        <th>Especie</th>
        <th>Propietario</th>
        <th>Veterinario</th>
        <th>Acciones</th>
    </tr>
    <?php
    $sql = "SELECT a.chip, a.nombre AS nombre_mascota, a.sexo, a.fecha_nacimiento, a.peso, a.vacunado, e.nombre_especie, CONCAT(p.nombre_propietario, ' ', p.apellido_primario_propietario) AS propietario, CONCAT(v.nombre_veterinario, ' ', v.apellido_primario_veterinario) AS veterinario
            FROM tbl_animal a
            JOIN tbl_especie e ON a.id_especie = e.id_especie
            JOIN tbl_propietario p ON a.dni_propietario = p.dni_propietario
            JOIN tbl_veterinario v ON a.dni_veterinario = v.dni_veterinario
            ORDER BY a.nombre";

    $resultado = mysqli_query($conn, $sql);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila["chip"] . "</td>";
        echo "<td>" . $fila["nombre_mascota"] . "</td>";
        echo "<td>" . $fila["sexo"] . "</td>";
        echo "<td>" . $fila["fecha_nacimiento"] . "</td>";
        echo "<td>" . $fila["peso"] . "</td>";
        echo "<td>" . ($fila["vacunado"] ? "Sí" : "No") . "</td>";
        echo "<td>" . $fila["nombre_especie"] . "</td>";
        echo "<td>" . $fila["propietario"] . "</td>";
        echo "<td>" . $fila["veterinario"] . "</td>";
        echo "<td>
                <a href='../forms/editar_mascota.php?chip=" . $fila["chip"] . "'>Editar</a> | 
                <a href='../pdelete_mascota.php?chip=" . $fila["chip"] . "' onclick=\"return confirm('¿Estás seguro de borrar esta mascota?')\">Borrar</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>

