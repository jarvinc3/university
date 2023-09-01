<?php
$correo = $_POST["correo"];
$password = $_POST["pssword"];

try {
    require_once "../conexion/db.php";
    $tablas = array("administrador", "maestros", "estudiantes");
    $tabla_usuario = "";
    $resultado = array();
    foreach ($tablas as $tabla) {
        $consulta = $mysqli->query("SELECT * FROM `$tabla` WHERE email = '$correo'");
        if ($consulta->num_rows > 0) {
            $resultado = $consulta->fetch_assoc();
            $tabla_usuario = $tabla;
            break;
        }
    }
    if (!empty($resultado)) {
        if (password_verify($password, $resultado['pssword'])) {
            session_start();
            $_SESSION['password'] = $resultado['pssword'];
            $_SESSION['email'] =  $resultado['email'];
            $_SESSION['id'] = $resultado['id'];
            $_SESSION['name'] =  $resultado['name'];
            if ($tabla_usuario == "administrador") {
                header("Location:../views/admin/vAdmin.php");
            } else if ($tabla_usuario == "maestros") {
                header("Location:../views/maestro/vMaestro.php");
            } else if ($tabla_usuario == "estudiantes") {
                header("Location:../views/alumno/vAlumno.php");
            }
            exit();
        } else {
            echo "Contraseña equivocada";
            die();
        }
    } else {
        echo "Correo no encontrado en ninguna tabla";
        die();
    }
} catch (mysqli_sql_exception $e) {
    echo "Error" . $e->getMessage();
}