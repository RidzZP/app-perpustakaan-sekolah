<?php 
include 'functions.php';

$idBukuFiksi = $_GET["idBukuFiksi"];

if (hapusFiksi($idBukuFiksi) > 0) {
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Terhapus...',
  			text: 'Data Berhasil Di Hapus',
  				}).then(function(){
  					window.location.href = '?url=bukufiksi'
  					});
			});
			</script>";
} elseif (hapusFiksi($idBukuFiksi) == 0) {
	echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'error',
  			title: 'Gagal...',
  			text: 'Data Gagal Di Tambahkan',
  				}).then(function(){
  					document.location.href = '?url=bukufiksi'
  					});
			});
			</script>";	
}
?>

<!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script> -->