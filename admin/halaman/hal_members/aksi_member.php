<?php
session_start();
include "../../config/koneksi.php";

$halamane=$_GET[halamane];
$act=$_GET[act];

// Hapus member
if ($halamane=='member' AND $act=='hapus'){
  mysqli_query($conn, "DELETE FROM member WHERE id_member='$_GET[id]'");
  header('location:../../bagian.php?halamane='.$halamane);
}


// Update member
elseif ($halamane=='member' AND $act=='update'){
$password=md5($_POST['password']);
  mysqli_query($conn, "UPDATE member SET  nama_lengkap = '$_POST[nama_lengkap]',
								  no_telp = '$_POST[no_telp]',
								  alamat = '$_POST[alamat]',
								  username ='$_POST[username]', 
								  password ='$_POST[password]',
								  aktif ='$_POST[aktif]'
								  WHERE id_member = '$_POST[id]'");
  header('location:../../bagian.php?halamane='.$halamane);
}
?>
