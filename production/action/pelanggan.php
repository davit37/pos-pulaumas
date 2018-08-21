<?php

include '../config/database.php';


if(isset($_POST['aksi'])&&$_POST['aksi']==="tambah"){
    $query = "INSERT INTO  `pelanggan` (`kd_pelanggan`,`nama_pelanggan`,`alamat`,no_telpon)VALUES('$_POST[kd_pelanggan]','$_POST[nama_pelanggan]','$_POST[alamat]','$_POST[no_telpon]')";
    $result = $conn->query($query);

    if ($result === TRUE) {
        echo "
<script>alert ('Penyimpanan Berhasil');document.location='../?page=pelanggan_data';</script>
";
    } else {
        echo "Error: " . $result . "<br>" . $conn->error;
    }
    
}



?>