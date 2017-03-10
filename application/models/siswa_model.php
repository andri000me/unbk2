<?php

class siswa_model extends CI_Model{

	public function insert_data($table,$data){
		$this->db->insert($table,$data);
	}

	public function get_data($table,$id,$val){
		return $this->db->where($id,$val)->get($table);
	}

	public function update_data($table,$id,$val,$data){
		$this->db->where($id,$val);
		$this->db->update($table,$data);
	}

	public function update_mapel($mapel,$id_ujian,$data){
		$this->db->where('id_mapel',$mapel)->where('id_ujian',$id_ujian);
		$this->db->update('mapel_ujian_siswa',$data);
	}

	public function datasiswa($nis){
		return $this->db->where('nis',$nis)->get('siswa');
	}

	public function cek_ujian($nis){
		return $this->db->query("select max(id_ujian) as id_ujian from mapel_ujian_siswa where id_ujian in(select id_ujian from ujian_siswa where nis=$nis) and status='berlangsung' or status='belum'");
	}

	public function status_mapel($id_ujian,$mapel){
		return $this->db->where('id_ujian',$id_ujian)->where('id_mapel',$mapel)->where('status','berlangsung')->or_where('status','selesai')->get('mapel_ujian_siswa');
	}
	public function input_ujian($data){
		$this->db->insert('ujian_siswa',$data);
		$nis = $data['nis'];
		return $this->db->query("select max(id_ujian) as id_ujian from ujian_siswa where nis=$nis");
	}

	public function insert_status_ujian($data){
		$this->db->insert('mapel_ujian_siswa',$data);
	}

	public function get_mapel($kat,$id_ujian){
		return $this->db->query("select * from mapel a join mapel_ujian_siswa b on a.id_mapel=b.id_mapel where id_ujian=$id_ujian ");
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

	public function select_id_jawaban($id)
	{
		return $this->db->query("select max(id) as id from jawaban_siswa where id_mapel_ujian=$id limit 1");
	}

	public function pil_jawaban($id_soal)
	{
		return $this->db->where('id_soal',$id_soal)->get('jawaban');
	}

	public function id_mapel_siswa($mapel,$id_ujian){
		return $this->db->where('id_mapel',$mapel)->where('id_ujian',$id_ujian)->get('mapel_ujian_siswa');
	}

	public function get_soal($id){
		return $this->db->query("SELECT id, isi_soal, durasi_soal,nomor from soal a join jawaban_siswa b on a.id_soal=b.id_soal where id_mapel_ujian=$id and jawab_siswa='' limit 1");
	}

	public function get_sisa_soal($id,$no){
		return $this->db->query("SELECT id, isi_soal, durasi_soal,nomor from soal a join jawaban_siswa b on a.id_soal=b.id_soal where id_mapel_ujian=$id and jawab_siswa='-' limit 1 offset $no");
	}

	public function get_jawab($id){
		return $this->db->query("select a.pilihan as pil, b.pilihan as jaw from jawaban a join pilihan_jawaban_ujian b on a.id_jawaban=b.id_jawaban where id_jawaban_siswa=$id order by b.pilihan");
	}

	public function cek_soal_kosong($id){
		return $this->db->query("select count(*) as cek from jawaban_siswa where id_mapel_ujian=$id and jawab_siswa=''");
	}

	public function nomor_terakhir($id){
		return $this->db->query("select count(jawab_siswa) as no_akhir from jawaban_siswa where jawab_siswa='' or jawab_siswa='-' and id_mapel_ujian=$id");
	}

	public function sisa_soal($id){
		return $this->db->query("select count(*) as sisa from jawaban_siswa where jawab_siswa='-' and id_mapel_ujian=$id");
	}

	public function last_soal($id){
		return $this->db->query("SELECT id, isi_soal, durasi_soal,nomor from soal a join jawaban_siswa b on a.id_soal=b.id_soal where id_mapel_ujian=$id and jawab_siswa='-' limit 1");
	}

	public function penilaian_ujian($id){
		return $this->db->query("select count(*) as jumlah from jawaban a join pilihan_jawaban_ujian b on a.id_jawaban = b.id_jawaban join jawaban_siswa c on b.id_jawaban_siswa = c.id where a.jawab='T' and b.pilihan=c.jawab_siswa and c.id_mapel_ujian=$id");
	}
}