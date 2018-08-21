<?php
include "config/database.php";

?>


  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Form Design

          </h2>
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
        <div class="row">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action='action/barang.php'>
            <input type='hidden' name='aksi' value='tambah'>
            
            <div class="col-md-6 col-sm-12 col-xs-12">


              <div class="x_content">
                <br />


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">kode barang
                    <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name='kd_barang' required="required" readonly class="form-control col-md-7 col-xs-12 kode_acak">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" name='nama_barang'for="last-name">Nama Barang
                    <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class="form-control" rows="3" name='nama_barang'></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Produk</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" name='id_produk' required>
                    <option >- Pilih Produk -</option>
                      <?php
                          $query="SELECT * FROM produk";
                          $result=$conn->query($query);

                          while($obj=$result->fetch_object()){
                            echo "<option value='$obj->id_produk'>$obj->nama_produk</option>";
                          }
                      ?>
                      
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Distributor</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" name='id_distributor' required>
                    <option >- Pilih Distributor -</option>
                      <?php
                          $query="SELECT * FROM distributor";
                          $result=$conn->query($query);

                          while($obj=$result->fetch_object()){
                            echo "<option value='$obj->id_distributor'>$obj->nama_distributor</option>";
                          }
                      ?>
                    </select>
                  </div>
                </div>



              </div>

            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">


              <div class="x_content">
                <br />


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Modal
                    <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name='harga_modal'required="required" class="form-control col-md-7 col-xs-12 rupiah">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="last-name">Harga Jual 1
                    <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last-name"  required="required" name='harga_jual_1' class="form-control col-md-7 col-xs-12 rupiah">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"   for="last-name">Harga Jual 2
                    <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last-name"  required="required" name='harga_jual_2' class="form-control col-md-7 col-xs-12 rupiah">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tipe</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" name='tipe' required>
                      <option>PCS</option>
                      <option>SET</option>

                    </select>
                  </div>
                </div>


              </div>
            </div>
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-xs-12">
              <div style="    border-top: 2px solid #e5e5e5; "class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                </div>
              </div>
            </div>
          </form>




        </div>

      </div>


    </div>

  </div>
  </div>
  </div>