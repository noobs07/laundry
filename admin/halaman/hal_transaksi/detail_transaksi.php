 <?php
$aksi="halaman/hal_transaksi/aksi_transaksi.php";

if (!isset($_GET['act'])) { $_GET['act'] = ''; }
switch($_GET['act']){
  // Tampil Transaksi Laundri
  default: 
  if (isset($_SESSION['status'])) { 
	echo  $_SESSION['status']; unset($_SESSION['status']);
 } 
	$sql=mysqli_query($conn, "SELECT * FROM order_laundry, member WHERE order_laundry.username = member.username AND order_laundry.order_id='$_GET[id]'");
    while ($r=mysqli_fetch_array($sql)){
		$Latitude = $r['Latitude'];
		$Longitude = $r['Longitude'];
		$grand_total = number_format($r['grand_total']);
	?>
   <div class='row-fluid'>
                        <!-- block -->
                        <div class='block'>
                            <div class='navbar navbar-inner block-header'>
                                <div class='muted pull-left'><i class="icon-th-large"></i> Data Transaksi <?=$_GET['id']?></div>
								
                            </div>
                            <div class='block-content collapse in'>
                                <div class='span12'>
                                   <div class='table-toolbar'>
                                      
                                      
                                   </div>
                                    <div id="transaksi_pcs">
									
									<div class="form-group">
									<a  href="bagian.php?halamane=transaksi" class="btn btn-warning">Back</a>
									<div style='float:right'>
		<a href='<?=$aksi?>?halamane=detail_transaksi&act=cetak&id=<?=$r['order_id']?>'  class='btn btn-success ' >Cetak</a>
	</div>
									</div>
									
									<br>
	 
	
	
	<table class='table table-striped table-bordered' style="font-size:12px">
					
					<tr>
					<td>Alamat Order</td>
					<td colspan="4">: <?=$r['alamat_order']?></td>	
					</tr>
					
					<tr>
					<td>No.Telpon </td>
					<td>: <?=$r['no_telp']?> </td>
					<td>Tanggal Masuk </td>
					<td>: <?=$r['tanggal_masuk']?> </td>
					</tr>
					
					
					
					<tr>
					
					<td>Grand Total </td>
					<th>Rp <?=number_format($r['grand_total'])?></th>
					<td>Uang</td>
					<th>Rp <?=number_format($r['uang'])?></th>
					
					</tr>
					
					<tr>
					
					<td>Status</td>
					 <td  colspan="3">: <?php if ($r['status'] == "1")  { ?>
						  <span class="label label-warning">Belum Lunas</span>
					 <?php } else if ($r['status'] == "3")  { ?>	 
						 <span class="label label-danger">Diproses</span>
						 
						  <a  class='btn btn-success btn-md' data-toggle="modal" style="cursor:pointer" href="#struk" >Lihat Struk</a>
					
						 
						  <div class="modal fade" id="struk" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">  
										<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Lihat Struk</h4>
        </div>	
										<div class="modal-body text-center">
										<?php if ($r['struk'] == '') { ?>  
										<img src="struk/icon.png" style="width:200px" class="img responsive">
										<p style="font-size:20px;padding:10px">Struk belum ada</p>
											<div class="form-group">
												<a data-dismiss="modal" class="btn btn-warning">
													<b>KEMBALI</b>
												</a>
											</div>
										<?php } else { ?>
										<img src="struk/<?=$r['struk'] ?>" style="width:200px" class="img responsive">
											<p style="font-size:20px;padding:10px">Apakah Anda yakin ingin melunasi transaksi ini?</p>
											<div class="form-group">
												<a  href="<?=$aksi?>?halamane=detail_transaksi&act=lunas&id=<?=$r['order_id']?>" class="btn btn-success">
													<b>YA</b>
												</a>
												<a data-dismiss="modal" class="btn btn-warning">
													<b>TIDAK</b>
												</a>
												<a href="<?=$aksi?>?halamane=detail_transaksi&act=tolak&id=<?=$r['order_id']?>" class="btn btn-danger">
													<b>TOLAK</b>
												</a>
											</div>
										<?php } ?>	
										</div>
										
									</div>
								</div>
							</div>		
						  
					<?php } else if ($r['status'] == "2") { ?>
						  <span class="label label-success">Lunas</span>
						  
						   <a  class='btn btn-success btn-md' data-toggle="modal" style="cursor:pointer" href="#struk" >Lihat Struk</a>
					
						 
						  <div class="modal fade" id="struk" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">  
										<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Lihat Struk</h4>
        </div>	
										<div class="modal-body text-center">
										<?php if ($r['struk'] == '') { ?>  
										<img src="struk/icon.png" style="width:200px" class="img responsive">
										<p style="font-size:20px;padding:10px">Struk belum ada</p>
											<div class="form-group">
												<a data-dismiss="modal" class="btn btn-warning">
													<b>KEMBALI</b>
												</a>
											</div>
										<?php } else { ?>
										<img src="struk/<?=$r['struk'] ?>" style="width:200px" class="img responsive">
											<p style="font-size:20px;padding:10px">Struk sudah disetujui</p>
											<div class="form-group">
												
												<a data-dismiss="modal" class="btn btn-warning">
													<b>KEMBALI</b>
												</a>
												
											</div>
										<?php } ?>	
										</div>
										
									</div>
								</div>
							</div>	
						<?php } ?> 
							 
					</td>
					</tr>
					
					
					</table>
					
					<div id="map" style="width:100%;height:250px;"></div>
	
	<?php } ?>
									
									<h4>Laundry Kiloan</h4>
                                    <table  class='table table-striped table-bordered' >
                                        <thead>
		  <tr>
		  <th>No</th>
		  <th>Nama Paket</th>
		  <th>Harga</th>
		  <th>Jumlah</th>
		  <th>Subtotal</th>
		  <th>Tanggal Selesai</th>
		  <th>Status</th>
		   <th>Aksi</th>
		  </tr>
										</thead>
										<tbody>
										
	<?php
   $tampil=mysqli_query($conn, "SELECT * FROM order_laundry, order_detail, paket WHERE  order_laundry.order_id = order_detail.order_id AND order_detail.id_paket=paket.id_paket AND order_detail.order_id='$_GET[id]' ORDER BY order_laundry.id DESC ");
   
   $no=1;
    while ($r=mysqli_fetch_array($tampil)){
		$cetak = $r['cetak'];
	?>
	
			<tr  >
			<td><center><?=$no?></center></td>
             <td><?=$r['nama_paket']?></td>
             <td>Rp <?=number_format($r['harga']) ?></td>
             <td><?=$r['qty']?>Kg</td>
             <td>Rp <?=number_format($r['price'])?></td>
             <td><?php if ($r['tanggal_selesai'] == "0000-00-00 00:00:00") { echo "Belum Selesai"; } else { echo $r['tanggal_selesai']; } ?> </td>
			 <td><?php if ($r['status_laundry'] == "0")  { ?>
						  <span class="label label-warning">Diproses</span>
					<?php } else if ($r['status_laundry'] == "1") { ?>
						  <span class="label label-info">Selesai</span>
					<?php } else if ($r['status_laundry'] == "2") { ?>
						  <span class="label label-success">Diambil</span>
						<?php } ?> 
							 
					</td>
			 <td>
			 <?php if ($r['status_laundry'] == "0")  { ?>
						  <a onclick="return confirm('Apa Anda Yakin ingin menyelesaikan Laundry ini?')" class='btn btn-success btn-mini'  href="<?=$aksi?>?halamane=detail_transaksi&act=selesai&id=<?=$r['id']?>&a=<?=$r['order_id']?>">Selesaikan</a>
					<?php } ?> 
			 </td>		
             </tr>
			<?php 
      $no++;
    } if (mysqli_num_rows($tampil) == 0) {	?>
											<tr ><th colspan="4">TIDAK ADA DATA</th></tr>
	<?php } ?> 									
										</tbody>
                                    </table>
									
									
									
									
									
<h4>Laundry Pcs</h4>
                                    <table  class='table table-striped table-bordered' >
                                        <thead>
		  <tr>
		  <th>No</th>
		  <th>Nama Item</th>
		  <th>Type</th>
		  <th>layanan</th>
		  <th>Harga</th>
		  <th>Jumlah</th>
		  <th>Subtotal</th>
		   <th>Tanggal Selesai</th>
		   <th>Status</th>
		   <th>Aksi</th>
		  </tr>
										</thead>
										<tbody>
										
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
             <td>Rp <?=number_format($r['price'])?></td>
			 <td><?php if ($r['tanggal_selesai'] == "0000-00-00 00:00:00") { echo "Belum Selesai"; } else { echo $r['tanggal_selesai']; } ?> </td>
			 <td><?php if ($r['status_laundry'] == "0")  { ?>
						  <span class="label label-warning">Diproses</span>
					<?php } else if ($r['status_laundry'] == "1") { ?>
						  <span class="label label-info">Selesai</span>
					<?php } else if ($r['status_laundry'] == "2") { ?>
						  <span class="label label-success">Diambil</span>
						<?php } ?> 
							 
					</td>
			 <td>
			 <?php if ($r['status_laundry'] == "0")  { ?>
						  <a onclick="return confirm('Apa Anda Yakin ingin menyelesaikan Laundry ini?')" class='btn btn-success btn-mini'  href="<?=$aksi?>?halamane=detail_transaksi&act=selesai&id=<?=$r['id']?>&a=<?=$r['order_id']?>">Selesaikan</a>
					<?php } ?> 
			 </td>
             </tr>
			<?php 
      $no2++;
    } if (mysqli_num_rows($tampil2) == 0) {	?>
											<tr ><th colspan="4">TIDAK ADA DATA</th></tr>
	<?php } ?> 									
										</tbody>
                                    </table>									
									
									</div>
									
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php
    break;
  
 
  
  
}
?>

 <script>
	// variabel global marker

	
      var map;
      function initAutocomplete() {
		  
		
		
		  
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?=$Latitude?>, lng: <?=$Longitude?>},
          zoom: 19,
		  mapTypeId: 'roadmap',
		  streetViewControl: false,
		  fullscreenControl: false,
		  mapTypeControl: false



        });
		
		
		  // Membuat Kotak pencarian terhubung dengan tampilan map
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
		  
        });
		
		  var marker= [];
        // Mengaktifkan detail pada suatu tempat ketika pengguna
        // memilih salah satu dari daftar prediksi tempat 
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();
			
          if (places.length == 0) {
            return;
          }

          // menghilangkan marker tempat sebelumnya
          marker.forEach(function(marker) {
            marker.setMap(null);
			
          });
          marker = [];

          // Untuk setiap tempat, dapatkan icon, nama dan tempat.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            

           
            if (place.geometry.viewport) {
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
		
		
		
		var tanda;
		
		tanda = new google.maps.Marker({
			position: new google.maps.LatLng(<?=$Latitude?>, <?=$Longitude?>),
			map: map,
			
		});
		
		 // mebuat konten untuk info window
        var contentString = '<p>Erbe Laundry</p>';
		
		  // membuat objek info window
        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          position: new google.maps.LatLng(-0.8608811760973081, 134.04887017361068)
        });
	

	
			
		  
		  
		  
      }
	  
	  
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=key&libraries=places&callback=initAutocomplete"
    async defer></script>
	