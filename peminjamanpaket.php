<?php 
	if(!isset($_SESSION['login'])){
		header('location: login.php');
		exit;
	}
	include 'functions.php';

	$pminjamanPaket = query("SELECT kelolaanggota.namaAnggota,kelolaanggota.kelasAnggota,kelolaanggota.kelamin,kelolaanggota.noHp,bukupaket.daftarJudulPaket,peminjamanbukupaket.tglPinjam,peminjamanbukupaket.status,peminjamanbukupaket.idPeminjamPaket FROM peminjamanbukupaket INNER JOIN bukupaket on peminjamanbukupaket.idBukuPaket = bukupaket.idBukuPaket INNER JOIN kelolaanggota on peminjamanbukupaket.idAnggota = kelolaanggota.idAnggota ORDER BY idPeminjamPaket DESC;");


	if( isset($_POST["cari"])){
			$pminjamanPaket = searchpinjampaket($_POST["keyword"]);
			
		}
 ?>


	<!-- tabel crud -->
<div class="col-md-10" method="post" action="">
	<div class="col-md-6 mt-4" style="margin-left: 15px;">
		<h3>Data Peminjaman Buku Paket</h3>
	</div>
	<hr/>
			
	<div class="card shadow-lg bg-succes mt-3 rounded " style="margin-left: 15px; margin-right: 15px; height: 74vh; width: 115%;">
		<div class="d-flex">
			<?php 
				if ($_SESSION['level']=='admin') {
			 ?>
			<div class="form-group mt-4 w-5" style="margin-left: 10px;">
				<a href="?url=tambahpeminjamanpaket" class="btn btn-primary mb-1"><img src="icon/iconepeminjam.png" style="width: 20px; margin-right: 6px;">Tambah peminjam</a>
			</div>
			<?php 
				}
			 ?>
			<div class="form-group mt-4 w-3 " style="margin-left: 64%;">
				<button class="btn btn-info mb-3 "><a target="_blank" href="?url=exportPeminjamPaket" class="link-light text-decoration-none"><img src="icon/iconexport.png" style="width: 20px; margin-right: 6px; margin-bottom: 3px;">Export</a></button>
			</div>
		</div>
		<!--fitur search-->
		<form method="POST" action="" >
			<div class="search" style="margin-left: 70%;">
				<label>Search:</label>
				<input type="text" name="keyword" class="form-group" placeholder="Nama/Kelas/Judul buku" autocomplete="off" autofocus>
				<button type="submit" name="cari" class="btn-secondary rounded" id="tombol-cari">Cari</button>

			</div>
		</form>
		<!--Tabel-->
		<div class="srool card-body  mt-2 mb-1 border " id="PeminjamPaket" style="margin-left: 10px; margin-right: 10px; overflow: scroll;">
			<table class=" table table-bordered table-hover">
				<thead class="text-center border-3">
					<tr class="table-secondary">
						<th scope="col">No.</th>
				        <th scope="col">Nama Siswa</th>
				        <th scope="col">Kelas</th>
				        <th scope="col">Kelamin</th>
				        <th scope="col">Daftar Buku</th>
				        <th scope="col">No.HP</th>
				        <th scope="col">Tanggal Pinjam</th>
				        <th scope="col">Status</th>
				        <?php 
				        	if ($_SESSION['level']=='admin') {
				         ?>
				        <th scope="col">Aksi</th>
				        <?php 
				        	}
				         ?>
					</tr>
				</thead>
				<tbody >
				  	<?php $i = 1; ?>
				  	<?php foreach ($pminjamanPaket as $pinjamPaket) : ?>
				    <tr class="">
				      <th scope="row"><?php echo $i; ?></th>
				      <td><?php echo ucwords($pinjamPaket["namaAnggota"]) ?></td>
				      <td><?php echo strtoupper($pinjamPaket["kelasAnggota"]) ?></td>
				      <td><?php echo ucwords($pinjamPaket["kelamin"]) ?></td>
				      <td><?php echo ucwords($pinjamPaket["daftarJudulPaket"]) ?></td>
				      <td><?php echo ucwords($pinjamPaket["noHp"]) ?></td>
				      <td class="text-dark"><?php echo $pinjamPaket["tglPinjam"] ?></td>
				      <td><?php echo ucwords($pinjamPaket["status"]) ?></td>

				      <?php 
				      	if ($_SESSION['level']=='admin') {
				      ?>
				      <td class="text-center">
				      	<button class="btn btn-success mt-1"><a href="?url=editpeminjamanpaket&idPeminjamPaket=<?php echo $pinjamPaket["idPeminjamPaket"]; ?>" class="link-light text-decoration-none"><img src="icon/iconedit.png" style="width: 18px; margin-right: 6px; margin-bottom: 4px;">Edit</a></button>
				      	<button class="btn btn-danger ml-2 mt-1"><a href="?url=hapuspeminjamanpaket&idPeminjamPaket=<?php echo $pinjamPaket["idPeminjamPaket"]; ?>" class="link-light text-decoration-none" id="hpus6"><img src="icon/icondelete.png" style="width: 20px; margin-right: 6px; margin-bottom: 4px;" class="btn-del">Hapus</a></button>
				      	<button class="btn btn-primary ml-2 mt-1"><a href="?url=pengembalianbukupaket&idPeminjamPaket=<?php echo $pinjamPaket["idPeminjamPaket"]; ?>" class="link-light text-decoration-none"><img src="icon/iconkmbalipinjam.png" style="width: 20px; margin-right: 6px; margin-bottom: 4px;">Kembali</a></button>
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
	$(document).on('click', '#hpus6', function(e){
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