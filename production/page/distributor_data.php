<?php



$query = $conn->query("SELECT * FROM `distributor`");

?>
<div class="row">
    <div class="col-md-12 col-sm-12  col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Distributor</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>kode distributor</th>
                  <th>Nama Distributor</th>
                  <th>Alamat</th>
                  <th>No Telpon</th>
                  <th><a href="?page=kreteria_add" class="btn btn-sms btn-info" role="button">Tambah</a></th>
                </tr>
              </thead>
              <tbody>
               
                <?php
                    if ($query) {
                        $no=0;

                        /* fetch object array */
                        while ($obj = $query->fetch_object()) {
                            
                            $no++;
                            echo "<tr><td>$no</td>
                                     <td>$obj->kd_distributor</td>
                                    <td>$obj->nama_distributor</td>
                                    <td>$obj->alamat</td>
                                    <td> $obj->no_telpon</td>
                                    
                                    
                                    
                                    <td><button title='Hapus' id='$obj->id_distributor' triger='delKreteria'' type='button' class='btn btn-danger btn-sm delete'><i class='fa fa-trash'></i></button>
                                    <button title='Edit' href='' data-toggle='modal' data-target='#edit' id='$obj->id_distributor' type='button' class='btn btn-info btn-sm editKreteria'><i class='fa fa-pencil'></i></button>
                                    </td>
                                    </tr>";
                        }
                    
                        /* free result set */
                        $query->close();
                    }?>
             </tbody>
            </table>

          </div>
        </div>
      </div>

</div>