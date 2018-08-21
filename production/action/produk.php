<?php

include '../config/database.php';


if(isset($_POST['aksi'])&&$_POST['aksi']==="tambah"){
    $query = "INSERT INTO  `produk` (`nama_produk`)VALUES('$_POST[nama_produk]')";
    $result = $conn->query($query);

    if ($result === TRUE) {
        echo "
<script>document.location='../?page=produk_add';</script>
";
    } else {
        echo "Error: " . $result . "<br>" . $conn->error;
    }
    
}



?>