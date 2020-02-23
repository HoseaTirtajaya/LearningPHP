<?php

     session_start();

        if (!isset($_SESSION["Login"])) {
            header("Location: ./index.php");
            exit;
        }

    $conn = mysqli_connect("localhost", "root", "", "mydatabase");

    function query($query)
    {
        global $conn;

        $result = mysqli_query($conn, $query);
        $rows = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data)
    {
        global $conn;

        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        //upload files
        $gambar = upload();
        $gambar2 = './assets/' . $gambar;
        if (!$gambar) {
            return false;
        }
        // end upload
        if ($data["jurusan"] == "ti") {
            $jurusan = 1;
        } elseif ($data["jurusan"] == "si") {
            $jurusan = 2;
        } else {
            $jurusan = 5;
        }

        
        $insertinto = "INSERT INTO mahasiswa(nim, nama, email, gambar, jurusan_detail) VALUES ( '$nim', '$nama', '$email', '$gambar2', $jurusan);";
        $insertdata = mysqli_query($conn, $insertinto);
            
        return mysqli_affected_rows($conn);
    }

    function upload()
    {
        $namaFile = $_FILES['gambar']['name'];
        $size = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpPath = $_FILES['gambar']['tmp_name'];

        //cek ada ato ga gambar
        if ($error === 4) {
            echo "<script>
                alert('Pilih gambar kembali!');
            </script>";
        }

        //gambar only uploaded
        $validImgExt = ['jpg', 'jpeg', 'png', 'gif'];
        $imgExt = explode('.', $namaFile);
        $imgFile = strtolower(end($imgExt));

        if (!in_array($imgFile, $validImgExt)) {
            echo "<script>
                alert('Bukan gambar yang anda upload!');
            </script>";
        }

        if ($size > 4000000) {
            echo "<script>
                alert('Ukuran Gambar terlalu besar!');
            </script>";
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $imgFile;
        var_dump($namaFileBaru);

        //upload steps
        move_uploaded_file($tmpPath, './assets/' . $namaFile);
        var_dump($namaFile);
        return $namaFile;
    }

    function hapus($datanim)
    {
        global $conn;

        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mahasiswa = $datanim;");
        return mysqli_affected_rows($conn);
    }

    function editdata($data)
    {
        global $conn;
        
        $id_mhs = $data["id_mahasiswa"];
        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $oldImg = htmlspecialchars($data["gambarLama"]);

        //cek ada gambar lama ato ga
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $oldImg;
        } else {
            $gambar = upload();
        }

        if ($data["jurusan"] == "ti") {
            $jurusan = 1;
        } elseif ($data["jurusan"] == "si") {
            $jurusan = 2;
        } else {
            $jurusan = 5;
        }

        $editdata = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', email = '$email', jurusan_detail = $jurusan WHERE id_mahasiswa = $id_mhs;";
        var_dump($editdata);
        $dataedited = mysqli_query($conn, $editdata);
            
        return mysqli_affected_rows($conn);
    }

    function findmahasiswa($keyword)
    {
        // var_dump($keyword);
        $querystatement = "SELECT *  FROM `mahasiswa` JOIN `jurusan` ON `mahasiswa`.`jurusan_detail` = `jurusan`.`id_jurusan`
                            JOIN `fakultas` ON `jurusan`.`fakultas_detail` = `fakultas`.`id_fakultas` WHERE nama LIKE '%$keyword%'
                            OR
                            nim LIKE '%$keyword%'
                            OR
                            email LIKE '%$keyword%';";
        // var_dump($querystatement);
        return query($querystatement);
    }

    function Register($data)
    {
        global $conn;

        $username = stripslashes(strtolower($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        
        //cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Username sudah terdaftar');
            </script>";
            return false;
        }
        
        //cek konfirmasi password
        if ($password != $password2) {
            echo "<script> alert('Password tidak sama!')</script>";
            return false;
        }

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        // var_dump($password);

        //tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO user(`username`, `password`) VALUES ('$username', '$password')");
        return mysqli_affected_rows($conn);
    }
