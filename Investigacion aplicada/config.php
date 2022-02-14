<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "login_registro_lisa1";

$conn = mysqli_connect($server, $user, $pass, $database);

    if(!$conn) {
        die("<script> alert('Conexión fallida') </script>");
    }

?>