<?php 
    require 'functiondb.php';

    $id = $_GET["idhapus"];
    // var_dump($id);
    
    if(hapus($id) > 0){
        echo "<script>
                    alert('Data Berhasil Dihapus');
                    document.location.href = './daftarmhs_adm.php'
                </script>";
    }
    else{
        echo "<script>
                    alert('Data Gagal dihapus');
                    document.location.href = './daftarmhs_adm.php'
                </script>";

    }

?>