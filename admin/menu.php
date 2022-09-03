<?php
include "config/koneksi.php";
$jmlorder=mysqli_num_rows(mysqli_query($conn, "select * from order_laundry"));
 if ($_SESSION['leveluser']=='admin'){ ?>
<div class='span3' id='sidebar'>
                    <ul class='nav nav-list bs-docs-sidenav nav-collapse collapse'>
                        <li class='disabled menu' >
                            <a ><i class='icon-th-list icon-white'></i> Menu Utama</a>
                        </li>
                         <li class='<?php if ($_GET['halamane'] == 'home') { echo "active"; } ?>'>
                            <a href='bagian.php?halamane=home'><i class='icon-chevron-right'></i> Dashboard</a>
                        </li>
                        <li class='<?php if ($_GET['halamane'] == 'paket') { echo "active"; } ?>'><a href='bagian.php?halamane=paket'><i class='icon-chevron-right'></i> Paket Kiloan</a></li>
                       
                        <li class='<?php if ($_GET['halamane'] == 'item') { echo "active"; } ?>'><a href='bagian.php?halamane=item'><i class='icon-chevron-right'></i> Item Pcs</a></li>
						 
						 
						 
						 <li class='<?php if ($_GET['halamane'] == 'member') { echo "active"; } ?>'><a href='bagian.php?halamane=member'><i class='icon-chevron-right'></i>Data Member</a></li>
						 
                       
						
						<li class='<?php if ($_GET['halamane'] == 'transaksi') { echo "active"; } ?>'><a href='bagian.php?halamane=transaksi'><i class='icon-chevron-right'></i>Data Transaksi </a></li>
						
						
						
						
					
						
                    </ul>
                </div>


<?php				
}
?>