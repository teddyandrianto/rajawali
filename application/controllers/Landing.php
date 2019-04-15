<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct()
 	{
 		date_default_timezone_set('Asia/Jakarta');
 		parent::__construct();
 		$this->load->model('Model_login');
	  }
	  
	public function index()
	{
		if(isset($_SESSION['login'])){
			redirect("landing/autentifikasi_login");	
		}else{
			$this->load->view('page_login');
		}
	}

	public function autentifikasi_login()
	{
		$this->Model_login->verivikasi_login();
		if(isset($_SESSION['login'])){
			if($_SESSION['login']['role']==1){
				redirect('ecommerce/admin_dashboard');	
			}elseif($_SESSION['login']['role']==2){
				redirect('ecommerce');	
			}
		}else{
			echo "login Gagal";
		}
	}

	public function logout()
	{
		session_destroy();
		redirect("landing");
	}
}
