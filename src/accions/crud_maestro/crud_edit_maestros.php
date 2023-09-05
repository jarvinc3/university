<?php
session_start();
require_once "../../conexion/db.php";

$email = $_POST["email"];
$nombre = $_POST["name"];
$apellidos = $_POST["apellidos"];
$direccion = $_POST['direccion'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$curso = $_POST["curso"];

// Obtén el ID del maestro
$consulta = $mysqli->query("SELECT * FROM maestros WHERE email = '$email'");
$resultado = $consulta->fetch_assoc();
$id_maestro = $resultado['id'];

// Obtén el ID del curso anterior al que estaba asignado el maestro
$consulta_curso_anterior = $mysqli->query("SELECT maestroID FROM cursos WHERE maestroID = $id_maestro");
$curso_anterior = $consulta_curso_anterior->fetch_assoc();
$id_curso_anterior = $curso_anterior['maestroID'];

// Actualiza el curso anterior para desvincular al maestro
if (!empty($id_curso_anterior)) {
    $query_desvincular = "UPDATE cursos SET maestroID = NULL WHERE cursoID = ?";
    $stmt_desvincular = $mysqli->prepare($query_desvincular);
    $stmt_desvincular->bind_param("i", $id_curso_anterior);
    $stmt_desvincular->execute();
    $stmt_desvincular->close();
}

// Actualiza el nuevo curso para asignar al maestro
$query_asignar = "UPDATE cursos SET maestroID = ? WHERE cursoID = ?";
$stmt_asignar = $mysqli->prepare($query_asignar);
$stmt_asignar->bind_param("ii", $id_maestro, $curso);
$stmt_asignar->execute();
$stmt_asignar->close();
// var_dump($id_maestro);

$contrahash = password_hash($password, PASSWORD_DEFAULT);

if (
    !empty($email) || !empty($nombre) || !empty($apellidos) || !empty($direccion) || !empty($fecha_nacimiento)
) {
    $query_estudiantes = "UPDATE `maestros` SET ";
    $params_estudiantes = array();

    if (!empty($email)) {
        $query_estudiantes .= "`email` = ?, ";
        $params_estudiantes[] = $email;
        $_SESSION['email'] = $email;

    }
    if (!empty($nombre)) {
        $query_estudiantes .= "`name` = ?, ";
        $params_estudiantes[] = $nombre;
        $_SESSION['name'] = $nombre;

    }
    if (!empty($apellidos)) {
        $query_estudiantes .= "`apellido` = ?, ";
        $params_estudiantes[] = $apellidos;
        $_SESSION['apellidos'] = $apellidos;

    }
    if (!empty($direccion)) {
        $query_estudiantes .= "`direccion` = ?, ";
        $params_estudiantes[] = $direccion;
        $_SESSION['direccion'] = $direccion;

    }
    if (!empty($fecha_nacimiento)) {
        $query_estudiantes .= "`fecha_de_nacimiento` = ?, ";
        $params_estudiantes[] = $fecha_nacimiento;
        $_SESSION['fecha_nacimiento'] = $fecha_nacimiento;

    }
  
  
  

    $query_estudiantes = rtrim($query_estudiantes, ", ");
    $query_estudiantes .= " WHERE `maestros`.`email` = ?";
    $params_estudiantes[] = $email;


    $stmt_estudiantes = $mysqli->prepare($query_estudiantes);
    $types_estudiantes = str_repeat("s", count($params_estudiantes));
    $stmt_estudiantes->bind_param($types_estudiantes, ...$params_estudiantes);


   
    if ($stmt_estudiantes->execute()) {
       
        header("Location: /src/views/admin/crud_maestro/crud_maestros.php");
    } else {
        echo "Error en la actualización: " . $stmt_estudiantes->error . " - " . $stmt_usuarios->error;
    }

    $stmt_estudiantes->close();
}