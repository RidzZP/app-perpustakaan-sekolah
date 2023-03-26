<?php
include 'functions.php';

$idPeminjamPaket = $_GET["idPeminjamPaket"];


if(kembaliBukuPaket($idPeminjamPaket) > 0){
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Sukses...',
  			text: 'Buku Berhasil Di Kembalikan',
  				}).then(function(){
  					document.location.href = '?url=pengembalianpaket'
  					});
			});
			</script>";
	
}else{
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'error',
  			title: 'Gagal...',
  			text: 'Buku Gagal Di Kembalikan',
  				}).then(function(){
  					document.location.href = '?url=pengembalianpaket'
  					});
			});
			</script>";	
}

?>
