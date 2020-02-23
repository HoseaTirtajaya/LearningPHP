<?php
    require 'functiondb.php';
    // $target_dir = "./assets/";
    // $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    // $uploadOk = 1;
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    // $connect = mysqli_connect("localhost", "root", "", "mydatabase");
    // $target_dir = "./assets/";
    // $target_file = $target_dir.basename($_FILES["gambar"]);


    if (isset($_POST["submit"])) {
        // var_dump($_FILES);
        // die;
        // $nim = $_POST["nim"];
        // $nama = $_POST["nama"];
        // $email = $_POST["email"];
        //     if($_POST["jurusan"] == "ti"){
        //         $jurusan = 1;
        //     }
        //     else if($_POST["jurusanpilihan"] == "si"){
        //         $jurusan = 2;
        //     }
        //     else{
        //         $jurusan = 5;
        //     }
        // var_dump($nim);
        // var_dump($nama);
        // var_dump($email);
        // $insertinto = "INSERT INTO mahasiswa(nim, nama, email, gambar, jurusan_detail) VALUES ( '$nim', '$nama', '$email', '    ', $jurusan);";
        // $insertdata = mysqli_query($connect, $insertinto);
        // var_dump($insertdata);
        // var_dump($insertinto);

        // var_dump(mysqli_affected_rows($connect));
        if (tambah($_POST) > 0) {
            echo "<script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = './daftarmhs_adm.php'
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal ditambahkan');
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
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="./css/style1.css">
</head>
<body>

    <font style="font-size: 18px; font-style:italic;">
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nim">NIM:</label><input type="text" name="nim" id="nim" required>
            </li><br>
            <li><label for="nama">Nama: </label><input type="text" name="nama" id="nama" required><br></li><br>
            <li><label for="email">E-Mail: </label><input type="text" name="email" id="email" required><br></li><br>
            <li><input type="file" name="gambar" id="gambar"></li>
            <li><label for="jurusan">Jurusan: 
                       <li>
                            <select name="jurusan">
                                <option value="ti"  >Teknik Informatika</option>
                                <option value="si" name="si">Sistem Informasi</option>
                                <option value="sipil" name="sipil">Teknik Sipil</option>
                             </select>
                        </li>
            <li><button type="submit" name="submit">Submit!</button></li><br>
        </ul>
    </form>
   <input type="button" onclick="location.href = './daftarmhs.php';" value = "<==Back to Daftar Mahasiswa" class = "movingpagebutton">
    </font>
</body>
</html>