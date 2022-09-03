 <?php
$aksi="halaman/hal_transaksi/aksi_transaksi.php";

if (!isset($_GET['act'])) { $_GET['act'] = ''; }
switch($_GET['act']){
  // Tampil Transaksi Laundri
  default: ?>
  <?php if (isset($_SESSION['status'])) { ?>
	     <?php echo  $_SESSION['status']; unset($_SESSION['status'])?>
	 <?php } ?>
  <div class='row-fluid'>
                        <!-- block -->
                        <div class='block'>
                            <div class='navbar navbar-inner block-header'>
                                <div class='muted pull-left'><i class="icon-th-large"></i> Data Transaksi </div>
                            </div>
                            <div class='block-content collapse in'>
                                <div class='span12'>
                                   <div class='table-toolbar'>
                                      
                                      
                                   </div>
                                    <div id="transaksi_pcs">
                                    <table  class='table table-striped table-bordered' >
                                        <thead>
		  <tr>
		  <th>No</th>
		  <th>Nota</th>
		  <th>Tanggal Masuk</th>
		  <th>Member</th>
		  <th>Total</th>
		  <th>Uang</th>
		  <th>Status</th>
		  <th>aksi</th>
		  </tr>
										</thead>
										<tbody>
	<?php
   $tampil=mysqli_query($conn, "SELECT * FROM order_laundry, order_detail, member WHERE order_laundry.username = member.username AND order_laundry.order_id = order_detail.order_id GROUP BY order_laundry.order_id ORDER BY  order_laundry.id DESC ");
   
   $no=1;
    while ($r=mysqli_fetch_array($tampil)){
		$cetak = $r['cetak'];
	?>
	
			<tr  class="<?php if ($cetak == 0) { echo "success"; } else { echo ""; }  ?>">
			<td><center><?=$no?></center></td>
             <td><?=$r['order_id']?></td>
             <td><?=$r['tanggal_masuk']?></td>
             <td><?=$r['nama_lengkap']?></td>
             <td>Rp <?=number_format($r['grand_total'])?></td>
             <td>Rp <?=number_format($r['uang'])?></td>
             <td><?php if ($r['status'] == "1")  { ?>
						  <span class="label label-warning">Belum Lunas</span>
					<?php } else if ($r['status'] == "2") { ?>
						  <span class="label label-success">Lunas</span>
						<?php  } else if ($r['status'] == "3") { ?>
						  <span class="label label-danger">Diproses</span>
						<?php } ?> 
             <td>
			 <center>
			 <a onclick="return confirm('Are you sure want to delete this data?')" class='btn btn-danger btn-mini' href='<?=$aksi?>?halamane=transaksi&act=hapus&id=<?=$r['order_id']?>'>Hapus</a>
			  <a class='btn btn-success btn-mini'  href="bagian.php?halamane=detail_transaksi&id=<?=$r['order_id']?>">Detail</a>
			  
			 </center>
             </td></tr>
			<?php 
      $no++;
    }	?>
											
										</tbody>
                                    </table>
									</div>
									
		<div id="tampil_detail"></div>							
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php
    break;
  
 
  
 
}
?>