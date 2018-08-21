<?php

include '../config/database.php';


if(isset($_POST['aksi'])&&$_POST['aksi']==="tambah"){
    $query = "INSERT INTO  `penempatan_barang` (`nama_tempat`,`alamat_tempat`,no_telpon)VALUES('$_POST[nama_tempat]','$_POST[alamat]','$_POST[no_telpon]')";
    $result = $conn->query($query);

    if ($result === TRUE) {
        echo "
<script>alert ('Penyimpanan Berhasil');document.location='/pulaumas/production?page=distributor_data';</script>
";
    } else {
        echo "Error: " . $result . "<br>" . $conn->error;
    }
    
}



?>