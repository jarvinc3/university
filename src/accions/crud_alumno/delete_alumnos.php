<?php
session_start();

try {
    require_once "../conexion/db.php";

    if ($mysqli->connect_error) {
        die("Error de conexión a la base de datos: " . $mysqli->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Evitar la vulnerabilidad de inyección SQL usando consultas preparadas
        $query = "DELETE FROM estudiantes WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Éxito en la eliminación
            header("Location: /src/views/admin/crud_alumno/crud_alumnos.php");
            exit();
        } else {
            // Manejar un posible error
            echo "Error al eliminar el estudiante: " . $stmt->error;
        }

        $stmt->close();
    }
} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos al final del script si es necesario
$mysqli->close();
?>