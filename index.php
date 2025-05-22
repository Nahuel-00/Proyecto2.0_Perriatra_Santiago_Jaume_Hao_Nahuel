<?php
session_start();
// Comprobamos si hay sesión iniciada
if (!isset($_SESSION['nombre_veterinario'])) {
    header("Location: ./views/login.php");
    exit();
}

// Guardamos el nombre en una variable local
$usuario = $_SESSION['nombre_veterinario'];

$conexion = mysqli_connect("localhost", "root", "", "db_perriatra");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}


$conexion = mysqli_connect("localhost", "root", "", "db_perriatra");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener filtros desde GET
$filtro_especie = isset($_GET['id_especie']) ? $_GET['id_especie'] : '';
$filtro_veterinario = isset($_GET['dni_veterinario']) ? $_GET['dni_veterinario'] : '';
$filtro_propietario = isset($_GET['dni_propietario']) ? $_GET['dni_propietario'] : '';

// Consulta con filtros sumativos
$sql = "SELECT p.dni_propietario, p.nombre_propietario, p.apellido_primario_propietario, p.apellido_secundario_propietario, a.chip, a.nombre AS nombre_mascota, a.sexo, a.fecha_nacimiento, a.peso, a.vacunado
        FROM tbl_propietario p
        LEFT JOIN tbl_animal a ON p.dni_propietario = a.dni_propietario
        WHERE 1";

if (!empty($filtro_especie)) {
    $sql .= " AND a.id_especie = '" . $filtro_especie . "'";
}

if (!empty($filtro_veterinario)) {
    $sql .= " AND a.dni_veterinario = '" . $filtro_veterinario . "'";
}

if (!empty($filtro_propietario)) {
    $sql .= " AND a.dni_propietario = '" . $filtro_propietario . "'";
}

$sql .= " ORDER BY p.apellido_primario_propietario, p.apellido_secundario_propietario, p.nombre_propietario";

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
            background-image: url(./img/fondo_index.jpg);
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-links {
            display: flex;
            gap: 15px;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .usuario-sesion {
            color: white;
            font-weight: bold;
        }
        .container {
            width: 90%;
            margin: 20px auto;
        }
        h1 {
            color: #fff;
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
        .filters-container {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
        }
        .filters-container label,
        .filters-container select {
            margin-right: 15px;
        }
        .cerrar{
            background-color: red;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<header>
    <h1>Clínica Veterinaria Perriatra</h1>
</header>

<nav>
    <div class="nav-links">
        <a href="./views/propietario.php">Propietarios</a>
        <a href="./views/mascota.php">Mascotas</a>
        <a href="./views/mostrar_medicamento.php">Medicamentos</a>
        <a href="./proces/logout.php" c="cerrar">Cerrar sesión</a>
    </div>
    <div class="usuario-sesion">
        Bienvenido, <?php echo htmlspecialchars($usuario); ?>
    </div>
</nav>

<div class="container">

    <div class="filters-container">
        <form method="get" action="index.php">
            <label for="id_especie">Especie:</label>
            <select name="id_especie" id="id_especie">
                <option value="">Todas</option>
                <?php
                $res_especie = mysqli_query($conexion, "SELECT id_especie, nombre_especie FROM tbl_especie");
                while ($row = mysqli_fetch_assoc($res_especie)) {
                    $selected = ($filtro_especie == $row['id_especie']) ? 'selected' : '';
                    echo "<option value='{$row['id_especie']}' $selected>{$row['nombre_especie']}</option>";
                }
                ?>
            </select>

            <label for="dni_veterinario">Veterinario:</label>
            <select name="dni_veterinario" id="dni_veterinario">
                <option value="">Todos</option>
                <?php
                $res_vet = mysqli_query($conexion, "SELECT dni_veterinario, nombre_veterinario FROM tbl_veterinario");
                while ($row = mysqli_fetch_assoc($res_vet)) {
                    $selected = ($filtro_veterinario == $row['dni_veterinario']) ? 'selected' : '';
                    echo "<option value='{$row['dni_veterinario']}' $selected>{$row['nombre_veterinario']}</option>";
                }
                ?>
            </select>

            <label for="dni_propietario">Propietario:</label>
            <select name="dni_propietario" id="dni_propietario">
                <option value="">Todos</option>
                <?php
                $res_pro = mysqli_query($conexion, "SELECT dni_propietario, nombre_propietario FROM tbl_propietario");
                while ($row = mysqli_fetch_assoc($res_pro)) {
                    $selected = ($filtro_propietario == $row['dni_propietario']) ? 'selected' : '';
                    echo "<option value='{$row['dni_propietario']}' $selected>{$row['nombre_propietario']}</option>";
                }
                ?>
            </select>

            <button type="submit">Filtrar</button>
        </form>
    </div>

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
            echo "</tr>";
        }
        ?>
    </table>

</div>

</body>
</html>

<?php
mysqli_close($conexion);
?>
