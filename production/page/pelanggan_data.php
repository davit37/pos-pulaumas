<?php
$query_select=$conn->query("SELECT * FROM pelanggan");






?>
  <div class="row">
    <div class="col-md-12 col-sm-12  col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Barang</h2>
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
                <th>kode pelanggan</th>
                <th>Nama pelaggan</th>
                <th>alamat</th>
                <th>No Telpon</th>
               


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
                        <td>$obj->kd_pelanggan</td>
                        <td>$obj->nama_pelanggan</td>
                        <td>$obj->alamat</td>
                        <td>$obj->no_telpon</td>
                        
                        
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

  </div>