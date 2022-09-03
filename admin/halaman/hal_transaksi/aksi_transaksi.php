<?php
session_start();
include "../../config/koneksi.php";

if (isset($_GET['halamane'])) {$halamane=$_GET['halamane'];} else {$halamane = "";} 
if (isset($_GET['act'])) {$act=$_GET['act'];} else {$act = "";}
$aksi="halaman/hal_transaksi/aksi_transaksi.php";

// Hapus piutang
if ($halamane=='transaksi' AND $act=='hapus'){
 $query1 = mysqli_query($conn, "DELETE FROM order_laundry WHERE order_id='$_GET[id]'");
  
 $query2 = mysqli_query($conn, "DELETE FROM order_detail WHERE order_id='$_GET[id]'");
  
  if ($query2) { 
			$_SESSION['status'] = "<div class='alert alert-success'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <h4>Sukses!!</h4>
                        	Transaksi berhasil dihapus</div>";
	} else  {
		$_SESSION['status'] = "<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <h4>Error!!</h4>
                        	Transaksi gagal dihapus</div>";
	}
							
  header('location:../../bagian.php?halamane='.$halamane);
}

else if ($halamane=='transaksi' AND $act=='cetak'){
 $query1 = mysqli_query($conn, "UPDATE order_laundry SET cetak = '1'
								  WHERE order_id = '$_GET[id]'");
  $id = $_GET['id'];
							
  header('location:../../cetak.php?halamane=pcs&id='.$id);
}

else if ($halamane=='detail_transaksi' AND $act=='cetak'){
 $query1 = mysqli_query($conn, "UPDATE order_laundry SET cetak = '1'
								  WHERE order_id = '$_GET[id]'");
   $id = $_GET['id'];
							
  header('location:../../cetak.php?halamane=transaksi&id='.$id);
}


else if ($halamane=='detail_transaksi' AND $act=='lunas'){
 $query1 = mysqli_query($conn, "UPDATE order_laundry SET status = '2'
								  WHERE order_id = '$_GET[id]'");
   $id = $_GET['id'];
							
  header('location:../../bagian.php?halamane=detail_transaksi&id='.$id);
}


else if ($halamane=='detail_transaksi' AND $act=='tolak'){
 $query1 = mysqli_query($conn, "UPDATE order_laundry SET status = '1', struk = ''
								  WHERE order_id = '$_GET[id]'");
   $id = $_GET['id'];
							
  header('location:../../bagian.php?halamane=detail_transaksi&id='.$id);
}


else if ($halamane=='detail_transaksi' AND $act=='selesai'){
	$selesai = date('Y-m-d H:i:s');
 $query1 = mysqli_query($conn, "UPDATE order_detail SET status_laundry = '1',
												tanggal_selesai = '$selesai'
										WHERE 	id = '$_GET[id]'");
   $id = $_GET['id'];
   $order_id = $_GET['a'];
							
  header('location:../../bagian.php?halamane=detail_transaksi&id='.$order_id);
}






?>
