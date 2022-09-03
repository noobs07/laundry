<?php
session_start();
include "../../config/koneksi.php";

$halamane=$_GET[halamane];
$act=$_GET[act];

// Hapus paket
if ($halamane=='paket' AND $act=='hapus'){
  mysqli_query($conn, "DELETE FROM paket WHERE id_paket='$_GET[id]'");
  header('location:../../bagian.php?halamane='.$halamane);
}

// Input paket
elseif ($halamane=='paket' AND $act=='input'){
  mysqli_query($conn, "INSERT INTO paket(nama_paket,harga) 
							VALUES('$_POST[nama_paket]','$_POST[harga]')");
  header('location:../../bagian.php?halamane='.$halamane);
}

// Update paket
elseif ($halamane=='paket' AND $act=='update'){
  mysqli_query($conn, "UPDATE paket SET nama_paket = '$_POST[nama_paket]',
								  harga = '$_POST[harga]'
								  WHERE id_paket = '$_POST[id]'");
  header('location:../../bagian.php?halamane='.$halamane);
}
?>
