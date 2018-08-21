<?php 
if(isset($_GET['page'])){
	$page = $_GET['page'];
	switch($page){
		
			case 'user_add':
			include 'page/user_add.php';
			break;

			case 'distributor_add':
			include 'page/distributor_add.php';
			break;

			case 'distributor':
			include 'page/distributor_add.php';
			break;

			case 'distributor_data':
			include 'page/distributor_data.php';
			break;


			case 'barang':
			include 'page/barang.php';
			break;
			case 'barang_data':
			include 'page/barang_data.php';
			break;

			case 'pelanggan_add':
			include 'page/pelanggan_add.php';
			break;
			case 'pelanggan_data':
			include 'page/pelanggan_data.php';
			break;

			case 'produk_add':
			include 'page/produk_add.php';
			break;
			case 'stok':
			include 'page/stok.php';
			break;
			case 'detail_stok':
			include 'page/detail_stok.php';
			break;

			case 'penjualan':
			include 'page/penjualan.php';
			break;

			case 'detail_transaksi':
			include 'page/detail_transaksi.php';
			break;

			case 'retur':
			include 'page/retur.php';
			break;
			
			case 'toko_add':
			include 'page/toko.php';
			break;

			case 'detail_barang':
			include 'page/detail_barang.php';
			break;
			case 'edit_barang':
			include 'page/edit_barang.php';
			break;

			case 'laporan':
			include 'page/laporan.php';
			break;

			case 'data_penjualan':
			include 'page/data_penjualan.php';
			break;
			
		default:
			echo"Halaman Tidak Ditemukan";
			break;
	}
}else{
	echo"
	
	<div class='container' >
	<img  src='asset/img/176120.jpg?=9' class='rounded float-left ' alt='' style='
    width: 1100px;
'>
	  	</di>
	";
}
?>