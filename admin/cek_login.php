<?php
include "config/koneksi.php";
session_start();

$username = $_POST['username'];
$pass     = md5($_POST['password']);

$login=mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$pass'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  

  $_SESSION['namauser']     = $r['username'];
  $_SESSION['namalengkap']  = $r['nama_lengkap'];
  $_SESSION['passuser']     = $r['password'];
  $_SESSION['leveluser']    = $r['level'];
  
  header('location:bagian.php?halamane=home');
}
else{
	$_SESSION['status'] = "<strong>Gagal Login!</strong> Username dan Password salah!!";
	header('location:.');
	
}
?>
