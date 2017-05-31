<?php 
class pdfreport extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('m_pdf');
        $this->load->model('web_app_model');
    }

    function cetakpdf() {
        $table="reg_pasien";
        $data['data_pasien']=$this->web_app_model->getAllData($table);
        $this->load->view('viewsiswapdf',$data);
        
        $sumber = $this->load->view('viewsiswapdf', $data, TRUE);
        $html = $sumber;
 
 
        $pdfFilePath = "hasilreport.pdf";
        //lokasi file css yang akan di load
        $css = $this->load->view('template/bootstrap.min.css'); 
        $stylesheet = file_get_contents($css, 1);
 
        $pdf = $this->m_pdf->load();
 
        $pdf->AddPage('L');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output($pdfFilePath, "D");
        exit();
    }

}