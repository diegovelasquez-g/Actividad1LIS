<?php

include 'config.php';

session_start();

error_reporting(0);

if(isset($_SESSION['username'])) {
    header(Location: bienvenido.php);
}

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND  password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result -> num_rows > 0 ) {
        $row = mysql_fetch_assoc($result);
        $_SESSION['username'] = row['username'];
        header("Location: Bienvenido.php");
    } else {
        echo "<script> alert('El correo o contraseña son invalidos') </script>";
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
            <p class="login-text">Login con correo electronico</p>
            <div class="input-group">
                <input type="email" placeholder="Correo electrónico" name="email" value="<?php echo $email; ?>"  required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Ingresar</button>
            </div>
            <p class="login-register-text">¿No tienes cuenta? <a href="register.php">Registrate aquí</a>.</p>
        </form>
    </div>
</body>
</html>