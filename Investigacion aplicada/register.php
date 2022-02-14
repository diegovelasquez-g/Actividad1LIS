<?php

include 'config.php';

error_reporting(0);

session_start();

if(isset($_SESSION['username'])) {
    header(Location: index.php);
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result -> num_rows > 0 ) {
           
            $sql = "INSERT INTO users (username, email, password) 
                VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script> alert('Usuario registrado con éxito.') </script>";
            $username ="";
            $email ="";
            $_POST['password'] ="";
            $_POST['cpassword'] ="";
        } else {
            echo "<script> alert('Oops! Algo salió mal.') </script>";
        }
        } else{
            echo "<script> alert('Oops, el correo ya ha sido registrado') </script>";
        }
        
    } else {
        echo "<script> alert('Las contraseñas no coinciden') </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style-login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">

    <title>Investigacion aplicada</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text">Registrate</p>
            <div class="input-group">
                <input type="text" placeholder="Nombre de usuario" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Correo electrónico" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirma tu contraseña" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Registrate</button>
            </div>
            <p class="login-register-text">¿Ya tienes cuenta? <a href="index.php">Inicia sesión aquí</a>.</p>
        </form>
    </div>
</body>
</html>