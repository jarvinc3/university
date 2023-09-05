<?php
session_start();
require_once "../../conexion/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curso_id = $_POST['clase'];
    $profesor_id = $_POST['id_maestro'];

    $query = "UPDATE cursos SET maestroID = ? WHERE cursoID = ?";
    
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ii", $profesor_id, $curso_id);

    if ($stmt->execute()) {
        // Asignación exitosa
        header("Location: /src/views/admin/crud_clases/crud_clases.php"); // Redirige a una página de éxito o a donde desees
    } else {
        echo "Error en la asignación: /src/views/admin/crud_clases/crud_clases.php" . $stmt->error;
    }
}
?>

