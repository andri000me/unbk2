<div class="continer fill">
	
	<div id="ajax_soal">
		    Mata Pelajaran : <?=$mapel['nama_mapel']?><br>
        Waktu : <?=$mapel['durasi']?><br>
        Jumlah Soal : <?=$mapel['jlh_soal']?>

			</div>
			<div class="the-action">
        <?php if($cek['cek']==$mapel['jlh_soal']){ ?>
 				<a href="<?=base_url('siswa/soal_ajax')?>" id="ne"><button  class="btn btn-primary backto" type="submit" id='tombol'>MULAI</button></a>
        <?php }else{ ?>
          <a href="<?=base_url('siswa/soal_ajax')?>" id="ne"><button  class="btn btn-primary backto" type="submit" id='tombol'>LANJUTKAN</button></a>
        <?php } ?>
			</div>

</div>

<script>
$(document).ready(function(){
  $('#ne').on('click',function(){
    
      var url =  $(this).attr('href');
      $(this).empty();
      
      $('div#ajax_soal').load(url);
      return false;
  });

});
</script>
