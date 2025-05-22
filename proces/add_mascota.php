<?php
include '../services/database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $chip = trim($_POST['chip']);
    $nombre = trim($_POST['nombre']);
    $sexo = $_POST['sexo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $peso = floatval($_POST['peso']);
    $vacunado = isset($_POST['vacunado']) ? intval($_POST['vacunado']) : 0;
    $id_especie = intval($_POST['id_especie']);
    $dni_propietario = $_POST['dni_propietario'];
    $dni_veterinario = $_POST['dni_veterinario'];

    // Validaciones
    $errores = [];

    if (empty($chip) || preg_match('/\s/', $chip)) $errores[] = "El chip no puede estar vacío ni contener espacios.";
    if (empty($nombre)) $errores[] = "El nombre es obligatorio.";
    if (!in_array($sexo, ['M', 'F'])) $errores[] = "Sexo inválido.";
    if (empty($fecha_nacimiento)) $errores[] = "La fecha de nacimiento es obligatoria.";
    if ($peso <= 0) $errores[] = "El peso debe ser mayor que cero.";
    if (!in_array($vacunado, [0, 1])) $errores[] = "Valor de vacunado inválido.";
    if (empty($id_especie)) $errores[] = "Debe seleccionar una especie.";
    if (empty($dni_propietario)) $errores[] = "Debe seleccionar un propietario.";
    if (empty($dni_veterinario)) $errores[] = "Debe seleccionar un veterinario.";

    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "$error<br>";
        }
        exit;
    }

    // Preparar la consulta
    $sql = "INSERT INTO tbl_animal (chip, nombre, sexo, fecha_nacimiento, peso, vacunado, id_especie, dni_propietario, dni_veterinario) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        echo "Error al preparar la consulta: " . mysqli_error($conn);
        exit;
    }

    // Asociar parámetros
    mysqli_stmt_bind_param($stmt, "sssdiiiss", 
        $nombre, $sexo, $fecha_nacimiento, $peso, $vacunado, $id_especie, $dni_propietario, $dni_veterinario, $chip
    );


    // Ejecutar
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ../views/mascota.php");
        exit();
    } else {
        echo "Error al registrar el animal: " . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
} else {
    header("Location: ../forms/form_mascota.php");
    exit();
}


