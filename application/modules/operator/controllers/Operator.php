<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Operator_m');
	}

	public function index()
	{
		$sess = $this->session->userdata('user');
		if($sess){
			$this->load->module('Layout');
			$this->layout->header();
			$this->layout->sidebar();
			$data_operator = $this->Operator_m->get_operator();
			$data = array(
				'operator' => $data_operator
			);
			$this->load->view('data_operator',$data);
			$this->layout->footer();
		}else{
			redirect('home');
		}
	}

	public function tambah_operator(){
		$this->load->module('Layout');
		$this->layout->header();
		$this->layout->sidebar();
		$this->load->view('add_operator');
		$this->layout->footer();
	}

	public function proses_tambah_operator(){
		$config['upload_path'] = './assets/backend/img/member/ori';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['overwrite'] = TRUE;
		$config['max_size'] = '2048000'; //2 MB(2048 Kb)
		$config['max_width'] = '1920';
		$config['max_height'] = '1080';
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);

		$foto = $_FILES['foto']['name'];
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');

		if(isset($foto)){
			$this->upload->do_upload('foto');
			$gambar = $this->upload->data();

			$config2['image_library'] = 'gd2'; 
			$config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config2['new_image'] = './assets/backend/img/member/resized'; // folder tempat menyimpan hasil resize
			$config2['maintain_ratio'] = FALSE;
			$config2['width'] = 215; //lebar setelah resize menjadi 100 px
			$config2['height'] = 215; //lebar setelah resize menjadi 100 px
			$this->load->library('image_lib',$config2); 
			$this->image_lib->resize();

			$data = array(
				'username' => $username,
				'password' => $password,
				'namalevel' => 'operator',
				'email' => $email,
				'alamat' => $alamat,
				'foto' => $gambar['file_name'],
				'phone' => $telp,
				'isMember' => 'member',
				'status' => 'aktif',
				'totalmain' => 0,
				'tgl_aktifmember' => date('Y-m-d')
			);
		}else{
			$data = array(
				'username' => $username,
				'password' => $password,
				'namalevel' => 'operator',
				'email' => $email,
				'alamat' => $alamat,
				'phone' => $telp,
				'isMember' => 'member',
				'status' => 'aktif',
				'totalmain' => 0,
				'tgl_aktifmember' => date('Y-m-d')
			);
		}

		$this->Operator_m->add_operator($data);
		redirect('operator');
	}

	public function edit($id_pengguna){
		$get_pengguna = $this->Operator_m->get_pengguna($id_pengguna);
		$data = array(
			'pengguna' => $get_pengguna
		);
		$this->load->module('Layout');
		$this->layout->header();
		$this->layout->sidebar();
		$this->load->view('edit_operator', $data);
		$this->layout->footer();
	}

	public function proses_edit_operator(){
		$config['upload_path'] = './assets/backend/img/member/ori';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['overwrite'] = TRUE;
		$config['max_size'] = '2048000'; //2 MB(2048 Kb)
		$config['max_width'] = '1920';
		$config['max_height'] = '1080';
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);

		$foto = $_FILES['foto']['name'];
		$id_pengguna = $this->input->post('id_pengguna');
		$foto_lama = $this->input->post('foto_lama');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		if(!empty($foto)){
			if(file_exists('./assets/backend/img/member/ori/'.$foto_lama)){
				unlink('./assets/backend/img/member/ori/'.$foto_lama);
			}
			if(file_exists('./assets/backend/img/member/resized/'.$foto_lama)){
				unlink('./assets/backend/img/member/resized/'.$foto_lama);
			}
			$this->upload->do_upload('foto');
			$gambar = $this->upload->data();

			$config2['image_library'] = 'gd2'; 
			$config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config2['new_image'] = './assets/backend/img/member/resized'; // folder tempat menyimpan hasil resize
			$config2['maintain_ratio'] = FALSE;
			$config2['width'] = 215; //lebar setelah resize menjadi 100 px
			$config2['height'] = 215; //lebar setelah resize menjadi 100 px
			$this->load->library('image_lib',$config2); 
			$this->image_lib->resize();
			
			$data = array(
				'username' => $username,
				'namalevel' => 'operator',
				'email' => $email,
				'alamat' => $alamat,
				'foto' => $gambar['file_name'],
				'phone' => $telp,
				'isMember' => 'member',
				'status' => 'aktif',	
				'tgl_aktifmember' => date('Y-m-d')
			);
		}else{
			$data = array(
				'username' => $username,
				'namalevel' => 'operator',
				'email' => $email,
				'alamat' => $alamat,
				'phone' => $telp,
				'isMember' => 'operator',
				'status' => 'aktif',
				'tgl_aktifmember' => date('Y-m-d')
			);
		}
		$this->Operator_m->edit_operator($id_pengguna, $data);
		redirect('operator');
	}

public function hapus($id_Operator){
		$data = array(
			'sess' => $this->session->userdata('user')
		);
		$this->Operator_m->delete($id_Operator);
		redirect('operator');
	}
}