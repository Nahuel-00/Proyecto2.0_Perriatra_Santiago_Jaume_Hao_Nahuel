<?php
// Conexión BBDD
include "../services/database.php";

// Consulta de especies
$queryEspecies = "SELECT id_especie, nombre_especie FROM tbl_especie";
$resultadoEspecies = mysqli_query($conn, $queryEspecies);

// Consulta de propietarios
$queryPropietarios = "SELECT dni_propietario, nombre_propietario, apellido_primario_propietario FROM tbl_propietario";
$resultadoPropietarios = mysqli_query($conn, $queryPropietarios);

// Consulta de veterinarios
$queryVeterinarios = "SELECT dni_veterinario, nombre_veterinario, apellido_primario_veterinario FROM tbl_veterinario";
$resultadoVeterinarios = mysqli_query($conn, $queryVeterinarios);
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
      <h1>📋 Registrar Animal</h1>
      <form action="../proces/add_mascota.php" method="POST">
        
        <label for="chip">Nº de Chip</label>
        <input type="text" id="chip" name="chip" onblur="verifChip()" required>
        <p class="error" id="errorChip"></p>

        <label for="nombre">Nombre</label>
        <input type="text" id="nombreMascota" name="nombre" onblur="verifNombreMascota()" required>
        <p class="error" id="errorUsuarioMascota"></p>

        <label for="sexo">Sexo</label>
        <select id="sexo" name="sexo" onblur="verifSexo()" required>
          <option value="" disabled selected hidden>Selecciona</option>
          <option value="M">Macho</option>
          <option value="F">Hembra</option>
        </select>
        <p class="error" id="errorSexo"></p>

        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" onblur="verifFecha()" required>
        <p class="error" id="errorFecha"></p>

        <label for="peso">Peso (kg)</label>
        <input type="number" id="peso" name="peso" step="0.1" min="0.1" onblur="verifPeso()" required>
        <p class="error" id="errorPeso"></p>

        <label for="vacunado">¿Vacunado?</label>
        <select id="vacunado" name="vacunado" onblur="verifVacunado()" required>
          <option value="" disabled selected hidden>Selecciona</option>
          <option value="1">Sí</option>
          <option value="0">No</option>
        </select>
        <p class="error" id="errorVacunado"></p>

        <label for="id_especie">Seleccione la especie de su mascota</label>
        <select id="especie" name="id_especie" onblur="verifEpecie()" equired>
          <option value="">Seleccione una especie </option>
          <?php while ($fila = mysqli_fetch_assoc($resultadoEspecies)) { ?>
            <option value="<?php echo $fila['id_especie']; ?>">
              <?php echo ucfirst($fila['nombre_especie']); ?>
            </option>
          <?php } ?>
        </select>
        <p class="error" id="errorEspecie"></p>

        <label for="dni_propietario">Seleccione el DNI del propietario</label>
        <select id="propietario" name="dni_propietario" onblur="veriDnipr()" required>
          <option value="">-- Seleccione un propietario --</option>
          <?php while ($fila = mysqli_fetch_assoc($resultadoPropietarios)) { ?>
            <option value="<?php echo $fila['dni_propietario']; ?>">
              <?php echo $fila['dni_propietario'] . " - " . $fila['nombre_propietario'] . " " . $fila['apellido_primario_propietario']; ?>
            </option>
          <?php } ?>
        </select>
        <p class="error" id="errorDNIPropietario"></p>

        <label for="dni_veterinario">Seleccione el DNI del veterinario encargado</label>
        <select id="dni_veterinario" name="dni_veterinario" onblur="veriDnive()" required>
          <option value="">-- Seleccione un veterinario --</option>
          <?php while ($fila = mysqli_fetch_assoc($resultadoVeterinarios)) { ?>
            <option value="<?php echo $fila['dni_veterinario']; ?>">
              <?php echo $fila['dni_veterinario'] . " - " . $fila['nombre_veterinario'] . " " . $fila['apellido_primario_veterinario']; ?>
            </option>
          <?php } ?>
        </select>
        <p class="error" id="errorDNIVeterinario"></p>

        <button type="submit">Registrar Animal</button>
        <a href="../views/mascota.php">Cancelar</a>
        
      </form>
    </div>
  </div>
</body>
</html>