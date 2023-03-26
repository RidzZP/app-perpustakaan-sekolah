<?php 
include 'functions.php';

// GET data idPeminjamPaket
$idPeminjamPaket = $_GET['idPeminjamPaket'];

// Query
$pminjaman = query("SELECT * FROM peminjamanbukupaket WHERE idPeminjamPaket = $idPeminjamPaket")[0];

// Cek Submit
if (isset($_POST['submit'])) {

	// Cek apakah data berhasil di Edit atau Tidak
	if (editPeminjamanPaket($_POST) > 0) {
		echo "<script type='text/javascript'>
				$(document).ready(function(){

	  			Swal.fire({
	   			icon: 'success',
	  			title: 'Sukses...',
	  			text: 'Data Berhasil Di Ubah',
	  				}).then(function(){
	  					window.location.href = '?url=bukufiksi'
	  					});
				});
				</script>";
	} else{
		echo "<script type='text/javascript'>
				$(document).ready(function(){

	  			Swal.fire({
	   			icon: 'error',
	  			title: 'Gagal...',
	  			text: 'Data Gagal Di Ubah',
	  				}).then(function(){
	  					document.location.href = '?url=bukufiksi'
	  					});
				});
				</script>";	
		}
	}

 ?>

<!--form input data Buku Peminjaman-->
	<div class="col-md-3 mt-4" style="margin-left: 15px;">
		<h4>Form Edit Buku Peminjaman</h4>
	</div>
		<hr/>
	<div class="card shadow-lg border-top-0 rounded" style="width: 80%; height: 65vh;"><!--card-->
		<form  action="" method="POST">
			<input type="hidden" name="idPeminjamPaket" id="idPeminjamPaket" value="<?= $pminjaman["idPeminjamPaket"]; ?>"> <!--Menyembunyika Input Id-->
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
				<button type="submit" name="submit" class="btn btn-primary">Edit</button>
				<button type="reset" class="btn btn-danger" style="margin-left: 3vh;">Reset</button>
			</div>
		</form>
	</div>
