<?php if(!defined('BASEPATH')) exit('No direct access allowed');

 	function __construct()
    {
        $this->load->library('session');
    }

    function cek_login(){
        $CI = & get_instance();
        $session = $CI->session->userdata('hak_akses');
        if(!empty($session) and $session =='siswa' or $session =='admin' or $session =='superadmin')
            redirect('modules/'.$session);
    }


    function cek_siswa(){
    	$CI = & get_instance();
        $session = $CI->session->userdata('hak_akses');
        if($session == '' or $session!='siswa')
            redirect(base_url('login?err=2'));

    }

    function cek_admin(){
    	$CI = & get_instance();
        $session = $CI->session->userdata('hak_akses');
        if($session == '' or $session!='admin')
            redirect(base_url('login?err=2'));

    }

	 function cek_superadmin(){
    	$CI = & get_instance();
        $session = $CI->session->userdata('hak_akses');
        if($session == '' or $session!='superadmin')
            redirect(base_url('login?err=2'));

    }
    
