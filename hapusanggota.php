<?php 
include 'functions.php';

$idAnggota = $_GET["idAnggota"];

$error = error_reporting(0);
if (hapusAnggota($idAnggota) > 0) {
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Terhapus...',
  			text: 'Data Berhasil Di Hapus',
  				}).then(function(){
  					window.location.href = '?url=kelolaanggota'
  					});
			});
			</script>";
}else{
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'error',
  			title: 'Gagal...',
  			text: 'Data Gagal Dihapus..',
  				}).then(function(){
  					window.location.href = '?url=kelolaanggota'
  					});
			});
			</script>";
}

 ?>