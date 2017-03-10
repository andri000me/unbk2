<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	private $nis, $kategori,$pofil;
	private  $no;
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
		
		if($data['id_ujian']){
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
		$mapel = $this->siswa_model->get_data('mapel','id_kategori',$kategori)->result_array();
		//var_dump($mapel);
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
		$this->session->set_userdata('sisa_soal',0);
		$this->session->set_userdata('id_mapel',$mapel);
		$id_ujian = $this->session->userdata('id_ujian');
		$status_ujian = $this->siswa_model->status_mapel($id_ujian,$mapel)->row_array();
		$id_mapel_siswa = $this->siswa_model->id_mapel_siswa($mapel,$id_ujian)->row_array();
		$this->session->set_userdata('id_mapel_siswa',$id_mapel_siswa['id']);
		
		if(!$status_ujian){
			$data = array(
				'status' => 'berlangsung'
				);
			$this->siswa_model->update_mapel($mapel,$id_ujian,$data);
			//random dan insert soal
			$soal = $this->siswa_model->soal($mapel, $batas)->result_array();
			$j=1;
			foreach($soal as $a){
				$data = array(
							'id_soal' => $a['id_soal'],
							'id_mapel_ujian' => $id_mapel_siswa['id'],
							'nomor' => $j,
							'jawab_siswa' => '',
						);
				$this->siswa_model->insert_ujian($data);
				$j++;
				//random jawaban per soal
				$id_jaw = $this->siswa_model->select_id_jawaban($id_mapel_siswa['id'])->row_array();
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
		}
		
		redirect('siswa/ujian');
	}

	public function semua_soal(){
		$no_ujian = $this->session->userdata('id_ujian');
		$soal = $this->siswa_model->soal_ujian($no_ujian);
	}

	public function ujian()
	{
		$id_mapel = $this->session->userdata('id_mapel');
		$data['mapel'] = $this->siswa_model->get_data('mapel','id_mapel',$id_mapel)->row_array();
		$id_maps = $this->session->userdata('id_mapel_siswa');
		
		$data['cek'] = $this->siswa_model->cek_soal_kosong($id_maps)->row_array();		
		//$this->load->view('siswa/ajax_soal',$data);
		
		echo "<a href=".base_url('logout').">logout</a>";
		$this->load->view('template/header',$this->profil);
		$this->load->view('siswa/soal',$data);
		$this->load->view('template/footer');
	}

	public function soal_ajax(){

			$no_soal='';
			$jawab="";
			
			if(isset($_GET['jawab']))
			if($_GET['jawab'] == 'undefined')
				$jawab = "-";
			else
				$jawab = $_GET['jawab'];

		if(isset($_GET['id']))
		if(isset($_GET['id'])){
			$no_soal = $_GET['id'];
			$dat = array(
				'jawab_siswa' => $jawab
				);
			$this->siswa_model->update_data('jawaban_siswa','id',$no_soal,$dat);
		}

		$sisa = $this->session->userdata('sisa_soal');
		$id_mapel = $this->session->userdata('id_mapel');
		$data['mapel'] = $this->siswa_model->get_data('mapel','id_mapel',$id_mapel)->row_array();

		$id_maps = $this->session->userdata('id_mapel_siswa');
		$data['soal'] = $this->siswa_model->get_soal($id_maps)->row_array();
		$sisa2 = $this->siswa_model->sisa_soal($id_maps)->row_array();

		if(!$data['soal']){
			if($sisa >= $sisa2['sisa'])
				$sisa =0;

				$data['soal'] = $this->siswa_model->get_sisa_soal($id_maps,$sisa)->row_array();

				$sisa++;
			
		
			
			$this->session->set_userdata('sisa_soal',$sisa);
		}

		$id_jaw = $data['soal']['id'];
		$data['jawab'] = $this->siswa_model->get_jawab($id_jaw)->result_array();	
		$data['akhir'] = $this->siswa_model->nomor_terakhir($id_maps)->row_array();
		$data['cek'] = $this->siswa_model->cek_soal_kosong($id_maps)->row_array();
		
		
		$this->load->view('siswa/ajax_soal',$data);
	}

	public function hitung_hasil(){
		$id_maps = $this->session->userdata('id_mapel_siswa');
		echo $id_maps;
		$id_ujian = $this->session->userdata('id_ujian');
		$nilai = $this->siswa_model->penilaian_ujian($id_maps)->row_array();
		var_dump($nilai);
		$data = array(
				'id_ujian' => $id_ujian,
				'id_mapel_ujian' => $id_maps,
				'nilai' => $nilai['jumlah']
			);
		$this->siswa_model->insert_data('hasil_ujian',$data);

		$data  =array(
			'status' =>selesai
			);
		$this->siswa_model->update_data('mapel_ujian_siswa','id',$id_maps,$data);
		redirect('siswa/ujian_selesai');
	}

	public function ujian_selesai(){
		
		echo "<a href=".base_url('logout').">logout</a>";
		$this->load->view('template/header',$this->profil);
		$this->load->view('siswa/finish.php');
		$this->load->view('template/footer');
	}	
}
