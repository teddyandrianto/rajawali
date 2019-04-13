<?php 
class Model_login extends CI_Model {
	
	public function verivikasi_login() {
		$email = $this->input->POST('email', TRUE);
		$password = md5($this->input->POST('password', TRUE));
		$query = $this->db->query("SELECT * from tbl_user where username= '$email' and password= '$password' LIMIT 1");
		if($query->num_rows() == 0){
			return false;
		}else{
			$data = $query->row();
			$_SESSION['login'] = array('id_user'=>$data->id_user,'username'=>$data->username,'nama'=>$data->nama,"password"=>$data->password,"role"=>$data->status,"telpon"=>$data->telpon,"alamat"=>$data->alamat,"provinsi_id"=>$data->provinsi_id,"kota_id"=>$data->kota_id);
			return true;
		}
	}
}