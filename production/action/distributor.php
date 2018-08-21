<?php

include '../config/database.php';


if(isset($_POST['aksi'])&&$_POST['aksi']==="tambah"){
    $query = "INSERT INTO  `distributor` (`kd_distributor`,`nama_distributor`,`alamat`,no_telpon,keterangan)VALUES('$_POST[kd_distributor]','$_POST[nama_distributor]','$_POST[alamat]','$_POST[no_telpon]','$_POST[keterangan]')";
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