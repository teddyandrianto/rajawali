<?php 
class Model_ecommerce extends CI_Model {

	public function getprovinsi($value=0){
		if($value>=1){
			$this->db->where('id_provinsi',$value);
		$query = $this->db->get('tbl_kota');
		}else{
		$query = $this->db->get('tbl_provinsi');
		}
		return $query->result();
	}

}