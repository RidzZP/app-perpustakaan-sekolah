<?php 
include 'functions.php';

$all = mysqli_query($koneksi, "TRUNCATE TABLE pengembalianbukupaket");

if ($all > 0) {
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Terhapus...',
  			text: 'Semua Data Telah Terhapus',
  				}).then(function(){
  					window.location.href = '?url=pengembalianpaket'
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
  					document.location.href = '?url=pengembalianpaket'
  					});
			});
			</script>";	
}


 ?>