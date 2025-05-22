<?php
include '../services/database.php';
session_start();

// Comprobamos si hay sesión iniciada
if (!isset($_SESSION['nombre_veterinario'])) {
    header("Location: ../views/login.php");
    exit();
}

// Guardamos el nombre en una variable local
$usuario = $_SESSION['nombre_veterinario'];

$chip = isset($_GET['chip']) ? $_GET['chip'] : '';

$sql = "SELECT * FROM tbl_animal WHERE chip = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $chip);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$animal = mysqli_fetch_assoc($result);

// Cargar listas para selects
$especies = mysqli_query($conn, "SELECT id_especie, nombre_especie FROM tbl_especie");
$propietarios = mysqli_query($conn, "SELECT dni_propietario, nombre_propietario, apellido_primario_propietario FROM tbl_propietario");
$veterinarios = mysqli_query($conn, "SELECT dni_veterinario, nombre_veterinario, apellido_primario_veterinario FROM tbl_veterinario");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Modificar Mascota</title>
  <link rel="stylesheet" href="../css/styles.css">
  <script src="../css/valCompleta.js" defer></script>
</head>
<body>
<div class="container">
  <div class="form-container">
    <h1>📋 Modificar Mascota</h1>

    <form action="../proces/update_mascota.php" method="POST">
      <input type="hidden" name="chip" value="<?php echo htmlspecialchars($animal['chip']); ?>" >

      <label>Nombre:</label>
      <input type="text" name="nombre" value="<?php echo htmlspecialchars($animal['nombre']); ?>" id="nombreMascotaEdi" onblur="veriNomMasEdi()" required><br>
      <p class="error" id="errorMasEdi"></p>

      <label>Sexo:</label>
      <select name="sexo" id="sexoMasEdi" onblur="veriSexoMasEdi()" required>
        <option value="M" <?php if($animal['sexo']=='M') echo 'selected'; ?>>Macho</option>
        <option value="F" <?php if($animal['sexo']=='F') echo 'selected'; ?>>Hembra</option>
      </select><br>
      <p class="error" id="errorSexoEdi"></p>

      <label>Fecha nacimiento:</label>
      <input type="date" name="fecha_nacimiento" value="<?php echo $animal['fecha_nacimiento']; ?>" id="fechaEdi" onblur="verifFechaEdi()" required><br>
      <p class="error" id="errorFechaedi"></p>

      <label>Peso:</label>
      <input type="number" step="0.1" min="0.1" name="peso" value="<?php echo $animal['peso']; ?>" id="pesoEdi" onblur="verifPesoEdi()"  required><br>
      <p class="error" id="errorPesoEdi"></p>

      <label>¿Vacunado?</label>
      <select name="vacunado" id="vacunadoEdi" onblur="verifVacunadoEdi()" required>
        <option value="1" <?php if($animal['vacunado']) echo 'selected'; ?>>Sí</option>
        <option value="0" <?php if(!$animal['vacunado']) echo 'selected'; ?>>No</option>
      </select><br>
      <p class="error" id="errorVacunadoEdi"></p>

      <label>Especie:</label>
      <select name="id_especie" id="especieEdi" onblur="verifEpecieEdi()" required>
        <option value="">-- Seleccione una especie --</option>
        <?php while ($especie = mysqli_fetch_assoc($especies)) { ?>
          <option value="<?php echo $especie['id_especie']; ?>" <?php if ($especie['id_especie'] == $animal['id_especie']) echo 'selected'; ?>>
            <?php echo ucfirst($especie['nombre_especie']); ?>
          </option>
        <?php } ?>
      </select><br>
      <p class="error" id="errorEspecieEdi"></p>

      <label>Propietario:</label>
      <select name="dni_propietario" id="propietarioEdi" onblur="veriDniprEdi()" required>
        <option value="">-- Seleccione un propietario --</option>
        <?php while ($prop = mysqli_fetch_assoc($propietarios)) { ?>
          <option value="<?php echo $prop['dni_propietario']; ?>" <?php if ($prop['dni_propietario'] == $animal['dni_propietario']) echo 'selected'; ?>>
            <?php echo $prop['dni_propietario'] . " - " . $prop['nombre_propietario'] . " " . $prop['apellido_primario_propietario']; ?>
          </option>
        <?php } ?>
      </select><br>
      <p class="error" id="errorDNIPropietarioEdi"></p>

      <label>Veterinario:</label>
      <select name="dni_veterinario" id="dni_veterinarioEdi" onblur="veriDniveEdi()" required>
        <option value="">-- Seleccione un veterinario --</option>
        <?php while ($vet = mysqli_fetch_assoc($veterinarios)) { ?>
          <option value="<?php echo $vet['dni_veterinario']; ?>" <?php if ($vet['dni_veterinario'] == $animal['dni_veterinario']) echo 'selected'; ?>>
            <?php echo $vet['dni_veterinario'] . " - " . $vet['nombre_veterinario'] . " " . $vet['apellido_primario_veterinario']; ?>
          </option>
        <?php } ?> 
      </select><br>
      <p class="error" id="errorDNIVeterinarioEdi"></p>

      <input type="submit" value="Actualizar mascota">
      <p class="link">Volver a la tabla mascotas <a href="../views/mascota.php">click aquí</a></p>
    </form>
  </div>
</div>
</body>
</html>

