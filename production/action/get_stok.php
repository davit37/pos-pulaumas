<?php
include '../config/database.php';
$query_cek=$conn->query("SELECT * FROM detail_stok where id_barang='$_POST[id_barang]' and id_tempat='$_POST[id_tempat]'");

if($query_cek->num_rows==0){
    echo "null";

}else if($query_cek->num_rows>0){
    $obj_=$query_cek->fetch_object();
    echo $obj_->stok;
    

}
