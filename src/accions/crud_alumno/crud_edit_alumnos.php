<?php
session_start();
require_once "../../conexion/db.php";

$matricula = $_POST["matricula"];
$email = $_POST["email"];
$nombre = $_POST["name"];
$apellidos = $_POST["apellidos"];
$direccion = $_POST['direccion'];
$fecha_nacimiento = $_POST['fecha_de_nacimiento'];

$consulta = $mysqli->query("SELECT *FROM estudiantes WHERE email = '$email'");
$resultado = $consulta->fetch_assoc();
$DNI = $resultado['matricula'];
$consulta_estudiantes = $mysqli->prepare("SELECT * FROM estudiantes WHERE matricula = ?");
$consulta_estudiantes->bind_param("s", $DNI);
$consulta_estudiantes->execute();
$resultado_estudiantes = $consulta_estudiantes->get_result()->fetch_assoc();

$contrahash = password_hash($password, PASSWORD_DEFAULT);

if (
    !empty($matricula) || !empty($email) || !empty($password) ||
    !empty($nombre) || !empty($apellidos) || !empty($direccion) || !empty($fecha_nacimiento)
) {
    $query_estudiantes = "UPDATE `estudiantes` SET ";
    $params_estudiantes = array();

    if (!empty($matricula)) {
        $query_estudiantes .= "`matricula` = ?, ";
        $params_estudiantes[] = $matricula;
        $_SESSION['matricula'] = $matricula;
    }
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
        $_SESSION['fecha_de_nacimiento'] = $fecha_nacimiento;

    }
  
  
  

    $query_estudiantes = rtrim($query_estudiantes, ", ");
    $query_estudiantes .= " WHERE `estudiantes`.`matricula` = ?";
    $params_estudiantes[] = $DNI;

    $stmt_estudiantes = $mysqli->prepare($query_estudiantes);
    $types_estudiantes = str_repeat("s", count($params_estudiantes));
    $stmt_estudiantes->bind_param($types_estudiantes, ...$params_estudiantes);


   
    if ($stmt_estudiantes->execute()) {
       
        header("Location: /src/views/admin/crud_alumno/crud_alumnos.php");
    } else {
        echo "Error en la actualización: " . $stmt_estudiantes->error . " - " . $stmt_usuarios->error;
    }

    $stmt_estudiantes->close();
}