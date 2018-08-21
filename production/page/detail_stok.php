<?php
include_once "inc/function.php";
$query_select=$conn->query("SELECT * FROM barang  JOIN produk ON produk.id_produk=barang.id_produk JOIN stok_barang ON stok_barang.id_barang=barang.id_barang JOIN distributor ON distributor.id_distributor=stok_barang.id_baru_distributor JOIN penempatan_barang ON penempatan_barang.id_tempat=stok_barang.id_tempat where stok_barang.id_barang='$_GET[id]'");






?>
  <div class="row">
    <div class="col-md-12 col-sm-12  col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Barang Masuk</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fa fa-wrench"></i>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="#">Settings 1</a>
                </li>
                <li>
                  <a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="close-link">
                <i class="fa fa-close"></i>
              </a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <div class='table-responsive'>
          <table class="table table-hover ">
            <thead>

              <tr>
                <th>#</th>
              
                <th>Nama Barang</th>
                <th>Produk</th>
                <th>Distributor</th>
                <th>Tempat</th>
                <th>Stok Awal</th>
                <th>Stok Baru</th>
                <th>Stok Ahir</th>
                <th>Tgl/waktu</th>
                


              </tr>
            </thead>
            <tbody>
            <?php

            if($query_select){
              $no=0;
                while($obj=$query_select->fetch_object()){
                  $no++;
                  $total=$obj->stok_baru+$obj->stok_awal;
                  $tgl=konfersi_waktu($obj->tanggal);
                  echo"
                    <tr>
                        <td>$no</td>
                      
                        <td>$obj->nama_barang</td>
                      
                        <td>$obj->nama_produk</td>
                        <td>$obj->nama_distributor</td>
                        <td>$obj->nama_tempat</td>
                        <td>$obj->stok_awal</td>
                        <td>$obj->stok_baru</td>
                        <td>$total</td>
                        <td>$tgl</td>
                       
                    </tr>
                  
                  ";
                }
            }
            
            ?>




            </tbody>
          </table>
          </div>

        </div>
      </