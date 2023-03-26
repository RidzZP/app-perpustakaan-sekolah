<?php 
include 'functions.php';

// GET data idBukuFiksi
$idBukuFiksi = $_GET['idBukuFiksi'];

// Query
$bkufiksi = query("SELECT * FROM bukufiksi WHERE idBukuFiksi = $idBukuFiksi")[0];

// Cek Submit
if (isset($_POST['submit'])) {

	// Cek apakah data berhasil di Edit atau Tidak
	if (editFiksi($_POST) > 0) {
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

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Buku Fiksi</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="admin.css">
</head>
<body>
<!--form input data Buku Fiksi-->
	<div class="col-md-3 mt-4" style="margin-left: 15px;">
		<h4>Form Edit Buku Fiksi</h4>
	</div>
		<hr/>
	<div class="card shadow-lg border-top-0 rounded" style="width: 80%; height: 65vh;"><!--card-->
		<form  action="" method="POST">
			<input type="hidden" name="idBukuFiksi" id="idBukuFiksi" value="<?= $bkufiksi["idBukuFiksi"]; ?>"> <!--Menyembunyika Input Id-->
			<div class="d-flex p-2" style="justify-content: center;"><!--top-->
				<div class="mb-4 mt-5" style="width: 40%;">
					<label for="judulBuku" class="form-label">Judul Buku :</label>
					<input type="text" name="judulBuku" id="judulBuku" value="<?= $bkufiksi["judulBuku"]; ?>" class="form-control">
				</div>
				<div class="mb-4 mt-5" style="width: 40%; margin-left: 10%;">
					<label for="penulisBuku" class="form-label">Penulis Buku :</label>
					<input type="text" name="penulisBuku" id="penulisBuku" value="<?= $bkufiksi["penulisBuku"]; ?>" class="form-control">
				</div>
			</div>
			<div class="d-flex p-2 " style="justify-content: center;"><!--bottom-->
				<div class="mb-4 mt-5" style="width: 40%;">
					<label for="penerbitBuku" class="form-label">Penerbit Buku :</label>
					<input type="text" name="penerbitBuku" id="penerbitBuku" value="<?= $bkufiksi["penerbitBuku"]; ?>" class="form-control">
				</div>
				<div class="mb-4 mt-5" style="width: 40%; margin-left: 10%;">
					<label for="tahunTerbit" class="form-label">Tahun Terbit :</label>
					<input type="number" name="tahunTerbit" id="tahunTerbit" value="<?= $bkufiksi["tahunTerbit"]; ?>" class="form-control">
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