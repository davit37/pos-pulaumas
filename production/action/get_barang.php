<?php

include '../config/database.php';

$query_select=$conn->query("SELECT barang.id_barang,barang.nama_barang, harga.harga_jual_1 FROM barang JOIN(SELECT harga.*,topdate.maxdate FROM harga INNER JOIN(select id_barang,Max(tanggal_pemakaian_awal) as maxdate from harga  group by id_barang) as topdate On topdate.id_barang=harga.id_barang AND harga.tanggal_pemakaian_awal=topdate.maxdate)as harga on harga.id_barang=barang.id_barang");

$data['id']=[];
$data['data']['nama_barang']=[];
$data['data']['harga_barang']=[];

while($obj=$query_select->fetch_object()){
    array_push($data['id'], $obj->id_barang);
    array_push($data['data']['nama_barang'], $obj->nama_barang);
    array_push($data['data']['harga_barang'],$obj->harga_jual_1);

}

echo json_encode($data);
