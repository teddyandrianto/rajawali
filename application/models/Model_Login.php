<?php 
class Model_login extends CI_Model {
	
	public function verivikasi_login() {
		$username = $this->input->POST('username', TRUE);
		$password = md5($this->input->POST('password', TRUE));
		$query = $this->db->query("SELECT * from tbl_user where username= '$username' and password= '$password' LIMIT 1");
		if($query->num_rows() == 0){
			return false;
		}else{
			$data = $query->row();
			$_SESSION['login'] = array('id_user'=>$data->id_user,'username'=>$data->username,'nama'=>$data->nama,"password"=>$data->password,"role"=>$data->role,"foto"=>$data->foto,"no_telpon"=>$data->no_telpon,"alamat"=>$data->alamat);
			return true;
		}
	}
}