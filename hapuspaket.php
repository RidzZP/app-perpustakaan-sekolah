<?php 
include 'functions.php';

$idBukuPaket = $_GET["idBukuPaket"];

if (hapusPaket($idBukuPaket) > 0) {
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Terhapus...',
  			text: 'Data Berhasil Di Hapus',
  				}).then(function(){
  					window.location.href = '?url=bukupaket'
  					});
			});
			</script>";
} elseif (hapusPaket($idBukuPaket) == 0) {
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



 ?>