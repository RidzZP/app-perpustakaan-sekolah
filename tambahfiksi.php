<?php 
	if(!isset($_SESSION['login'])){
		header('location: login.php');
		exit;
	}
include 'functions.php';

if (isset($_POST['submit'])) {

	if (tambahFiksi($_POST) > 0 ){
		echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Sukses...',
  			text: 'Data Berhasil Di Tambahkan',
  				}).then(function(){
  					document.location.href = '?url=bukufiksi'
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
  					document.location.href = '?url=bukufiksi'
  					});
			});
			</script>";	
		}
}

 ?>

<!--form input data Buku Fiksi-->
	<div class="col-md-3 mt-4" style="margin-left: 15px;">
		<h4>Form Daftar Buku Fiksi</h4>
	</div>
		<hr/>
	<div class="card shadow-lg border-top-0 rounded" style="margin-left: 15px; margin-right: 15px; height: 74vh; width: 100%;"><!--card-->
		<form method="POST" action="">
			<div class="d-flex p-2" style="justify-content: center;"><!--top-->
				<div class="mb-4 mt-5" style="width: 40%;">
					<label for="judulBuku" class="form-label">Judul Buku :</label>
					<input type="text" name="judulBuku" id="judulBuku" class="form-control border-2 border-dark" autocomplete="off" autofocus required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"/>
				</div>
				<div class="mb-4 mt-5" style="width: 40%; margin-left: 10%;">
					<label for="penulisBuku" class="form-label">Penulis Buku :</label>
					<input type="text" name="penulisBuku" id="penulisBuku" class="form-control" autocomplete="off" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"/>
				</div>
			</div>
			<div class="d-flex p-2 " style="justify-content: center;"><!--bottom-->
				<div class="mb-4 mt-5" style="width: 40%;">
					<label for="penerbitBuku" class="form-label">Penerbit Buku :</label>
					<input type="text" name="penerbitBuku" id="penerbitBuku" class="form-control" autocomplete="off" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"/>
				</div>
				<div class="mb-4 mt-5" style="width: 40%; margin-left: 10%;">
					<label for="tahunTerbit" class="form-label">Tahun Terbit :</label>
					<input type="number" name="tahunTerbit" id="tahunTerbit" class="form-control" autocomplete="off" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"/>
				</div>
			</div>
			<div class="d-flex mt-3 p-2 "style="margin-left: 5%;">
				<button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
				<button type="reset" class="btn btn-danger" style="margin-left: 3vh;">Reset</button>
			</div>
		</form>
	</div>