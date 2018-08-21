<?php

require_once('../config/database.php');
include_once "../inc/function.php";

$query_grand_total=$conn->query("SELECT SUM(total)as grand_total, SUM(jumlah) as jumlah from penjualan where id_transaksi='$_GET[id]' GROUP BY id_transaksi");
$obj_grand_total=$query_grand_total->fetch_object();
$grand_total=number_format($obj_grand_total->grand_total,0,',',',');
$terbilang=ucwords(terbilang($obj_grand_total->grand_total));

$query_transaksi=$conn->query("SELECT transaksi.no_faktur, transaksi.tanggal_transaksi, pelanggan.alamat, pelanggan.nama_pelanggan, pelanggan.no_telpon from transaksi JOIN pelanggan ON pelanggan.id_pelanggan =transaksi.id_pelanggan where transaksi.id_transaksi='$_GET[id]'");
$data_transaksi=$query_transaksi->fetch_object();
$tanggal=konfersi_waktu($data_transaksi-> tanggal_transaksi);

$data_table="";
$no=0;
$query_penjualan=$conn->query("SELECT barang.nama_barang,barang.tipe, penempatan_barang.nama_tempat, penjualan.jumlah, penjualan. harga, penjualan.total from penjualan JOIN barang ON barang.id_barang=penjualan.id_barang JOIN penempatan_barang ON penempatan_barang.id_tempat=penjualan.id_tempat where penjualan.id_transaksi= '$_GET[id]'");
// Set some content to print
while($obj=$query_penjualan->fetch_object()){
    $harga=number_format($obj->harga,0,',',',');
    $total=number_format($obj->total,0,',',',');
    $no++;
    $data_table.="<tr>
    <td >$no</td>
    <td >$obj->nama_barang</td>
    <td >$obj->nama_tempat</td>
    <td >$obj->jumlah $obj->tipe </td>
    <td class='cek'></td>
    <td  >$harga</td>
    <td  >$total</td>
   </tr>";
}

$html="
    <html>
    <head>
    <style>
        body{
            font-family: courier;


            }
        .header{
            font-size: 8pt;
            
            
        }
        .header h3{
            font-weight:300;
        }
        .header-kanan{
           
            width: 30%;
            border: 1px solid;
            padding:0px;
            float:right;
            position:relative;
            top:-1000px;
        }
        .items td {
            
        }
        table thead td { 
            text-align: left;
            border-top: 0.1mm solid #000000;
            border-bottom: 0.1mm solid #000000;
         
        }
        table tbody td { 
            text-align: left;
            font-size: 8pt;
            border-bottom: 0.1mm solid #000000;
            padding:0 5px;
         
        }
        .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #000000;
            background-color: #FFFFFF;
            border: 0mm none #000000;
            border-top: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }
        .items td.totals {
            text-align: right;
            padding:4px;
           
        }
        .items td.cost {
            text-align: "." center;
        }
        .items td.cek {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }
        .items td.terbilang {
            border-top: 0.1mm solid #000000;
            border-bottom: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
            padding:4px;
           
        }
        
    </style>
    </head>
    

    <table width='100%'  cellpadding='10'><tr>
    <td width='50%' style=' '>
    <span style='font-size: 9pt; '>Pulau Mas Indah:</span><br /><br />
    <span class='header'>Jln. Yos Sudarso No.298, Telpn:321362,Fax: 3222816 Lubuklinggau </span><br/><br/>
    <span class='header'>Kpd Yth:  $data_transaksi->nama_pelanggan</span><br />
    <span class='header'>Telpon: $data_transaksi->no_telpon   Alamat: $data_transaksi->alamat</td>
    <td width='10%'>&nbsp;</td>
    <td width='35%' style=''><span class='header'>No Faktur : $data_transaksi->no_faktur </span><br/><br/>
   
    <span class='header'>Tanggal: $tanggal</td>
    </tr></table>

    <table class='items' width='100%' style='font-size: 9pt; border-collapse: collapse; ' cellpadding='8'>
    <thead>
    <tr>
    <td width='5%'> No.</td>
    <td width='35%'>Nama Barang</td>
    <td width='15%'>kluar dari</td>
    <td width='9%'>Qty</td>
    <td width='3%'>&nbsp;</td>
    <td width='15%'>Harga Satuan</td>
    <td width='15%'>Total</td>
    </tr>
    </thead>
    <tbody>
    <!-- ITEMS HERE -->
    $data_table
    <tr>
    <td class='blanktotal' colspan='5' >Total : $obj_grand_total->jumlah Item Barang</td>
    <td >Grand Total:</td>
    <td class='totals cost'>Rp.$grand_total</td>
    </tr>
    <tr>
    <td class='terbilang' colspan='5' >$terbilang Rupiah</td>
    
    </tr>
   
    </tbody>
    </table>

  
"
;
$foot="
<table width='100%'  cellpadding='10'><tr>
<td width='33%' style=' '>
<span style='font-size: 8pt;    text-align: center;'>   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; Tanda Terima</span><br /><br />
<span class='header'></span><br/><br/>
<span class='header'>(.............................)</span><br />

<td width='33%' style=' '>
<span style='font-size: 8pt;    text-align: center;'> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;  Dipriksa Oleh</span><br /><br />
<span class='header'></span><br/><br/>
<span class='header'>(.............................)</span><br />

<td width='33%' style=' '>
<span style='font-size: 8pt;    text-align: center;'>   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp;  Hormat kami</span><br /><br />
<span class='header'></span><br/><br/>
<span class='header'>(.............................)</span><br />
</tr></table>
";



require_once  '../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8', 
    'format' => [135, 215], 
    'orientation' => 'L'
    ]
);
$mpdf->WriteHTML($html);
$mpdf->SetHTMLFooter($foot);
$mpdf->Output();