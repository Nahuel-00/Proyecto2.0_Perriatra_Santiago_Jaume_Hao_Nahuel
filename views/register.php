<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registrar Veterinario - Patitas Felices</title>
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
      <h1>🩺 Registrar Veterinario</h1>
      <form action="../proces/add_veterinario.php" method="POST">
        
        <label for="dni_veterinario">DNI</label>
        <input type="text" id="dni_veterinario" name="dni_veterinario" onblur="verifDNIVeterinario()" maxlength="9" pattern="[0-9]{8}[A-Za-z]" required placeholder="12345678A" />
        <br><p class="error" id="errorDNIVeterinario"></p>

        <label for="nombre">Nombre</label>
        <input type="text" id="nombreVeterinario" name="nombre_veterinario" onblur="verifNombreVeterinario()" required />
        <br><p class="error" id="errorNombreVeterinario"></p>

        <label for="apellido_primario">Primer Apellido</label>
        <input type="text" id="apellidoVeterinario1" name="apellido_primario_veterinario" onblur="verifApellidoVeterinario1()" required />
        <br><p class="error" id="errorApellidoVeterinario1"></p>

        <label for="apellido_secundario">Segundo Apellido</label>
        <input type="text" id="apellidoVeterinario2" name="apellido_secundario_veterinario" onblur="verifApellidoVeterinario2()" required />
        <br><p class="error" id="errorApellidoVeterinario2"></p>

        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefonoVeterinario" name="telefono" onblur="verifTelefonoVeterinario()" pattern="[0-9]{9}" maxlength="9" required placeholder="123456789" />
        <br><p class="error" id="errorTelefonoVeterinario"></p>

        <label for="email">Correo electrónico</label>
        <input type="email" id="emailVeterinario" name="email" onblur="verifEmailVeterinario()" required placeholder="correo@ejemplo.com" />
        <br><p class="error" id="errorEmailVeterinario"></p>

        <label for="fecha_contratacion">Fecha de Contratación</label>
        <input type="date" id="fechaContratacion" name="fecha_contratacion" onblur="verifFechaContratacion()" required />
        <br><p class="error" id="errorFechaContratacion"></p>

        <label for="activo">¿Activo?</label>
        <select id="activo" name="activo" required>
          <option value="">-- Selecciona una opción --</option>
          <option value="1">Sí</option>
          <option value="0">No</option>
        </select>
        <br><p class="error" id="errorActivo"></p>

        <label for="password">Contraseña</label> 
        <input type="password" id="passwordRegister" name="passwordRegister" required onblur="verifContraRegister()" /><br>
        <p class= "error" id="errorContraRegister"></p>

        <label for="confirm-password">Confirmar contraseña</label>
        <input type="password" id="confirm_password" name="confirm_password" onblur="verifConfirmContraRegister()" required /> <br>
        <p class= "error" id="errorConfirmRegister"></p>

        <button type="submit">Registrarse</button>
        
        <!-- Enlace para ir al formulario de inicio de sesión -->
        <p class="link">¿Ya tienes cuenta? <a href="../views/login.php">Inicia sesión aquí</a></p>
        <?php
        // Una vez registrado, redirtigir al inidce con la sesion iniciada
        session_start();
        if (isset($_SESSION['dni_veterinario'])) {
          header("Location: ../index.php");
          exit();
        }
        ?>
      </form>
    </div>
  </div>
</body>
</html>