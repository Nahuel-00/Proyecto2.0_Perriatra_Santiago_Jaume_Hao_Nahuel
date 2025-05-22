<?php
// edit_propietario.php
include '../services/database.php';

$dni = isset($_GET['dni']) ? mysqli_real_escape_string($conn, $_GET['dni']) : '';

$sql = "SELECT * FROM tbl_propietario WHERE dni_propietario = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $dni);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$propietario = mysqli_fetch_assoc($result);
?>




<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Animal - Patitas Felices</title>
  <link rel="stylesheet" href="../css/styles.css">
  <script src="../css/valCompleta.js" defer></script>
  <style>
    .error {
      color: red;
      font-size: 0.8em;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h1>📋 Modificar Propietario</h1>

      <form action="../proces/update_propietario.php" method="POST">
        <input type="hidden" name="dni_propietario" value="<?php echo htmlspecialchars($propietario['dni_propietario']); ?>">

        <label>Nombre:</label>
        <input type="text" name="nombre_propietario" id="nombrePropietarioMod" onblur="veriNompre()" value="<?php echo htmlspecialchars($propietario['nombre_propietario']); ?>" required><br>
        <p class="error" id="errorUsuarioPropietarioMod"></p>

        <label>Primer apellido:</label>
        <input type="text" name="apellido_primario_propietario" id="apellidoPropietarioMod1" onblur="verifApellidoPropietarioMod1()" value="<?php echo htmlspecialchars($propietario['apellido_primario_propietario']); ?>" required><br>
        <p class="error" id="errorApellidoPropietarioMod1"></p>

        <label>Segundo apellido:</label>
        <input type="text" name="apellido_secundario_propietario" id="apellidoPropietarioMod2" onblur="verifApellidoPropietarioMod2()" value="<?php echo htmlspecialchars($propietario['apellido_secundario_propietario']); ?>" required><br>
        <p class="error" id="errorApellidoPropietarioMod2"></p>

        <label>Teléfono:</label>
        <input type="tel" name="telefono" id="telefonoMod" onblur="verifTelefonoPropietario()" value="<?php echo htmlspecialchars($propietario['telefono']); ?>" pattern="[0-9]{9}" maxlength="9" required><br>
        <p class="error" id="errorTelefonoMod"></p>

        <label>Correo electrónico:</label>
        <input type="email" name="email" id="correoPropietarioMod" onblur="verifModEmailPropietario()" value="<?php echo htmlspecialchars($propietario['email']); ?>" required><br>
        <p class="error" id="errorEmailPropietarioMod"></p>

        <label>Dirección:</label>
        <input type="text" name="direccion" id="direccionMod" onblur="verifModDireccionPropietario()" value="<?php echo htmlspecialchars($propietario['direccion']); ?>" required><br>
        <p class="error" id="errorDireccionMod"></p>

        <input type="submit" value="Actualizar propietario">
        <br>
        <p class="link"> Volver a la tabla propietarios  <a href="../views/propietario.php">click aquí</a></p>
      </form>
    </div>
  </div>
</body>
</html>