<?php
session_start();
require_once "../../conexion/db.php";

$email = $_POST["email"];
$nombre = $_POST["name"];
$apellidos = $_POST["apellidos"];
$direccion = $_POST['direccion'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$consulta = $mysqli->query("SELECT *FROM maestros WHERE email = '$email'");
$resultado = $consulta->fetch_assoc();
$correo = $resultado['email'];
$consulta_estudiantes = $mysqli->prepare("SELECT * FROM maestros WHERE email = ?");
$consulta_estudiantes->bind_param("s", $correo);
$consulta_estudiantes->execute();
$resultado_estudiantes = $consulta_estudiantes->get_result()->fetch_assoc();

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
        $query_estudiantes .= "`fecha_nacimiento` = ?, ";
        $params_estudiantes[] = $fecha_nacimiento;
        $_SESSION['fecha_nacimiento'] = $fecha_nacimiento;

    }
  
  
  

    $query_estudiantes = rtrim($query_estudiantes, ", ");
    $query_estudiantes .= " WHERE `maestros`.`email` = ?";
    $params_estudiantes[] = $correo;


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