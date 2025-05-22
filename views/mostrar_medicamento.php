<?php

include '../services/database.php';

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
        .container {
            width: 90%;
            margin: 20px auto;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .med-card {
            background-color: white;
            border: 2px solid #ffb366;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .med-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 10px;
        }
        .med-card h2 {
            color: #ff7f00;
            font-size: 20px;
            margin: 10px 0 5px;
        }
        .med-card p {
            margin: 5px 0;
        }
        .icono {
            color: #ff7f00;
            margin-right: 5px;
        }
        .solicitar-btn {
            display: inline-block;
            margin: 20px 0;
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
        .solicitar-btn:hover {
            background-color: #218838;
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
    </style>
</head>
<body>

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
