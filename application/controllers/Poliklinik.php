<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poliklinik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Poliklinik_model','poliklinik');
	}

	public function index()
	{
		$this->load->helper('url');
		 $this->load->view('template/v_header');
		$this->load->view('v_poliklinik');
		 // $this->load->view('template/v_footer');
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->poliklinik->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $poliklinik) {
			$no++;
			$row = array();
			$row[] = $poliklinik->kode_poli;
			$row[] = $poliklinik->nama_poli;
			$row[] = $poliklinik->nama_dokter;			
			$row[] = $poliklinik->no_tlp;		
			$row[] = $poliklinik->alamat;	

			
			// if($poliklinik->photo)
			// 	$row[] = '<a href="'.base_url('upload/'.$poliklinik->photo).'" target="_blank"><img src="'.base_url('upload/'.$poliklinik->photo).'" class="img-responsive" /></a>';
			// else
			// 	$row[] = '(No photo)';

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$poliklinik->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$poliklinik->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->poliklinik->count_all(),
						"recordsFiltered" => $this->poliklinik->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->poliklinik->get_by_id($id);
		// $data->tgl_reg = ($data->tgl_reg == '0000-00-00') ? '' : $data->tgl_reg; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$data = array(
				'kode_poli' => $this->input->post('kode_poli'),
				'nama_poli' => $this->input->post('nama_poli'),
				'nama_dokter' => $this->input->post('nama_dokter'),					
				'no_tlp' => $this->input->post('no_tlp'),
				'alamat' => $this->input->post('alamat'),
				
			);

		// if(!empty($_FILES['photo']['name']))
		// {
		// 	$upload = $this->_do_upload();
		// 	$data['photo'] = $upload;
		// }

		$insert = $this->poliklinik->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'kode_poli' => $this->input->post('kode_poli'),
				'nama_poli' => $this->input->post('nama_poli'),
				'nama_dokter' => $this->input->post('nama_dokter'),					
				'no_tlp' => $this->input->post('no_tlp'),
				'alamat' => $this->input->post('alamat'),							
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
			$poliklinik = $this->poliklinik->get_by_id($this->input->post('id'));
			if(file_exists('upload/'.$poliklinik->photo) && $poliklinik->photo)
				unlink('upload/'.$poliklinik->photo);

			$data['photo'] = $upload;
		}

		$this->poliklinik->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$poliklinik = $this->poliklinik->get_by_id($id);
		if(file_exists('upload/'.$poliklinik->photo) && $poliklinik->photo)
			unlink('upload/'.$poliklinik->photo);
		
		$this->poliklinik->delete_by_id($id);
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

		if($this->input->post('kode_poli') == '')
		{
			$data['inputerror'][] = 'kode_poli';
			$data['error_string'][] = 'Kode Poli is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_poli') == '')
		{
			$data['inputerror'][] = 'nama_poli';
			$data['error_string'][] = 'Name Poli is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('nama_dokter') == '')
		{
			$data['inputerror'][] = 'nama_dokter';
			$data['error_string'][] = 'Name dokter is required';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('no_tlp') == '')
		{
			$data['inputerror'][] = 'no_tlp';
			$data['error_string'][] = 'No tlp is required';
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

}
