<?php 
include('konfigurasi.php');

function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
// Function Tambah
function tambahAnggota($data){
	global $koneksi;
	$namaAnggota = $data['namaAnggota'];
	$kelasAnggota = $data['kelasAnggota'];
	$kelaminAnggota = $data['kelaminAnggota'];
	$noHp = $data['noHp'];


	$query = " INSERT INTO kelolaanggota VALUES ('', '$namaAnggota', '$kelasAnggota','$kelaminAnggota','$noHp')";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

// Function Tambah
function tambahFiksi($data){
	global $koneksi;
	$judulBuku = $data['judulBuku'];
	$penulisBuku = $data['penulisBuku'];
	$penerbitBuku = $data['penerbitBuku'];
	$tahunTerbit = $data['tahunTerbit']; 

	$query = " INSERT INTO bukufiksi VALUES ('', '$judulBuku', '$penulisBuku', '$penerbitBuku', '$tahunTerbit')";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function tambahPaket($data){
	global $koneksi;
	$paket = $data['paket'];
	$daftarJudulPaket = $data['daftarJudulPaket'];

	$query = " INSERT INTO bukupaket VALUES ('', '$paket', '$daftarJudulPaket')";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function tambahPeminjamFiksi($data){
	global $koneksi;
	$idAnggota = $data['idAnggota'];
	$idBukuFiksi = $data['idBukuFiksi'];
	$tglPinjam = $data['tglPinjam']; 
	$batasWaktu = date("Y-m-d", time() + 60 * 60 * 24 * 7);
	$sekarang = date("Y-m-d");
	$status = 'dipinjam';
	// $batasWaktu = date("2022-09-18");


	// mengkonversi fungsi date
	$pinjam = new DateTime($tglPinjam);
	$kembali = new DateTime($batasWaktu);
	$terlambat = date_diff($pinjam, $kembali); //menghitung selisih waktu antar 2 kolom
	$hari = $terlambat -> format("%a"); //memformat selisih waktu

	// membuat sebuah kondisi
	if ($sekarang > $batasWaktu) { //jika tanggal sekarang lebih besar dari batas waktu maka akan menampilkan dan menjumlahkan denda
		$denda = 'Denda anda sebesar Rp.'.$hari * 100.;
	}else{ //jika tidak maka akan menampilkan sisa batas waktu peminjaman
		$denda = 'Batas waktu pinjam tinggal '.$hari.' Hari';
	}


	$query = "INSERT INTO peminjamanbukufiksi VALUES ('','$tglPinjam', '$batasWaktu', '$denda','$idAnggota', '$idBukuFiksi','$status' )";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function tambahPeminjamPaket($data){
	global $koneksi;
	$tglPinjam = $data['tglPinjam']; 
	$status = 'dipinjam';
	$idBukuPaket = $data['idBukuPaket'];
	$idAnggota = $data['idAnggota'];

	$query = "INSERT INTO peminjamanbukuPaket VALUES ('','$tglPinjam', '$status', '$idBukuPaket','$idAnggota')";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

// Function Hapus
function hapusAnggota($idAnggota){
	global $koneksi;
	$hapus = mysqli_query($koneksi, "DELETE FROM kelolaanggota WHERE idAnggota = $idAnggota");

	return mysqli_affected_rows($koneksi);
}

// Function Hapus
function hapusFiksi($idBukuFiksi){
	global $koneksi;
	$hapus = mysqli_query($koneksi, "DELETE FROM bukufiksi WHERE idBukuFiksi = $idBukuFiksi");

	return mysqli_affected_rows($koneksi);
}

function hapusPaket($idBukuPaket){
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM bukupaket WHERE idBukuPaket = $idBukuPaket");

	return mysqli_affected_rows($koneksi);
}

function hapusPeminjamFiksi($idPeminjamFiksi){
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM peminjamanbukufiksi WHERE idPeminjamFiksi = $idPeminjamFiksi");

	return mysqli_affected_rows($koneksi);
}

function hapusPeminjamPaket($idPeminjamPaket){
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM peminjamanbukupaket WHERE idPeminjamPaket = $idPeminjamPaket");

	return mysqli_affected_rows($koneksi);
}


//funtion kembaliBuku
function kembaliBukuFiksi($idPeminjamFiksi){
	global $koneksi;
	//select from peminjaman
	$data = mysqli_query($koneksi, "SELECT idPeminjamFiksi FROM peminjamanbukufiksi WHERE idPeminjamFiksi = $idPeminjamFiksi");
	$pinjam = mysqli_fetch_assoc($data);

	$tanggalKembali = date("Y-m-d");
	$idPeminjamFiksi = $pinjam['idPeminjamFiksi'];

	//insert into pengembalian
	mysqli_query($koneksi, "INSERT INTO pengembalianbukufiksi VALUES('','$tanggalKembali','$idPeminjamFiksi')");
	
	//update from peminjaman
	mysqli_query($koneksi, "UPDATE peminjamanbukufiksi SET status = 'dikembalikan' WHERE idPeminjamFiksi =$idPeminjamFiksi");
	echo mysqli_affected_rows($koneksi);
	return mysqli_affected_rows($koneksi);
}

function kembaliBukuPaket($idPeminjamPaket){
	global $koneksi;
	//select from peminjaman
	$data = mysqli_query($koneksi, "SELECT idPeminjamPaket FROM peminjamanbukuPaket WHERE idPeminjamPaket = $idPeminjamPaket");
	$pinjam = mysqli_fetch_assoc($data);

	$tanggalKembali = date("Y-m-d");
	$idPeminjamFiksi = $pinjam['idPeminjamPaket'];

	//insert into pengembalian
	mysqli_query($koneksi, "INSERT INTO pengembalianbukupaket VALUES('','$tanggalKembali','$idPeminjamPaket')");
	
	//update from peminjaman
	mysqli_query($koneksi, "UPDATE peminjamanbukuPaket SET status = 'dikembalikan' WHERE idPeminjamPaket =$idPeminjamPaket");
	echo mysqli_affected_rows($koneksi);
	return mysqli_affected_rows($koneksi);
}

// Function Edit
function editAnggota($data){
	global $koneksi;
	$idAnggota = $data['idAnggota'];
	$namaAnggota = $data['namaAnggota'];
	$kelasAnggota = $data['kelasAnggota'];
	$query = "UPDATE kelolaanggota SET namaAnggota = '$namaAnggota', kelasAnggota = '$kelasAnggota' WHERE idAnggota = $idAnggota";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

// Function Edit
function editFiksi($data){
	global $koneksi;
	$idBukuFiksi = $data['idBukuFiksi'];
	$judulBuku = $data['judulBuku'];
	$penulisBuku = $data['penulisBuku'];
	$penerbitBuku = $data['penerbitBuku'];
	$tahunTerbit = $data['tahunTerbit']; 

	$query = "UPDATE bukufiksi SET judulBuku = '$judulBuku', penulisBuku = '$penulisBuku', penerbitBuku = '$penerbitBuku', tahunTerbit = '$tahunTerbit' WHERE idBukuFiksi = $idBukuFiksi";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function editPaket($data){
	global $koneksi;
	$idBukuPaket = $data['idBukuPaket'];
	$paket = $data['paket'];
	$daftarJudulPaket = $data['daftarJudulPaket']; 

	$query = "UPDATE bukupaket SET paket = '$paket', daftarJudulPaket = '$daftarJudulPaket' WHERE idBukuPaket = $idBukuPaket";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function editPeminjamanFiksi($data){
	global $koneksi;
	$idPeminjamFiksi = $data['idPeminjamFiksi'];
	$tglPinjam = $data['tglPinjam']; 
	$idAnggota = $data['idAnggota'];
	$idBukuFiksi = $data['idBukuFiksi'];
	

	$query = " UPDATE peminjamanbukufiksi SET tglPinjam = '$tglPinjam', idAnggota = '$idAnggota', idBukuFiksi = '$idBukuFiksi' WHERE idPeminjamFiksi = $idPeminjamFiksi ";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function editPeminjamanPaket($data){
	global $koneksi;
	$idPeminjamPaket = $data['idPeminjamPaket'];
	$tglPinjam = $data['tglPinjam']; 
	$idBukuPaket = $data['idBukuPaket'];
	$idAnggota = $data['idAnggota'];
	

	$query = " UPDATE peminjamanbukupaket SET tglPinjam = '$tglPinjam', idBukuPaket = $idBukuPaket, idAnggota = $idAnggota WHERE idPeminjamPaket = $idPeminjamPaket ";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

//function  fitur search

function searchanggota($keyword){
	$query = "SELECT * FROM kelolaanggota WHERE namaAnggota LIKE '%$keyword%' OR kelasAnggota LIKE '%keyword%' OR kelamin LIKE '%keyword%' OR noHp LIKE '%keyword%'";
	
	return query($query);
}

function searchfiksi($keyword){
	$query = "SELECT * FROM bukufiksi WHERE judulBuku LIKE '%$keyword%' OR penulisBuku LIKE '%$keyword%' OR penerbitBuku LIKE '%$keyword%' OR tahunTerbit LIKE '%keyword%'";
	
	return query($query);
}

//search tabel buku paket
function searchpaket($keyword){
	$query = "SELECT * FROM bukupaket WHERE paket LIKE '%$keyword%' OR daftarJudulPaket LIKE '%$keyword%'";
	
	return query($query);
}

//search tabel buku paket
function searchpinjamfiksi($keyword){
	$query = "SELECT kelolaanggota.namaAnggota,kelolaanggota.kelasAnggota,bukufiksi.judulBuku, peminjamanbukufiksi.tglPinjam,peminjamanbukufiksi.batasWaktu, peminjamanbukufiksi.denda,peminjamanbukufiksi.idPeminjamFiksi,peminjamanbukufiksi.status FROM peminjamanbukufiksi INNER JOIN bukufiksi ON peminjamanbukufiksi.idBukuFiksi = bukufiksi.idBukuFiksi INNER JOIN kelolaanggota ON peminjamanbukufiksi.idAnggota = kelolaanggota.idAnggota WHERE kelolaanggota.namaAnggota LIKE '%$keyword%' OR kelolaanggota.kelasAnggota LIKE '%$keyword%' OR bukufiksi.judulBuku LIKE '%$keyword%' OR peminjamanbukufiksi.tglPinjam LIKE '%$keyword%' OR peminjamanbukufiksi.batasWaktu LIKE '%$keyword%' OR peminjamanbukufiksi.denda LIKE '%$keyword%' OR peminjamanbukufiksi.status LIKE '%$keyword%'";
	
	return query($query);
}

//search tabel Pengembalian buku
function searchkembalifiksi($keyword){
	$query = "SELECT kelolaanggota.namaAnggota,kelolaanggota.kelasAnggota,bukufiksi.judulBuku, peminjamanbukufiksi.tglPinjam,peminjamanbukufiksi.batasWaktu,pengembalianbukufiksi.tglKembali,peminjamanbukufiksi.denda from pengembalianbukufiksi inner join peminjamanbukufiksi on pengembalianbukufiksi.idPeminjamFiksi = peminjamanbukufiksi.idPeminjamFiksi inner join bukufiksi on peminjamanbukufiksi.idBukuFiksi = bukufiksi.idBukuFiksi inner join kelolaanggota on peminjamanbukufiksi.idAnggota = kelolaanggota.idAnggota WHERE kelolaanggota.namaAnggota LIKE '%$keyword%' OR kelolaanggota.kelasAnggota LIKE '%$keyword%' OR bukufiksi.judulBuku LIKE '%$keyword%' OR peminjamanbukufiksi.tglPinjam LIKE '%$keyword%' OR peminjamanbukufiksi.batasWaktu LIKE '%$keyword%' OR pengembalianbukufiksi.tglKembali LIKE '%$keyword%' OR peminjamanbukufiksi.denda LIKE '%$keyword%'";
	
	return query($query);
	
}

function searchpinjampaket($keyword){

	$query = " SELECT kelolaanggota.namaAnggota,kelolaanggota.kelasAnggota,kelolaanggota.kelamin,kelolaanggota.noHp,bukupaket.daftarJudulPaket,peminjamanbukupaket.tglPinjam,peminjamanbukupaket.status,peminjamanbukupaket.idPeminjamPaket FROM peminjamanbukupaket INNER JOIN bukupaket on peminjamanbukupaket.idBukuPaket = bukupaket.idBukuPaket INNER JOIN kelolaanggota on peminjamanbukupaket.idAnggota = kelolaanggota.idAnggota WHERE kelolaanggota.namaAnggota LIKE '%$keyword%' OR kelolaanggota.kelasAnggota LIKE '%$keyword%' OR kelolaanggota.kelamin LIKE '%$keyword%' OR bukupaket.daftarJudulPaket LIKE '%$keyword%' OR kelolaanggota.noHp LIKE '%$keyword%' OR peminjamanbukupaket.tglPinjam LIKE '%$keyword%' OR peminjamanbukupaket.status LIKE '%$keyword%'";

	return query($query);
}

function searchkembalipaket($keyword){

	$query = " SELECT kelolaanggota.namaAnggota,kelolaanggota.kelasAnggota,kelolaanggota.kelamin,kelolaanggota.noHp,bukupaket.daftarJudulPaket,peminjamanbukupaket.tglPinjam,pengembalianbukupaket.tglKembali from pengembalianbukupaket INNER JOIN peminjamanbukupaket on pengembalianbukupaket.idPeminjamPaket = peminjamanbukupaket.idPeminjamPaket inner join bukupaket on peminjamanbukupaket.idBukuPaket = bukupaket.idBukuPaket inner join kelolaanggota on peminjamanbukupaket.idAnggota = kelolaanggota.idAnggota WHERE kelolaanggota.namaAnggota LIKE '%$keyword%' OR kelolaanggota.kelasAnggota LIKE '%$keyword%' OR kelolaanggota.kelamin LIKE '%$keyword%' OR bukupaket.daftarJudulPaket LIKE '%$keyword%' OR kelolaanggota.noHp LIKE '%$keyword%' OR peminjamanbukupaket.tglPinjam LIKE '%$keyword%' OR pengembalianbukupaket.tglKembali LIKE '%$keyword%'";

	return query($query);
}
	

 ?>
