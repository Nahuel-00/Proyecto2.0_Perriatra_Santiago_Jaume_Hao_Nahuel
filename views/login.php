<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Veterinaria Patitas Felices - Login / Registro</title>
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
      <h1>🐾Bienvenido a Patitas Felices🐾</h1>
      <!-- Formulario Login -->
    <form action="../proces/login.php" method="POST" id="loginForm">
      <label for="dni_login">DNI</label>
      <input type="text" id="dni_login" name="dni_login" onblur="verifdnilogin()" required />
      <p class="error" id="errordni_login"></p>

      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password" onblur="verifContraLogin()" required />
      <p class="error" id="errorContra"></p>

      <button type="submit">Entrar</button>
    </form>
    </div>
    <p class="link"> Si no tienes cuenta crea una  <a href="../views/register.php">aquí</a></p>
      
  </div>

</body>
</html>