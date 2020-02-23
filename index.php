<?php
    if (isset($_POST["submit"])) {
        if ($_POST["username"] == "Evalkyrie" && $_POST["password"] == "PhPtesting123") {
            header("Location: ./loggedin.php");
            exit;
        } else {
            $error = true;
        }
    } else {
    }
    // var_dump($error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siakad</title>
    <link rel="stylesheet" type="text/css" href="./css/style2.css">
</head>
<body>
    <h1>LOGIN</h1>

    <?php if (isset($error)): ?>
        <p style= "color: red; font-weight: bold; font-size: 25px">Username/Password Salah</p>
    <?php endif; ?>

    <ul>
    <form action="" method="post">
        <li><label for="username">Username:<input type="text" name="username" id="username"></li></label> 
        <br>
        <li><label for="username">Password:<input type="password" name="password" id="password"></li></label>
        <br>
        <li style="overflow:hidden;"><input type="submit" name="submit" value="Login"></li>
        <br>
        <p>Don't have an account? </p><a href="./registrasi.php">Register Now!</a>
    </form>
    </ul>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="./assets/js/main.js"></script>

</body>
</html>