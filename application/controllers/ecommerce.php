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
}