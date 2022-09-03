<?php
$id = $_GET['id'];
 $tampil=mysqli_query($conn, "SELECT * FROM purchase_order P,  member M WHERE P.id_member=M.id_member AND  P.purchase_order_id ='$id' ");
   
   $no=1;
    while ($r=mysqli_fetch_array($tampil)){
		
?>
		<div class="konten">
			<table class="table1" style="margin-top:10px"> 	
			
			<tr>
			<th style="width:120px">Nama</th>
			<td style="" colspan='3'>: <span style="width:96%;"> <?=$r['nama_lengkap'] ?></span></td>
			</tr>
			<tr>
			<th >Tanggal Masuk</th>
			<td >: <span style="width:90%;"> <?=$r['tanggal_masuk'] ?></span></td>
			
			<th style="width:120px">Tanggal Selesai</th>
			<td style="">: <span style="width:90%;"> <?=$r['tanggal_selesai'] ?></span></td>
			</tr>
			
			</table>
		
			<br>
			<table >
					<thead>
						<tr class="daftar">
							<th class="text-center" >Nama Item</th>
							<th  style="width:140px;">Tipe</th>
							<th style="width:200px;">Harga</th>	
							<th class="text-center" >Jumlah</th>	
							<th class="text-center">Total</th>	
						</tr>
						
						
						
					</thead>
					<tbody class="text-center">	
					<?php
					$sql = mysqli_query($conn, "SELECT * FROM order_detail_pcs A, item B where A.purchase_order_id ='$id' AND A.id_item = B.id_item");
					while($row = mysqli_fetch_array($sql)){
						
				
						
					?>		
						<tr class="soft daftar text-capitalize  text-left">
							

							<td><?=$row['item_name']; ?></td>
							<td><?=$row['type']; ?></td>
							<td>Rp <?=number_format($row['harga']); ?></td>
							<td><?=$row['quantity']; ?></td>
							<td>Rp <?=number_format($row['price']); ?></td>
							
							
						
						</tr>	
					<?php 
					} 
					$quantity=mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(price)AS total FROM order_detail_pcs WHERE purchase_order_id='$id'"));
					
					?>
					<tr>
					<th colspan='4' style='text-align:right'>Grand Total</th>
					<td>Rp <?=number_format($quantity['total'])?> </td>
					</tr>
					<tr>
					<th colspan='4' style='text-align:right'>Dibayar</th>
					<td>Rp <?=number_format($r['uang'])?> </td>
					</tr>
					<tr>
					<th colspan='4' style='text-align:right'>Kembalian</th>
					<td>Rp <?=number_format($r['kembalian'])?> </td>
					</tr>
					 </tbody>
					
			</table>
			
			
			
	<?php } ?>			
		</div>
		<br>			
					
	</div>	