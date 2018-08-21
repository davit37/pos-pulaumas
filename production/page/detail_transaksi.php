<?php

include_once "inc/function.php";
$query_pembelian=$conn->query("SELECT barang.nama_barang, penempatan_barang.nama_tempat, penjualan.jumlah, penjualan. harga, penjualan.total from penjualan JOIN barang ON barang.id_barang=penjualan.id_barang JOIN penempatan_barang ON penempatan_barang.id_tempat=penjualan.id_tempat where penjualan.id_transaksi= '$_GET[id]'");

$query_transaksi=$conn->query("SELECT transaksi.no_faktur, transaksi.tanggal_transaksi, pelanggan.nama_pelanggan from transaksi JOIN pelanggan ON pelanggan.id_pelanggan =transaksi.id_pelanggan where transaksi.id_transaksi='$_GET[id]'");
$data_transaksi=$query_transaksi->fetch_object();







?>
    <div class="row">
        <div class="col-md-12 col-sm-12  col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detail Transaksi</h2>

                    
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
                    
                    <a  class="btn btn-primary navbar-right" href="?page=retur?id=<?php echo $_GET['id']?>" role="button"><i class="fa fa-print"></i>
                    Cetak</a>&nbsp;&nbsp;

                    <a style="margin-right: 10px;" class="btn btn-info navbar-right" href="laporan/sturk2.php?id=<?php echo $_GET['id']?>" role="button">
                    Retur Barang</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                    <table class="table table-striped ">
                           
                            <tbody>
                            
                               <tr><th>Nomor Faktur</th><td><?php echo $data_transaksi->no_faktur?></td></tr>
                               <tr><th>Nama Pelanggan</th><td><?php echo $data_transaksi->nama_pelanggan?></td></tr>
                               <tr><th>Tanggal/waktu Transaksi</th><td><?php echo konfersi_waktu($data_transaksi-> tanggal_transaksi);?></td></tr>
                            </tbody>
                        </table>


                    </div>

                </div>
                <div class="x_content">
              
                    <div class='table-responsive'>
                        <table class="table table-hover ">
                            <thead>

                                <tr>
                                    <th>#</th>
                                  
                                    <th>Nama Barang</th>
                                    <th>Keluar Dari</th>
                                   
                                    <th>QTY</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    if($query_pembelian){
                                    $no=0;
                                        while($obj=$query_pembelian->fetch_object()){
                                        $no++;
                                        $harga=number_format($obj->harga,0,',',',');
                                        $total=number_format($obj->total,0,',',',');
                                        echo"
                                            <tr>
                                                <td>$no</td>
                                                <td>$obj->nama_barang</td>
                                                <td>$obj->nama_tempat</td>
                                                <td>$obj->jumlah</td>
                                                <td>$harga</td>
                                                <td>$total</td>
                                            </tr>
                                        
                                        ";
                                        }
                                    }
                                    
                                    ?>




                            </tbody>
                            <tfoot>
                                    <?php
                                    $query_grand_total=$conn->query("SELECT SUM(total)as grand_total from penjualan where id_transaksi='$_GET[id]' GROUP BY id_transaksi");
                                    $obj_grand_total=$query_grand_total->fetch_object();
                                    $grand_total=number_format($obj_grand_total->grand_total,0,',',',');
                                    ?>
                                    <tr>
                                        <th colspan='4'></th>
                                        <th >Grand total</th>
                                        <td><?php echo "Rp.".$grand_total ?></td>

                                    </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>