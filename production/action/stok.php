<?php 

include "../config/database.php";

if(isset($_POST['aksi'])&& $_POST['aksi']=="tambah"){
    $query_cek=$conn->query("SELECT * FROM detail_stok where id_barang='$_POST[id_barang]' and id_tempat='$_POST[id_tempat]'");

    if($query_cek->num_rows==0){
        $query_insert_detail_stok=$conn->query("INSERT INTO detail_stok (id_barang,id_tempat,stok) VALUES ('$_POST[id_barang]','$_POST[id_tempat]','$_POST[stok_baru]')");

    }else if($query_cek->num_rows>0){
        $obj_=$query_cek->fetch_object();
        if($obj_->stok<0){
            $stok=$_POST['stok_baru'];
            $query_update_detail=$conn->query("UPDATE detail_stok SET stok='$stok' WHERE id_barang='$_POST[id_barang]' AND id_tempat='$_POST[id_tempat]'");
        }else{
            $stok=$obj_->stok+$_POST['stok_baru'];
            $query_update_detail=$conn->query("UPDATE detail_stok SET stok='$stok' WHERE id_barang='$_POST[id_barang]' AND id_tempat='$_POST[id_tempat]'");
        }
       

    }

    $query_insert="INSERT INTO stok_barang (id_barang, id_baru_distributor, stok_awal,stok_baru,tanggal,id_tempat) VALUES ('$_POST[id_barang]','$_POST[id_distributor]','$_POST[stok_awal]','$_POST[stok_baru]',NOW(),'$_POST[id_tempat]') ";

    $result=$conn->query($query_insert);

    if($result==true){
       
       
            header("Location:../?page=barang_data");
       
    }

}



?>