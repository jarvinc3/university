<?php 
session_start();

$DNI = $_POST["matricula"];
$email = $_POST["email"];
$password = $_POST["contrasena"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"]; 
$direccion = $_POST['direccion'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

try {
    require_once "../../conexion/db.php";
    $consulta1 = $mysqli->query("SELECT * FROM `estudiantes` WHERE email = '$email'");
    $resultado1 = $consulta1->fetch_assoc();
    if ($resultado1 != null && $resultado1['email'] == "$email") {
         echo "La Cuenta ya existe Porfavor intente con otro correo";
         die();
    } else {
        $contrahash = password_hash($password, PASSWORD_DEFAULT);

        // Corrección en la cadena de consulta SQL aquí
        $mysqli->query("INSERT INTO estudiantes (name, email, pssword, matricula, apellido, direccion, fecha_de_nacimiento) 
        VALUES ('$nombre', '$email', '$contrahash', '$DNI', '$apellidos', '$direccion', '$fecha_nacimiento');");

        
        header("location: /src/views/admin/crud_alumno/crud_alumnos.php");
        exit();
    }
} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
}
?>