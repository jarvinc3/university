<?php
$correo = $_POST["email"];
$password = $_POST["contrasena"];
$cargo = $_POST["cargo"];

try {
    require_once "../conexion/db.php";
    $consulta1 = $mysqli->query("SELECT * FROM `usuarios` WHERE email = '$correo'");
        $resultado1 = $consulta1->fetch_assoc();
    if ($resultado1['email'] == "$correo") {
         echo "La Cuenta ya existe Porfavor intente con otro correo";
         die();
    } else {
        $contrahash = password_hash($password,PASSWORD_DEFAULT);
        $mysqli->query("INSERT INTO usuarios(email, pssword, cargo) VALUES ('$correo', '$contrahash', '$cargo');");
        $consulta = $mysqli->query("SELECT * FROM `usuarios` WHERE email = '$correo'");
        $resultado = $consulta->fetch_assoc();
        session_start();
        $_SESSION['password'] = $resultado['contra']; 
        $_SESSION['email'] =  $resultado['email'];
        $_SESSION['id'] = $resultado['id'];
        $_SESSION['name'] =  $resultado['name'];
        header("Location:../views/alumno/vAlumno.php");
        exit();
    }
} catch (mysqli_sql_exception $e) {
    echo "Error" . $e->getMessage();
}