<?php
include "config/database.php";

?>


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Laporan

                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action='action/barang.php'>
                        <div class="well" style="overflow: auto">
                            <div class="col-md-4">
                                Tanggal 
                                <form class="form-horizontal">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="input-prepend input-group">
                                                    <span class="add-on input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" value="01/01/2016 - 01/25/2016">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="col-md-2">
                                Date Range Picker
                                <form class="form-horizontal">
                                    <fieldset>
                                        <div class="control-group">
                                            
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" value=""> Cetak detail
                                            </label>
                                        </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="col-md-2">
                                Date Range Picker
                                <form class="form-horizontal">
                                    <fieldset>
                                        <div class="control-group">
                                            
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" value=""> Cetak pelanggan
                                            </label>
                                        </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>

                             <div class="col-md-2">
                                Date Range Picker
                                <form class="form-horizontal">
                                    <fieldset>
                                        <div class="control-group">
                                            
                                        <div class="checkbox">
                                            <label>
                                            <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                            </label>
                                        </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>


                            <div class="col-md-12  col-sm-12 col-xs-12">
                                <div style="    border-top: 2px solid #e5e5e5; " class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success btn-lg">
                                            <i class="fa fa-print"></i> Cetak</button>
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