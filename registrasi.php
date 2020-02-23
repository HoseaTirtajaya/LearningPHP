<?php
     session_start();
        if (!isset($_SESSION["Login"])) {
            header("Location: ./index.php");
            exit;
        }

require 'functiondb.php';

    if (isset($_POST["register"])) {
        if (Register($_POST) > 0) {
            echo "<script>
                    alert('User baru berhasil ditambahkan!');
                </script>";
        } else {
            echo mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <form action="" method="post" style="list-style-type:none;">
        <li>
            <label for="username"> Username: </label>
            <input type="text" name="username" id="username" autocomplete="off">
        </li>
        <br>
        <li>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" autocomplete="off">
        </li>
        <br>
        <li>
            <label for="password2">Konfirmasi Password</label>
            <input type="password" name="password2" id="password2" autocomplete="off">
        </li>
        <br>
        <li>
            <button type="submit" name="register">Register!</button>
        </li>
    </form>
</body>
</html>