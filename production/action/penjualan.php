<?php

require "../config/database.php";

$query_transaksi=$conn->query("INSERT INTO transaksi (no_faktur,id_pelanggan,tanggal_transaksi) values('$_POST[nomor_faktur]','$_POST[id_pelanggan]',NOW())");

if($query_transaksi){
    $id_transaksi=$conn->insert_id;
    $index=0;
    $query_penjualan='';
    
    while($index < count($_POST['id_barang'])){
        $id_barang=$_POST['id_barang'][$index];
        $id_tempat=$_POST['id_tempat'][$index];
        $jumlah=$_POST['jumlah'][$index];
        $harga=$_POST['harga'][$index];
        $total=$_POST['total'][$index];
       
        $query_penjualan.="INSERT penjualan(id_transaksi,id_barang,id_tempat,jumlah,harga,total) values ('$id_transaksi','$id_barang','$id_tempat','$jumlah','$harga','$total'); ";
        $get_stok=$conn->query("SELECT stok from detail_stok where id_barang=$id_barang and id_tempat='$id_tempat'");
        $obj=$get_stok->fetch_object();
        $stok_ahir=$obj->stok - $jumlah;

        $query_update=$conn->query("UPDATE detail_stok SET stok='$stok_ahir' where id_barang=$id_barang and id_tempat=$id_tempat  ");
       
        $index++;
        
    }
    $result = $conn->multi_query($query_penjualan);

    if($result){
        
      
            echo $id_transaksi;
        
        
    }
   
}
