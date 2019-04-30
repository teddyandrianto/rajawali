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

	public function login()
	{
		if(isset($_SESSION['login'])){
			redirect('ecommerce/profile');
		}else{
			$this->load->view('Ecommerce/header');
			$this->load->view('Ecommerce/login_form');
			$this->load->view('Ecommerce/footer');
		}
	}

		public function autentifikasi_login(){

		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$this->Model_ecommerce->verivikasi_login($email,$password);
		if(isset($_SESSION['login'])){
				
			if($_SESSION['login']['role']==1){
				redirect('ecommerce/admin_dashboard');	
			}elseif($_SESSION['login']['role']==2){
				redirect('ecommerce');	
			}
		}else{
			redirect('ecommerce/login');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect("ecommerce");
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

	public function cekemail(){
  
      $request = trim(strtolower($_REQUEST['email']));
      if($this->Model_ecommerce->cekemail($request)==true){
          echo "true"; 
      }else{
        echo "false"; 
      }
  }

		public function store_daftar(){
		if(isset($_SESSION['login'])){

		}else{
			$insertdata = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'status' => 2,
				'alamat' => $this->input->post('alamat'),
				'provinsi_id' => $this->input->post('id_provinsi'),
				'kota_id' => $this->input->post('id_kota'),
				'telpon' => $this->input->post('telpon'),
			);
			$res = $this->db->insert('tbl_user',$insertdata);
			if($res>=1){
				$this->Model_ecommerce->verivikasi_login($insertdata->username,$insertdata->password);
				redirect('ecommerce/login');
			}else{
				echo "<script>alert('daftar gagal');</script>";
				redirect('ecommerce/daftar');
			}
		}
	}


	// public function store_daftar(){
	// 	if(isset($_SESSION['login'])){

	// 	}else{
	// 		$insertdata = array(
	// 			'nama' => $this->input->post('nama'),
	// 			'username' => $this->input->post('email'),
	// 			'password' => md5($this->input->post('password')),
	// 			'status' => 0,
	// 			'alamat' => $this->input->post('alamat'),
	// 			'provinsi_id' => $this->input->post('id_provinsi'),
	// 			'kota_id' => $this->input->post('id_kota'),
	// 			'telpon' => $this->input->post('telpon'),
	// 		);
	// 		$res = $this->db->insert('tbl_user',$insertdata);

	// 		if($res>=1){
	// 			$data_token = $this->db->query('SELECT * FROM tbl_user WHERE username="'.$insertdata['username'].'" AND password="'.$insertdata['password'].'" ')->row(); 
	// 			$insert_token = array(
	// 				'token' => md5($data_token->id_user.$data_token->username),
	// 				'id_user' => $data_token->id_user,
	// 			);
	// 			$this->db->insert('tbl_token',$insert_token);
				
	// 			redirect('ecommerce/send_mail/'.$data_token->id_user.'/'.$insert_token['token']);
	// 		}else{
	// 			echo "<script>alert('daftar gagal');</script>";
	// 			redirect('ecommerce');
	// 		}
	// 	}
	// }

	// public function verivikasi(){
	// 	$this->load->view('ecommerce/header');
	// 	$this->load->view('ecommerce/verivikasi');
	// 	$this->load->view('ecommerce/footer');

	// }

	// public function verivikasi_proses($token){
	// 	 $data_user = $this->db->query('SELECT * FROM tbl_user JOIN tbl_token ON tbl_token.id_user=tbl_user.id_user where tbl_token.token="'.$token.'"')->row();
	// 	 if(isset($data_user)){

	// 	 	$data_update = array(
	// 	 		'status'=>2,
	// 	 	);
	// 	 	$where = array('id_user'=>$data_user->id_user);
	// 	 	$res = $this->db->update('tbl_user',$data_update,$where);
	// 	 	$this->db->delete('tbl_token',$where);
	// 	 	if($res>=1){
	// 	 		$this->Model_ecommerce->verivikasi_login($data_user->username,$data_user->password);
	// 	 		$this->session->set_flashdata("pesan", '<script>
 //          						alert("Verivikasi berhasil");
 //            					</script>');
	// 			redirect('ecommerce/profile');	
	// 	 	}
	// 	 }else{
	// 	 $this->session->set_flashdata("pesan", '<script>
 //          						alert("Verivikasi gagal");
 //            					</script>');
	// 			redirect('ecommerce/verivikasi');
	// 	 } 
	// }

	// public function send_mail($id_user,$data_user) { 

 //         $from_email = "rajawali.puncakjaya@gmail.com"; 

 //         $config = Array(
 //                'protocol' => 'smtp',
 //                'smtp_host' => 'ssl://smtp.googlemail.com',
 //                'smtp_port' => 465,
 //                'smtp_user' => $from_email,
 //                'smtp_pass' => 'rajawali123',
 //                'mailtype'  => 'html', 
 //                'charset'   => 'iso-8859-1'
 //        );

 //            $this->load->library('email', $config);
 //            $this->email->set_newline("\r\n");   

 //         $this->email->from($from_email, 'Rajawli Puncak Jaya (Online shop)'); 
 //         $data = $this->db->query('SELECT * FROM tbl_user JOIN tbl_token ON tbl_token.id_user=tbl_user.id_user WHERE tbl_user.id_user="'.$id_user.'" AND tbl_token.token="'.$data_user.'"')->row();
 //         $this->email->to($data->username);
 //         $this->email->subject('Verivikasi Email'); 
 //         $this->email->message('<p class="m_-4861158879206746642email-text-small m_-4861158879206746642email-text-gray">
 //        <h3>Verivikasi Akun email anda :</h3>
 //  		<a style="background-color:#f64347;color:#ffffff;font-family:Helvetica,Arial,sans-serif;font-size:16px;line-height:22px;border-radius:32px;text-align:center;text-decoration:none;display:block;margin:0px 0px;padding:15px 20px;width:320px;font-weight:bold" href="'.base_url("ecommerce/verivikasi_proses/").$data_user.'" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mailer.hostinger.io/c/74282394/4bc3f18f77ff0a1f9cf1ee68acadf9a2?l%3Dhttps%253A%252F%252Fwww.000webhost.com%252Fmembers%252Fverify%252F6bfb058d16908a325dc25ed23c9db58cded5dc20&amp;source=gmail&amp;ust=1555532769827000&amp;usg=AFQjCNFckHrhqEVpMXB0tX85sN5l4xe98g">Verifikasi email</a>
	// 	</p>'); 

 //         //Send mail 
 //         if($this->email->send()){
 //                redirect('ecommerce/verivikasi');
 //         }else {
 //                $this->session->set_flashdata("notif","Email gagal dikirim."); 
 //                $this->load->view('home'); 
 //         } 
 //    }

      public function barang($id_barang){
      	$barang_view = $this->Model_ecommerce->getbarang($id_barang);
      	$this->load->view('ecommerce/header');
      	$this->load->view('ecommerce/barang_view',['barang'=>$barang_view]);
      	$this->load->view('ecommerce/footer');
      }

      public function tambah_keranjang($id_barang=0){
      	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==2){
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
				      		 $this->session->set_flashdata("pesan", '<script>
          						alert("Tambah keranjang gagal");
            					</script>');
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
					      		 $this->session->set_flashdata("pesan", '<script>
          						alert("Tambah keranjang gagal");
            					</script>');
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
			      		 $this->session->set_flashdata("pesan", '<script>
          						alert("Tambah keranjang gagal");
            					</script>');
			      		redirect('ecommerce/barang/'.$id_barang);
			      	}
		      }else{
		      	 $this->session->set_flashdata("pesan", '<script>
          						alert("Tambah keranjang gagal");
            					</script>');
		      	 redirect('ecommerce/barang/'.$id_barang);
		      }
	      	}
	    }else{
	    	redirect('ecommerce/login');
	    }
    }

    public function hapus_barang_keranjang($id){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==2){
    		$this->db->select('*');
    		$this->db->from('tbl_detail_transaksi');
    		$this->db->join('tbl_transaksi','tbl_transaksi.id_transaksi=tbl_detail_transaksi.id_transaksi');
    		$this->db->where('tbl_transaksi.id_user',$_SESSION['login']['id_user']);
    		$this->db->where('tbl_detail_transaksi.id_detail_transaksi',$id);
    		$cek_barang = $this->db->get()->num_rows();
    		if($cek_barang>0){
    			$where =array('id_detail_transaksi'=>$id);
    			$res = $this->db->delete('tbl_detail_transaksi',$where);
    			if($res>=1){
    					$this->session->set_flashdata("pesan", '<script>
          						alert("hapus Barang belanjaan berhasil");
            					</script>');
    				redirect('ecommerce/keranjang');
    			}else{
    					$this->session->set_flashdata("pesan", '<script>
          						alert("Maaf hapus barang belanjaan gagal");
            					</script>');
    				redirect('ecommerce/keranjang');
    			}	
    		}else{
    			$this->session->set_flashdata("pesan", '<script>
          						alert("Maaf anda tidak bisa menghapus selain barang yang anda pesan");
            					</script>');
    			redirect('ecommerce/keranjang');
    		} 
    	}else{
    		$this->load->view('error404');  
    	}
    }

    public function keranjang(){
	    if(isset($_SESSION['login']) AND $_SESSION['login']['role']==2){
	    	$cek_transaksi= $this->Model_ecommerce->getkeranjang('sum');  	
		    if($cek_transaksi>=1){
		      	$keranjang = $this->Model_ecommerce->getkeranjang('data');
		      	$this->load->view('ecommerce/header');
		      	$this->load->view('ecommerce/keranjang',['keranjang'=>$keranjang]);
		      	$this->load->view('ecommerce/footer');
		    }else{
		    		 $this->session->set_flashdata("pesan", '<script>
          						alert("Maaf Keranjang Kosong");
            					</script>');
		      	redirect('ecommerce');
		    }
	    }else{
	    	$this->load->view('error404');  
	    }
    }

    public function filter_barang(){
      	if($this->input->get('cari_barang')){
      	$nama = $this->input->get('cari_barang');
      	$id_kategori = $this->input->get('id_kategori');
      	$min =  $this->input->get('min');
      	$max = $this->input->get('max');
      	$barang = $this->Model_ecommerce->getfilterbarang($nama,$id_kategori,$min,$max);
      	$this->load->view('ecommerce/header',$nama);
      	$this->load->view('ecommerce/barang_filter',['barang'=>$barang]);
      	$this->load->view('ecommerce/footer');
      	}else{

      	}
      }

      public function proses_transaksi(){
      	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==2){
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
      			if($res>=1){
      				redirect('ecommerce/detail_transaksi/'.$transaksi->id_transaksi);
      			}else{
      				redirect('ecommerce/detail_transaksi/'.$transaksi->id_transaksi);
      			}
      		}else{

      		}
      	}else{
      		$this->load->view('error404');  
      	}

    }

    public function detail_transaksi($id_transaksi=0){
      	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==2){
	      	$barang = $this->Model_ecommerce->getbarang_transaksi($id_transaksi);
	      	$transaksi = $this->Model_ecommerce->getdatatransaksi($id_transaksi);
	      	$this->load->view('ecommerce/header');
	      	$this->load->view('ecommerce/detail_transaksi',['barang'=>$barang,'transaksi'=>$transaksi]);
	      	$this->load->view('ecommerce/footer');
	    }else{
	    	$this->load->view('error404');  
	    }
    }

    public function transaksi(){
      	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==2){
	      	$transaksi = $this->Model_ecommerce->gettransaksi();
	      	$this->load->view('ecommerce/header');
	      	$this->load->view('ecommerce/data_transaksi',['transaksi'=>$transaksi]);
	      	$this->load->view('ecommerce/footer');
	    }else{
	    	$this->load->view('error404');  
	    }
    }

    public function profile(){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==2){
	      	$transaksi = $this->Model_ecommerce->gettransaksi();
	      	$this->load->view('ecommerce/header');
	      	$this->load->view('ecommerce/profile');
	      	$this->load->view('ecommerce/footer');
	    }else{
	    	$this->load->view('error404');  
	    }

    }

    public function ubah_umum(){
      	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==2){
	      	$update_data = array(
	      		'nama' => $this->input->post('nama'),
	      		'telpon' => $this->input->post('telpon')
	      	);

	      	$where = array('id_user'=>$_SESSION['login']['id_user']);
	      	$res = $this->db->update('tbl_user',$update_data,$where);
	      	if($res>=1){
	      		$_SESSION['login']['nama']=$this->input->post('nama');
	      		$_SESSION['login']['telpon']=$this->input->post('telpon');
	      		redirect('ecommerce/profile');
	      	}else{
	      		redirect('ecommerce/profile');
	      	}
	    }else{
	    	$this->load->view('error404');  
	    }
    }

    public function ubah_alamat(){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==2){
	      	$update_data = array(
	      		'kota_id' => $this->input->post('kota'),
	      		'provinsi_id' => $this->input->post('provinsi'),
	      		'alamat' => $this->input->post('alamat')
	      	);
	      	$where = array('id_user'=>$_SESSION['login']['id_user']);
	      	$res = $this->db->update('tbl_user',$update_data,$where);
	      	if($res>=1){
	      		$_SESSION['login']['kota_id']=$this->input->post('kota');
	      		$_SESSION['login']['provinsi_id']=$this->input->post('provinsi');
	      		$_SESSION['login']['alamat']=$this->input->post('alamat');
	      		redirect('ecommerce/'.$this->input->post('url'));
	      	}else{
	      		redirect('ecommerce/'.$this->input->post('url'));
	      	}
	    }else{
	    	$this->load->view('error404');  
	    }
    }

    public function ubah_password(){
      	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==2){
	      $password_lama = md5($this->input->post('password_lama'));
	      if($password_lama==$_SESSION['login']['password']){
	      	$update_data = array(
	      		'password' => md5($this->input->post('password_baru'))
	      	);

	      	$where = array('id_user'=>$_SESSION['login']['id_user']);
	      	$res = $this->db->update('tbl_user',$update_data,$where);
	      	if($res>=1){
	      		redirect('ecommerce/profile');
	      	}else{
	      		redirect('ecommerce/profile');
	      	}
	      }else{
	      	redirect('ecommerce/profile');	
	      }
	    }else{
	    	//
	    }
    }

     public function update_status_transaksi_diterima($status,$id_transaksi){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==2){
    		if($status==5){
	    		$dataupdate = array(
	    			'status'=>$status
	    		);
	    		$where = array('id_transaksi'=>$id_transaksi);
	    		$res = $this->db->update('tbl_transaksi',$dataupdate,$where);
	    		if($res>=1){
	    			redirect('ecommerce/detail_transaksi/'.$id_transaksi);
	    		}else{
	    			redirect('ecommerce/detail_transaksi/'.$id_transaksi);
	    		}
    		}
    	}else{
    		$this->load->view('error404');
    	}
    }


    //batas controler web dan admin

    public function admin_dashboard(){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
    		$sum_data = $this->Model_ecommerce->getlaporan_barang_sum(date('Y-m'));
	    	$this->load->view('ecommerce/admin/header');
	    	$this->load->view('ecommerce/admin/dashboard',['sum_data'=>$sum_data]);
	    	$this->load->view('ecommerce/admin/footer');
	    }else{
	    	///
    	}
    }

    public function admin_input_kategori(){
       	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
	    	$datainsert = array(
	    		'kategori'=>$this->input->post('kategori')
	    	);
	    	$res = $this->db->insert('tbl_kategori_barang',$datainsert);
	    	if($rse>=1){
	    		redirect('ecommerce/admin_dashboard');
	    	}else{
	    		redirect('ecommerce/admin_dashboard');
	    	}
	    }else{
	    	
	    }
    }

    public function admin_update_kategori($id_kategori=''){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
			$dataupdate = array(
				'kategori'=>$this->input->post('kategori')
			);
			$where = array('id_kategori'=>$id_kategori);
			$res = $this->db->update('tbl_kategori_barang',$dataupdate,$where);
			if($rse>=1){
				redirect('ecommerce/admin_dashboard');
			}else{
				redirect('ecommerce/admin_dashboard');
			}
    	}else{
    		$this->load->view('error404');  
    	}
    }

    public function admin_delete_kategori($id_kategori=''){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
	    	$where = array('id_kategori'=>$id_kategori);
	    	$res = $this->db->delete('tbl_kategori_barang',$where);
	    	if($rse>=1){
	    		redirect('ecommerce/admin_dashboard');
	    	}else{
	    		redirect('ecommerce/admin_dashboard');
	    	}
	    }else{
	    	$this->load->view('error404');  
	    }
    }

    public function admin_transaksi(){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
    		if($this->input->get('cetak')==1){
    			$d = 'sum(jumlah_beli) as jumlah,tbl_transaksi.waktu,tbl_transaksi.id_transaksi,nama,ongkir,total_bayar,sum(berat*jumlah_beli) as berat';
    			$this->db->select($d);
    			$this->db->from('tbl_transaksi');
    			$this->db->join('tbl_user','tbl_user.id_user=tbl_transaksi.id_user');
    			$this->db->join('tbl_detail_transaksi','tbl_detail_transaksi.id_transaksi=tbl_transaksi.id_transaksi');
    			$this->db->join('tbl_barang','tbl_barang.id_barang=tbl_detail_transaksi.id_barang');
    			$this->db->where('DATE_FORMAT(tbl_transaksi.waktu,"%Y-%m")=',$this->input->get('date'));
				$this->db->where('tbl_transaksi.status>=',3);
				$this->db->where('tbl_transaksi.status<=',5);
    			$this->db->group_by('tbl_detail_transaksi.id_transaksi');
    			$data = $this->db->get()->result();
    			$this->load->view('ecommerce/admin/cetak_laporan_transaksi',['data'=>$data]);
    		}elseif($this->input->get('export')==1){

    			$this->load->view('ecommerce/admin/export_excel_barang_keluar');
    		}else{
	    		$transaksi = $this->Model_ecommerce->gettransaksi_admin();
	    		$this->load->view('ecommerce/admin/header');
	    		$this->load->view('ecommerce/admin/transaksi',['transaksi'=>$transaksi]);
	    		$this->load->view('ecommerce/admin/footer');
    		}
    	}else{
    		$this->load->view('error404');
    	}
    }

    public function detail_transaksi_admin($id_transaksi){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
    		$transaksi = $this->Model_ecommerce->getdetail_transaksi_admin($id_transaksi);
			$this->load->view('ecommerce/admin/header');
	    	$this->load->view('ecommerce/admin/transaksi_detail',['transaksi'=>$transaksi]);
	    	$this->load->view('ecommerce/admin/footer');
	    }else{
	    	$this->load->view('error404');
	    }
    }

    public function update_status_transaksi($status,$id_transaksi){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
    		if($status==3){
	    		$data = $this->db->query("SELECT * FROM tbl_detail_transaksi WHERE id_transaksi='".$id_transaksi."'")->result();
	    		foreach ($data as $d) {
	    			$barang = $this->db->query("SELECT * FROM tbl_barang WHERE id_barang=".$d->id_barang."")->row();
	    			$stok = $barang->stok-$d->jumlah_beli;
	    			$data_update = array(
	    				'stok'=>$stok
	    			);
	    			$where = array('id_barang'=>$d->id_barang);
	    			$this->db->update('tbl_barang',$data_update,$where);
	    		}

	    		$dataupdate = array(
	    			'status'=>$status
	    		);

    		}elseif ($status==4) {
	    		$dataupdate = array(
	    			'status'=>$status,
	    			'no_resi'=>$this->input->post('resi')
	    		);
    		}
    		$where = array('id_transaksi'=>$id_transaksi);
    		$res = $this->db->update('tbl_transaksi',$dataupdate,$where);
    		if($res>=1){
    			redirect('ecommerce/detail_transaksi_admin/'.$id_transaksi);
    		}else{
    			redirect('ecommerce/detail_transaksi_admin/'.$id_transaksi);
    		}
    	}else{
    		$this->load->view('error404');
    	}
    }

    public function admin_barang(){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
	    	if($this->input->get('cetak')==1){
				$data = $this->Model_ecommerce->getlaporan_barang($this->input->get('date'));
	    		$data_sum = $this->Model_ecommerce->getlaporan_barang_sum($this->input->get('date'));	    			
	    		$this->load->view('ecommerce/admin/cetak_barang_keluar',['data'=>$data,'data_sum'=>$data_sum]);	
	    	}elseif($this->input->get('export')==1) {
	    	
    			$data = $this->Model_ecommerce->getlaporan_barang($this->input->get('date'));
    			$data_sum = $this->Model_ecommerce->getlaporan_barang_sum($this->input->get('date'));
    			$this->load->view('Ecommerce/admin/export_excel_barang_keluar',['data'=>$data,'data_sum'=>$data_sum]);
	    	}else{
		    	$barang = $this->Model_ecommerce->getbarang(0);
		    	$kategori = $this->Model_ecommerce->getkategori();
		    	$this->load->view('ecommerce/admin/header');
		    	$this->load->view('ecommerce/admin/barang',['barang'=>$barang,'kategori'=>$kategori]);
		    	$this->load->view('ecommerce/admin/footer');
	    	}
    	}else{
    		$this->load->view('error404');
    	}
    }

      public function admin_input_barang(){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
    		$this->load->library('upload');
		        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		        $config['upload_path'] = './assets/ecommerce/barang/'; //path folder
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		        $config['max_size'] = '500048';
		        $config['file_name'] = $nmfile; //nama yang terupload nantinya
		 
		        $this->upload->initialize($config);
		         
		        if(isset($_FILES['filefoto']['name']))
		        {
		            if ($this->upload->do_upload('filefoto'))
		            {

		                $gbr = $this->upload->data();
		               	$nama_barang = $this->input->post('nama_barang');;
			    		$id_kategori = $this->input->post('id_kategori');
			    		$harga_jual = $this->input->post('harga_jual');
			    		$harga_beli = $this->input->post('harga_beli');
			    		$stok = $this->input->post('stok');
			    		$deskripsi = $this->input->post('deskripsi');
			    		$berat = $this->input->post('berat');
					    $inputdata=array(
					    	'nama_barang'=>$nama_barang,
					    	'id_kategori'=>$id_kategori,
					    	'harga_jual'=>$harga_jual,
					    	'harga_beli'=>$harga_beli,
					    	'stok'=>$stok,
					    	'deskripsi'=>$deskripsi,
					    	'berat'=>$berat,
		                  	'gambar' =>$gbr['file_name']
		                );
		                $res = $this->db->insert('tbl_barang',$inputdata);
		                if($res>=1){
                             redirect('ecommerce/admin_barang');  
		                }else{

                            redirect('ecommerce/admin_barang');    
                        }}else{
			              redirect('ecommerce/admin_barang');  
		            }
		        }else{
		        	redirect('ecommerce/admin_barang');  
		        }

    	}else{
    		$this->load->view('error404');	
    	}
    }

	public function admin_ubah_barang_gambar($id_barang=''){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
    			$this->load->library('upload');
		        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		        $config['upload_path'] = './assets/ecommerce/barang/'; //path folder
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		        $config['max_size'] = '500048';
		        $config['file_name'] = $nmfile; //nama yang terupload nantinya
		 
		        $this->upload->initialize($config);
		         
		        if(isset($_FILES['filefoto']['name']))
		        {
		            if ($this->upload->do_upload('filefoto'))
		            {
		                $gbr = $this->upload->data();
		                $updatedata = array(
		                  'gambar' =>$gbr['file_name']
		                   );
		                $where = array('id_barang' => $id_barang);
		                $res = $this->db->update('tbl_barang',$updatedata,$where); //akses model untuk menyimpan ke database
		                if($res>=1){
		                   redirect('ecommerce/admin_barang');  
		                }else{
                          redirect('ecommerce/admin_barang');  
                        }}else{
		               redirect('ecommerce/admin_barang');  
		        }}else{
		        	redirect('ecommerce/admin_barang');  
		        }
    	}else{
            $this->load->view('error404');  
        }
    }


    public function admin_ubah_barang($id_barang=''){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
    		
		    $updatebarang=array(
		    	'nama_barang'=>$this->input->post('nama_barang'),
		    	'id_kategori'=>$this->input->post('id_kategori'),
		    	'harga_jual'=>$this->input->post('harga_jual'),
		    	'harga_beli'=>$this->input->post('harga_beli'),
		    	'stok'=>$this->input->post('stok'),
		    	'deskripsi'=>$this->input->post('deskripsi'),
		    	'berat'=>$this->input->post('berat')
		    );
		    $where = array('id_barang' => $id_barang);
            $res = $this->db->update('tbl_barang',$updatebarang,$where);
            if($res>=1){
            	redirect('ecommerce/admin_barang');  
            }else{
            	redirect('ecommerce/admin_barang');
        	}
    	}else{
    		$this->load->view('error404');	
    	}
    }


    public function admin_hapus_barang($id=''){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
	    	$where = array('id_barang' => $id);
		 	$res = $this->db->delete('tbl_barang',$where);
		 	if($res>=1){
                redirect('ecommerce/admin_barang');
		 	}else{
                redirect('ecommerce/admin_barang');
		 	}
    	}else{
    		$this->load->view('error404');	
    	}
    
	}

	  public function admin_input_carousel(){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
    		$this->load->library('upload');
		        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		        $config['upload_path'] = './assets/ecommerce/img/carosel'; //path folder
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		        $config['max_size'] = '500048';
		        $config['file_name'] = $nmfile; //nama yang terupload nantinya
		 
		        $this->upload->initialize($config);
		         
		        if(isset($_FILES['filefoto']['name']))
		        {
		            if ($this->upload->do_upload('filefoto'))
		            {

		                $gbr = $this->upload->data();
					    $inputdata=array(
					    	'judul'=>$this->input->post('judul'),
					    	'link'=>$this->input->post('link'),
					    	'deskripsi'=>$this->input->post('deskripsi'),
		                  	'gambar' =>$gbr['file_name']
		                );
		                $res = $this->db->insert('tbl_carousel',$inputdata);
		                if($res>=1){
                             redirect('ecommerce/admin_dashboard');  
		                }else{

                            redirect('ecommerce/admin_dashboard');    
                        }}else{
			              redirect('ecommerce/admin_dashboard');  
		            }
		        }else{
		        	redirect('ecommerce/admin_dashboard');  
		        }

    	}else{
    		$this->load->view('error404');	
    	}
    }

     public function admin_hapus_carousel($id=''){
    	if(isset($_SESSION['login']) AND $_SESSION['login']['role']==1){
	    	$where = array('id_carousel' => $id);
		 	$res = $this->db->delete('tbl_carousel',$where);
		 	if($res>=1){
                redirect('ecommerce/admin_dashboard');
		 	}else{
                redirect('ecommerce/admin_dashboard');
		 	}
    	}else{
    		$this->load->view('error404');	
    	}
    
	}

	public function admin_pembeli(){
		if($_SESSION['login']['role']=='1'){
			$pembeli = $this->Model_ecommerce->getpembeli();
			$this->load->view('ecommerce/admin/header');
			$this->load->view('ecommerce/admin/data_pembeli',['pembeli'=>$pembeli]);
			$this->load->view('ecommerce/admin/footer');
		}else{
			$this->load->view('error404');
		}
	}

	
	public function admin_hapus_pegawai($id_user){
		if($_SESSION['login']['role']=='1'){
			$where = array('id_user'=>$id_user);
	      	$res = $this->db->delete('tbl_user',$where);
          	if($res>=1){
               $this->session->set_flashdata("pesan", '<script>alert("Hapus pegawai Berhasil");</script>');
               redirect('ecommerce/admin_pembeli');
          	}else{
           		$this->session->set_flashdata("pesan", '<script> alert("Maaf Hapus Pegawai Gagal");</script>');
            	redirect('ecommerce/admin_pembeli');
          	} 
	    }else{
			redirect('landing');
		}
	}

	public function admin_profile(){
	    if($_SESSION['login']['role']==1){
		    $this->load->view('ecommerce/admin/header');
		    $this->load->view('ecommerce/admin/profile_admin');
		    $this->load->view('ecommerce/admin/footer');
	    }else{
	      redirect('landing');
	    }
  	}

   public function admin_update_password(){
    if($_SESSION['login']['role']==1){
    $password_lama=(md5($_POST['password_lama']));
      $password_baru=$_POST['password_baru'];
      $password_confrim=$_POST['password_confrim'];
      if($password_lama==$_SESSION['login']['password']){
      if($_POST['password_lama']!=$_POST['password_baru']){
      if($password_baru==$password_confrim ){
        $password=(md5($password_baru));
        $updatepass = array(
      'password' => $password,   
      );
      $where = array('id_user' => $_SESSION['login']['id_user']);
      $res = $this->Admin_model->update('tbl_user',$updatepass,$where);
      if($res>=1){
          $_SESSION['login']['password'] = $password;
         $this->session->set_flashdata("pesan", '<script>
          alert("Ubah Password Berhasil");
            </script>');
          redirect('ecommerce/admin_profile');
      }else{
          $this->session->set_flashdata("pesan", '<script>
          alert("Ubah Password Gagal");
            </script>');
          redirect('ecommerce/admin_profile');
      }
      }else{
      	$this->session->set_flashdata("pesan", '<script>
          alert("Konfirmasi Password tidak valid !");
            </script>');

          redirect('ecommerce/admin_profile');
      }
          }else{
          	$this->session->set_flashdata("pesan", '<script>
          alert("Password baru Tidak boleh sama dengan password Lama !");
            </script>');
          redirect('ecommerce/admin_profile');
  }
  }else{
  	 $this->session->set_flashdata("pesan", '<script>
          alert("Password Lama Yang Dimasukan Salah");
            </script>');
          redirect('ecommerce/admin_profile');
  }
    }else{
      redirect('landing');
    }
  } 


}