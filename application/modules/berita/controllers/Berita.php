<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Berita_m');
	}

	public function index()
	{
		$sess = $this->session->userdata('user');
		if($sess){
			$this->load->module('Layout');
			$this->layout->header();
			$this->layout->sidebar();
			$data_berita = $this->Berita_m->get_berita();
			$data = array(
				'berita' => $data_berita
			);
			$this->load->view('data_berita',$data);
			$this->layout->footer();
		}else{
			redirect('home');
		}
	}

	public function tambah_berita(){
		$this->load->module('Layout');
		$this->layout->header();
		$this->layout->sidebar();
		$this->load->view('add_berita');
		$this->layout->footer();
	}

	public function proses_tambah_berita(){
		$config['upload_path'] = './assets/backend/img/berita/ori';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['overwrite'] = TRUE;
		$config['max_size'] = '2048000'; //2 MB(2048 Kb)
		$config['max_width'] = '1920';
		$config['max_height'] = '1080';
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);

		$sess = $this->session->userdata('user');
		$sess = $sess[0];
		$gambar = $_FILES['gambar']['name'];
		$judul = $this->input->post('judul');
		$subjudul = $this->input->post('subjudul');
		$isi = $this->input->post('isi');

		if(isset($foto)){
			$this->upload->do_upload('foto');
			$gambar = $this->upload->data();

			$config2['image_library'] = 'gd2'; 
			$config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config2['new_image'] = './assets/backend/img/gambar/resized'; // folder tempat menyimpan hasil resize
			$config2['maintain_ratio'] = FALSE;
			$config2['width'] = 215; //lebar setelah resize menjadi 100 px
			$config2['height'] = 215; //lebar setelah resize menjadi 100 px
			$this->load->library('image_lib',$config2); 
			$this->image_lib->resize();

		$data = array(
			'gambar' => 'gambar',
			'judul' => $judul,
			'subjudul' => $subjudul,
			'tgl_posting' => date('Y-m-d'),
			'isi' => $isi,
			'id_pengguna' => $sess['id_pengguna'],			
		);
		$this->Berita_m->add_berita($data);
		redirect('berita');
	}

	public function edit($id_postingan){
		$get_berita = $this->Berita_m->get_berita2($id_postingan);
		$data = array(
			'berita' => $get_berita
		);
		$this->load->module('Layout');
		$this->layout->header();
		$this->layout->sidebar();
		$this->load->view('edit_berita', $data);
		$this->layout->footer();
	}

	public function proses_edit_berita(){
		$sess = $this->session->userdata('user');
		$sess = $sess[0];
		$id_postingan = $this->input->post('id_postingan');
		$judul = $this->input->post('judul');
		$subjudul = $this->input->post('subjudul');
		$isi = $this->input->post('isi');
		$data = array(
			'gambar' => 'gambar',
			'judul' => $judul,
			'subjudul' => $subjudul,
			'tgl_posting' => date('Y-m-d'),
			'isi' => $isi,
			'id_pengguna' => $sess['id_pengguna'],			
		);
		$this->Berita_m->edit_berita($id_postingan, $data);
		redirect('berita');
	}

	public function hapus($id_Berita){
		$this->Berita_m->delete($id_Berita);
		redirect('berita');
	}

}