<?php
session_start();
include "../../config/koneksi.php";

$halamane=$_GET['halamane'];
$act=$_GET['act'];


$username = $_SESSION['namauser'];
$year =date('y');

if($halamane=='purchase_order_pcs' AND $act=='input'){
	
	
	$inc = $_POST["inc"];
	$tanggal_masuk = $_POST["tanggal_masuk"];
	$tanggal_selesai = $_POST["tanggal_selesai"];
	$member = $_POST["member"];
	$subtotaltxt = $_POST["subtotaltxt"];
	$uangtxt = $_POST["uangtxt"];
	$kembaliantxt = $_POST["kembaliantxt"];
	
	
	
	//insert ke tabel purchase_order
			$purchase_order="INSERT INTO purchase_order 
			VALUES('$inc','NOTA$year-$inc','$tanggal_masuk','$tanggal_selesai','$member','$subtotaltxt','$uangtxt','$kembaliantxt','0')";
			$run_query = mysqli_query($conn, $purchase_order);
			unset($_SESSION['inc']);
			
			
	if ($run_query) { 
			$_SESSION['status'] = "<div class='alert alert-success'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <h4>Sukses!!</h4>
                        	Transaksi berhasil disimpan</div>";
	} else  {
		$_SESSION['status'] = "<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <h4>Error!!</h4>
                        	Transaksi gagal disimpan</div>";
	}
	
	header('location:../../bagian.php?halamane=transaksi_pcs');
}
?>