<?php
     session_start();

        if (!isset($_SESSION["Login"])) {
            header("Location: ./index.php");
            exit;
        }

    require 'functiondb.php';
    $i = 1;
    //koneksi database
    // mysqli_connect("localhost", "root", "", "mydatabase");

    // $conn = mysqli_connect("localhost", "root", "", "mydatabase");

    //ambil data dari table mahasiswa
    //mysqli_fetch_row();       //array numerik
    //mysqli_fetch_assoc();     //array associative
    //mysqli_fetch_array();     //array numerik & associative
    //mysqli_fetch_object();    //object
    
    // $result = mysqli_query($conn, "SELECT * FROM mahasiswa;");
    // $result2 = mysqli_query($conn, "SELECT * FROM mahasiswa JOIN jurusan");
        $result3= query("SELECT *  FROM `mahasiswa` JOIN `jurusan` ON `mahasiswa`.`jurusan_detail` = `jurusan`.`id_jurusan`
                            JOIN `fakultas` ON `jurusan`.`fakultas_detail` = `fakultas`.`id_fakultas`;");
        // var_dump($result3);
    
    // $test = query("SELECT * FROM mahasiswa;");
    // var_dump($test);

    // var_dump(mysqli_fetch_assoc($result2));
    // while ($mhs = mysqli_fetch_assoc($result)){
    //     // var_dump($mhs);
    //     // echo $mhs["gambar"];
    // }

    // var_dump($mhs->gambar);
    // echo $result;

        // if(!$result || $result2){
            // echo mysqli_error($conn);
        // }
    if (isset($_POST["cari"])) {
        $result3 = findmahasiswa($_POST["keyword"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="./css/style1.css">
</head>
<body>
    <h1 style="text-align: center;">Daftar Mahasiswa</h1>

   <br>
    <form action="" method="POST" style="text-align:center;">
            <input type="text" name="keyword" placeholder="Cari mahasiswa disini..." size="40" autofocus autocomplete="off">
            <button type="submit" name="cari">Cari!</button>
    </form>
    <br>
 
    <table border="2" cellpadding = "10" cellspacing ="0" align="center">
        <tr>
            <th> No.</th>
            <th>Action</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>E-Mail</th>
            <th>Jurusan</th>
            <th>Fakultas</th>
        </tr>
        <!-- <img src="./assets/gambar1.jpg"></img> -->
        <?php //while($mahasiswa = mysqli_fetch_assoc($result3)):
                foreach ($result3 as $mahasiswa):
                    // var_dump($mahasiswa);
            ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td>
                <a href="./editdata.php?idedit=<?=$mahasiswa["id_mahasiswa"]?>">Ubah</a>|
                <a href="./hapusdata.php?idhapus=<?=$mahasiswa["id_mahasiswa"]?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
            </td>
            <td><img src="<?=$mahasiswa["gambar"];?>" height="50" width= "50" ></img></td>
            <td><?=$mahasiswa["nim"]  ?></td>
            <td><?=$mahasiswa["nama"]  ?></td>
            <td><?=$mahasiswa["email"]  ?></td>
            <td><?=$mahasiswa["name"]  ?></td>
            <td><?=$mahasiswa["name_fakultas"] ?></td>
        </tr>
                <?php endforeach; ?>
        
    </table>
    <input type="button" value="Tambah Mahasiswa" onclick="location.href = './formdaftar.php';"></input>
</body>
</html>