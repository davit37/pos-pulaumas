<?php
include_once "inc/function.php";
$query_select=$conn->query("SELECT transaksi.*, pelanggan.nama_pelanggan, penjualan.total from transaksi JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan JOIN (select sum(total) as total, id_transaksi from penjualan group by id_transaksi) as penjualan ON penjualan.id_transaksi = transaksi.id_transaksi");

?>
  <div class="row">
    

    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Barang</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="?page=barang" class="btn btn-info" role="button">Tambah Barang</a>
                     
                    </ul>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
              
                    
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>

                      <tr>
                        <th>#</th>
                        <th>nomor faktur</th>
                        <th>Nama pelanggan</th>
                        <th>tanggal transaksi</th>
                        <th>Total transaksi</th>
                       
                        
                        <th>option</th>


                      </tr>
                      </thead>


                      <tbody>
                      <?php

                            if($query_select){
                              $no=0;
                                while($obj=$query_select->fetch_object()){
                                  $total=number_format($obj->total);
                                  $waktu=konfersi_waktu($obj->tanggal_transaksi);
                                 
                                  $no++;
                                  echo"
                                    <tr>
                                        <td>$no</td>
                                        <td>$obj->no_faktur</td>
                                        <td>$obj->nama_pelanggan</td>
                                        <td>$waktu</td>
                                        <td>$total</td>
                                        
                                        <td><form action='?page=stok' method='POST'><input type='hidden' value='$obj->id_transaksi' name='id'>
                                        <button title='Detail Barang Masuk' href='' triger='delBarang' data-toggle='modal' data-target='#edit' id='$obj->id_barang' type='button' class='btn btn-danger btn-sm delete'>Hapus</button>
                                        <button title='Detail Stok' href='' data-toggle='modal' data-target='#edit' id='$obj->id_transaksi' type='button' class='btn btn-info btn-sm retur'>Retur Barang </button>
                                        <button title='Detail Stok' href='' data-toggle='modal' data-target='#edit' id='$obj->id_transaksi' type='button' class='btn btn-info btn-sm detail_transaksi'>Detail Transaksi </button>
                                        
                                        </form></td>
                                    </tr>
                                  
                                  ";
                                }
                            }

                            ?>

                      </tbody>
                    </table>
                  </div>
                 
                </div>
              </div>

  </div>