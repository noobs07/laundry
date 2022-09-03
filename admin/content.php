<?php
include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_rupiah.php";

// Bagian Home
if ($_GET['halamane']=='home'){
 
  ?>
  <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Selamat Datang</h4>
                        	Silahkan Mengelola Aplikasi anda dengan menu yang tersedia</div>
							
	
  <?php
}

// Bagian Password
elseif ($_GET['halamane']=='password'){
    include "halaman/hal_password/password.php";
}


// Bagian paket
elseif ($_GET['halamane']=='paket'){
    include "halaman/hal_paket/paket.php";
  
}

// Bagian admins
elseif ($_GET['halamane']=='member'){
    include "halaman/hal_members/member.php";
 
}


// Bagian item
elseif ($_GET['halamane']=='item'){
    include "halaman/hal_item/item.php";
  
}


// Bagian phurchase_order
elseif ($_GET['halamane']=='purchase_order_pcs'){
    include "halaman/hal_purchase_order_pcs/purchase_order_new_doc.php";
 
}


// Bagian phurchase_order
elseif ($_GET['halamane']=='purchase_order_kiloan'){
    include "halaman/hal_purchase_order_kiloan/purchase_order_new_doc.php";
 
}

// Bagian piutang
elseif ($_GET['halamane']=='transaksi'){
    include "halaman/hal_transaksi/transaksi.php";
  
}

// Bagian piutang
elseif ($_GET['halamane']=='detail_transaksi'){
    include "halaman/hal_transaksi/detail_transaksi.php";
  
}



// Apabila halaman tidak ditemukan
else{
  echo "<p><b>Maaf, Halaman Belum Tersedia</b></p>";
}
?>
