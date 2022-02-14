<?php

session_start();

if(!isset($_SESSION['username'])) {
    header(location: index.php);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investigacion Aplicada</title>
</head>
<body>
    
    <h1>Investigacion aplicada</h1>
    <h2>Alejandro José Castillo Pacheco CP190719</h2>
    <h2>Diego Alejandro Velásquez Gómez VG190501</h2>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>