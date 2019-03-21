<?php 
class Model_Login extends CI_Model {
	
	public function verivikasi_login() {
		$username = $this->input->POST('username', TRUE);
		$password = md5($this->input->POST('password', TRUE));
		$query = $this->db->query("SELECT * from tbl_user where username= '$username' and password= '$password' LIMIT 1");
		if($query->num_rows() == 0){
			return false;
		}else{
			$data = $query->row();
			$_SESSION['login'] = array('id_user'=>$data->id_user,'username'=>$data->username,'nama_user'=>$data->nama_user,"password"=>$data->password,"status"=>$data->status,"foto"=>$data->foto,"telpon"=>$data->telpon);
			return $_SESSION['login'];
		}
	}
}