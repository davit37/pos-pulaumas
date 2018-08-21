<?php 

include "../config/database.php";

if(isset($_POST['aksi'])&& $_POST['aksi']=="tambah"){
    $harga_modal=implode(explode(',', $_POST['harga_modal']));
    $harga_jual_1=implode(explode(',', $_POST['harga_jual_1']));
    $harga_jual_2=implode(explode(',', $_POST['harga_jual_2']));
    $query_insert="UPDATE barang set  nama_barang='$_POST[nama_barang]', id_produk='$_POST[id_produk]', id_distributor='$_POST[id_distributor]',tipe='$_POST[tipe]' where id_barang='$_POST[id]'";
    
    $result=$conn->query($query_insert);

    if($result==true){

        $query_cek=$conn->query("SELECT id_barang from harga where id_barang='$_POST[id]'");
        if($query_cek->num_rows==0){
            $query_insert="INSERT INTO harga (id_barang,harga_modal, harga_jual_1, harga_jual_2, tanggal_pemakaian_awal) VALUES ('$_POST[id]','$harga_modal','$harga_jual_1','$harga_jual_2',NOW()) ";

            $result=$conn->query($query_insert);
        }else{
            $query_insert="UPDATE harga set  tanggal_pemakaian_ahir=NOW() where id_barang='$_POST[id]' and tanggal_pemakaian_awal=(select*from(select max(tanggal_pemakaian_awal) from harga where id_barang='$_POST[id]')as ha)";
                
                    $result=$conn->query($query_insert);
            
            if($result==true){
        
                    
                    $query_insert="INSERT INTO harga (id_barang,harga_modal, harga_jual_1, harga_jual_2, tanggal_pemakaian_awal) VALUES ('$_POST[id]','$harga_modal','$harga_jual_1','$harga_jual_2',NOW()) ";

                    $result=$conn->query($query_insert);
            }
        }
    
        if($result==true){
            header("Location:../?page=barang_data");
        }
    
    }

}



?>