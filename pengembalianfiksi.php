<?php 
	if(!isset($_SESSION['login'])){
		header('location: login.php');
		exit;
	}
	include 'functions.php';

	$pngembalian = query("SELECT kelolaanggota.namaAnggota,kelolaanggota.kelasAnggota,bukufiksi.judulBuku, peminjamanbukufiksi.tglPinjam,peminjamanbukufiksi.batasWaktu,pengembalianbukufiksi.tglKembali,peminjamanbukufiksi.denda from pengembalianbukufiksi inner join peminjamanbukufiksi on pengembalianbukufiksi.idPeminjamFiksi = peminjamanbukufiksi.idPeminjamFiksi inner join bukufiksi on peminjamanbukufiksi.idBukuFiksi = bukufiksi.idBukuFiksi inner join kelolaanggota on peminjamanbukufiksi.idAnggota = kelolaanggota.idAnggota;");

	//fitur search
	if( isset($_POST["cari"])){
		$pngembalian = searchkembalifiksi($_POST["keyword"]);
		
	}
 ?>


	<!-- tabel crud -->
<div class="col-md-10" method="post" action="">
	<div class="col-md-6 mt-4" style="margin-left: 15px;">
		<h3>Data Pengembalian Buku Fiksi</h3>
	</div>
	<hr/>
			
	<div class="card shadow-lg bg-succes mt-3 rounded " style="margin-left: 15px; margin-right: 15px; height: 74vh; width: 115%;">
		<!--fitur search-->
		<form method="POST" action="">
			<div class="head mt-3 d-flex" style="margin-left: 10px;">
				<?php 
					if ($_SESSION['level']=='admin') {
				 ?>
				<div class="left">
					<button class=" btn btn-danger ml-2" style="" name="hapusSemua"><img src="icon/icondelete.png" style="width: 20px; margin-right: 6px; margin-bottom: 4px;" class="btn-del"><a href="?url=hapuspengembalianfiksi" class="link-light text-decoration-none" id="hpus7">Hapus Semua</a></button>
				</div>
				<?php 
					}
				 ?>
				<div class="right" style="margin-left: 50%;">
					<label>Search:</label>
					<input type="text" name="keyword" class="form-group" id="keywordPengembalian" placeholder="Nama/Kelas/Judul buku" autocomplete="off" autofocus>
					<button type="submit" name="cari" class="btn-secondary rounded">Cari</button>
				</div>
			</div>
		<!--Tabel-->
		<div class=" card-body  mt-2 mb-1 border bg-warnin" id="pengembalian" style="margin-left: 10px; margin-right: 10px; overflow: scroll;">
			<table class=" table table-bordered">
				<thead class="text-center">
					<tr>
						<th scope="col">No.</th>
				        <th scope="col">Nama</th>
				        <th scope="col">Kelas</th>
				        <th scope="col">Judul Buku</th>
				        <th scope="col">Tanggal Pinjam</th>
				        <th scope="col">Batas Waktu</th>
				        <th scope="col">Tanggal Kembali</th>
				        <th scope="col">Denda</th>
					</tr>
				</thead>
				<tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($pngembalian as $kembali) : ?>
				    <tr>
				      <th scope="row"><?php echo $i; ?></th>
				      <td><?php echo ucwords($kembali["namaAnggota"]) ?></td>
				      <td><?php echo strtoupper($kembali["kelasAnggota"]) ?></td>
				      <td><?php echo ucwords($kembali["judulBuku"]) ?></td>
				      <td><?php echo $kembali["tglPinjam"] ?></td>
				      <td><?php echo $kembali["batasWaktu"] ?></td>
				      <td><?php echo $kembali["tglKembali"] ?></td>
				      <td><?php echo $kembali["denda"] ?></td>

				    </tr>
				    <?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).on('click', '#hpus7', function(e){
		e.preventDefault();
		var link = $(this).attr('href');

		Swal.fire({
		  title: 'Yakin Menghapus Semua Data?',
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