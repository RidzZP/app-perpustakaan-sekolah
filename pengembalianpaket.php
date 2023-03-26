<?php 
	if(!isset($_SESSION['login'])){
		header('location: login.php');
		exit;
	}
	include 'functions.php';

	$pngembalian = query("SELECT kelolaanggota.namaAnggota,kelolaanggota.kelasAnggota,kelolaanggota.kelamin,kelolaanggota.noHp,bukupaket.daftarJudulPaket,peminjamanbukupaket.tglPinjam,pengembalianbukupaket.tglKembali from pengembalianbukupaket INNER JOIN peminjamanbukupaket on pengembalianbukupaket.idPeminjamPaket = peminjamanbukupaket.idPeminjamPaket inner join bukupaket on peminjamanbukupaket.idBukuPaket = bukupaket.idBukuPaket inner join kelolaanggota on peminjamanbukupaket.idAnggota = kelolaanggota.idAnggota;");

	//fitur search
	if( isset($_POST["cari"])){
		$pngembalian = searchkembalipaket($_POST["keyword"]);
		
	}
 ?>


	<!-- tabel crud -->
<div class="col-md-10" method="post" action="">
	<div class="col-md-6 mt-4" style="margin-left: 15px;">
		<h3>Data Pengembalian Buku Paket</h3>
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
					<button class=" btn btn-danger ml-2" style="" name="hapusSemua"><img src="icon/icondelete.png" style="width: 20px; margin-right: 6px; margin-bottom: 4px;" class="btn-del"><a href="?url=hapuspengembalianpaket" class="link-light text-decoration-none">Hapus Semua</a></button>
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
			<table class=" table table-bordered table-hover">
				<thead class="text-center border-3">
					<tr class="table-secondary">
						<th scope="col">No.</th>
				        <th scope="col">Nama Siswa</th>
				        <th scope="col">Kelas</th>
				        <th scope="col">Kelamin</th>
				        <th scope="col">Paket</th>
				        <th scope="col">No.HP</th>
				        <th scope="col">Tanggal Pinjam</th>
				        <th scope="col">Tanggal Kembali</th>
					</tr>
				</thead>
				<tbody >
				  	<?php $i = 1; ?>
				  	<?php foreach ($pngembalian as $kembali) : ?>
				    <tr>
				      <th scope="row"><?php echo $i; ?></th>
				      <td><?php echo ucwords($kembali["namaAnggota"]) ?></td>
				      <td><?php echo strtoupper($kembali["kelasAnggota"]) ?></td>
				      <td><?php echo ucwords($kembali["kelamin"]) ?></td>
				      <td><?php echo ucwords($kembali["daftarJudulPaket"]) ?></td>
				      <td><?php echo ucwords($kembali["noHp"]) ?></td>
				      <td class="text-dark"><?php echo $kembali["tglPinjam"] ?></td>
				      <td class="text-dark"><?php echo $kembali["tglKembali"] ?></td>

				    </tr>
				    <?php $i++; ?>
					<?php endforeach; ?>

				</tbody>
			</table>
		</div>
	</div>
</div>