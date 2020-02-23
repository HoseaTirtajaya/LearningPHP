<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Function Site</title>
    <link rel="stylesheet" href="./css/style1.css">
</head>
<body>
    <input type="button" onclick="location.href = './index.php';" value = "back to index.php" class ="movingpagebutton">
    <input type="button" onclick="location.href = './daftarmhs.php';" value = "Go To Daftar Mahasiswa" class ="movingpagebutton"> 
    <br><br>

    <?php
        date_default_timezone_set('Asia/Jakarta');
        //echo date("l, d-M-Y", time() - 60*60*24*365*19);
        //echo "  ".time()."<br><br>";

        // echo date("l, d-M-Y", mktime(0,0,0,4,17,2000));
        //  echo date("l, d-M-Y", strtotime("17 Apr 2000"));
        
        /*function welcome($time, $nama){
            return "Selamat $time, $nama!";
        }*/
        
        function greeting()
        {
            $timeOfDay = date('G');
            // var_dump($timeOfDay);
            if ($timeOfDay <= 11) {
                return 'Good morning User!';
            } elseif ($timeOfDay == 12) {
                return "It's Noon user! 12 o'clock!";
            } elseif ($timeOfDay <= 19) {
                return "Good Afternoon User!";
            } elseif ($timeOfDay <=23) {
                return "Good Night!";
            }
        }
        
        echo "<h3>".greeting()." <br><br>Date and Time: ".date("l, g:i a")."</h3>";

        //echo "<h1>".welcome("Malam", "John")."</h1>";

        /*-------------------------------------------------GET&POST-------------------------------*/

        // $x = "Hosea";
        // $_GET["Nama"] = $x;
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

        function showmethod()
        {
            // echo $_GET["Nama"];
        }


        // echo showmethod();
        echo "<br><br>";
        // var_dump($_GET); 
        ?>
    
</body>
</html>