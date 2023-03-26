<?php
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM peminjamanbuku WHERE namaPeminjam LIKE '%$keyword%' OR kelas LIKE '%$keyword%' OR judulBuku LIKE '%$keyword%'";
$pminjaman = query($query);
?>

<table class=" table table-bordered table-hover">
				<thead class="text-center border-3">
					<tr class="table-secondary">
						<th scope="col">No.</th>
				        <th scope="col">Nama</th>
				        <th scope="col">Kelas</th>
				        <th scope="col">Judul Buku</th>
				        <th scope="col">Tanggal Pinjam</th>
				        <th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody >
				  	<?php $i = 1; ?>
				  	<?php foreach ($pminjaman as $pinjam) : ?>
				    <tr>
				      <th scope="row"><?php echo $i; ?></th>
				      <td><?php echo ucwords($pinjam["namaPeminjam"]) ?></td>
				      <td><?php echo strtoupper($pinjam["kelas"]) ?></td>
				      <td><?php echo ucwords($pinjam["judulBuku"]) ?></td>
				      <td><?php echo $pinjam["tglPinjam"] ?></td>
				      <td class="text-center">
				      	<button class="btn btn-success mt-1"><a href="?url=editpeminjaman&idPeminjam=<?php echo $pinjam["idPeminjam"]; ?>" class="link-light text-decoration-none"><img src="icon/iconedit.png" style="width: 18px; margin-right: 6px; margin-bottom: 4px;">Edit</a></button>
				      	<button class="btn btn-danger ml-2 mt-1"><a href="?url=hapuspeminjaman&idPeminjam=<?php echo $pinjam["idPeminjam"]; ?>" class="link-light text-decoration-none"><img src="icon/icondelete.png" style="width: 20px; margin-right: 6px; margin-bottom: 4px;">Hapus</a></button>
				      	<button class="btn btn-primary ml-2 mt-1"><a href="?url=pengembalianbuku&idPeminjam=<?php echo $pinjam["idPeminjam"]; ?>" class="link-light text-decoration-none"><img src="icon/iconkmbalipinjam.png" style="width: 20px; margin-right: 6px; margin-bottom: 4px;">Kembali</a></button>
				      </td>
				    </tr>
				    <?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>