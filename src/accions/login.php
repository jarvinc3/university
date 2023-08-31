<?php
$correo = $_POST["correo"];
$password = $_POST["pssword"];

try {
    require_once "../conexion/db.php";
    $consulta = $mysqli->query("SELECT * FROM `usuarios` WHERE email = '$correo'");
    $resultado = $consulta->fetch_assoc();
    $cargo = $resultado['cargo'];
    if (password_verify($password, $resultado['pssword'])) {
        if ($cargo == 1) {
            session_start();
            $_SESSION['password'] = $resultado['pssword'];
            $_SESSION['email'] =  $resultado['email'];
            $_SESSION['id'] = $resultado['id'];
            $_SESSION['name'] =  $resultado['name'];
            header("Location:../views/admin/vAdmin.php");
            exit();
        } else if ($cargo == 2) {
            session_start();
            $_SESSION['password'] = $resultado['pssword'];
            $_SESSION['email'] =  $resultado['email'];
            $_SESSION['id'] = $resultado['id'];
            $_SESSION['name'] =  $resultado['name'];
            header("Location:../views/maestro/vMaestro.php");
            exit();
        } else if ($cargo == 3) {
            session_start();
            $_SESSION['password'] = $resultado['pssword'];
            $_SESSION['email'] =  $resultado['email'];
            $_SESSION['id'] = $resultado['id'];
            $_SESSION['name'] =  $resultado['name'];
            header("Location:../views/alumno/vAlumno.php");
            exit();
        } else {
            echo "Correo o contraseña equivocados";
            die();
        }
    }
} catch (mysqli_sql_exception $e) {
    echo "Error" . $e->getMessage();
}
