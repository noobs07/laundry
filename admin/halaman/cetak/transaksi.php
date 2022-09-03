<?php
$id = $_GET['id'];
 $tampil=mysqli_query($conn, "SELECT * FROM order_laundry, member WHERE order_laundry.username = member.username AND order_laundry.order_id='$id'");
   
   $no=1;
    while ($row=mysqli_fetch_array($tampil)){
		
?>
		<div class="konten">
			<table class="table1" style="margin-top:10px"> 	
			
			<tr>
			<th style="width:10%">No. Transaksi</th>
			<td>: <span style="width:90%;"> <?=$_GET['id']?></span></td>
			<th >Status</th>
			<td >: <span style="width:90%;"> 
			<?php if ($row['status'] == "1")  { ?>
						  Belum Lunas
					<?php } else if ($row['status'] == "2") { ?>
						  Lunas
						<?php } ?> 
			</span></td>
			</tr>
			<tr>
			<th style="width:20%">Nama</th>
			<td>: <span style="width:90%;"> <?=$row['nama_lengkap'] ?></span></td>
			<th >Tanggal Masuk</th>
			<td >: <span style="width:90%;"> <?=$row['tanggal_masuk'] ?></span></td>
			</tr>
			<tr>
		
			<th style="width:120px">Alamat Order</th>
			<td style="" colspan='3'>: <span style="width:96%;"> <?=$row['alamat_order'] ?></span></td>
			</tr>
			
			</table>
		
			<p><b>Laundry Kiloan</b></p>
			<table >
					<thead>
						<tr class="daftar">
							<th class="text-center" >Nama Paket</th>
							<th style="width:200px;">Harga</th>	
							<th class="text-center" >Jumlah</th>	
						  <th>Tanggal Selesai</th>
						  <th>Status</th>
						   <th>Subtotal</th>
						</tr>
						
						
						
					</thead>
					<tbody class="text-center">	
					<?php
					$sql = mysqli_query($conn, "SELECT * FROM order_laundry, order_detail, paket WHERE  order_laundry.order_id = order_detail.order_id AND order_detail.id_paket=paket.id_paket AND order_detail.order_id='$id' ORDER BY order_laundry.id DESC ");
					while($r = mysqli_fetch_array($sql)){
						
				
						
					?>		
						<tr class="soft daftar text-capitalize  text-left">
							

							<td><?=$r['nama_paket']?></td>
             <td>Rp <?=number_format($r['harga']) ?></td>
             <td><?=$r['qty']?>Kg</td>
             <td><?php if ($r['tanggal_selesai'] == "0000-00-00 00:00:00") { echo "Belum Selesai"; } else { echo $r['tanggal_selesai']; } ?> </td>
			 <td><?php if ($r['status_laundry'] == "0")  { ?>
						  <span class="label label-warning">Diproses</span>
					<?php } else if ($r['status_laundry'] == "1") { ?>
						  <span class="label label-info">Selesai</span>
					<?php } else if ($r['status_laundry'] == "2") { ?>
						  <span class="label label-success">Diambil</span>
						<?php } ?> 
							 
					</td>
			 <td>Rp <?=number_format($r['price'])?></td>
							
						
						</tr>	
					<?php } ?>
					 </tbody>
					
			</table>
			
			
			<p><b>Laundry Pcs</b></p>
			
			<table>
					<thead>
						<tr class="daftar">
							<th>No</th>
		  <th>Nama Item</th>
		  <th>Type</th>
		  <th>layanan</th>
		  <th>Harga</th>
		  <th>Jumlah</th>
		   <th>Tanggal Selesai</th>
		   <th>Status</th>
		    <th>Subtotal</th>
						</tr>
						
						
						
					</thead>
					<tbody class="text-center">	
						<?php
   $tampil2=mysqli_query($conn, "SELECT * FROM order_laundry, order_detail, item WHERE  order_laundry.order_id = order_detail.order_id AND order_detail.id_item=item.id_item AND order_detail.order_id='$_GET[id]' ORDER BY order_laundry.id DESC ");
   
   $no2=1;
    while ($r=mysqli_fetch_array($tampil2)){
		$cetak = $r['cetak'];
	?>
	
			<tr >
			<td><center><?=$no2?></center></td>
             <td><?=$r['item_name']?></td>
             <td><?=$r['type']?></td>
             <td><?=$r['layanan_pcs']?></td>
             <td>Rp <?=number_format($r['harga']) ?></td>
             <td><?=$r['qty']?> Pcs</td>
            
			 <td><?php if ($r['tanggal_selesai'] == "0000-00-00 00:00:00") { echo "Belum Selesai"; } else { echo $r['tanggal_selesai']; } ?> </td>
			 <td><?php if ($r['status_laundry'] == "0")  { ?>
						  <span class="label label-warning">Diproses</span>
					<?php } else if ($r['status_laundry'] == "1") { ?>
						  <span class="label label-info">Selesai</span>
					<?php } else if ($r['status_laundry'] == "2") { ?>
						  <span class="label label-success">Diambil</span>
						<?php } ?> 
							 
					</td>
			 <td>Rp <?=number_format($r['price'])?></td>
             </tr>
					<?php } ?>
					 
			
			<tr>
			<td colspan="7"></td>
			<td>Grand Total </td>
			<th>Rp <?=number_format($row['grand_total'])?></th>
			</tr>
			
			<tr>
			<td colspan="7"></td>
			<td>Uang</td>
			<th>Rp <?=number_format($row['uang'])?></th>
			</tr>
			
			
			</table>
	<?php } ?>			
		</div>
		<br>			
					
	</div>	