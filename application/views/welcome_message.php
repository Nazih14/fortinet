<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Selamat Datang</title>

	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Roboto:300);

		.login-page {
			width: 360px;
			padding: 0 0 0 0;
			margin: auto auto auto auto;
		}
		.form {
			position: relative;
			z-index: 1;
			background: #FFFFFF;
			width: 360px;
			margin: 50px auto 50px auto;
			padding: 30px;
			text-align: center;
			/*box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.5), 0 5px 5px 0 rgba(0, 0, 0, 0.24);*/
			box-shadow: 10px 10px 5px 5px rgba(5,5,5,5);
		}
		.form input {
			font-family: "Roboto", sans-serif;
			outline: 0;
			background: #f2f2f2;
			width: 100%;
			border: 0;
			margin: 0 0 15px ;
			padding: 15px;
			box-sizing: border-box;
			font-size: 14px;
		}
		.form input[type="submit"] {
			font-family: "Roboto", sans-serif;
			text-transform: uppercase;
			outline: 0;
			background: #4CAF50;
			width: 100%;
			border: 0;
			padding: 15px;
			color: #FFFFFF;
			font-size: 14px;
			-webkit-transition: all 0.3 ease;
			transition: all 0.3 ease;
			cursor: pointer;
		}
		.form button:hover,.form button:active,.form button:focus {
			background: #43A047;
		}
		.form .message {
			margin: 15px 0 0;
			color: #b3b3b3;
			font-size: 12px;
		}
		.form .message a {
			color: #4CAF50;
			text-decoration: none;
		}
		.form .register-form {
			display: none;
		}
		.container {
			position: relative;
			z-index: 1;
			max-width: 360px;
			margin: 0 auto;
		}
		.container:before, .container:after {
			content: "";
			display: block;
			clear: both;
		}
		.container .info {
			margin: 50px auto;
			text-align: center;
		}
		.container .info h1 {
			margin: 0 0 15px;
			padding: 0;
			font-size: 36px;
			font-weight: 300;
			color: #1a1a1a;
		}
		.container .info span {
			color: #4d4d4d;
			font-size: 12px;
		}
		.container .info span a {
			color: #000000;
			text-decoration: none;
		}
		.container .info span .fa {
			color: #EF3B3A;
		}
		body {
			background: -webkit-linear-gradient(right, #76b852, #8DC26F);
			background: -moz-linear-gradient(right, #76b852, #8DC26F);
			background: -o-linear-gradient(right, #76b852, #8DC26F);
			background: linear-gradient(to left, #76b852, #8DC26F);
			font-family: "Roboto", sans-serif;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;      
		}
		body{
			background: linear-gradient(to bottom, #001133 0%, #001133 0%, #003380 100%);
		}
	</style>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>" crossorigin="anonymous">
</head>
<body>
	<div class="login-page">
		<div class="container">
			<div class="form">
				<form name="ubah" class="register-form" action="<?= base_url('index.php/welcome/update')?>" method="post" onsubmit="return periksa2()">
					<h4>Form Ubah Password</h4><br>
					<input type="text" name="username" placeholder="E-mail" required="" />
					<input type="password" name="password1" placeholder="Password Lama" required="" />
					<span style="color: red;font-size: 11px" id="pass2"></span>
					<input type="password" id="pass2" name="password2" placeholder="Password Baru" required="" />
					<input type="password" name="password3" placeholder="Konfirmasi Password" required="" />
					<input type="submit" value="UBAH">
					<p>Sudah Punya Akun? <a href="http://172.27.212.1:1000">Masuk</a></p>
					<p class="message">Belum Terdaftar? <a href="#">Tambah Pengguna</a></p>
				</form>
				<form name="daftar" class="login-form" action="<?= base_url('index.php/welcome/create')?>" method="post" onsubmit="return periksa()">
					<h4>Form Tambah Pengguna</h4><br>
					<span style="color: red;font-size: 11px" id="email_err"><?php if(isset($pesan)){echo $pesan;$pesan='';} ?></span>
					<input type="text" id="username" name="username" value="<?php if(isset($username)){echo $username;} ?>" placeholder="E-mail" required="" />
					<span style="color: red;font-size: 11px" id="pass_err"></span>
					<input type="password" name="password0" value="<?php if(isset($password)){echo $password;} ?>" placeholder="Password" required="" />
					<input type="password" name="password1" value="<?php if(isset($password)){echo $password;} ?>" placeholder="Konfirmasi Password" required="" />
					<span style="color: red;font-size: 11px" id="hasil_err"></span>
					<div style="white-space:nowrap;width: 40%">
						<?php
						$magic1 = rand(1,10);
						$magic2 = rand(1,10);
						$tanda = rand(1,3); 
						echo "<span style='font-size:30px'>".$magic1;
						if ($tanda == 1){
							$hasil = $magic1 + $magic2;echo " + ";
						}else if($tanda == 2){
							$hasil = $magic1 - $magic2;echo " - ";
						}else if($tanda == 3){
							$hasil = $magic1 * $magic2;echo " x ";
						}
						echo $magic2." = </span>";?>
						<input type="text" name="hasil" placeholder="hasil" required="" />
					</div>
					<input type="submit" value="TAMBAH">
					<p>Sudah Punya Akun? <a href="http://172.27.212.1:1000">Masuk</a></p>
					<p class="message">Ubah Password? <a href="#">Ubah</a></p>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/BigInteger.min.js')?>"></script>
	<script type="text/javascript">
		$('.message a').click(function(){
			$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
		});
		function validateEmail(email) {
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}

		// $("#validate").bind("click", validate);
		function periksa(){
			var email = $("#username").val();
			var isi = document.forms["daftar"]["hasil"].value;
			var passwordbaru = document.forms["daftar"]["password0"].value;
			var konfirmasi = document.forms["daftar"]["password1"].value;
			if(!validateEmail(email)){
				$("#email_err").text("Gunakan E-mail Mahasiswa");
				return false;
			}else{
				if(email.includes("@mhs.uinjkt.ac.id") == false){
					$("#email_err").text("Gunakan E-mail Mahasiswa");
					return false;
				}else{	
					$("#email_err").text("");
					if(passwordbaru.length < 6){
						$('#pass_err').text('Password Baru Minimal 6 Karakter');
						return false;
					}
					if(!/\d/.test(passwordbaru)){
						$('#pass_err').text('Password Harus Terdiri dari Angka dan Huruf');
						return false;
					}
					if(!/[a-z]/.test(passwordbaru)){
						$('#pass_err').text('Password Harus Terdiri Minimal 1 Huruf kecil');
						return false;
					}
					if(!/[A-Z]/.test(passwordbaru)){
						$('#pass_err').text('Password Harus Terdiri Minimal 1 Huruf Besar');
						return false;
					}
					if(passwordbaru != konfirmasi){
						$('#pass_err').text("Password Konfirmasi Tidak Sesuai");
						return false;
					}else{
						$('#pass_err').text("");
					}	
					if(isi != <?= $hasil ?>){
						$("#hasil_err").text("Hasil Tidak Valid");
						return false;
					}else{
						$("#hasil_err").text("");
					}
				}
			}
		}
		function periksa2(){
			var username = document.forms["ubah"]["username"].value;
			var passwordbaru = document.forms["ubah"]["password2"].value;
			var konfirmasi = document.forms["ubah"]["password3"].value;

			if(passwordbaru.length < 6){
				$('#pass2').text('Password Baru Minimal 6 Karakter');
				return false;
			}
			if(!/\d/.test(passwordbaru)){
				$('#pass2').text('Password Harus Terdiri dari Angka dan Huruf');
				return false;
			}
			if(!/[a-z]/.test(passwordbaru)){
				$('#pass2').text('Password Harus Terdiri Minimal 1 Huruf kecil');
				return false;
			}
			if(!/[A-Z]/.test(passwordbaru)){
				$('#pass2').text('Password Harus Terdiri Minimal 1 Huruf Besar');
				return false;
			}
			if(passwordbaru != konfirmasi){
				alert("Password Konfirmasi Tidak Sesuai");
				return false;
			}
		}
	</script>
</body>
</html>