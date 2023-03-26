<?php
include 'functions.php';

$idPeminjamFiksi = $_GET["idPeminjamFiksi"];


if(kembaliBukuFiksi($idPeminjamFiksi) > 0){
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Sukses...',
  			text: 'Data Berhasil Di Tambahkan',
  				}).then(function(){
  					document.location.href = '?url=pengembalianfiksi'
  					});
			});
			</script>";
	
}else{
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'error',
  			title: 'Gagal...',
  			text: 'Data Gagal Di Tambahkan',
  				}).then(function(){
  					document.location.href = '?url=pengembalianfiksi'
  					});
			});
			</script>";	
}

?>

