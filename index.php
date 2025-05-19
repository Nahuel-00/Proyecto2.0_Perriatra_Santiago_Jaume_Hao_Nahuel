<?php
include './services/database.php';

// Construir condiciones de filtrado
$condiciones = [];
if (isset($_GET['nombre']) && $_GET['nombre'] !== '') {
    $nombre = $_GET['nombre'];
    $condiciones[] = "nombre LIKE '%$nombre%'";
}
if (isset($_GET['dni']) && $_GET['dni'] !== '') {
    $dni = $_GET['dni'];
    $condiciones[] = "dni_propietario = '$dni'";
}

$where = '';
if (count($condiciones) > 0) {
    $where = 'WHERE ' . implode(' AND ', $condiciones);
}

$query = "SELECT 
    id_propietario AS id, 
    dni_propietario AS dni, 
    nombre, 
    apellido_primario AS apellido1, 
    apellido_secundario AS apellido2, 
    direccion, 
    telefono, 
    email, 
    fecha_registro 
    FROM tbl_propietario $where";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error en la consulta SQL: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="icon" href="./img/paw-solid.svg">
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg">
    <div id="nav_inicio">
        <div id="inicio_1">
            <a href="index.php" class="btn btn-dark">Inicio</a>
        </div>
        <div id="inicio_2">
            <a href="index.php" class="btn btn-dark">PERRITOS</a>
        </div>
    </div>
</nav>
</header>

<section class="container mt-4">
    <h2>Filtrar propietarios</h2>
    <form method="get" class="mb-4">
        <input type="text" name="dni" placeholder="DNI" value="<?php echo isset($_GET['dni']) ? $_GET['dni'] : ''; ?>">
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo isset($_GET['nombre']) ? $_GET['nombre'] : ''; ?>">
        <button type="submit" class="btn btn-primary btn-sm">Filtrar</button>
        <a href="index.php" class="btn btn-secondary btn-sm">Volver atrás</a>
    </form>

    <h2>Propietarios de mascotas</h2>
    <table class="table table-bordered">
        <thead>
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
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['dni']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellido1']; ?></td>
                <td><?php echo $row['apellido2']; ?></td>
                <td><?php echo $row['direccion']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo date('d/m/Y', strtotime($row['fecha_registro'])); ?></td>
                <td>
                <a href="./proces/modificar.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Modificar</a>
                <a href="./proces/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                <a href="contactos.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Contactos</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>