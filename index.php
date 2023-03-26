<?php
//antisipasi jika ada user yang mencoba masuk web tanpa login..!
	SESSION_START();
	if(!isset($_SESSION['login'])){
		header('location: login.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aplikasi Perpustakaan</title>

	<!-- Bootstrap CSS -->
	<link href="style.css?version=<?php echo filemtime('style.css')?>" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<!-- Alert -->
	<link rel="stylesheet" href="alert/sweetalert2.min.css">
	<link rel="stylesheet" href="alert/animate.min.css"/>
	<script src="alert/jquery-3.6.1.min.js"></script>
	<script src="alert/sweetalert2.all.min.js"></script>

	<!-- icon -->
	<link rel="shortcut icon" href="image/logoSMP.jpg" type="image/x-icon">

	<style>
		.hvr{
			transition: 0.6s background-color;
		}

		.hvr:hover{
			background-color: darkorange;
		}
	</style>

</head>
<body>
	
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #6378ff;">
  <div class="container-fluid">
    <h3 class="text-white" style="margin-left: 10px;">E-Perpustakaan | <i><b>SMPN 3 KUNINGAN</b></i></h3>
  </div>
</nav>

<!-- SideBar -->
<div class="row no-gutters mt-5">
	<div class="sidebar col-md-2 bg-dark  mt-2 pr-3 pt-4 " style="height: 88vh;">
		<!-- Menu -->
		<ul class="nav flex-column mb-5">
			<li class="nav-item">
			  <img src="image/Logo.jpeg" class="rounded mx-auto d-block" alt="" style="height: 130px;"><hr class="bg-secondary">
			</li>
			<li class=" nav-item">
				<a class="hvr nav-link text-white ml-2" href="?url=paneladmin"><img src="icon/dashboard.png" style="width: 20px; margin-right: 6px;"></i>Dashboard</a>
			</li>
			<!--Hak akses khusus yang di berikan kepada "pengawas" dan tidak bisa di akses oleh user lain-->
			<li class="nav-item">
				<a class="hvr nav-link text-white ml-2" href="?url=kelolaanggota"><img src="icon/anggota.png" style="width: 20px; margin-right: 6px;"></i>Kelola Anggota</a>
			</li>

			<!-- Submenu -->
		<?php
			if ($_SESSION['level']=='admin'){	
		?>
			<li>
			   <a href="#submenu2" data-bs-toggle="collapse" class="hvr nav-link text-white ml-2"><img src="icon/daftarbuku.png" style="width: 20px; margin-right: 6px;">Daftar Buku</a>
				<ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
					<li class="w-100">
						<a href="?url=bukufiksi" class="hvr nav-link px-4 text-white ml-2"><img src="icon/bukufiksi.png" alt="" style="width: 20px; margin-right: 6px;">Buku Fiksi</a>
					</li>
					<li>
					  <a href="?url=bukupaket" class="hvr nav-link px-4 text-white ml-2"><img src="icon/bukupaket.png" alt="" style="width: 20px; margin-right: 6px;">Buku Paket</a>
					</li>
				</ul>
			</li>
		<?php } ?>
			<!-- End -->
			<li class="nav-item">
				<a class="hvr nav-link text-white ml-2" href="?url=peminjaman"><img src="icon/peminjaman.png" alt="" style="width: 20px; margin-right: 6px; ">Peminjaman</a>
			</li>
			<li class="hvr nav-item">
			  <a class="nav-link text-white ml-2" href="?url=pengembalian"><img src="icon/pengembalian.png" alt="" style="width: 20px; margin-right: 6px;">Pengembalian</a>
			</li>

			<hr class="bg-secondary">

			<!--Hak akses khusus yang di berikan kepada "kepala" dan tidak bisa di akses oleh user lain-->
			<li class="nav-item">
			  <a class="hvr nav-link text-white ml-2" href="?url=about"><img src="icon/info.png" alt="" style="width: 19px; margin-right: 6px;">About
			  </a>
			</li>
			<li class="nav-item">
			  <a class="hvr nav-link text-white ml-2" href="logout.php"><img src="icon/logout.png" alt="" style="width: 19px; margin-right: 6px;">Logout</a>
			</li>	
		</ul>
		<!-- End Menu -->
	</div>
<!-- End Sidebar -->

	<!-- Content -->
	<div class="col-md-10">
		<?php 
		// Memanggil penghubung agar menu navigasi menjadi dinamis
		include 'penghubung.php';
	 	?>
	</div>
	<!-- End Content -->

</div>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="admin.js"></script>
	<script src="js/scriptpeminjaman.js"></script><!--3-->
</body>
</html>
