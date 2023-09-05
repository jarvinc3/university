<?php
session_start();
require_once "../conexion/db.php"; 
$email = $_SESSION['email'];
$consulta = $mysqli->query("SELECT *FROM estudiantes WHERE email = '$email'");
$resultado = $consulta->fetch_assoc();
$id_estudent = $resultado['id'];
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cursoID'])) {
    $id = $_GET['cursoID'];
    $stmt = $mysqli->prepare("INSERT INTO inscripciones (estudianteID, cursoID) VALUES (?, ?)");
    $stmt->bind_param("ii", $id_estudent, $id);
    if ($stmt->execute()) {
        header("Location: /src/views/alumno/clases/clases_read.php");
    } else {
        echo "el estudiante no se registro";
    }
    $stmt->close();
}
?>