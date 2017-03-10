<div id="lanjut">
<h2 class="padding-head">SOAL <?=$soal['nomor']?></h2>
			<input type="hidden" name='no' value="<?=$soal['id']?>">
			<p class="padding-left"><?=$soal['isi_soal']?></p>
			<p><input type="hidden" name='id' value="<?=$soal['id']?>"> </input></p>
				<div class="padding-left">
				<?php foreach($jawab as $j) { ?>
				<p><input type="radio" name='jawab' value="<?=$j['jaw']?>"> <?=$j['jaw'].". ".$j['pil']?></input></p>
				<?php } ?>
				</div>
			<div class="time"><p><?=$soal['durasi_soal']?></p>
			</div>
	<div class="the-action">
				<?php if($akhir['no_akhir']!=1){ ?>
 				<a href="<?=base_url('siswa/soal_ajax')?>" id="ne"><button  class="btn btn-primary backto" type="submit" id='tombol'>NEXT</button></a>
        <?php } ?>
        <?php if($cek['cek']<=1){?>
          <a href="<?=base_url('siswa/hitung_hasil') ?>"<button class="btn btn-success finish">FINISH</button>
        <?php } ?>
			</div>
			
</div>
<script>
$(document).ready(function(){
  $('#ne').on('click',function(){

  	var a = $('input[name="jawab"]:checked').val();
  	var b = $('input[name="no"]').val();
   
      var url =  $(this).attr('href')+"?id="+b+"&jawab="+a;
     
      $('div#ajax_soal').load(url);
      return false;
  });

});
</script>