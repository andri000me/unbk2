<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('url','akses'),'',true);
		$this->load->model('login_model','',true);
		cek_siswa();
	}

	public function index()
	{
		$this->session->set_userdata('username','');
		$this->session->set_userdata('hak_akses','');

		redirect('login');
	}

	
	
}