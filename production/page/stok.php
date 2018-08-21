<?php
    $query_select=$conn->query("select * from barang JOIN produk ON produk.id_produk=barang.id_produk where id_barang='$_POST[id]'");
    $obj=$query_select->fetch_object();
    
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
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action='action/stok.php'>
            <input type='hidden' name='aksi' value='tambah'>

            <div class="col-md-6 col-sm-12 col-xs-12">


              <div class="x_content">
                <br />
                <input type='hidden' name='id_barang' id='id_barang' value='<?php echo $_POST[id]?>'>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">kode barang
                    <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name='kd_barang' required="required" readonly class="form-control col-md-7 col-xs-12" value='<?php echo $obj->kd_barang ?>'>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" name='nama_barang' for="last-name">Nama Barang
                    <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class="form-control" rows="3" readonly name='nama_barang'><?php echo $obj->nama_barang?>
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Produk</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name='kd_barang' required="required" readonly class="form-control col-md-7 col-xs-12" value='<?php echo $obj->nama_produk ?>'>
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Penempatan</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" name='id_tempat' id="id_tempat" required>
                      <option value=''>- Pilih Tempat -</option>
                      <?php
                          $query="SELECT * FROM penempatan_barang";
                          $result=$conn->query($query);

                          while($obj_=$result->fetch_object()){
                            echo "<option value='$obj_->id_tempat'>$obj_->nama_tempat</option>";
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
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Distributor</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" name='id_distributor' required>
                      <option value=''>- Pilih Distributor -</option>
                      <?php
                          $query="SELECT * FROM distributor";
                          $result=$conn->query($query);

                          while($obj_=$result->fetch_object()){
                            echo "<option value='$obj_->id_distributor'>$obj_->nama_distributor</option>";
                          }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Stok Awal
                    <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="stok" name='stok_awal' required="required" readonly class="form-control col-md-7 col-xs-12"
                      value=''>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Stok Baru
                    <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="stok_baru" required="required" name='stok_baru' class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Stok Akhir
                    <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="stok_ahir" required="required" readonly class="form-control col-md-7 col-xs-12">
                  </div>
                </div>




              </div>
            </div>
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-xs-12">
              <div style="    border-top: 2px solid #e5e5e5; " class="ln_solid"></div>
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

  <script>
    $(document).ready(function () {

      //get stok
      
     

      //jumlah stok
      $("#stok_baru").change(function(){
        var stok_baru=parseInt($(this).val())
        var stok_awal=parseInt($("#stok").val())
        var stok_ahir=stok_awal+stok_baru;

        $("#stok_ahir").val(stok_ahir)
      })
    })
  </script>