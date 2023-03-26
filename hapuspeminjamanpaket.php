<?php 
include 'functions.php';

$idPeminjamPaket = $_GET["idPeminjamPaket"];

if (hapusPeminjamPaket($idPeminjamPaket) > 0) {
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Terhapus...',
  			text: 'Data Berhasil Di Hapus',
  				}).then(function(){
  					window.location.href = '?url=peminjamanpaket'
  					});
			});
			</script>";
} elseif (hapusPeminjamPaket($idPeminjamPaket) == 0) {
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'error',
  			title: 'Gagal...',
  			text: 'Data Gagal Di Tambahkan',
  				}).then(function(){
  					document.location.href = '?url=peminjamanpaket'
  					});
			});
			</script>";	
}



 ?>