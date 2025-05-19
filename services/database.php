<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_perriatra";

// Lo que estamos realizando aquí es asignando variables las cuales luego nos permitirán realizar la conexion con la BBDD


// Se realiza la conexión con la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica la conexión y si no es posible o algún campo es incorrecto te salta el error
if (!$conn) {
    echo "<script> alert('Error de conexión')</script>";
    die("Error de conexión: " . mysqli_connect_error());
}
?>