<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "db_perriatra");
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Procesar el formulario al enviar
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $dosis = $_POST['dosis'];
    $id_especie = $_POST['id_especie'];

    // Procesar la imagen
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];
    $ruta_destino = "../img/" . $imagen_nombre;

    if (move_uploaded_file($imagen_tmp, $ruta_destino)) {
        // Insertar en la base de datos
        $sql = "INSERT INTO tbl_medicamento (nombre_medicamento, descripcion, imagen, dosis, id_especie)
                VALUES ('$nombre', '$descripcion', '$imagen_nombre', '$dosis', $id_especie)";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../views/mostrar_medicamento.php");
            exit;
        } else {
            echo "<p style='color:red; text-align:center;'>Error al insertar: " . mysqli_error($conn) . "</p>";
        }        
    } else {
        echo "<p style='color:red; text-align:center;'>Error al subir la imagen.</p>";
    }
}

// Obtener especies
$especies = mysqli_query($conn, "SELECT id_especie, nombre_especie FROM tbl_especie");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Medicamento</title>
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
            width: 80%;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h1 {
            color: #ff7f00;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 15px;
            font-weight: bold;
        }
        input, textarea, select {
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            margin-top: 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        a.volver {
            display: inline-block;
            margin-top: 20px;
            color: #ff7f00;
            text-decoration: none;
            font-weight: bold;
        }
        a.volver:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1><i class="fas fa-pills"></i> Solicitar Medicamento al Proveedor</h1>
    </header>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre del medicamento:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="4" required></textarea>

            <label for="dosis">Dosis:</label>
            <input type="text" name="dosis" id="dosis" required>

            <label for="id_especie">Especie:</label>
            <select name="id_especie" id="id_especie" required>
                <option value="">Seleccionar especie</option>
                <?php while ($row = mysqli_fetch_assoc($especies)) { ?>
                    <option value="<?= $row['id_especie'] ?>"><?= ucfirst($row['nombre_especie']) ?></option>
                <?php } ?>
            </select>

            <label for="imagen">Imagen del medicamento:</label>
            <input type="file" name="imagen" id="imagen" accept="image/*" required>

            <input type="submit" value="Añadir Medicamento">
        </form>

        <a href="../views/mostrar_medicamento.php" class="volver"><i class="fas fa-arrow-left"></i> Volver al listado</a>
    </div>
</body>
</html>
