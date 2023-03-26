<?php 
	if(!isset($_SESSION['login'])){
		header('location: login.php');
		exit;
	}

	
	// Memanggil functions
	include 'functions.php';

	// Query menampilkan data dari tabel bukufiksi
	$bkufiksi = query("SELECT * FROM bukufiksi");

	//fitur search
	if( isset($_POST["cari"])){
		$bkufiksi = searchfiksi($_POST["keyword"]);
		
	}
 ?>
	<!-- tabel crud -->
<div class="col-md-10" method="post" action="">
	<div class="col-md-3 mt-4" style="margin-left: 15px;">
		<h4>Daftar Buku Fiksi</h4>
	</div>
	<hr/>
			
	<div class="card shadow-lg mt-3 rounded " style="margin-left: 15px; margin-right: 15px; height: 74vh; width: 115%;">
		<div class="d-flex">
			<div class="form-group mt-4 w-3" style="margin-left: 10px;">
				<a href="?url=tambahfiksi" class="btn btn-primary mb-1"><img src="icon/icontmbhbuku.png" style="width: 25px; margin-right: 6px;">Tambah Buku</a>
			</div>
			<div class="form-group mt-4 w-3 " style="margin-left: 64%;">
				<button class="btn btn-info mb-3 "><a target="_blank" href="?url=exportfiksi" class="link-light text-decoration-none"><img src="icon/iconexport.png" style="width: 20px; margin-right: 6px; margin-bottom: 3px;">Export</a></button>
			</div>
		</div>
		<!--search-->
		<form method="POST" action="" >
			<div class="search" style="margin-left: 65%;">
				<label>Search:</label>
				<input type="text" name="keyword" class="form-group" placeholder="Judul buku"  id="keywordFiksi" autocomplete="off" autofocus>
				<button type="submit" name="cari" class="btn-secondary rounded" id="tombol-cari">Cari</button>
			</div>
		</form>
		<!--Tabel-->
		<div class="scrool card-body  mt-2 mb-1 border" style="margin-left: 10px; margin-right: 10px; overflow: scroll;" id="bukufiksi">
			<table class=" table table-bordered table-hover">
				<thead class="text-center border-3">
					<tr class="table-secondary">
						<th scope="col">No.</th>
				        <th scope="col">Judul Buku</th>
				        <th scope="col">Penulis Buku</th>
				        <th scope="col">Penerbit</th>
				        <th scope="col">Tahun Terbit</th>
				        <th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($bkufiksi as $fiksi) : ?>
				    <tr >
				      <th scope="row"><?php echo $i; ?></th>
				      <td ><?php echo ucwords($fiksi["judulBuku"]); ?></td>
				      <td><?php echo ucwords($fiksi["penulisBuku"]); ?></td>
				      <td><?php echo ucwords($fiksi["penerbitBuku"]); ?></td>
				      <td><?php echo $fiksi["tahunTerbit"]; ?></td>
				      <td class="text-center">
				      	<button class="btn btn-success ml-2 mt-1 "><a href="?url=editfiksi&idBukuFiksi=<?php echo $fiksi["idBukuFiksi"]; ?>" class="link-light text-decoration-none"><img src="icon/iconedit.png" style="width: 18px; margin-right: 6px; margin-bottom: 4px;">Edit</a></button>
				      	<button class="btn btn-danger ml-2 mt-1"><a href="?url=hapusfiksi&idBukuFiksi=<?php echo $fiksi["idBukuFiksi"]; ?>" class="delete link-light text-decoration-none" id="hpus"><img src="icon/icondelete.png" style="width: 20px; margin-right: 6px; margin-bottom: 4px;">Hapus</a></button>
				      </td>
				    </tr>
				    <?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).on('click', '#hpus', function(e){
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














































<!--  <script>
	function confirm() {
		Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
})
	}
</script> -->