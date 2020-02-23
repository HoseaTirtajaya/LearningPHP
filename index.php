<?php
    require 'functiondb.php';
    session_start();

    //cek cookie
    if (isset($_COOKIE['logid']) && isset($_COOKIE['key'])) {
        $id = $_COOKIE['logid'];
        $key = $_COOKIE['key'];

        //ambil username dari id
        $result = mysqli_query($conn, "SELECT username FROM user WHERE id_user = $id;");
        $row = mysqli_fetch_assoc($result);

        //cek cookie dan username
        if ($key === hash('sha256', $row['username'])) {
            $_SESSION['Login'] = true;
        }
    }

    if (isset($_SESSION["Login"])) {
        header("Location: ./loggedin.php");
        exit;
    }

    if (isset($_POST["Login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        //cek username

        if (mysqli_num_rows($result) === 1) {
            //cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                //set session
                $_SESSION["Login"] = true;

                //cek remember me
                if (isset($_POST["remember"])) {
                    //buat cookie
                    setcookie('logid', $row['id_user'], time()+300);
                    setcookie('key', hash('sha256', $row['username']), time()+300);
                }
                header("Location: ./loggedin.php");
                exit;
            }
        }
        $error = true;
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
    <form action="" method="post" style="list-style-type:none;">
        <li><label for="username">Username:<input type="text" name="username" id="username" autocomplete="off"></li></label> 
        <br>
        <li><label for="username">Password:<input type="password" name="password" id="password"></li></label>
        <li>
            <label for="remember"><input type="checkbox" name="remember" id="remember">Remember Me</label>
        </li>
        <br>
        <li style="overflow:hidden;"><input type="submit" name="Login" value="Login"></li>
        <br>
        <p>Don't have an account? </p><a href="./registrasi.php">Register Now!</a>
    </form>
    </ul>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="./assets/js/main.js"></script>

</body>
</html>