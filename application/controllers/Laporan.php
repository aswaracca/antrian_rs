<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan  extends CI_Controller{

    public function __construct(){
        parent::__construct();

    }

    public function index(){
        
        $this->load->model('Laporan_model');
        $tanggal = $this->input->post('tanggal');
        $data['pasien'] = $this->Laporan_model->select_pasien($tanggal);
        
        ob_start();   
        $this->load->view('v_laporan',$data);
        $html = ob_get_contents();        
        ob_end_clean();                
        require_once('./assets/html2pdf/html2pdf.class.php');    
        $pdf = new HTML2PDF('P','A4','en',TRUE,'UTF-8',array(15, 15, 15, 10));    
        $pdf->WriteHTML($html);    
        $pdf->Output("Laporan_harian.pdf", 'A');  
    }

    public function preview_lap(){
        $this->load->view('v_prev.php');
    } 
}
?>