<?php
$conexion = mysqli_connect("localhost", "root", "", "db_perriatra");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// session_start();

// if (!isset($_SESSION['usuario'])) {
//     header("Location: ./views/login.html");
//     exit();
// }
// $usuario = $_SESSION['usuario'];


$sql = "SELECT 
            p.dni_propietario, 
            p.nombre_propietario, 
            p.apellido_primario_propietario, 
            p.apellido_secundario_propietario,
            a.chip, 
            a.nombre AS nombre_mascota, 
            a.sexo, 
            a.fecha_nacimiento, 
            a.peso, 
            a.vacunado
        FROM tbl_propietario p
        LEFT JOIN tbl_animal a ON p.dni_propietario = a.dni_propietario
        ORDER BY p.apellido_primario_propietario, p.apellido_secundario_propietario, p.nombre_propietario";

$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Veterinaria - Propietarios y Mascotas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff8f0;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #ff7f00;
            color: white;
            padding: 15px;
            text-align: center;
        }
        nav {
            background-color: #ffb366;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
        .container {
            width: 90%;
            margin: 20px auto;
        }
        h1 {
            color: #ff7f00;
        }
        .bienvenida {
            margin-bottom: 20px;
            font-size: 18px;
        }
        .boton-anadir {
            background-color: #28a745;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
            display: inline-block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #ffb366;
            color: white;
        }
        tr:hover {
            background-color: #ffe0cc;
        }
        .acciones a {
            margin-right: 10px;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            color: white;
        }
        .editar {
            background-color: #007bff;
        }
        .borrar {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<header>
    <h1>Clínica Veterinaria PerriAtra</h1>
</header>

<nav>
    <a href="./views/propietario.php">Propietarios</a>
    <a href="./views/mascota.php">Mascotas</a>
    <a href="./views/mostrar_medicamento.php">Medicamentos</a>
    <a href="./proces/logout.php">Cerrar sesión</a>
</nav>

<div class="container">
 
    <table>
        <tr>
            <th>DNI Propietario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Chip Mascota</th>
            <th>Nombre Mascota</th>
            <th>Sexo</th>
            <th>Fecha Nacimiento</th>
            <th>Peso (kg)</th>
            <th>Vacunado</th>

        </tr>
        <?php
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila["dni_propietario"] . "</td>";
            echo "<td>" . $fila["nombre_propietario"] . "</td>";
            echo "<td>" . $fila["apellido_primario_propietario"] . " " . $fila["apellido_secundario_propietario"] . "</td>";
            echo "<td>" . ($fila["chip"] ?? "—") . "</td>";
            echo "<td>" . ($fila["nombre_mascota"] ?? "—") . "</td>";
            echo "<td>" . ($fila["sexo"] ?? "—") . "</td>";
            echo "<td>" . ($fila["fecha_nacimiento"] ?? "—") . "</td>";
            echo "<td>" . ($fila["peso"] ?? "—") . "</td>";
            echo "<td>" . (isset($fila["vacunado"]) ? ($fila["vacunado"] ? "Sí" : "No") : "—") . "</td>";
            echo "<td class='acciones'>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
        
</div>

</body>
</html>

<?php
mysqli_close($conexion);
?>
