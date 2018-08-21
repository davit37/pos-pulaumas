<?php

$aksi='tambah';

?>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Distributor
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
          

          <div class="col-md-8 col-md-offset-2 col-sm-12  col-xs-12">
              <div class="x_panel">
                
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='action/distributor.php' method='POST'>
  
                  <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                     <input type="hidden" name="aksi" value="<?php echo $aksi?>">
                     
                    
                        <input type="hidden" id="kd_distributor" required="required" name='kd_distributor' readonly class="form-control col-md-7 col-xs-12" value='<?php echo $obj->nidn?>'>
                      

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Distributor <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="nama_distributor" required="required" class="form-control col-md-7 col-xs-12" value='<?php echo $obj->nama_dosen?>'>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name='alamat' class="form-control" rows="3" placeholder="Masukan Alamat"></textarea>
                        </div>
                    </div>
                  
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telpon <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="no_telpon" required="required" class="form-control col-md-7 col-xs-12" value='<?php echo $obj->nama_dosen?>'>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Keterangan <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="keterangan" required="required" class="form-control col-md-7 col-xs-12" value='<?php echo $obj->nama_dosen?>'>
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        
            <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
  
                  </form>
                </div>
              </div>
            </div>
        </div>

        
    </div>
  </div>
</div>


<script>
                var kode = document.getElementById('kd_distributor');
                var acak = 0;

                function generate(){
                    if(kode.value===''){
                        for (var i=1; i<=5;i++){
                            acak= Math.floor(Math.random()*(9+1));
                            kode.value+=acak;
                        }
                    }
                }

                window.addEventListener('load', generate);
            
            
            </script>