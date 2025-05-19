<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registro - Patitas Felices</title>
  <link rel="stylesheet" href="../css/styles.css" />
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
      <h1>🐾 Registro</h1>
      <!-- Formulario de registro -->
      <form>
        <!-- Campo para el nombre -->
        <label for="nombre">Nombre</label> 
        <input type="text" id="nombreRegister" onblur="verifNombreRegister()" required /><br>
        <p class="error" id="errorUsuarioRegister"></p>

        <!-- Campo para los apellidos -->
        <label for="apellidos">Apellido</label>
        <input type="text" id="apellidoRegister1" name="apellido1" onblur="verifApellidoRegister1()" required /> <br>
        <p class= "error" id="errorApellidoRegister1"></p>

        <label for="apellidos">Apellido2</label>
        <input type="text" id="apellidoRegister2" name="apellido2" onblur="verifApellidoRegister2()" required /> <br>
        <p class= "error" id="errorApellidoRegister2"></p>
        
        <!-- Campo para el correo electrónico -->
        <label for="correo">Correo electrónico</label> 
        <input type="email" id="correoRegister" onblur="verifEmailRegister()" required /><br>
        <p class= "error" id="errorEmailRegister"></p>

        <!-- Campo para la contraseña -->
        <label for="password">Contraseña</label> 
        <input type="password" id="passwordRegister" required onblur="verifContraRegister()" /><br>
        <p class= "error" id="errorContraRegister"></p>

        <!-- Campo para confirmar la contraseña -->
        <label for="confirm-password">Confirmar contraseña</label>
        <input type="password" id="confirm-password" onblur="verifConfirmContraRegister()" required /> <br>
        <p class= "error" id="errorConfirmRegister"></p>

        <!-- Botón para enviar el formulario -->
        <button type="submit">Registrarse</button>
        <!-- Enlace para ir al formulario de inicio de sesión -->
        <p class="link">¿Ya tienes cuenta? <a href="../view/login.html">Inicia sesión aquí</a></p>
      </form>
    </div>
  </div>
</body>
</html>