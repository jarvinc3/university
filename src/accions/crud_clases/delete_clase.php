<?php
session_start();
require_once "../../conexion/db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cursoID'])) {
    $id_curso = $_GET['cursoID'];

    // Evitar la vulnerabilidad de inyección SQL usando consultas preparadas
    $query = "DELETE FROM inscripciones WHERE cursoID = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id_curso);

    // Primero eliminamos al estudiante de la tabla de inscripciones
    if ($stmt->execute()) {
        // Luego, eliminamos al estudiante de la tabla de estudiantes
        $query = "DELETE FROM cursos WHERE cursoID = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $id_curso);

        if ($stmt->execute()) {
            // Éxito en la eliminación
            header("Location: /src/views/admin/crud_clases/crud_clases.php");
            exit();
        } else {
            // Manejar un posible error al eliminar al estudiante de la tabla de estudiantes
            echo "Error al eliminar el curso de la tabla de cursos: " . $stmt->error;
        }
    } else {
        // Manejar un posible error al eliminar al estudiante de la tabla de inscripciones
        echo "Error al eliminar el cursos de la tabla de cursos: " . $stmt->error;
    }

    
}

?>