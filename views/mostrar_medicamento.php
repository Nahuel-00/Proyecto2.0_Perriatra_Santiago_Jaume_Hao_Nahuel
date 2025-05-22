<?php
session_start();
include "../services/database.php";

// Comprobamos si hay sesión iniciada
if (!isset($_SESSION['nombre_veterinario'])) {
    header("Location: ./login.php");
    exit();
}

// Guardamos el nombre en una variable local
$usuario = $_SESSION['nombre_veterinario'];

$xmlFile = '../XML/medicamentos.xml';

$query = "
    SELECT m.*, e.nombre_especie 
    FROM tbl_medicamento m 
    LEFT JOIN tbl_especie e ON m.id_especie = e.id_especie
";
$resultado = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Medicamentos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>

<nav>
    <a href="../index.php">Inicio</a>
    <a href="../views/propietario.php">Propietarios</a>
    <a href="../views/mascota.php">Mascotas</a>
    <a href="../views/mostrar_medicamento.php">Medicamentos</a>
    <a href="../proces/logout.php" class="cerrar">Cerrar sesión</a>
</nav>

<header>
    <h1><i class="fas fa-pills"></i> Listado de Medicamentos</h1>
</header>
<br>
<div class="container">
    <a href='../forms/form_agregar_medicamento.php' class='boton-anadir'>➕ Solicitar Medicamento al Proveedor</a>
    <a href='../index.php' class='boton-anadir'>🏠 Volver a inicio</a>

    

    <div class="grid">
        <?php while ($med = mysqli_fetch_assoc($resultado)) : ?>
            <div class="med-card">
                <img src="../img/<?php echo $med['imagen']; ?>" alt="Imagen de <?php echo $med['nombre_medicamento']; ?>">
                <h2><i class="fas fa-capsules icono"></i><?php echo $med['nombre_medicamento']; ?></h2>
                <p><i class="fas fa-align-left icono"></i><?php echo $med['descripcion']; ?></p>
                <p><i class="fas fa-syringe icono"></i><strong>Dosis:</strong> <?php echo $med['dosis']; ?></p>
                <p><i class="fas fa-dog icono"></i><strong>Especie:</strong> <?php echo $med['nombre_especie'] ?? 'General'; ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>

<?php mysqli_close($conn); ?>
