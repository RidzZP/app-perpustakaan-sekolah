<?php 
	if(!isset($_SESSION['login'])){
		header('location: login.php');
		exit;
	}
include 'functions.php';

if (isset($_POST['submit'])) {

	if (tambahAnggota($_POST) > 0 ){
		echo "<script type='text/javascript'>
			$(document).ready(function(){

  			Swal.fire({
   			icon: 'success',
  			title: 'Sukses...',
  			text: 'Data Berhasil Di Tambahkan',
  				}).then(function(){
  					window.location.href = '?url=kelolaanggota'
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
  					document.location.href = '?url=kelolaanggota'
  					});
			});
			</script>";	
		}
}

 ?>

<!--form input data Anggota-->
	<div class="col-md-3 mt-4" style="margin-left: 15px;">
		<h4>Form Tambah Anggota</h4>
	</div>
		<hr/>
	<div class="card shadow-lg border-top-0 rounded" style="margin-left: 15px; margin-right: 15px; height: 74vh; width: 96%;"><!--card-->
		<form method="POST" action="">
			<div class="d-flex p-2" style="justify-content: center;"><!--top-->
				<div class="mb-4 mt-5" style="width: 40%;">
					<label for="namaAnggota" class="form-label">Nama Anggota :</label>
					<input type="text" name="namaAnggota" id="namaAnggota" class="form-control " autocomplete="off" autofocus required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')" placeholder="Contoh: Rendy" />
				</div>
				<div class="mb-4 mt-5" style="width: 40%; margin-left: 10%;">
					<label for="kelasAnggota" class="form-label">Kelas :</label>
					<input type="text" name="kelasAnggota" id="kelasAnggota" class="form-control " autocomplete="on" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')" placeholder="Contoh: 7A" />
				</div>
			</div>
			<div class="d-flex" style="justify-content: center;">
				<div class="mb-4 mt-5" style="width: 40%;">
					<label for="namaAnggota" class="form-label">Kelamin :</label>
					<select name="kelaminAnggota" id="kelaminAnggota" class="form-control" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')"/>
						<option value="">> Pilih Jenis Kelamin <</option>
						<option value="L">L</option>
						<option value="p">P</option>
					</select>
				</div>
				<div class="mb-4 mt-5" style="width: 40%; margin-left: 10%;">
					<label for="namaAnggota" class="form-label">No Hp :</label>
					<input type="text" name="noHp" id="noHp" class="form-control" autocomplete="off" autofocus required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="this.setCustomValidity('')" placeholder="Contoh: 08968081xxxxx" />
				</div>
			</div>
			<div class="d-flex mt-3 p-2 "style="margin-left: 5%;">
				<button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
				<button type="reset" class="btn btn-danger" style="margin-left: 3vh;">Reset</button>
			</div>
		</form>
	</div>