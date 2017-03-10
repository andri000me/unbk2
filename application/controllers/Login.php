<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('url','akses'),'',true);
		$this->load->model('login_model','',true);
		cek_login();
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function autentivikasi()
	{
		$username = $this->input->post('username',true);
		$password = $this->input->post('password',true);

		$data = $this->login_model->coba_login($username,$password)->row_array();

		if(count($data)>0){
			$this->session->set_userdata('username',$username);
			$this->session->set_userdata('hak_akses',$data['hak_akses']);

			if($data['hak_akses']=='siswa')
				redirect('siswa');
			else if($data['hak_akses']=='admin')
				redirect('admin');
			else if($data['hak_akses']=='superadmin')
				redirect('superadmin');
		}
		else
			redirect('login?err=1');
	}

	
}
