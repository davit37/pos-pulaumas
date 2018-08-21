<?php

function konfersi_waktu($tanggal_jam){
    $array_tanggal_jam=explode(" ",$tanggal_jam);
    $tanggal=explode("-",$array_tanggal_jam[0]);
    $bulan='';
    switch($tanggal[1]){
        case 1:
        $bulan="Januari";
        break;
        case 2:
        $bulan="Februari";
        break;
        case 3:
        $bulan="Maret";
        break;
        case 4:
        $bulan="April";
        break;
        case 5:
        $bulan="Mei";
        break;
        case 6:
        $bulan="Juni";
        break;
        case 7:
        $bulan="Juli";
        break;
        case 8:
        $bulan="Agustus";
        break;
        case 9:
        $bulan="September";
        break;
        case 10:
        $bulan="Oktober";
        break;
        case 11:
        $bulan="November";
        break;
        case 12:
        $bulan="Desember";
        break;
    }

    return "$tanggal[2] $bulan $tanggal[0]  $array_tanggal_jam[1] ";
}

function formatRupiah($nilai){

}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return $hasil;
}
?>