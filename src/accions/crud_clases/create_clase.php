<?php 
session_start();
require_once "../../conexion/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre_curso = $_POST['curso_name'];
    $maestroID = $_POST['id_maestro'];

    // Realizar la inserción en la base de datos
    // Por ejemplo:
     $consulta = $mysqli->prepare("INSERT INTO cursos (nombreCurso, maestroID) VALUES (?, ?)");
     $consulta->bind_param("si", $nombre_curso, $maestroID);
     $consulta->execute();
    
    // Redirigir a una página de éxito o mostrar un mensaje de confirmación
    header("Location: /src/views/admin/crud_clases/crud_clases.php ");
    exit;
}
?>