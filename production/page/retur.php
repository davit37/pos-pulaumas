<?php
 $query_select=$conn->query(" select pelanggan.id_pelanggan,pelanggan.nama_pelanggan,transaksi.id_transaksi from pelanggan join transaksi on transaksi.id_pelanggan=pelanggan.id_pelanggan where transaksi.id_transaksi='$_GET[id]'");
 $obj_nama=$query_select->fetch_object();

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
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="first-name">Nomor Retur
                                        <span class="required">*</span>
                                    </label>

                                    <input type="text" id="nomor_faktur" required="required" readonly class="form-control col-md-7 col-xs-12 kode_acak" value=''>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="first-name">Nama Pelanggan
                                        <span class="required">*</span>
                                    </label>
                                    <input type="hidden" id="id_transaksi" value="<?php echo $obj_nama->id_transaksi?>">
                                    <input type="hidden" id="id_pelanggan" value="<?php echo $obj_nama->id_pelanggan?>">
                                    <input type="text" name="country" id="autocomplete-custom-append" class="form-control col-md-10 col-md-7 col-xs-12" value="<?php echo $obj_nama->nama_pelanggan?>"/>
                                </div>

                            </div>




                        </form>



                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <br />
                        <form id="formData_penjualan" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label for="first-name">Nama Barang
                                        <span class="required">*</span>
                                    </label>

                                    <input type="text" id="auto_nama_barang" required="required" class="form-control col-md-6 col-xs-12 ">
                                    <input type="hidden" id="id_barang">
                                </div>

                                <div class="form-group">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <label for="first-name">Tempat
                                            <span class="required">*</span>
                                        </label>

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
                                    <div class="col-md-1 col-sm-6 col-xs-12">
                                        <label for="first-name">Stok
                                            <span class="required">*</span>
                                        </label>

                                        <input type="text" name="country" id="stok" class="form-control col-md-6 col-md-7 col-xs-12" readonly />
                                    </div>
                                    <div class="col-md-1 col-sm-6 col-xs-12">
                                        <label for="first-name">Jumlah
                                            <span class="required">*</span>
                                        </label>

                                        <input type="number" name="country" id="jumlah" class="form-control col-md-6 col-md-7 col-xs-12" />
                                    </div>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <label for="first-name">Harga
                                            <span class="required">*</span>
                                        </label>

                                        <input type="text" name="country" id="harga" class="form-control col-md-6 col-md-7 col-xs-12 rupiah" value="" />
                                    </div>

                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <label for="first-name">bayar
                                            <span class="required">*</span>
                                        </label>

                                        <input type="text" name="country" id="bayar" readonly class="form-control col-md-6 col-md-7 col-xs-12 rupiah" value="" />
                                    </div>





                                </div>
                                <div class="col-md-12 col-md-offset-0 col-sm-12 col-xs-12">
                                    <div style="    border-top: 2px solid #e5e5e5; " class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                                            <button type="button" id="simpanPenjualan" class="btn btn-success btn-md">Simpan</button>
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
</div>
</div>
<div class="row">
<div class="col-md-8 col-sm-12  col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Penjualan</h2>
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

            <a id='tombolSelesai'  class="btn btn-primary navbar-right" role="button">
                Selesai</a>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class='table-responsive'>
                <table class="table table-hover ">
                    <thead>

                        <tr>
                           
                         
                            <th>Nama Barang</th>
                            <th>Tempat barang</th>
                            <th>Jumlah</th>
                           
                            <th>Harga Barang</th>
                            <th>Type</th>
                            <th>Total Bayar</th>
                            <th>Opsi</th>
                           


                        </tr>
                    </thead>
                    <tbody id='tablePenjualan'>



                      

                    </tbody>
                    <tfoot id='tableFooterPenjualan'>
                    
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>

</div>