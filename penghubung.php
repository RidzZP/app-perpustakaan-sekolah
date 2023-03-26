<?php 

@$url = $_GET['url'];
if ($url == "" || $url == "paneladmin") {
	include "paneladmin.php";
}elseif ($url == "bukufiksi") {
	include "bukufiksi.php";
}elseif($url == "kelolaanggota"){
	include "kelolaanggota.php";
}elseif($url == "tambahanggota"){
	include "tambahanggota.php";
}elseif($url == "hapusanggota"){
	include "hapusanggota.php";
}elseif($url == "editanggota"){
	include "editanggota.php";
}elseif($url == "exportanggota"){
	include "exportanggota.php";
}elseif ($url == "bukupaket"){
	include "bukupaket.php";
}elseif ($url == "peminjaman") {
	include "peminjaman.php";
}elseif ($url == "peminjamanfiksi") {
	include "peminjamanfiksi.php";
}elseif ($url == "peminjamanpaket"){
	include "peminjamanpaket.php";
}elseif ($url == "pengembalian") {
	include "pengembalian.php";
}elseif ($url == "pengembalianfiksi"){
	include "pengembalianfiksi.php";
}elseif ($url == "about") {
	include "about.php";
}elseif ($url == "tambahfiksi") {
	include "tambahFiksi.php";
}elseif ($url == "editfiksi"){
	include "editfiksi.php";
}elseif ($url == "hapusfiksi"){
	include "hapusfiksi.php";
}elseif ($url == "exportfiksi") {
	include "exportfiksi.php";
}elseif ($url == "tambahpaket") {
	include "tambahpaket.php";
}elseif ($url == "editpaket") {
	include "editPaket.php";
}elseif ($url == "hapuspaket") {
	include "hapuspaket.php";
}elseif ($url == "exportpaket") {
	include "exportpaket.php";
}elseif ($url == "tambahpeminjamanfiksi") {
	include "tambahpeminjamanfiksi.php";
}elseif ($url == "editpeminjamanfiksi") {
	include "editpeminjamanfiksi.php";
}elseif ($url == "hapuspeminjamanfiksi") {
	include "hapuspeminjamanfiksi.php";
}elseif ($url == "exportpeminjamanfiksi") {
	include "exportpeminjamanfiksi.php";
}elseif ($url == "pengembalianbukufiksi") {
	include "pengembalianbukufiksi.php";
}elseif ($url == "pengembalianbukupaket"){
	include "pengembalianbukupaket.php";
}elseif ($url == "tambahpeminjamanpaket"){
	include "tambahpeminjamanpaket.php";
}elseif ($url == "editpeminjamanpaket"){
	include "editpeminjamanpaket.php";
}elseif ($url == "hapuspeminjamanpaket"){
	include "hapuspeminjamanpaket.php";
}elseif ($url == "pengembalianpaket"){
	include "pengembalianpaket.php";
}elseif ($url == "hapuspengembalianpaket"){
	include "hapuspengembalianpaket.php";
}elseif ($url == "hapuspengembalianfiksi") {
	include "hapuspengembalianfiksi.php";
}elseif ($url == "laporanpeminjaman"){
	include "laporanpeminjaman.php";
}elseif ($url == "laporanpengembalian"){
	include "laporanpengembalian.php";
}
 ?>