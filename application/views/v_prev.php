<?php $this->load->view('template/v_header'); ?>

        <div class="wrapper wrapper-content">
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>LAPORAN HARIAN DAN MINGGUAN PENGUNJUNG RUMAH SAKIT</h5
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                            <div class="col-lg-1"></div>
                                <div class="col-md-4">
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                            <h3><i class="fa fa-file"></i> | Laporan Harian</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h4></h4>                                                    
                                                </div>
                                            </div>
                                                    <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="post" action="<?=base_url('laporan')?>">
                                                    <input type="date" class="form-control datepicker" name="tanggal" value="<?=date('Y-m-d')?>" required><br>
                                                    <button class="btn btn-warning dim" type="submit"><i class="fa fa-print"></i> | Print Report</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-md-4">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h3><i class="fa fa-file"></i> | Laporan Mingguan</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h4></h4>                                                    
                                                </div>
                                            </div>
                                                    <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="post" action="<?=base_url('laporan')?>">
                                                    <input type="date" class="form-control datepicker" name="tanggal" value="<?=date('Y-m-d')?>" required><br>
                                                    <button class="btn btn-success dim" type="submit"><i class="fa fa-print"></i> | Print Report</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        