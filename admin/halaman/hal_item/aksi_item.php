<?php
session_start();
include "../../config/koneksi.php";

$halamane=$_GET['halamane'];
$act=$_GET['act'];

// Hapus item
if ($halamane=='item' AND $act=='hapus'){
  mysqli_query($conn, "DELETE FROM item WHERE id_item='$_GET[id]'");
  header('location:../../bagian.php?halamane='.$halamane);
}

// Input item
elseif ($halamane=='item' AND $act=='input'){
  mysqli_query($conn, "INSERT INTO item(item_name,type,harga) 
							VALUES('$_POST[item_name]','$_POST[type]','$_POST[harga]')");
  header('location:../../bagian.php?halamane='.$halamane);
}

// Update item
elseif ($halamane=='item' AND $act=='update'){
  mysqli_query($conn, "UPDATE item SET item_name = '$_POST[item_name]',
								  harga = '$_POST[harga]',
								  type = '$_POST[type]'
								  WHERE id_item = '$_POST[id]'");
  header('location:../../bagian.php?halamane='.$halamane);
}
?>
