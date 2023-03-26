<?php 
	if(!isset($_SESSION['login'])){
		header('location: login.php');
		exit;
	}

	
	// Memanggil functions
	include 'functions.php';

	// Query menampilkan data dari tabel bukuanggota
	$anggota = query("SELECT * FROM kelolaanggota");

	//fitur search
	if( isset($_POST["cari"])){
		$anggota = searchanggota($_POST["keyword"]);
		
	}
 ?>

<div class="col-md-10" method="post" action="">
	<div class="col-md-4 mt-4" style="margin-left: 15px;">
		<h4>Kelola Data Anggota</h4>
	</div>
	<hr/>
			
	<div class="card shadow-lg mt-3 rounded " style="margin-left: 15px; margin-right: 15px; height: 74vh; width: 115%;">
		<div class="d-flex">
			<?php 
				if ($_SESSION['level']=='admin') {
			 ?>
			<div class="form-group mt-4 w-3" style="margin-left: 10px;">
				<a href="?url=tambahanggota" class="btn btn-primary mb-1"><img src="icon/icontmbhbuku.png" style="width: 25px; margin-right: 6px;">Tambah Anggota</a>
			</div>
			<?php 
				}
			 ?>
			<div class="form-group mt-4 w-3 " style="margin-left: 64%;">
				<button class="btn btn-info mb-3 "><a target="_blank" href="?url=exportanggota" class="link-light text-decoration-none"><img src="icon/iconexport.png" style="width: 20px; margin-right: 6px; margin-bottom: 3px;">Export</a></button>
			</div>
		</div>
		<!--search-->
		<form method="POST" action="" >
			<div class="search" style="margin-left: 65%;">
				<label>Search:</label>
				<input type="text" name="keyword" class="form-group" placeholder="Cari Anggota"  id="keywordanggota" autocomplete="off" autofocus>
				<button type="submit" name="cari" class="btn-secondary rounded" id="tombol-cari">Cari</button>
			</div>
		</form>
		<!--Tabel-->
		<div class="scrool card-body  mt-2 mb-1 border" style="margin-left: 10px; margin-right: 10px; overflow: scroll;" id="kelolaanggota">
			<table class=" table table-bordered table-hover">
				<thead class="text-center border-3">
					<tr class="table-secondary">
						<th scope="col">No.</th>
				        <th scope="col">Nama Anggota</th>
				        <th scope="col">Kelamin</th>
				        <th scope="col">No HP</th>
				        <th scope="col">Kelas</th>
				        <th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($anggota as $agt) : ?>
				    <tr >
				      <th scope="row"><?php echo $i; ?></th>
				      <td ><?php echo ucwords($agt["namaAnggota"]); ?></td>
				      <td ><?php echo ucwords($agt["kelamin"]); ?></td>
				      <td ><?php echo ucwords($agt["noHp"]); ?></td>
				      <td><?php echo strtoupper($agt["kelasAnggota"]); ?></td>
				      <?php 
				      	if ($_SESSION['level']=='admin') {
				       ?>
				      <td class="text-center">
				      	<button class="btn btn-success ml-2 mt-1 "><a href="?url=editanggota&idAnggota=<?php echo $agt["idAnggota"]; ?>" class="link-light text-decoration-none"><img src="icon/iconedit.png" style="width: 18px; margin-right: 6px; margin-bottom: 4px;">Edit</a></button>
				      	<button class="btn btn-danger ml-2 mt-1"><a href="?url=hapusanggota&idAnggota=<?php echo $agt["idAnggota"]; ?>" class="link-light text-decoration-none" id="hpus3"><img src="icon/icondelete.png" style="width: 20px; margin-right: 6px; margin-bottom: 4px;">Hapus</a></button>
				      </td>
				      <?php 
				      	}
				       ?>
				    </tr>
				    <?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).on('click', '#hpus3', function(e){
		e.preventDefault();
		var link = $(this).attr('href');

		Swal.fire({
		  title: 'Yakin Hapus Data Ini?',
		  text: "Data Ini Akan Di Hapus Secara Permanen!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#17AC10FF',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ya, Hapus!'
		}).then((result) => {
		  if (result.isConfirmed) {
		    window.location = link;
		  }
		})	
	})
</script>