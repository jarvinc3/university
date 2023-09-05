<?php 
session_start();
require_once "../conexion/db.php";
$email = $_SESSION['email'];
$consulta = $mysqli->query("SELECT *FROM estudiantes WHERE email = '$email'");
$resultado = $consulta->fetch_assoc();
$id_estudent = $resultado['id'];
if (isset($_GET['cursoID'])) {
    $curso = $_GET['cursoID'];
$query = "DELETE FROM inscripciones WHERE estudianteID = $id_estudent AND cursoID = $curso";
    $result = $mysqli->query($query);
    header("Location:  /src/views/alumno/clases/clases_read.php");
} else {
    echo "no se pudo dar de baja";
    die();
}

?>