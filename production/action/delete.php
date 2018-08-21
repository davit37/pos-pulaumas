<?php

include_once "../config/database.php";


$id = $_GET['id'];
if($_GET['triger']==='delBarang'){
    $sql = "delete from barang where id_barang='$id'";
    $result = $conn->query($sql);

        if ($result === TRUE) {
            header("Location:../?page=barang_data");
        } else {
            echo "Error: " . $result . "<br>" . $conn->error;
        }


        

}else if($_GET['triger']==='delKreteria'){
    $sql = "delete kreteria, sub_kreteria from kreteria LEFT JOIN sub_kreteria ON kreteria.id_kreteria=sub_kreteria.id_kreteria where kreteria.id_kreteria='$id'";
    $result = $conn->query($sql);

        if ($result === TRUE) {
            header("Location:/dores/production?page=kreteria_data");
        } else {
            echo "Error: " . $result . "<br>" . $conn->error;
        }


        

}else if($_GET['triger']==='delSub'){
    $sql = "delete  from sub_kreteria  where id_subkreteria='$id'";
    $result = $conn->query($sql);

        if ($result === TRUE) {
            header("Location:/dores/production?page=subkreteria_data");
        } else {
            echo "Error: " . $result . "<br>" . $conn->error;
        }


        

}else if($_GET['triger']==='delAdmin'){
    $sql = "delete  from admin  where id_admin='$id'";
    $result = $conn->query($sql);

        if ($result === TRUE) {
            header("Location:/dores/production?page=admin_data");
        } else {
            echo "Error: " . $result . "<br>" . $conn->error;
        }


        

}
?>