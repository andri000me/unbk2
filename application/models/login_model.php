<?php

class login_model extends CI_Model{

	public function coba_login($us, $pass)
	{
		return $this->db->where('username',$us)->where('password',$pass)->get('user');
	}

}