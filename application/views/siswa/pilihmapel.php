<div class="konten1">
<div class="col-md-2"></div>
			<div class="col-md-8 jud">
				<h3><b>Selamat Datang di TryOut UNBK Online Dinas Pendidikan Kota MEDAN</b></h3>
				<h3>Silahkan Pilih Mata Pelajaran</h3>
			</div>
			<div class="col-md-2"></div>
		
			<div class="col-md-12 container padding10">
				<div class="row">
				<?php foreach($mapel as $map){ 

					if($map['nama_mapel'] == 'Bahasa Indonesia' or $map['nama_mapel'] == 'Bahasa Inggris')
						$class = 'matpelbhs';
					else if($map['nama_mapel'] == 'Matematika')
						$class = 'matpelmate';
					else if($map['nama_mapel'] == 'Kimia' or $map['nama_mapel'] == 'Fisika' or $map['nama_mapel'] == 'Biologi')
						$class = 'matpelsain';
					
					?>
					<a href="<?=base_url('siswa/pilihsoal/'.$map['id_mapel'].'/'.$map['jlh_soal']) ?>"><div class="col-md-3 <?=$class?>">
						<img src="<?=base_url($map['gambar'])?>" height="120px" width="100px" style="float:left;margin-right:10px;" />
						<table class="tb">
							<tr>
								<td colspan="2"><b><?=$map['nama_mapel']?></b></td>
							</tr>
							<tr>
								<td><p>Jumlah soal </p></td> 
								<td><p> : <?=$map['jlh_soal']?> soal</p></td>
							</tr>
								<td><p>Waktu </p></td> 
								<td><p>: <?=$map['durasi']?> menit</p></td>
							</tr>
							</tr>
								<td><p>Status </p></td> 
								<td><p>: <?=$map['status']?></p></td>
							</tr>		
						</table>
					</div></a>
					<?php } ?>
					<!--
					<a href="#"><div class="col-md-3 matpelbhs">
						<img src="assets/image/bahasa_inggris.png" height="120px" width="100px" style="float:left;margin-right:10px;" />
						<table class="tb">
							<tr>
								<td colspan="2"><b>Bahasa Inggris</b></td>
							</tr>
							<tr>
								<td><p>Jumlah soal </p></td> 
								<td><p> : 60 soal</p></td>
							</tr>
								<td><p>Waktu </p></td> 
								<td><p>: 120 menit</p></td>
							</tr>	
						</table>
					</div></a>
					<a href="#"><div class="col-md-3 matpelmate">
						<img src="assets/image/matematika.png" height="120px" width="120px" style="float:left;margin-right:10px;" />
						<table class="tb">
							<tr>
								<td colspan="2"><b>Matematika</b></td>
							</tr>
							<tr>
								<td><p>Jumlah soal </p></td> 
								<td><p> : 60 soal</p></td>
							</tr>
								<td><p>Waktu </p></td> 
								<td><p>: 120 menit</p></td>
							</tr>	
						</table>
					</div></a>
					<a href="#"><div class="col-md-3 matpelsain">
						<img src="assets/image/kimia.png" height="120px" width="120px" style="float:left;margin-right:10px;" />
						<table class="tb">
							<tr>
								<td colspan="2"><b>Kimia</b></td>
							</tr>
							<tr>
								<td><p>Jumlah soal </p></td> 
								<td><p> : 60 soal</p></td>
							</tr>
								<td><p>Waktu </p></td> 
								<td><p>: 120 menit</p></td>
							</tr>	
						</table>
					</div></a>
					<a href="#"><div class="col-md-3 matpelsain">
						<img src="assets/image/fisika.png" height="120px" width="100px" style="float:left;margin-right:10px;" />
						<table class="tb">
							<tr>
								<td colspan="2"><b>Fisika</b></td>
							</tr>
							<tr>
								<td><p>Jumlah soal </p></td> 
								<td><p> : 60 soal</p></td>
							</tr>
								<td><p>Waktu </p></td> 
								<td><p>: 120 menit</p></td>
							</tr>	
						</table>
					</div></a>
					<a href="#"><div class="col-md-3 matpelsain">
						<img src="assets/image/microscope.png" height="120px" width="120px" style="float:left;margin-right:10px;" />
						<table class="tb">
							<tr>
								<td colspan="2"><b>Biologi</b></td>
							</tr>
							<tr>
								<td><p>Jumlah soal </p></td> 
								<td><p> : 60 soal</p></td>
							</tr>
								<td><p>Waktu </p></td> 
								<td><p>: 120 menit</p></td>
							</tr>	
						</table>
					</div></a>
					-->
				</div>
			</div>
</div>