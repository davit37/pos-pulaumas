<?php
$query_select=$conn->query(" SELECT barang.*, distributor.nama_distributor,produk.nama_produk, sum(detail_stok.stok)as stok,harga.harga_modal, harga.harga_jual_1,harga.harga_jual_2, max(harga.tanggal_pemakaian_awal) FROM barang JOIN distributor ON distributor.id_distributor=barang.id_distributor JOIN produk ON produk.id_produk=barang.id_produk LEFT JOIN detail_stok ON detail_stok.id_barang= barang.id_barang LEFT JOIN(SELECT harga.*,topdate.maxdate FROM harga INNER JOIN(select id_barang,Max(tanggal_pemakaian_awal) as maxdate from harga group by id_barang) as topdate On topdate.id_barang=harga.id_barang AND harga.tanggal_pemakaian_awal=topdate.maxdate)as harga on harga.id_barang=barang.id_barang GROUP by barang.id_barang;");






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
                        <th>kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Produk</th>
                        <th>Distributor</th>
                        <th>Harga Modal</th>
                        <th>Harga Jual 1</th>
                        <th>Harga Jual 2</th>
                        <th>QTY</th>
                        <th>Type</th>
                        
                        <th>option</th>


                      </tr>
                      </thead>


                      <tbody>
                      <?php

                            if($query_select){
                              $no=0;
                                while($obj=$query_select->fetch_object()){
                                  $harga_modal=number_format($obj->harga_modal);
                                  $harga_jual_1=number_format($obj->harga_jual_1);
                                  $harga_jual_2=number_format($obj->harga_jual_2);
                                  $no++;
                                  echo"
                                    <tr>
                                        <td>$no</td>
                                        <td>$obj->kd_barang</td>
                                        <td>$obj->nama_barang</td>
                                        <td>$obj->nama_produk</td>
                                        <td>$obj->nama_distributor</td>
                                        <td>$harga_modal</td>
                                        <td> $harga_jual_1</td>
                                        <td>$harga_jual_2</td>
                                        <td>$obj->stok</td>
                                        <td>$obj->tipe</td>
                                        <td><form action='?page=stok' method='POST'><input type='hidden' value='$obj->id_barang' name='id'>
                                        <button title='Detail Barang Masuk' href='' triger='delBarang' data-toggle='modal' data-target='#edit' id='$obj->id_barang' type='button' class='btn btn-danger btn-sm delete'>Hapus</button>
                                        <button title='edit barang' href='' data-toggle='modal' data-target='#edit' id='$obj->id_barang' type='button' class='btn btn-warning btn-sm editBarang'>Edit </button>
                                        <button type='submit' title='tambah stok'  class='btn btn-info btn-sm tambahStok'>Tambah stok</button>
                                        <button title='Detail Barang Masuk' href='' data-toggle='modal' data-target='#edit' id='$obj->id_barang' type='button' class='btn btn-info btn-sm detail_stok_masuk'>Detail Barang masuk</button>
                                        <button title='Detail Stok' href='' data-toggle='modal' data-target='#edit' id='$obj->id_barang' type='button' class='btn btn-info btn-sm detail_stok_toko'>Detail stok </button>
                                        
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