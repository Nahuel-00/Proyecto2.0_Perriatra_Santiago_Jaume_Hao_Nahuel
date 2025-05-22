<?php
include '../services/database.php';


// Consulta con LEFT JOIN para que no falle si faltan relaciones
$sql = "SELECT a.chip, a.nombre AS nombre_mascota, a.sexo, a.fecha_nacimiento, a.peso, a.vacunado, e.nombre_especie, CONCAT(p.nombre_propietario, ' ', p.apellido_primario_propietario) AS propietario, CONCAT(v.nombre_veterinario, ' ', v.apellido_primario_veterinario) AS veterinario
        FROM tbl_animal a
        LEFT JOIN tbl_especie e ON a.id_especie = e.id_especie
        LEFT JOIN tbl_propietario p ON a.dni_propietario = p.dni_propietario
        LEFT JOIN tbl_veterinario v ON a.dni_veterinario = v.dni_veterinario
        ORDER BY a.nombre";

$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Mascotas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff8f0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #d35400;
        }
        .boton-anadir {
            display: inline-block;
            margin: 10px 5px;
            padding: 10px 20px;
            background-color: #e67e22;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }
        .boton-anadir:hover {
            background-color: #ca6f1e;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #eee;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #ffa559;
            color: white;
        }
        tr:hover {
            background-color: #f9e1d6;
        }
        .editar {
            background-color: #27ae60;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
        }
        .editar:hover {
            background-color: #1e8449;
        }
        .borrar {
            background-color: #c0392b;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
        }
        .borrar:hover {
            background-color: #922b21;
        }
    </style>
</head>
<body>

    <h2>Listado de Mascotas</h2>
    <a href='../forms/form_mascota.php' class='boton-anadir'>➕ Añadir Mascota</a>
    <a href='../index.php' class='boton-anadir'>🏠 Volver a inicio</a>


    <table>
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
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>{$fila['chip']}</td>";
            echo "<td>{$fila['nombre_mascota']}</td>";
            echo "<td>{$fila['sexo']}</td>";
            echo "<td>{$fila['fecha_nacimiento']}</td>";
            echo "<td>{$fila['peso']}</td>";
            echo "<td>" . ($fila['vacunado'] ? 'Sí' : 'No') . "</td>";
            echo "<td>{$fila['nombre_especie']}</td>";
            echo "<td>{$fila['propietario']}</td>";
            echo "<td>{$fila['veterinario']}</td>";
            echo "<td>
                    <a href='../forms/editar_mascota.php?chip={$fila['chip']}' class='editar'>Editar</a> 
                    <a href='../proces/delete_mascota.php?chip={$fila['chip']}' class='borrar' onclick=\"return confirm('¿Estás seguro de borrar esta mascota?')\">Borrar</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
