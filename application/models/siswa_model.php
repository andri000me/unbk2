<?php

class siswa_model extends CI_Model{

	public function datasiswa($nis){
		return $this->db->where('nis',$nis)->get('siswa');
	}

	public function soal($mapel, $batas){
		
		$this->db->select('soal.id_soal');
		$this->db->from('soal');
	
		$this->db->where('id_mapel',$mapel)->order_by("rand()")->limit($batas);
		return $this->db->get();
	}


	public function insert_ujian($data)
	{
		$this->db->insert('jawaban_siswa',$data);
	}

	public function select_id_jawaban($id_ujian)
	{
		return $this->db->query("select max(id) as id from jawaban_siswa where id_ujian=$id_ujian limit 1");
	}

	public function pil_jawaban($id_soal)
	{
		return $this->db->where('id_soal',$id_soal)->get('jawaban');
	}

	public function random_pilihan($id_ujian, $id_soal)
	{
		//$this
	}

}