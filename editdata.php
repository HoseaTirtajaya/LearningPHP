<?php
     session_start();

        if (!isset($_SESSION["Login"])) {
            header("Location: ./index.php");
            exit;
        }

    require 'functiondb.php';
    $editid = $_GET["idedit"];

    $mhs = query("SELECT * FROM mahasiswa WHERE id_mahasiswa = $editid")[0];
    // var_dump($mhs["nim"]);
    // $target_dir = "./assets/";
    // $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    // $uploadOk = 1;
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    // $connect = mysqli_connect("localhost", "root", "", "mydatabase");
    // $target_dir = "./assets/";
    // $target_file = $target_dir.basename($_FILES["gambar"]);


    if (isset($_POST["submit"])) {
        if (editdata($_POST) > 0) {
            echo "<script>
                    alert('Data Berhasil Diubah');
                    document.location.href = './daftarmhs_adm.php'
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal Diubah');
                    document.location.href = './daftarmhs_adm.php'
                </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>
    <link rel="stylesheet" href="./css/style1.css">
</head>
<body>

    <font style="font-size: 18px; font-style:italic;">
    <form action="" method="post" enctype="multipart/form-data"> 
        <ul>
             <input type="hidden" name="id_mahasiswa" value = "<?=$mhs["id_mahasiswa"] ?> ">
             <input type="hidden" name="gambarLama" value = "<?=$mhs["gambar"] ?> ">
            <li>
                <label for="nim">NIM:</label><input type="text" name="nim" id="nim" required value="<?= $mhs["nim"] ?>" >
            </li><br>
            <li><label for="nama">Nama: </label><input type="text" name="nama" id="nama" required value="<?= $mhs["nama"] ?>"><br></li><br>
            <li><label for="email">E-Mail: </label><input type="text" name="email" id="email" required value="<?= $mhs["email"] ?> "><br></li><br>
            <li><label for="jurusan">Jurusan: 
                       <li>
                            <select name="jurusan">
                                <option value="ti">Teknik Informatika</option>
                                <option value="si" name="si">Sistem Informasi</option>
                                <option value="sipil" name="sipil">Teknik Sipil</option>
                             </select>
                        </li>
                        <br><br>
            <li>
            <label for="gambar">Gambar: </label><br>
            <img src="<?= $mhs['gambar'] ?>" width = 300px height=300px></img><br>
            <input type="file" name="gambar" id="gambar">
            </li>
            <br>
            <li>
            <button type="submit" name="submit">Edit data!</button>
            </li><br>
            <br>
        </ul>
    </form>
   <input type="button" onclick="location.href = './daftarmhs.php';" value = "<==Back to Daftar Mahasiswa" class = "movingpagebutton">
    </font>
</body>
</html>