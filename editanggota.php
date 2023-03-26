<?php 
include 'functions.php';

// GET data idBukuFiksi
$idAnggota = $_GET['idAnggota'];

// Query
$anggota = query("SELECT * FROM kelolaanggota WHERE idAnggota = $idAnggota")[0];

// Cek Submit
if (isset($_POST['submit'])) {

	// Cek apakah data berhasil di Edit atau Tidak
	if (editAnggota($_POST) > 0) {
		echo "<script type='text/javascript'>
				$(document).ready(function(){

	  			Swal.fire({
	   			icon: 'success',
	  			title: 'Sukses...',
	  			text: 'Data Berhasil Di Ubah',
	  				}).then(function(){
	  					window.location.href = '?url=bukufiksi'
	  					});
				});
				</script>";
	} else{
		echo "<script type='text/javascript'>
				$(document).ready(function(){

	  			Swal.fire({
	   			icon: 'error',
	  			title: 'Gagal...',
	  			text: 'Data Gagal Di Ubah',
	  				}).then(function(){
	  					document.location.href = '?url=bukufiksi'
	  					});
				});
				</script>";	
		}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Anggota</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="admin.css">
</head>
<body>
<!--form input data Buku Fiksi-->
	<div class="col-md-3 mt-4" style="margin-left: 15px;">
		<h4>Form Edit Anggota</h4>
	</div>
		<hr/>
	<div class="card shadow-lg border-top-0 rounded" style="width: 80%; height: 65vh;"><!--card-->
		<form  action="" method="POST">
			<input type="hidden" name="idAnggota" id="idAnggota" value="<?= $anggota["idAnggota"]; ?>"> <!--Menyembunyika Input Id-->
			<div class="d-flex p-2" style="justify-content: center;"><!--top-->
				<div class="mb-4 mt-5" style="width: 40%;">
					<label for="namaAnggota" class="form-label">Nama Anggota :</label>
					<input type="text" name="namaAnggota" id="namaAnggota" value="<?= $anggota["namaAnggota"]; ?>" class="form-control" >
				</div>
				<div class="mb-4 mt-5" style="width: 40%; margin-left: 10%;">
					<label for="kelasAnggota" class="form-label">Kelas :</label>
					<input type="text" name="kelasAnggota" id="kelasAnggota" value="<?= $anggota["kelasAnggota"]; ?>" class="form-control">
				</div>
			</div>
			<div class="d-flex mt-3 p-2 "style="margin-left: 5%;">
				<button type="submit" name="submit" class="btn btn-primary">Edit</button>
				<button type="reset" class="btn btn-danger" style="margin-left: 3vh;">Reset</button>
			</div>
		</form>
	</div>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="admin.js"></script>
</body>
</html>