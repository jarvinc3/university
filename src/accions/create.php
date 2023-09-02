<?php

$correo = $_POST["email"];
$password = $_POST["contrasena"];

try {
    require_once "../conexion/db.php";
    $consulta1 = $mysqli->query("SELECT * FROM `estudiantes` WHERE email = '$correo'");
        $resultado1 = $consulta1->fetch_assoc();
    if ($resultado1['email'] == "$correo") {
         echo "La Cuenta ya existe Porfavor intente con otro correo";
         die();
    } else {
        $contrahash = password_hash($password,PASSWORD_DEFAULT);
        $mysqli->query("INSERT INTO estudiantes(email, pssword) VALUES ('$correo', '$contrahash');");
        session_start();
        $_SESSION['password'] = $resultado1['contra']; 
        $_SESSION['email'] =  $resultado1['email'];
        $_SESSION['id'] = $resultado1['id'];
        $_SESSION['name'] =  $resultado1['name'];
        header("location:../views/alumno/vAlumno.php");
        exit();
    }
} catch (mysqli_sql_exception $e) {
    echo "Error" . $e->getMessage();
}



?>