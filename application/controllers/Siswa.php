<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	private $nis, $kategori,$pofil;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
		$this->load->helper(array('url','akses'),'',true);
		$this->load->model('siswa_model','',true);
		$this->nis = $this->session->userdata('username');
		$nis = $this->nis;
		$this->profil = $this->siswa_model->datasiswa($nis)->row_array();
		cek_siswa();
	}

	public function index(){
		$ujian['cek'] = 0;
		$data = $this->siswa_model->cek_ujian($this->nis)->row_array();
		if(count($data)){
			$ujian['cek']=1;
			$this->session->set_userdata('id_ujian',$data['id_ujian']); //masukkan id ujian yg lama
		}
		echo "<a href=".base_url('logout').">logout</a>";
		$this->load->view('template/header',$this->profil);
		$this->load->view('siswa/home',$ujian);
		$this->load->view('template/footer');
	}

	public function mulaiujian(){ //method jika mulai ujian yg baru
		$data = array(
			'nis' => $this->nis
			);
		$id_ujian = $this->siswa_model->input_ujian($data)->row_array();
		$this->session->set_userdata('id_ujian',$id_ujian['id_ujian']); //masukkan id ujian yg baru

		$kategori = $this->profil['id_kategori'];
		$mapel = $this->siswa_model->get_mapel($kategori)->result_array();

		foreach($mapel as $map){
		$data = array(
			'id_ujian' => $id_ujian['id_ujian'],
			'id_mapel' => $map['id_mapel'],
			'status' => 'belum'
			);
		$this->siswa_model->insert_status_ujian($data);
	}
		redirect('siswa/mapel');
	}

	public function mapel()
	{
		
		$nis = $this->nis;
		$id_ujian = $this->session->userdata('id_ujian');
		$data = $this->siswa_model->datasiswa($nis)->row_array();
		$kategori = $data['id_kategori'];
		$konten['mapel'] = $this->siswa_model->get_mapel($kategori,$id_ujian)->result_array();
		echo "<a href=".base_url('logout').">logout</a>";
		$this->load->view('template/header',$data);
		$this->load->view('siswa/pilihmapel',$konten);
		$this->load->view('template/footer');
	}

	public function pilihsoal($mapel, $batas)
	{
		$id_ujian = $this->session->userdata('id_ujian');
		$this->
		//random dan insert soal
		$soal = $this->siswa_model->soal($mapel, $batas)->result_array();
		
		foreach($soal as $a){
			$data = array(
						'id_soal' => $a['id_soal'],
						'id_ujian' => $id_ujian,
						'jawab_siswa' => '',
					);
			$this->siswa_model->insert_ujian($data);

			//random jawaban per soal
			$id_jaw = $this->siswa_model->select_id_jawaban($id_ujian)->row_array();
			$pil_jawban = $this->siswa_model->pil_jawaban($a['id_soal'])->result_array();
			//var_dump($pil_jawban);
			$numbers = range('A','E');
			shuffle($numbers);

			$i=0;
			foreach ($pil_jawban as $pil) { 
				$data = array(
					'id_jawaban_siswa' => $id_jaw['id'],
					'pilihan' => $numbers[$i],
					'id_jawaban' =>$pil['id_jawaban']
				);	
				$i++;
		
				$this->siswa_model->insert_data('pilihan_jawaban_ujian',$data);
			}
		
		
		}

		redirect('siswa/ujian');
	}

	public function semua_soal(){
		$no_ujian = $this->session->userdata('id_ujian');
		$soal = $this->siswa_model->soal_ujian($no_ujian);
	}

	public function ujian($no=0)
	{
		$data['no'] = $no;
		
		echo "<a href=".base_url('logout').">logout</a>";
		$this->load->view('template/header',$this->profil);
		$this->load->view('siswa/soal',$data);
		$this->load->view('template/footer');
	}	
}
