<?php
     session_start();

        if (!isset($_SESSION["Login"])) {
            header("Location: ./index.php");
            exit;
        }

    if (!isset($_GET["Nama"]) || !isset($_GET["NIM"]) || !isset($_GET["Jurusan"]) || !isset($_GET["Email"])) {
        header("Location: ./daftarmhs.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <font style="font-size: 24px; font-weight: bold; ">
    <?php
        // var_dump($_GET);

    ?>
    <ul>
        <li><img src ="<?= $_GET["gambar"]?>" height = "150px" width = "150px"> </img></li>
        <li>Nama: <?= $_GET["Nama"]; ?></li>
        <li>NIM: <?= $_GET["NIM"]?></li>
        <li>Jurusan: <?=$_GET["Jurusan"];?></li>
        <li>Email: <?= $_GET["Email"];?></li>
    </ul>
    <br><br>
    <input type="button" onclick="location.href = './daftarmhs.php';" value = "<== Back to Daftar Mahasiswa" class = "movingpagebutton">

    </font>
</body>
</html>