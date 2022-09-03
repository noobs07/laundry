<?php

session_start();
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html >
    
    <head>
        <title>Cetak Transaksi <?=$_GET['id']?></title>
        <!-- Bootstrap -->
          <link href="assets/print.css" rel="stylesheet" >
    </head>
    
    <body class="print" onLoad="window.print()">
        <div style="width:800px;" class="preview">
		<div class="title">
			<b>LAUNDRY ERBE NOTA TRANSAKSI<br>
			<small>Jl. Nusantara 2, Wosi Dalam. Manokwari, Papua Barat, Telp. 085280402251</small>
			</b>			
			<div class="border"></div>
		</div>
                       <?php 
					if ($_GET['halamane']=='transaksi'){
						include "halaman/cetak/transaksi.php";  
					}

					
					else if ($_GET['halamane']=='kiloan'){
						include "halaman/cetak/kiloan.php";
					}
	
					   ?> 
                   
	
    </body>

</html>
