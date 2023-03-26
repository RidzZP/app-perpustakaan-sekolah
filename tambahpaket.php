<?php 
	if(!isset($_SESSION['login'])){
		header('location: login.php');
		exit;
	}
include 'functions.php';

if (isset($_POST['submit'])) {

	if (tambahPaket($_POST) > 0 ){
		echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Sukses...',
  			text: 'Data Berhasil Di Tambahkan',
  				}).then(function(){
  					document.location.href = '?url=bukupaket'
  					});
			});
			</script>";
	} else{
		echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'error',
  			title: 'Gagal...',
  			text: 'Data Gagal Di Tambahkan',
  				}).then(function(){
  					document.location.href = '?url=bukupaket'
  					});
			});
			</script>";	
		}
}

 ?>

<!--form input data Buku Fiksi-->
	<div class="col-md-3 mt-4" style="margin-left: 15px;">
		<h4>Form Daftar Buku Paket</h4>
	</div>
		<hr/>
	<div class="card shadow-lg border-top-0 rounded" style="margin-left: 15px; margin-right: 15px; height: 74vh; width: 96%;"><!--card-->
		<form  action="" method="POST">
			<div class="d-flex p-2" style="justify-content: center;"><!--top-->
				<div class="mb-4 mt-5" style="width: 40%;">
					<label for="paket" class="form-label">Paket :</label>
					<input type="text" name="paket" id="paket" class="form-control" autocomplete="off" autofocus required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')" placeholder="Contoh: kelas 7 semester 1" />
				</div>
				<div class="mb-4 mt-5" style="width: 40%; margin-left: 10%;">
					<label for="daftarJudulPaket" class="form-label">Daftar Judul Paket :</label>
					<textarea name="daftarJudulPaket" id="daftarJudulPaket" class="form-control" id="exampleFormControlTextarea1" rows="5" autocomplete="off" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')" placeholder="Contoh: Ipa, Matematika, Ips, Prakarya, Seni Budaya, PKN, dll..." /></textarea>
				</div>
			</div>
			<div class="d-flex mt-3 p-2 "style="margin-left: 5%;">
				<button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
				<button type="reset" class="btn btn-danger" style="margin-left: 3vh;">Reset</button>
			</div>
		</form>
	</div>


	<textarea name="daftarJudulPaket" id="daftarJudulPaket" class="form-control" id="exampleFormControlTextarea1" rows="3" autocomplete="off" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')">