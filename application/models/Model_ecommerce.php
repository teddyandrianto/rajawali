<?php 
class Model_ecommerce extends CI_Model {
	public function verivikasi_login($email,$password) {
	
		$query = $this->db->query("SELECT * from tbl_user where username= '$email' and password= '$password' LIMIT 1");
		if($query->num_rows() == 0){
			return false;
		}else{
			$data = $query->row();
			$_SESSION['login'] = array('id_user'=>$data->id_user,'username'=>$data->username,'nama'=>$data->nama,"password"=>$data->password,"role"=>$data->status,"telpon"=>$data->telpon,"alamat"=>$data->alamat,"provinsi_id"=>$data->provinsi_id,"kota_id"=>$data->kota_id);
			return true;
		}
	}
	
	public function getbarang($value=0){
		
		if($value>=1){
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->where('id_barang',$value);
		$this->db->order_by("id_barang", "asc");
		$query = $this->db->get();
		return $query->row();
		}else{
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_kategori_barang','tbl_kategori_barang.id_kategori=tbl_barang.id_kategori');
		$this->db->order_by("id_barang", "asc");
		$query = $this->db->get();

		return $query->result();
		}
		
	}

	public function getkeranjang($value){
		if($value=='sum_harga'){
			return $this->db->query("SELECT SUM(tbl_detail_transaksi.harga_jual*tbl_detail_transaksi.jumlah_beli) as harga_tot FROM tbl_detail_transaksi 
				JOIN tbl_transaksi ON tbl_transaksi.id_transaksi=tbl_detail_transaksi.id_transaksi
				WHERE tbl_transaksi.status=1 AND tbl_transaksi.id_user=".$_SESSION['login']['id_user']."
				")->row();
		}else if($value=="berat"){
			return $this->db->query("SELECT SUM(`tbl_barang`.`berat`*`tbl_detail_transaksi`.`jumlah_beli`) AS `berat_tot` FROM tbl_detail_transaksi 
				JOIN tbl_barang ON tbl_barang.id_barang=tbl_detail_transaksi.id_barang
				JOIN tbl_transaksi ON tbl_transaksi.id_transaksi=tbl_detail_transaksi.id_transaksi
				WHERE tbl_transaksi.status=1 AND tbl_transaksi.id_user=".$_SESSION['login']['id_user']."
				")->row();
		}else{
			$this->db->select('*');
		 }
			$this->db->from('tbl_detail_transaksi');
			$this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_detail_transaksi.id_barang');
			$this->db->join('tbl_transaksi', 'tbl_transaksi.id_transaksi = tbl_detail_transaksi.id_transaksi');
			$this->db->where('tbl_transaksi.id_user',$_SESSION["login"]["id_user"]);
			$this->db->where('tbl_transaksi.status',1);
			$this->db->order_by("tbl_detail_transaksi.id_detail_transaksi", "desc");
			$query = $this->db->get();
		if($value=='data'){
			return $query->result();
		}else if($value=='sum'){
			return $query->num_rows();
		}
	}

	public function getfilterbarang($nama='',$id_kategori='',$min=0,$max=0){
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->like('nama_barang',$nama);
		$this->db->like('id_barang',$id_kategori);
		if($max>0 AND $min<=$max){
		$this->db->where('harga_jual>=',$min);
		$this->db->where('harga_jual<=',$max);
		}
		$this->db->order_by("id_barang", "desc");
		$query = $this->db->get();

		return $query->result();
	}

	public function getbarang_transaksi($id_transaksi){
		$this->db->select('*');
		$this->db->from('tbl_detail_transaksi');
		$this->db->JOIN('tbl_barang','tbl_barang.id_barang=tbl_detail_transaksi.id_barang');
		$this->db->where('id_transaksi',$id_transaksi);
		$query = $this->db->get();
		return $query->result();
	}

	public function getdatatransaksi($id_transaksi){
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->where('id_user',$_SESSION['login']['id_user']);

		$query = $this->db->get();
		return $query->row();
	}

	public function gettransaksi(){
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('status>=','2');
		$this->db->where('id_user',$_SESSION['login']['id_user']);
		$this->db->order_by('waktu','desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function getkategori(){
		return $this->db->get('tbl_kategori_barang')->result();
	}

	public function getcarousel(){
		return $this->db->get('tbl_carousel')->result();
	}

	public function gettransaksi_admin(){
		$this->db->select('tbl_transaksi.id_transaksi as id_transaksi,nama,pengiriman,nama_bank,tbl_transaksi.status as status');
		$this->db->from('tbl_transaksi');
		$this->db->join('tbl_user','tbl_user.id_user=tbl_transaksi.id_user');
		$this->db->join('tbl_bank','tbl_bank.id_bank=tbl_transaksi.bank','left');
		$this->db->where('tbl_transaksi.status>=',2);
		$this->db->order_by('waktu','desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function gettotal_bayar_admin($id_transaksi){
		$this->db->select('SUM(tbl_detail_transaksi.harga_jual*tbl_detail_transaksi.jumlah_beli) as harga_tot');
		$this->db->from('tbl_transaksi');
		$this->db->join('tbl_detail_transaksi','tbl_detail_transaksi.id_transaksi=tbl_transaksi.id_transaksi');
		$this->db->where('tbl_transaksi.id_transaksi',$id_transaksi);
		$this->db->order_by('tbl_transaksi.waktu','desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function getdetail_transaksi_admin($transaksi){
		$this->db->select('tbl_transaksi.id_transaksi as id_transaksi,nama,pengiriman,nama_bank,tbl_transaksi.status as status,total_bayar,bank,pengiriman,ongkir,alamat,kota_id,provinsi_id,tbl_transaksi.no_resi');
		$this->db->from('tbl_transaksi');
		$this->db->join('tbl_user','tbl_user.id_user=tbl_transaksi.id_user');
		$this->db->join('tbl_bank','tbl_bank.id_bank=tbl_transaksi.bank','left');
		$this->db->where('tbl_transaksi.id_transaksi',$transaksi);
		$this->db->order_by('waktu','desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function getbarang_transaksi_admin($id_transaksi){
			$this->db->select('tbl_detail_transaksi.harga_jual as harga_jual,gambar,nama_barang,berat,jumlah_beli');
			$this->db->from('tbl_detail_transaksi');
			$this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_detail_transaksi.id_barang');
			$this->db->join('tbl_transaksi', 'tbl_transaksi.id_transaksi = tbl_detail_transaksi.id_transaksi');
			$this->db->where('tbl_transaksi.id_transaksi',$id_transaksi);
			$this->db->order_by("tbl_detail_transaksi.id_detail_transaksi", "desc");
			return $this->db->get()->result();
	}


}