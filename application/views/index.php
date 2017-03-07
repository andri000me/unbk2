<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<title>TryOut Online</title>
		<!--<link rel="stylesheet" href="css/style.css" />-->
		<link rel="icon" type="image/png" href="image/icon.png">
		<link rel="stylesheet" href="assets/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/material-design-iconic-font.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/custom.css" />
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</head>
	<body class="body">
		<div class="container konten">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="col-md-6 login">
					<h4 class="judul">Login Your Account</h4>
					<?php
						if(isset($_GET['err'])){
							if($_GET['err']==1)
								?>
							<p style="color:red">Username atau Password Salah</p>
					<?php } ?>

					 <form class="formnya" action="<?=base_url('login/autentivikasi')?>" method="post">
						  <div class="form-group">
							<input type="text" name="username" class="form-control input" placeholder="NISN"></input>
						  </div>
						  <div class="form-group">
							<input type="password" name="password" class="form-control input" id="pwd" placeholder="password">
						  </div>
						  <div class="checkbox">
							<label>Bantuan : <i>Lupa Password?</i></label>
						  </div>
						  <button type="submit" class="btn btn-primary btnnya">LOGIN</button>
					</form>
				</div>
				<div class="col-md-1 padding0">
					<div class="kayu"></div>
				</div>
				<div class="col-md-5 padding20">
					<img src="assets/image/tutwur.png" class="gbr" height="200px"/>
				</div>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-12 tengah">TryOut <b>UNDK Online</b> - Dinas Pendidikan<br>-2017-</div>
		</div>
	</body>
</html>