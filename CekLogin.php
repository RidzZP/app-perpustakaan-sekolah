<?php
SESSION_START();
include('konfigurasi.php');
$user=$_POST['username'];
$pass= md5($_POST['password']);

$sql = "SELECT * FROM datauser WHERE username= '$user' AND password='$pass'";
$queryCekUser=mysqli_query($koneksi, $sql);


$dataUserLogin = mysqli_fetch_assoc($queryCekUser);


if($user==$dataUserLogin['username'] && $pass==$dataUserLogin['password']){
	$_SESSION['login'] = true;
	$_SESSION['user']=$dataUserLogin['username'];
	$_SESSION['level']=$dataUserLogin['levelUser'];
	echo "<script> alert('halooo');</script>";
	header('location:index.php');
		
} else {
	echo "<script>alert('Gagal Login')</script>";
	header('location:login.php');
}
	
?>
