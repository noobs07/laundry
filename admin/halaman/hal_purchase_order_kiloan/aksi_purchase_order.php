<?php

session_start();
include "../../config/koneksi.php";

if (isset($_GET['halamane'])) {$halamane=$_GET['halamane'];} else {$halamane = "";} 
if (isset($_GET['act'])) {$act=$_GET['act'];} else {$act = "";}
$username = $_SESSION['namauser'];

//buat kode otomatis
$year =date('y');
	   

if(isset($_POST["input_detail"])){
	$inc = $_POST["inc"];
	$id_paket = $_POST["s_id_paket"];
	$harga = $_POST["s_harga"];
	$berat = $_POST["s_berat"];
	$ket = $_POST["ket"];
	$total = $berat * $harga;
	
	
	
	//insert ke tabel order_detail_kiloan
			$purchase_order="INSERT INTO order_detail_kiloan 
			VALUES(null,'NOTA$year-$inc','$id_paket','$ket','$berat','$total')";
			mysqli_query($conn, $purchase_order);
			echo "<div class='alert alert-success'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <h4>Sukses!!</h4>
                        	Item berhasil disimpan</div>";
			$_SESSION['inc'] = $inc;				
	
}

if(isset($_POST["subtotal"])){
	
if (isset($_SESSION['inc'])) { $inc = $_SESSION['inc']; } else { $inc = 0; }	
	$subtotal = "SELECT SUM(price)AS total FROM order_detail_kiloan WHERE purchase_order_id='NOTA$year-$inc'";
	$run_query = mysqli_query($conn, $subtotal);
	$row = mysqli_fetch_array($run_query);
	echo $row['total'];	
		
	
}

if(isset($_POST["hapus"])){
	$inc = $_POST["s_inc"];
	
	$del = "DELETE FROM order_detail_kiloan WHERE inc='$inc'";
	$run_del = mysqli_query($conn, $del);
	
	
	if ($run_del) {
			echo "<div class='alert alert-success'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <h4>Sukses!!</h4>
                        	Item berhasil dihapus</div>";
	} else  {
		echo "<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <h4>Error!!</h4>
                        	Item gagal dihapus</div>";
	}
}

if(isset($_POST["detail"])){

if (isset($_SESSION['inc'])) { $inc = $_SESSION['inc']; } else { $inc = 0; }

	$detail = "SELECT * FROM order_detail_kiloan A, paket B where A.purchase_order_id ='NOTA$year-$inc' AND A.id_paket = B.id_paket";
	$run_query = mysqli_query($conn, $detail);
	$berat = mysqli_num_rows($run_query);
	echo "<table class='table table-condensed table-bordered table-hover'>
		<tr>
		  <th>Nama Paket</th> 
		  <th>Keterangan</th>
		  <th>Harga</th>
		  <th style='width:100px'>Berat</th>
		  <th>Total</th>
		  <th style='width:100px;text-align:center'>Action</th>
		</tr>";
	while($row = mysqli_fetch_array($run_query)){
	echo	
		"<tr>
		<form action='halaman/hal_purchase_order_kiloan/aksi_purchase_order.php' method='POST'>
     <td>$row[nama_paket] </td>
	 <td>$row[ket]</td>
    <td>Rp ".number_format($row['harga'])."</td>
    <td>$row[berat] Kg</td>
    <td>Rp  ".number_format($row['price'])."</td>
     <td style='text-align:center'>
     	<a type='button' inc='".$row['inc']."' class='btn btn-default' id='hapus'><i class='icon-trash'></i></a>
     </td>
    </tr>
	</form>
	";
	}  if ($berat == 0){
		echo "<tr><td colspan='6'>Row data is empty</td></tr>";
	}	
	
	echo
	"
	</table>";
	
}



?>
