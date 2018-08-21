<?php 

include "../config/database.php";

if(isset($_POST['aksi'])&& $_POST['aksi']=="tambah"){
    $harga_modal=implode(explode(',', $_POST['harga_modal']));
    $harga_jual_1=implode(explode(',', $_POST['harga_jual_1']));
    $harga_jual_2=implode(explode(',', $_POST['harga_jual_2']));
    $query_insert="INSERT INTO barang (kd_barang, nama_barang, id_produk, id_distributor, tipe) VALUES ('$_POST[kd_barang]','$_POST[nama_barang]','$_POST[id_produk]','$_POST[id_distributor]','$_POST[tipe]') ";

    $result=$conn->query($query_insert);
    $id=$conn->insert_id;

    if($result==true){
        $query_insert="INSERT INTO harga (id_barang,harga_modal, harga_jual_1, harga_jual_2, tanggal_pemakaian_awal) VALUES ('$id','$harga_modal','$harga_jual_1','$harga_jual_2',NOW()) ";

         $result=$conn->query($query_insert);
         if($result==true){
             header("Location:../?page=barang_data");
         }
    }

}



?>