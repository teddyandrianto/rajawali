<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller {

	public function __construct()
 	{
 		date_default_timezone_set('Asia/Jakarta');
 		parent::__construct();
 		$this->load->model('Model_ecommerce');
	  }
	  
	public function index()
	{
		$this->load->view('Ecommerce/header');
		$this->load->view('Ecommerce/halaman_utama');
		$this->load->view('Ecommerce/footer');
	}

	public function daftar()
	{
		$this->load->view('Ecommerce/header');
		$this->load->view('Ecommerce/daftar_form');
		$this->load->view('Ecommerce/footer');
	}

	public function provinsi($value=0){
		if($value>=0){
			$data = $this->Model_ecommerce->getprovinsi($value);
			echo json_encode($data);
		}else{
		$data = $this->Model_ecommerce->getprovinsi();
		echo json_encode($data);
		}
	}

	public function store_daftar(){
		if(isset($_SESSION['login'])){

		}else{
			$insertdata = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'role' => 2,
				'alamat' => $this->input->post('alamat'),
				'id_provinsi' => $this->input->post('id_provinsi'),
				'id_kota' => $this->input->post('id_kota'),
			);
			$res = $this->db->insert('tbl_user',$insertdata);

			if($res>=0){
				echo "<script>alert('daftar berhasil');</script>";
				redirect('ecommerce');
			}else{
				echo "<script>alert('daftar gagal');</script>";
				redirect('ecommerce');
			}
		}
	}
}