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

<input type="button" onclick="location.href = './functionnn.php';" value = "Function Page" class = "movingpagebutton">
<input type="button" onclick="location.href = './index.php';" value = "back to index.php" class = "movingpagebutton">
<h1 align = "Center">DAFTAR MAHASISWA</h1>
                                        <!-- ARRAY & ASSOCIATIVE ARRAY  -->
<ul>
    <font style="font-size: 18px">
        <?php
        $datadiri= [
            ["Nama" => "Hosea Tirtajaya",
             "NIM" => "20180801014",
             "Jurusan" =>"Teknik Informatika",
             "email" => "hoseatirtajaya@gmail.com",
             "nilai" => [75, 80, 65],
             "gambar" => "./assets/gambar1.jpg"
            ],
            ["Nama" => "Abdul",
             "NIM" => "20180803000",
             "Jurusan" =>"Sistem Informasi",
             "email" => "Abdul@gmail.com",
             "nilai" => [75, 80, 69],
             "gambar" => "./assets/gambar2.jpg"
            ]
        ];

        // var_dump($datadiri);
            // echo $datadiri[1]["nilai"][2];
            
            foreach ($datadiri as $biodata): ?>
            <li><img src = "<?= $biodata["gambar"] ?>" height = "300px" width = "300px" > </img></li>
            <li type = "Square">
            <a href = "./detailmhs.php?Nama=<?= $biodata["Nama"]?> & NIM=<?= $biodata["NIM"]?> & Jurusan= <?= $biodata["Jurusan"]?> & Email=<?=$biodata["email"] ?> & gambar=<?= $biodata["gambar"]?>" > Nama: <?= $biodata["Nama"]; ?></li></a>
            <li type = "Square">NIM: <?= $biodata["NIM"]; ?></li>
            <li type = "Square">Jurusan: <?= $biodata["Jurusan"]; ?></li>
            <li type = "Square">E-mail: <?= $biodata["email"]; ?></li>
                    
            </li>
            <br>
        </font>
         <?php endforeach; ?>
</ul>
<p style ="text-align: Justify"> Apakah anda ingin mendaftar? </p>
<input type="button" onclick="location.href = './formdaftar.php';" value = "Pendaftaraan" class = "movingpagebutton">
<input type="button" onclick="location.href = './daftarmhs_adm.php';" value = "Admin View" class = "admview">

</body>
</html>