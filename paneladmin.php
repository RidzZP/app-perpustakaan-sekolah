<?php 
	if(!isset($_SESSION['login'])){
		header('location: login.php');
		exit;
	}
	include 'functions.php';
// Koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "apl_perpus");

 ?>
 
<h2 class="mt-3 ml-2">Dashboard</h2>
<hr class="bg-secondary">
<div class="panel">
	<div class="mt-4 d-flex" style="justify-content: center;"><!--top-->
		<a href="?url=bukufiksi" class="text-decoration-none text-dark">
		<div class="link d-flex border rounded shadow" style="width: 24vw; height: 23vh;">
			<div class="left card-body bg-info text-center" style="width: 10vw;">
				<img src="image/fiksi.jpg"  class="img-thumbnail">
			</div>
			<div class="right text-center" style="width: 14vw;">
				<h5 class="font-weight-bold fs-2 mt-3">Buku Fiksi</h5>
					<!-- Counting Dashboard Jumlah Buku FIksi :) -->
					<?php 
						global $konek;
						$bukuFiksi = " SELECT * FROM bukufiksi";
						$jumlahBukuFiksi = mysqli_query($konek, $bukuFiksi);

						if ($totalJumlahFiksi = mysqli_num_rows($jumlahBukuFiksi)) {
							echo '<h3 class="mb-0 text-center mt-4"> '.$totalJumlahFiksi.' </h3>';
						}else{
							echo '<h4 class="mb-0 mt-4"> Data Kosong </h4>';
						}
					?>
			</div>
		</div>
		</a>
		<div class="d-flex border rounded shadow" style="width: 24vw; height: 23vh; margin-left: 3%;">
			<div class="left card-body bg-danger text-center" style="width: 10vw;">
				<img src="image/bukupaket2.jpg"  class="img-thumbnail" style="height: 100px;">
			</div>
			<a href="?url=bukupaket" class="text-decoration-none text-dark">
			<div class="right text-center" style="width: 14vw;">
				<h5 class="font-weight-bold fs-2 mt-3">Buku Paket</h5>
					<!-- Counting Dashboard Jumlah Buku Paket  -->
					<?php 
						global $konek;
						$bukuPaket = " SELECT * FROM bukupaket ";
						$jumlahBukuPaket = mysqli_query($konek, $bukuPaket);

						if ($totalJumlahPaket = mysqli_num_rows($jumlahBukuPaket)) {
							echo '<h3 class="mb-0 text-center mt-4"> '.$totalJumlahPaket.' </h3>';
						}else{
							echo '<h4 class="mb-0 mt-4"> Data Kosong </h4>';
						}
					?>
			</div>
			</a>
		</div>
		<div class="d-flex border rounded shadow" style="width: 24vw; height: 23vh; margin-left: 3%;">
			<div class="left card-body bg-secondary text-center" style="width: 10vw" >
				<img src="image/anggota.png"  class="img-thumbnail">
			</div>
			<a href="?url=kelolaanggota" class="text-decoration-none text-dark">
			<div class="right text-center " style="width: 14vw;">
				<h5 class="font-weight-bold fs-2 mt-3">Anggota</h5>
					<!-- Counting Dashboard Jumlah Buku Paket  -->
					<?php 
						global $konek;
						$anggota = " SELECT * FROM kelolaanggota ";
						$jumlahAnggota = mysqli_query($konek, $anggota);

						if ($totalJumlahAnggota = mysqli_num_rows($jumlahAnggota)) {
							echo '<h3 class="mb-0 text-center mt-4"> '.$totalJumlahAnggota.' </h3>';
						}else{
							echo '<h4 class="mb-0 mt-4"> Data Kosong </h4>';
						}
					?>
			</div>
			</a>
		</div>
	</div>
	<div class="mt-5 d-flex" style="margin-left: 40px;"><!--top-->
		<div class="d-flex border rounded shadow" style="width: 24vw; height: 23vh;">
			<div class="left card-body bg-warning text-center" style="width: 10vw">
				<img src="image/pinjam.jpg"  class="img-thumbnail">
			</div>
			<a href="?url=peminjaman" class="text-decoration-none text-dark">
			<div class="right text-center " style="width: 14vw;">
				<h5 class="font-weight-bold fs-2 mt-3">Peminjaman</h5>
					<!-- Counting Dashboard Jumlah Peminjaman  -->
						<?php 
						global $konek;
						$peminjamanFiksi = " SELECT * FROM peminjamanbukufiksi";
						$peminjamanPaket = " SELECT * FROM peminjamanbukupaket";
						$jumlahFiksi = mysqli_query($konek, $peminjamanFiksi);
						$jumlahPaket = mysqli_query($konek, $peminjamanPaket);

						if ($totalJumlahPeminjam = mysqli_num_rows($jumlahFiksi) + mysqli_num_rows($jumlahPaket)) {
							echo '<h3 class="mb-0 text-center mt-4"> '.$totalJumlahPeminjam.' </h3>';
						}else{
							echo '<h4 class="mb-0 mt-4"> Data Kosong </h4>';
						}
					?>	
			</div>
			</a>
		</div>
		<div class="d-flex border rounded shadow" style="width: 24vw; height: 23vh; margin-left: 35px;">
			<div class="left card-body bg-primary text-center" style="width: 10vw">
				<img src="image/kembali.jpg"  class="img-thumbnail" style="width: 36vw;">
			</div>
			<a href="?url=kembali" class="text-decoration-none text-dark">
			<div class="right text-center " style="width: 14vw;">
				<h5 class="font-weight-bold fs-2 mt-3">Pengembalian</h5>
					<!-- Counting Dashboard Jumlah Pengembalian  -->
					<?php 
						global $konek;
						$pengembalianFiksi = " SELECT * FROM pengembalianbukufiksi ";
						$pengembalianPaket = " SELECT * FROM pengembalianbukupaket ";
						$jumlahFiksi = mysqli_query($konek, $pengembalianFiksi);
						$jumlahPaket = mysqli_query($konek, $pengembalianPaket);

						if ($totalJumlahKembali = mysqli_num_rows($jumlahFiksi) + mysqli_num_rows($jumlahPaket)) {
							echo '<h3 class="mb-0 text-center mt-4"> '.$totalJumlahKembali.' </h3>';
						}else{
							echo '<h4 class="mb-0 mt-4"> Data Kosong </h4>';
						}
					?>
			</div>
			</a>
		</div>
	</div>
</div>

















<!-- 	var nama = ["Jovan",
					"Ucup", 
					"geby", 
					"Jack", 
					"Starla", 
					"Marko", 
					"Intan", 
					"Joni"];
		// Mnehitung 
		var namaLength = nama.length;

		// Menagacak nama
		var randomNumber = Math.random();
		randomNumber = randomNumber*namaLength;
		randomNumber = Math.floor(randomNumber)
		var choosenName = nama[randomNumber];

		Swal.fire({
		  title: choosenName,
		  showClass: {
		    popup: 'animate__animated animate__fadeInDown'
		  },
		  hideClass: {
		    popup: 'animate__animated animate__fadeOutUp'
		  }
		}) -->