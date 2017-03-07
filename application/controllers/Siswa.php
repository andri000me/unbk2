<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	private $nis;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
		$this->load->helper(array('url','akses'),'',true);
		$this->load->model('siswa_model','',true);
		$this->nis = $this->session->userdata('username');
		cek_siswa();
	}

	public function index()
	{
		//echo "siswa";
		//echo "<a href=".base_url('modules/siswa/pilihsoal/1').">mulai ujian</a>";
		$nis = $this->nis;
		$data = $this->siswa_model->datasiswa($nis)->row_array();
		echo "<a href=".base_url('logout').">logout</a>";
		$this->load->view('template/header',$data);
		$this->load->view('siswa/home');
		$this->load->view('template/footer');
	}

	public function pilihsoal($mapel)
	{
		$batas = 1;
		$soal = $this->siswa_model->soal($mapel, $batas)->result_array();
		$id_ujian = 1;
		var_dump($soal);
		echo "<br><br>";
		foreach($soal as $a){
			$data = array(
						'id_soal' => $a['id_soal'],
						'id_ujian' => $id_ujian,
						'jawab_siswa' => '',
					);

			//$this->siswa_model->insert_ujian($data);

			$id_jaw = $this->siswa_model->select_id_jawaban($id_ujian)->row_array();

			$pil_jawban = $this->siswa_model->pil_jawaban($a['id_soal'])->result_array();
			//var_dump($pil_jawban);
			$numbers = range('A','B');
			shuffle($numbers);
			

			$i=0;
			foreach ($pil_jawban as $pil) { 
				$data = array(
					'id_jawaban_siswa' => $id_jaw['id'],
					'pilihan' => $numbers[$i],
					'id_jawaban' =>$pil['id_jawaban']
				);	
				$i++;
				var_dump($data);
					echo "<br>";
			}
			
		
		}


		//redirect(base_url('modules/siswa/ujian'));
	}

	public function ujian()
	{

	}	
}
