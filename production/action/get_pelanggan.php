<?php

include '../config/database.php';

$query_select=$conn->query("SELECT id_pelanggan,nama_pelanggan FROM pelanggan");

$data=[];

while($obj=$query_select->fetch_object()){
    $data[$obj->id_pelanggan]=$obj->nama_pelanggan;
}

echo json_encode($data);
