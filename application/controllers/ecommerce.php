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

		$curl = curl_init();
		if($value>=1){
			$url = "https://api.rajaongkir.com/starter/province?id=".$value."";
		}else{
			$url = "https://api.rajaongkir.com/starter/province";
		}
		curl_setopt_array($curl, array(

		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: ff81201460209913023c4081e9d8bc89"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	}

	public function kota($province=0){

		$curl = curl_init();
		if($province>=1){
			$url = "https://api.rajaongkir.com/starter/city?&province=".$province."";
		}else{
			$url = "https://api.rajaongkir.com/starter/city";
		}
		curl_setopt_array($curl, array(

		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: ff81201460209913023c4081e9d8bc89"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	}

	public function cek_ongkir($tujuan,$berat,$kurir){

$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=157&destination=".$tujuan."&weight=".$berat."&courier=".$kurir."",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: ff81201460209913023c4081e9d8bc89"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
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

	 public function send_mail() { 

         $from_email = "andrianto.teddy@gmail.com"; 
         $to_email = "elgorithm69@gmail.com"; 

         $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => $from_email,
                'smtp_pass' => 'golden1610',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1'
        );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");   

         $this->email->from($from_email, 'Nama Kamu'); 
         $this->email->to($to_email);
         $this->email->subject('Test Pengiriman Email'); 
         $this->email->message('Coba mengirim Email dengan CodeIgniter.'); 

         //Send mail 
         if($this->email->send()){
                $this->session->set_flashdata("notif","Email berhasil terkirim."); 
         }else {
                $this->session->set_flashdata("notif","Email gagal dikirim."); 
                $this->load->view('home'); 
         } 
      }

      public function barang(){
      	$this->load->view('ecommerce/header');
      	$this->load->view('ecommerce/barang_view');
      	$this->load->view('ecommerce/footer');
      }
}