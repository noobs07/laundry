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
	$id_item = $_POST["s_id_item"];
	$harga = $_POST["s_harga"];
	$jumlah = $_POST["s_jumlah"];
	$total = $jumlah * $harga;
	
	$cek = "SELECT * FROM order_detail_pcs A, item B where A.purchase_order_id ='NOTA$year-$inc' AND A.id_item = B.id_item AND A.id_item = '$id_item'";
	$run_cek = mysqli_query($conn, $cek);
	$cek_jumlah = mysqli_num_rows($run_cek);
	
	if ($cek_jumlah == 0) {
	
	//insert ke tabel order_detail_pcs
			$purchase_order="INSERT INTO order_detail_pcs 
			VALUES(null,'NOTA$year-$inc','$id_item','$jumlah','$total')";
			mysqli_query($conn, $purchase_order);
			echo "<div class='alert alert-success'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <h4>Sukses!!</h4>
                        	Item berhasil disimpan</div>";
			$_SESSION['inc'] = $inc;				
	} else if ($cek_jumlah > 0) {
		echo "<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <h4>Error!!</h4>
                        	Item sudah dipilih</div>";
	}
}

if(isset($_POST["subtotal"])){
	
if (isset($_SESSION['inc'])) { $inc = $_SESSION['inc']; } else { $inc = 0; }	
	$subtotal = "SELECT SUM(price)AS total FROM order_detail_pcs WHERE purchase_order_id='NOTA$year-$inc'";
	$run_query = mysqli_query($conn, $subtotal);
	$row = mysqli_fetch_array($run_query);
	echo $row['total'];	
		
	
}

if(isset($_POST["hapus"])){
	$inc = $_POST["s_inc"];
	
	$del = "DELETE FROM order_detail_pcs WHERE inc='$inc'";
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

	$detail = "SELECT * FROM order_detail_pcs A, item B where A.purchase_order_id ='NOTA$year-$inc' AND A.id_item = B.id_item";
	$run_query = mysqli_query($conn, $detail);
	$jumlah = mysqli_num_rows($run_query);
	echo "<table class='table table-condensed table-bordered table-hover'>
		<tr>
		  <th>Nama Item</th> 
		  <th>Tipe</th>
		  <th>Harga</th>
		  <th style='width:100px'>Jumlah</th>
		  <th>Total</th>
		  <th style='width:100px;text-align:center'>Action</th>
		</tr>";
	while($row = mysqli_fetch_array($run_query)){
	echo	
		"<tr>
		<form action='halaman/hal_purchase_order_pcs/aksi_purchase_order.php' method='POST'>
     <td>$row[item_name] </td>
	 <td>$row[type]</td>
    <td>Rp ".number_format($row['harga'])."</td>
    <td>$row[quantity]</td>
    <td>Rp  ".number_format($row['price'])."</td>
     <td style='text-align:center'>
     	<a type='button' inc='".$row['inc']."' class='btn btn-default' id='hapus'><i class='icon-trash'></i></a>
     </td>
    </tr>
	</form>
	";
	}  if ($jumlah == 0){
		echo "<tr><td colspan='6'>Row data is empty</td></tr>";
	}	
	
	echo
	"
	</table>";
	
}



?>
