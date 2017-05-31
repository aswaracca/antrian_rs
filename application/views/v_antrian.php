
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">                                             
                                        </div>
                                        <div class="panel-body">                                    
                                                    <?php foreach ($data as $v): ?>
                                                        <tr>
                                                        <div class="row">
                                                            <div class="col-lg-1"></div>            
                                                            <div class="col-lg-4" style="border: 2px; ">
                                                                <h1>NOMOR ANTRIAN</h1>
                                                                <p  style="font-size: 100px; ">
                                                                    <?php echo $v->id; ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p style="font-size: 23px; "><br />
                                                                    ID Pasien<br />
                                                                    Nama<br />
                                                                    Poliklinik<br />
                                                                    Tgl Registrasi<br />
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <p style="font-size: 23px; "><br />
                                                                 : <?php echo $v->kode_pasien; ?><br />
                                                                 : <?php echo $v->nama; ?><br />
                                                                 : <?php echo $v->poli; ?><br />
                                                                 : <?php echo $v->tgl_reg; ?><br />
                                                                 </p>
                                                            </div>
                                                        </tr>
                                                    <?php endforeach; ?>
                                              
                                       </div>       
                                    </div>
                                </div>