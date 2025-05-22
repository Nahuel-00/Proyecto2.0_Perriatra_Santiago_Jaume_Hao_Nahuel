<?php
session_start();

// Comprobamos si hay sesión iniciada
if (!isset($_SESSION['nombre_veterinario'])) {
    header("Location: ../views/login.php");
    exit();
}

// Guardamos el nombre en una variable local
$usuario = $_SESSION['nombre_veterinario'];

$conexion = mysqli_connect("localhost", "root", "", "db_perriatra");

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
    <script src="../css/valCompleta.js" defer></script>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h2><i class="fas fa-pills colon"></i> Solicitar Medicamento al Proveedor</h2>
    </header>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre del medicamento:</label>
            <input type="text" name="nombre" id="nombre" onblur="veriNomMedi()" required>
            <p class="error" id="errorNomMedi"></p>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="4" onblur="veriDesMedi()" required></textarea>
            <p class="error" id="errorDesMedi"></p>

            <label for="dosis">Dosis:</label>
            <input type="text" name="dosis" id="dosis" onblur="veriDosisMedi()" required>
            <p class="error" id="errorDosis"></p>

            <label for="id_especie">Especie:</label>
            <select name="id_especie" id="id_especie" onblur="veriEspecieMedi()" required>
                <option value="">Seleccionar especie</option>
                <?php while ($row = mysqli_fetch_assoc($especies)) { ?>
                    <option value="<?= $row['id_especie'] ?>"><?= ucfirst($row['nombre_especie']) ?></option>
                <?php } ?>
            </select>
            <p class="error" id="errorEspeMedi"></p>

            <label for="imagen">Imagen del medicamento:</label>
            <input type="file" name="imagen" id="imagen" accept="image/*" onblur="veriImaMedi()" required>
            <p class="error" id="errorImgMedi"></p>

            <input type="submit" value="Añadir Medicamento">
        </form>

        <a href="../views/mostrar_medicamento.php" class="volver"><i class="fas fa-arrow-left"></i> Volver al listado</a>
    </div>
</body>
</html>
