     <?php
     session_start();

        if (!isset($_SESSION["Login"])) {
            header("Location: ./index.php");
            exit;
        }
        
     ?>
     
     <!-- var_dump("HAHAHAHAHAHA") ; For debugging purposes -->
     <!DOCTYPE html>
     <html lang="en">
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <title>MySite</title>
         <link rel="stylesheet" href="./css/style1.css">
     </head>

     <body>
        <a href="./logout.php" style="display: flex; flex-direction= row;">Logout</a>
            <?php
                $angka3 = [ [1, 4, 3]
                            ,[2, 5, 6, 7]
                        ];

                // echo $angka3[1][3];
                
                foreach ($angka3 as $number):
            ?>
                    <?php foreach ($number as $n): ?>
                        <div class="square1"><?= $n; ?></div>
                    <?php endforeach; ?>
                    <div class="clear"><?= "Array ke-: ".$number[0]; ?></div>
                <?php endforeach; ?>

                                    <!-- Ini adalah Sintaks PHP Web Programming UNPAS -->
            <!--$angka1 = 204;
            $angka2 =2321;
            $str1 = "Halo world";
            $str2 = "Kampret";
            // var_dump($var1));

            echo $str1." ".$str2."<br><br>"; // (.)Operator Penggabung string
           
            
            echo $angka1 /= $angka2;
            echo "<br><br>";
            echo $angka1 .= $angka2;
            -->
                    <!-- Struktur Kendali(Pengulangan, Pengondisian)-->

                <!-- for($i = 0; $i <=5; $i++){
                //     echo $i." ".'<h3 style= "color:#FF0000";>Why Does This happen??</h3><br>';
                //     echo '<span style="color:#AFA;text-align:center;">$i. Please wait for my reply!</span><br>';
                // }-->

                <!--<table border="1" cellpadding = "10" cellspacing = "0">  
                        for($i = 0; $i < 3; $i++){
                            echo "<tr>";
                            for($j = 0;$j <5; $j++){
                                echo "<td>$i, $j</td>";
                            }
                            echo "</tr>";
                        }
                </table> -->
        <table border="1" cellpadding = "10" cellspacing = "0" class="table">
                <?php  for ($i = 0; $i <3; $i++) : ?>
                    <?php if ($i % 2 == 1): ?>
                        <tr class= "warna-baris-ganjil">
                    <?php else: ?>
                        <tr>
                    <?php endif; ?>
                    <?php for ($j = 0; $j <5; $j++) :  ?>
                        <?php if ($j % 2 == 0): ?>
                            <td class = "warna-kolom-genap"><?= "$i, $j"; ?></td>
                        <?php else: ?>
                            <td><?= "$i, $j"; ?></td>
                        <?php endif; ?>
                    <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
                                         <!--      ARRAY DAN ASSOCIATIVE ARRAY(Looping and such)         -->
                <?php
                        
                    // $days = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
                    //$days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu", 1, 2, 3, 4, 'F', 'U'];
                    
                    // var_dump($days);
                    // print_r($days);
                    // echo $days[3]." ".$days[4]." ".$days[5];
                    // $days[] = "Kontorru";
                    // var_dump($days);
                    //$days[] = "Kambing";
                    //for($i = 0; $i < count($days); $i++):
                    
                    //foreach($days as $day)
                    ?>
                    
                    <!-- <div> </div> -->    
                    <!-- <div>< $days[$i]  </div> -->
                    <!--   endfor  -->
                    
                <input type="button" onclick="location.href = './functionnn.php';" value = "Function Page" class = "movingpagebutton">
                
     </body>
     </html>