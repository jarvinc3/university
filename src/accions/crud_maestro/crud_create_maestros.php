<?php 
session_start();

$email = $_POST["email"];
$password = $_POST["contrasena"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"]; 
$direccion = $_POST['direccion'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$curso = $_POST['curso'];

try {
    require_once "../../conexion/db.php";
    $consulta1 = $mysqli->query("SELECT * FROM `maestros` WHERE email = '$email'");
    $resultado1 = $consulta1->fetch_assoc();
    $id_maestro = $resultado1['id'];

if ($resultado1['email'] == $email) {
    echo "La Cuenta ya existe Por favor intente con otro correo";
    die();
} else {
    $contrahash = password_hash($password, PASSWORD_DEFAULT);

    $mysqli->query("INSERT INTO maestros(email, pssword, name, apellido, direccion, fecha_de_nacimiento) 
        VALUES ('$email', '$contrahash', '$nombre', '$apellidos', '$direccion', '$fecha_nacimiento');");

    $id_maestro = $mysqli->insert_id;
    $query = "UPDATE cursos SET maestroID = ? WHERE cursoID = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ii", $id_maestro, $curso);
    $stmt->execute();

    header("location: /src/views/admin/crud_maestro/crud_maestros.php ");
    exit();
}

} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
}
?>