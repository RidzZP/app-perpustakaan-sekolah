<?php 
include 'functions.php';

$all = mysqli_query($koneksi, "TRUNCATE TABLE pengembalianbukufiksi");

if ($all > 0) {
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Terhapus...',
  			text: 'Semua Data Telah Terhapus',
  				}).then(function(){
  					window.location.href = '?url=pengembalianfiksi'
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
  					document.location.href = '?url=pengembalianfiksi'
  					});
			});
			</script>";	
}


 ?>