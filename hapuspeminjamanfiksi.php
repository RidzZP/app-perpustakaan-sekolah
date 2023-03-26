<?php 
include 'functions.php';

$idPeminjamFiksi = $_GET["idPeminjamFiksi"];

if (hapusPeminjamFiksi($idPeminjamFiksi) > 0) {
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Terhapus...',
  			text: 'Data Berhasil Di Hapus',
  				}).then(function(){
  					window.location.href = '?url=peminjamanfiksi'
  					});
			});
			</script>";
} elseif (hapusPeminjamFiksi($idPeminjamFiksi) == 0) {
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'error',
  			title: 'Gagal...',
  			text: 'Data Gagal Di Tambahkan',
  				}).then(function(){
  					document.location.href = '?url=peminjamanfiksi'
  					});
			});
			</script>";	
}



 ?>