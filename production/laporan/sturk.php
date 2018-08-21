<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../tcpdf/tcpdf.php');
require_once('../config/database.php');

include_once "../inc/function.php";
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->AddPage('L', array(135,215));
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 002');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}
// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page


// set text shadow effect

$query_grand_total=$conn->query("SELECT SUM(total)as grand_total, SUM(jumlah) as jumlah from penjualan where id_transaksi='$_GET[id]' GROUP BY id_transaksi");
$obj_grand_total=$query_grand_total->fetch_object();
$grand_total=number_format($obj_grand_total->grand_total,0,',',',');
$terbilang=ucwords(terbilang($obj_grand_total->grand_total));

$query_transaksi=$conn->query("SELECT transaksi.no_faktur, transaksi.tanggal_transaksi, pelanggan.alamat, pelanggan.nama_pelanggan, pelanggan.no_telpon from transaksi JOIN pelanggan ON pelanggan.id_pelanggan =transaksi.id_pelanggan where transaksi.id_transaksi='$_GET[id]'");
$data_transaksi=$query_transaksi->fetch_object();

$data_table="";
$no=0;
$query_penjualan=$conn->query("SELECT barang.nama_barang,barang.tipe, penempatan_barang.nama_tempat, penjualan.jumlah, penjualan. harga, penjualan.total from penjualan JOIN barang ON barang.id_barang=penjualan.id_barang JOIN penempatan_barang ON penempatan_barang.id_tempat=penjualan.id_tempat where penjualan.id_transaksi= '$_GET[id]'");
// Set some content to print
while($obj=$query_penjualan->fetch_object()){
    $harga=number_format($obj->harga,0,',',',');
    $total=number_format($obj->total,0,',',',');
    $no++;
    $data_table.="<tr>
    <td width='31'>$no</td>
    <td width='150'  >$obj->nama_barang</td>
    <td width='120' >$obj->nama_tempat</td>
    <td width='80'>$obj->jumlah $obj->tipe </td>
    <td width='80' ></td>
    <td width='140' >$harga</td>
    <td width='120' >$total</td>
   </tr>";
}
$html = <<<EOF
<style>
    h3{
        font-family: times;
        font-size: 11pt;
        font-weight:600;
    }
    p{
        font-family: courier;
        font-size: 9pt;
        font-weight:100;
        margin-bottom:0px;
    }
    .first{
        font-family: courier;
        font-size: 10pt;
        font-weight:100;
       
      
       border-top: 0.5px solid #000;
       border-bottom: 0.5px solid #000;
       text-align:left;
    }
    td{
        font-family: courier;
        font-size: 9pt;
       
       
        border-top: 0 solid #000;
        text-align:left;
        

    }
    .besar{
        font-size: 10pt;
    }
    h4{
        font-family: courier;
        font-size: 12pt;
        font-weight:100;
        margin-bottom:0px;
        width:100px;
      
       
       
       text-align:left;
    }
    
</style>
<h3>Pulau Mas Indah</h3>
<p>Jln. Yos Sudarso No.298, Telp:321362, Fax:322816 <br>Lubuklinggau</p>

    <p>Kepada Yth : $data_transaksi->nama_pelanggan</p>
    <p>Telpon: $data_transaksi->no_telpon  Alamat:$data_transaksi->alamat</p>
    <table class="first" cellpadding="4" cellspacing="6">
    <tr>
     <th width="31" ><b>No.</b></th>
     <th width="155" ><b>Nama Barang</b></th>
     <th width="120" ><b>Keluar Dari</b></th>
     <th width="55" ><b>Qty</b></th>
     <th width="30" ><b></b></th>
     <th width="140" ><b>Harga Satuan</b></th>
     <th width="120" ><b>Total</b></th>
    </tr>
    $data_table
    
    

    </table>


    
    <table class="first" cellpadding="4" cellspacing="6">
    <tr>
     <th width="415" class="besar" ><b>Total : $obj_grand_total->jumlah Item Barang </b></th>
     
     <th width="265" class="besar"><b>Grand Total : Rp.$grand_total </b></th>
    
    </tr>
    <tr>
   
    
    
   
   </tr>
   
    

    </table>
    <br/>
    <h4>$terbilang Rupiah</h4>

    <div class='tanda-terima'>
    Tanda Terima
    </div>



EOF;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('penjualan_'.$data_transaksi->no_faktur.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
