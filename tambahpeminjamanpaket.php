<?php 
	if(!isset($_SESSION['login'])){
		header('location: login.php');
		exit;
	}
include 'functions.php';

if (isset($_POST['submit'])) {

	if (tambahPeminjamPaket($_POST) > 0 ){
		echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Sukses...',
  			text: 'Data Berhasil Di Tambahkan',
  				}).then(function(){
  					document.location.href = '?url=peminjamanpaket'
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
  					document.location.href = '?url=peminjamanpaket'
  					});
			});
			</script>";	
		}
}

 ?>

<!--form input data Buku Fiksi-->
	<div class="col-md-3 mt-4" style="margin-left: 15px;">
		<h4>Form Daftar Peminjaman Buku</h4>
	</div>
		<hr/>
	<div class="card shadow-lg border-top-0 rounded" style="margin-left: 15px; margin-right: 15px; height: 74vh; width: 96%;"><!--card-->
		<form method="POST" action="">
			<div class="d-flex p-2" style="justify-content: center;"><!--top-->
				<div class="mb-4 mt-5" style="width: 40%;">
					<label for="idAnggota" class="form-label">Nama Anggota :</label>
					<select name="idAnggota" id="idAnggota" class="form-control" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"/>
						<option value="">> Pilih Nama Anggota <</option>
						<?php 

						$anggota = mysqli_query($koneksi, "SELECT idAnggota, namaAnggota from kelolaanggota;") or die(mysql_error($koneksi));

						while($dataAnggota = mysqli_fetch_array($anggota)){
							var_dump($dataAnggota);
							echo '<option value="'.$dataAnggota['idAnggota'].'">'.$dataAnggota['namaAnggota'].'</option>';
						}
						 ?>
					</select>
				</div>
				<div class="mb-4 mt-5" style="width: 40%; margin-left: 10%;">
					<label for="idBukuPaket" class="form-label">Paket :</label>
					<select name="idBukuPaket" id="idBukuPaket" class="form-control" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"/>
						<option value="">> Pilih Paket <</option>
						<?php 

						$idBukuPaket = mysqli_query($koneksi, "SELECT idBukuPaket, paket from bukuPaket;") or die(mysql_error($koneksi));

						while($dataBukuPaket = mysqli_fetch_array($idBukuPaket)){
							var_dump($dataBukuPaket);
							echo '<option value="'.$dataBukuPaket['idBukuPaket'].'">'.$dataBukuPaket['paket'].'</option>';
						}
						 ?>
					</select>
				</div>
			</div>
			<div class="d-flex  p-2 " style="justify-content: center;"><!--bottom-->
				<div class="mb-4 mt-5" style="width: 40%; margin-left: 10%;">
					<label for="tglPinjam" class="form-label">Tanggal Pinjam :</label>
					<input type="date" name="tglPinjam" id="tglPinjam" class="form-control" autocomplete="off" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"/>
				</div>
			</div>
			<div class="d-flex mt-3 p-2 "style="margin-left: 5%;">
				<button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
				<button type="reset" class="btn btn-danger" style="margin-left: 3vh;">Reset</button>
			</div>
		</form>
	</div>