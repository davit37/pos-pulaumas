<?php
include_once "inc/function.php";
$query_select=$conn->query("SELECT * FROM barang JOIN produk ON produk.id_produk=barang.id_produk JOIN detail_stok ON detail_stok.id_barang=barang.id_barang JOIN penempatan_barang ON penempatan_barang.id_tempat=detail_stok.id_tempat where detail_stok.id_barang='$_GET[id]'");






?>
  <div class="row">
    <div class="col-md-8 col-sm-12  col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Stok Barang </h2>
          <ul class="nav navbar-right panel_toolbox">
          <form action='?page=stok' method='POST'><input type='hidden' value='<?php echo $_GET['id'] ?>' name='id'>
          
          <button type='submit' title='tambah stok'  class='btn btn-info btn-sm tambahStok'>Tambah stok</button>
        </form>
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
            
                <th>Tempat</th>
               
                <th>Stok</th>
                
                


              </tr>
            </thead>
            <tbody>
            <?php

            if($query_select){
              $no=0;
                while($obj=$query_select->fetch_object()){
                  $no++;
                 
                  
                  echo"
                    <tr>
                        <td>$no</td>
                      
                        <td>$obj->nama_barang</td>
                      
                        <td>$obj->nama_produk</td>
                        <td>$obj->nama_tempat</td>
                        <td>$obj->stok</td>
                        
                        
                       
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