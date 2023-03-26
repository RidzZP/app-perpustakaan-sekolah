<?php 
	if(!isset($_SESSION['login'])){
		header('location: login.php');
		exit;
	}
	include 'functions.php';

	$bkupaket = query("SELECT * FROM bukupaket");
	
	//fitur search
	if( isset($_POST["cari"])){
		$bkupaket = searchpaket($_POST["keyword"]);
			
	}
	
 ?>
	<!-- tabel crud -->
<div class="col-md-10" method="post" action="">
	<div class="col-md-3 mt-4" style="margin-left: 15px;">
		<h4>Daftar Buku Paket</h4>
	</div>
	<hr/>
			
	<div class="card shadow-lg bg-succes mt-3 rounded " style="margin-left: 15px; margin-right: 15px; height: 74vh; width: 115%;">
		<div class="d-flex">
			<div class="form-group mt-4 w-3" style="margin-left: 10px;">
				<a href="?url=tambahpaket" class="btn btn-primary mb-1"><img src="icon/icontmbhbuku.png" style="width: 25px; margin-right: 6px;">Tambah Buku</a>
			</div>
			<div class="form-group mt-4 w-3 " style="margin-left: 64%;">
				<button class="btn btn-info mb-3 "><a target="_blank" href="?url=exportpaket" class="link-light text-decoration-none"><img src="icon/iconexport.png" style="width: 20px; margin-right: 6px; margin-bottom: 3px;">Export</a></button>
			</div>
		</div>
		<!--fitur search-->
		<form method="POST" action="" >
			<div class="search" style="margin-left: 65%;">
				<label>Search:</label>
				<input type="text" name="keyword" class="form-group" id="keywordPaket" placeholder="Judul buku/Semester/Kelas" autocomplete="off" autofocus>
				<button type="submit" name="cari" class="btn-secondary rounded">Cari</button>
			</div>
		</form>
		<!--Tabel-->
		<div class="srool card-body  mt-2 mb-1 border bg-warnin" style="margin-left: 10px; margin-right: 10px; overflow: scroll;" id="bukupaket">
			<table class=" table table-bordered table-hover">
				<thead class="text-center border-3">
				    <tr class="table-secondary">
				      <th scope="col">No.</th>
				      <th scope="col">Paket</th>
				      <th scope="col">Daftar Judul Paket</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($bkupaket as $paket) : ?>
						<tr>
						  <th scope="row"><?php echo $i; ?></th>
						  <td><?php echo ucwords($paket["paket"]); ?></td>
						  <td><?php echo ucwords($paket["daftarJudulPaket"]); ?></td>
						  <td class="text-center">
							<button class="btn btn-success ml-2 mt-1"><a href="?url=editpaket&idBukuPaket=<?php echo $paket["idBukuPaket"]; ?>" class="link-light text-decoration-none"><img src="icon/iconedit.png" style="width: 18px; margin-right: 6px; margin-bottom: 4px;">Edit</a></button>
							<button class="btn btn-danger ml-2 mt-1"><a href="?url=hapuspaket&idBukuPaket=<?php echo $paket["idBukuPaket"]; ?>" class="link-light text-decoration-none" id="hpus2"><img src="icon/icondelete.png" style="width: 20px; margin-right: 6px; margin-bottom: 4px;">Hapus</a></button>
						  </td>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				  </tbody>
				</table>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).on('click', '#hpus2', function(e){
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