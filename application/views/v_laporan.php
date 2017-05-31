
        <h2 align="center">LAPORAN PENGUNJUNG RUMAH SAKIT<br/>UIN ALAUDDIN MAKASSAR<br/>TAHUN 2017/2018</h2>
        <hr/>
        
        <h4>I. DAFTAR NAMA PASIEN</h4>
            
            <table width="100%" border="1" cellpadding="2" cellspacing="0">
            <thead>
                <tr align="center" style="background: red;">
                
                    <th>NO</th>
                    <th>KODE PASIEN</th>
                    <th>TANGGAL REGISTRASI</th>
                    <th>NAMA PASIEN</th>
                    <th>JENIS KELAMIN</th>
                    <th>USIA</th>
                    <th>ALAMAT</th>                    
                    <th>NO TLP/HP</th>                    
                    <th>POLI</th>                    
                        
                </tr>
            </thead>
            <tbody>
                <?php for($i=0;$i<count($pasien);$i++){?>
                <tr align="center">
                        
                        <td><?=$i+1?></td>
                        <td><?=$pasien[$i]['kode_pasien']?></td>
                        <td><?=$pasien[$i]['tgl_reg']?></td>
                        <td><?=$pasien[$i]['nama']?></td>
                        <td><?=$pasien[$i]['jk']?></td>
                        <td><?=$pasien[$i]['usia']?></td>
                        <td><?=$pasien[$i]['alamat']?></td>
                        <td><?=$pasien[$i]['no_tlp']?></td>
                        <td><?=$pasien[$i]['poli']?></td>                 
                </tr>
                <?php } ?>


            </tbody>        
        </table>   
            
        
        <div>
            <p align="right">Halaman : </p>
        </div>
  
  