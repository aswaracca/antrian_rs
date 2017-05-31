<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Lap extends CI_Controller {
    	
    	
    	function laporan(){
				$data = array();
				$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
				if($session!=""){
				$pecah=explode("|",$session);
				$tgl = "%d-%m-%Y";
				$time = time();
				$data["wkt_skr"] = mdate($tgl,$time);
				$data["username"]=$pecah[0];
				$data["nama"]=$pecah[1];
				$data["status"]=$pecah[2];
			   	$data['scriptmce'] = $this->scripttiny_mce();
				if($data["status"]=="Administrator"){
					$this->load->view('admin/bg_atas',$data);
					$this->load->view('admin/bg_menu',$data);
					$this->load->view('admin/laporan',$data);
					$this->load->view('admin/bg_ska',$data);
					}
					else{
					?>
					<script type="text/javascript" language="javascript">
					alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
					}
				}
					else{
					?>
					<script type="text/javascript" language="javascript">
				alert("Login dulu donk...!!!");
				</script>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}