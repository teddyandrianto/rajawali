<?php 
class Model_ecommerce extends CI_Model {

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

	public function getfilterbarang($nama,$min=0,$max=0){
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->like('nama_barang',$nama);
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
		$query = $this->db->get();
		return $query->result();
	}


}