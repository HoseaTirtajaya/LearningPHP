<?php
     session_start();

        if (!isset($_SESSION["Login"])) {
            header("Location: ./index.php");
            exit;
        }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank you for registering..</title>
</head>
<body>
    <h1>Thank you for registering on this website, <?php echo $_POST["nama"]; ?>!!!</h1>
</body>
</html>