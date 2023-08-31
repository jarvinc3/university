<?php
try {
    $hostname = "localhost";
    $dbname = "university";
    $username = "root";
    $password = "";

    $mysqli = new mysqli($hostname, $username, $password, $dbname);
} catch (\Throwable $th) {
   echo "error" . $e->getMessage();
}