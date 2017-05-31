<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pasien_model','pasien');
	}

	public function index()
	{
	 	
		$this->load->helper('url');
		 $this->load->view('template/v_header');
		$this->load->view('v_pasien');		
		 // $this->load->view('template/v_footer');
		
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->pasien->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pasien) {
			$no++;
			$row = array();
			$row[] = $pasien->kode_pasien;
			$row[] = $pasien->nama;
			$row[] = $pasien->jk;			
			$row[] = $pasien->usia;		
			// $row[] = $pasien->alamat;	
			$row[] = $pasien->tgl_reg;
			// $row[] = $pasien->no_tlp;
			$row[] = $pasien->poli;
			
			// if($pasien->photo)
			// 	$row[] = '<a href="'.base_url('upload/'.$pasien->photo).'" target="_blank"><img src="'.base_url('upload/'.$pasien->photo).'" class="img-responsive" /></a>';
			// else
			// 	$row[] = '(No photo)';

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pasien('."'".$pasien->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pasien('."'".$pasien->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pasien->count_all(),
						"recordsFiltered" => $this->pasien->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->pasien->get_by_id($id);
		$data->tgl_reg = ($data->tgl_reg == '0000-00-00') ? '' : $data->tgl_reg; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$data = array(
				'kode_pasien' => $this->input->post('kode_pasien'),
				'nama' => $this->input->post('nama'),
				'jk' => $this->input->post('jk'),				
				'usia' => $this->input->post('usia'),		
				'alamat' => $this->input->post('alamat'),		
				'tgl_reg' => $this->input->post('tgl_reg'),
				'no_tlp' => $this->input->post('no_tlp'),
				'poli' => $this->input->post('poli'),
				
			);

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			$data['photo'] = $upload;
		}

		$insert = $this->pasien->save($data);
		

		echo json_encode(array("status" => TRUE));
		
		
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'kode_pasien' => $this->input->post('kode_pasien'),
				'nama' => $this->input->post('nama'),
				'jk' => $this->input->post('jk'),				
				'usia' => $this->input->post('usia'),	
				'alamat' => $this->input->post('alamat'),			
				'tgl_reg' => $this->input->post('tgl_reg'),
				'no_tlp' => $this->input->post('no_tlp'),
				'poli' => $this->input->post('poli'),
				
			);

		if($this->input->post('remove_photo')) // if remove photo checked
		{
			if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$pasien = $this->pasien->get_by_id($this->input->post('id'));
			if(file_exists('upload/'.$pasien->photo) && $pasien->photo)
				unlink('upload/'.$pasien->photo);

			$data['photo'] = $upload;
		}

		$this->pasien->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$pasien = $this->pasien->get_by_id($id);
		if(file_exists('upload/'.$pasien->photo) && $pasien->photo)
			unlink('upload/'.$pasien->photo);
		
		$this->pasien->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('kode_pasien') == '')
		{
			$data['inputerror'][] = 'kode_pasien';
			$data['error_string'][] = 'Kode Pasien is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama') == '')
		{
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('tgl_reg') == '')
		{
			$data['inputerror'][] = 'tgl_reg';
			$data['error_string'][] = 'Date of reg is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('no_tlp') == '')
		{
			$data['inputerror'][] = 'no_tlp';
			$data['error_string'][] = 'No tlp is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('poli') == '')
		{
			$data['inputerror'][] = 'poli';
			$data['error_string'][] = 'poliklinik is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('jk') == '')
		{
			$data['inputerror'][] = 'jk';
			$data['error_string'][] = 'Please select Jenis Kelamin';
			$data['status'] = FALSE;
		}
		if($this->input->post('usia') == '')
		{
			$data['inputerror'][] = 'usia';
			$data['error_string'][] = 'Usia is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('alamat') == '')
		{
			$data['inputerror'][] = 'alamat';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	 //menampilkan daftar poli yang di input /////////////////////////////////////////////
	// public function poli_dd()
 //    {
 //        $this->load->model('pasien_model','poliklinik');
 //        $data['judul'] = 'Menampilkan Data ';
 //        $data['daftar_poli'] = $this->pasien_model->get_poli();
 //        $this->load->view('v_pasien', $data);
 //    }
	
}
