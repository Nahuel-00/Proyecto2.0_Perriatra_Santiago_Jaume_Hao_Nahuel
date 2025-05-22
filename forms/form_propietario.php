<?php
// Conexión BBDD
include "../services/database.php";
session_start();

// Comprobamos si hay sesión iniciada
if (!isset($_SESSION['nombre_veterinario'])) {
    header("Location: ../views/login.php");
    exit();
}

// Guardamos el nombre en una variable local
$usuario = $_SESSION['nombre_veterinario'];

$conexion = mysqli_connect("localhost", "root", "", "db_perriatra");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registrar Propietario - Patitas Felices</title>
  <link rel="stylesheet" href="../css/styles.css">
  <script src="../css/valCompleta.js" defer></script>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h1>👤 Registrar Propietario</h1>
      <form action="../proces/add_propietario.php" method="POST">
        
        <label for="dni_propietario">DNI</label>
        <input type="text" id="dni_propietario" name="dni_propietario" onblur="verifDNI()" maxlength="9" pattern="[0-9]{8}[A-Za-z]" required placeholder="12345678A" />
        <p class="error" id="errorDNI"></p>

        <label for="nombre">Nombre</label>
        <input type="text" id="nombrePropietario" name="nombre" onblur="verifNombrePropietario()" required />
        <p class="error" id="errorUsuarioPropietario"></p>

        <label for="apellido1">Primer Apellido</label>
        <input type="text" id="apellidoPropietario1" name="apellido1" onblur="verifApellidoPropietario1()" required />
        <p class="error" id="errorApellidoPropietario1"></p>

        <label for="apellido2">Segundo Apellido</label>
        <input type="text" id="apellidoPropietario2" name="apellido2" onblur="verifApellidoPropietario2()" required />
        <p class="error" id="errorApellidoPropietario2"></p>

        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" onblur="veriTelepe()" pattern="[0-9]{9}" maxlength="9" required placeholder="123456789" />
        <p class="error" id="errorTelefono"></p>

        <label for="correo">Correo electrónico</label>
        <input type="email" id="correoPropietario" name="correo" onblur="veriEmailpr()" required placeholder="correo@ejemplo.com" />
        <p class="error" id="errorEmailPropietario"></p>

        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion" onblur="veriDirepr()" required placeholder="Calle Ejemplo, 123" />
        <p class="error" id="errorDireccion"></p>        

        <button type="submit">Registrar Propietario</button>
      </form>
    </div>
  </div>
</body>
</html>
