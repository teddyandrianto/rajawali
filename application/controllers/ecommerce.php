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
		$barang = $this->Model_ecommerce->getbarang();
		$this->load->view('Ecommerce/header');
		$this->load->view('Ecommerce/halaman_utama',['barang'=>$barang]);
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
				'password' => md5($this->input->post('password')),
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
                'smtp_pass' => '',
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

      public function barang($id_barang){
      	$barang_view = $this->Model_ecommerce->getbarang($id_barang);
      	$this->load->view('ecommerce/header');
      	$this->load->view('ecommerce/barang_view',['barang'=>$barang_view]);
      	$this->load->view('ecommerce/footer');
      }

      public function tambah_keranjang($id_barang=0){
      	$transaksi = $this->db->query("SELECT id_transaksi FROM tbl_transaksi WHERE id_user=".$_SESSION['login']['id_user']." AND status=1")->row();
   
      	if(isset($transaksi)){
		      	$cek_barang=  $this->db->query("SELECT * FROM tbl_detail_transaksi JOIN tbl_transaksi ON tbl_transaksi.id_transaksi=tbl_detail_transaksi.id_transaksi WHERE id_barang=".$id_barang." AND id_user=".$_SESSION['login']['id_user']." AND tbl_transaksi.status=1")->row();
		      	
		      	if(isset($cek_barang)){
		      		$dataupdate = array('jumlah_beli'=>$cek_barang->jumlah_beli+$this->input->post('jumlah'));
		      		$where = array('id_detail_transaksi' => $cek_barang->id_detail_transaksi
		      	);
			      	$res = $this->db->update('tbl_detail_transaksi',$dataupdate,$where);
			      	if($res>=1){
			      		redirect('ecommerce/barang/'.$id_barang);
			      	}else{
			      		redirect('ecommerce/barang/'.$id_barang);
			      	}
			      }else{
			      	$barang = $this->Model_ecommerce->getbarang($id_barang);
			      	$datainsert = array(
			      		'jumlah_beli'=> $this->input->post('jumlah'),
			      		'id_transaksi'=> $transaksi->id_transaksi,
			      		'harga_beli' => $barang->harga_beli,
		      			'harga_jual' =>$barang->harga_jual,
			      		'id_barang'=>$id_barang,
			      		'waktu' => date("Y-m-d H:i:s")

			     	 );
			      	$res = $this->db->insert('tbl_detail_transaksi',$datainsert);
				      	if($res>=1){
				      		redirect('ecommerce/barang/'.$id_barang);
				      	}else{
				      		redirect('ecommerce/barang/'.$id_barang);
				      	}	
			      }

      	}else{
      		$input_data = array(
      			'id_user' => $_SESSION['login']['id_user'],
      			'status' => '1'

      		);
      		$res = $this->db->insert('tbl_transaksi',$input_data);

      		if($res>=1){
      			$transaksi = $this->db->query("SELECT * FROM tbl_transaksi WHERE id_user=".$_SESSION['login']['id_user']." AND status=1")->row();
	      		$barang = $this->Model_ecommerce->getbarang($id_barang);
	      		$datainput = array(
	      			'id_transaksi'=> $transaksi->id_transaksi,
		      		'id_barang' => $id_barang ,
		      		'harga_beli' => $barang->harga_beli,
		      		'harga_jual' =>$barang->harga_jual,
		      		'jumlah_beli' => $this->input->post('jumlah'),
		      		'waktu' => date("Y-m-d H:i:s")
			     );

		      	$res = $this->db->insert('tbl_detail_transaksi',$datainput);
		      	if($res>=1){
		      		redirect('ecommerce/barang/'.$id_barang);
		      	}else{
		      		redirect('ecommerce/barang/'.$id_barang);
		      	}
	      }else{
	      	echo "buat transaksi baru gagal";
	      }

      	}
      	

      }

      public function keranjang(){
      	$keranjang = $this->Model_ecommerce->getkeranjang('data');
      	$this->load->view('ecommerce/header');
      	$this->load->view('ecommerce/keranjang',['keranjang'=>$keranjang]);
      	$this->load->view('ecommerce/footer');
      }

      public function filter_barang(){
      	if($this->input->get('cari_barang')){
      	$nama = $this->input->get('cari_barang');
      	$min =  $this->input->get('min');
      	$max = $this->input->get('max');
      	$barang = $this->Model_ecommerce->getfilterbarang($nama,$min,$max);
      	$this->load->view('ecommerce/header',$nama);
      	$this->load->view('ecommerce/barang_filter',['barang'=>$barang]);
      	$this->load->view('ecommerce/footer');
      	}else{

      	}
      }

      public function proses_transaksi(){
      		$transaksi = $this->db->query("SELECT id_transaksi FROM tbl_transaksi WHERE id_user=".$_SESSION['login']['id_user']." AND status=1")->row();

      		echo $total_barang = $this->Model_ecommerce->getkeranjang('sum_harga');

      		$pengiriman = $this->input->post('jasa').', '.$this->input->post('paket');
      		if(isset($transaksi)){
      			$update_data = array(
      				'ongkir'=> $this->input->post('ongkir'),
      				'pengiriman'=> $pengiriman,
      				'bank' => $this->input->post('bank'),
      				'waktu' => date('Y-m-d H:i:s'),
      				'total_bayar' => $this->input->post('ongkir')+$total_barang->harga_tot+$transaksi->id_detail_transaks,
      				'status' => 2
      			);
      			$where = array('id_transaksi' => $transaksi->id_transaksi);
      			$res = $this->db->update('tbl_transaksi',$update_data,$where);
      				redirect('ecommerce/detail_transaksi/'.$transaksi->id_transaksi);
      			if($res>=1){
      				redirect('ecommerce/detail_transaksi/'.$transaksi->id_transaksi);
      			}else{

      			}
      		}

      }

      public function detail_transaksi($id_transaksi=0){
      	$barang = $this->Model_ecommerce->getbarang_transaksi($id_transaksi);
      	$transaksi = $this->Model_ecommerce->getdatatransaksi($id_transaksi);
      	$this->load->view('ecommerce/header');
      	$this->load->view('ecommerce/detail_transaksi',['barang'=>$barang,'transaksi'=>$transaksi]);
      	$this->load->view('ecommerce/footer');

      }

      public function transaksi(){
      	$transaksi = $this->Model_ecommerce->gettransaksi();
      	$this->load->view('ecommerce/header');
      	$this->load->view('ecommerce/data_transaksi',['transaksi'=>$transaksi]);
      	$this->load->view('ecommerce/footer');

      }
}