<?php
include "config/koneksi.php";
$a="SELECT * FROM purchase_order";
$b="SELECT inc FROM purchase_order ORDER BY inc DESC LIMIT 1";
$inc=penambahan($conn, $a, $b);


$aksi="halaman/hal_purchase_order_kiloan/action.php";
?>


                    <div class="row-fluid">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-list-alt"></i> Form Transaksi Laundri Kiloan</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
					<!-- BEGIN FORM-->
					<form id="formID" action="<?=$aksi?>?halamane=purchase_order_kiloan&act=input" method="POST" class="form-horizontal">
						<fieldset>
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Your form validation is successful!
							</div>
							<input name="inc" type="hidden" id="inc" value="<?php echo "$inc"; ?>" />
  							<div class="control-group">
  								<label class="control-label">Nota Number<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" name="purchase_order_no" data-required="1" value='NEW-DOC' readonly='yes' class="span5 m-wrap"/>
									
  								</div>
  							</div>
  							<div class="control-group">
  								<label class="control-label">Tanggal Masuk<span class="required">*</span></label>
  								<div class="controls">
  									<input name="tanggal_masuk" type="text" class="input-xlarge datepicker" readonly='yes' id="date01" value="<?php echo date('m')."/".date('d')."/".date('Y');?>"/>
  								</div>
								
  							</div>
							
							<div class="control-group">
  								<label class="control-label">Tanggal Selesai<span class="required">*</span></label>
  								<div class="controls">
  									<input name="tanggal_selesai" type="text" class="input-xlarge datepicker" readonly='yes' id="date02" value="<?php echo date('m')."/".date('d')."/".date('Y');?>"/>
  								</div>
  							</div>
							
							<!-- alert alert-success -->
							<div class="alert alert-warning">
							<div class="control-group">
  								<label class="control-label">Member<span class="required">*</span></label>
  								<div class="controls">
  									<?php 
                       
                       $jsArrayMember = "var nama_lengkap = new Array();\n";
                      $jsArray2 = "var uom = new Array();\n"; 
                       echo '<select name="member" id="select01" class="chzn-select" onchange="document.getElementById(\'alamat_cust\').value = nama_lengkap[this.value],document.getElementById(\'t_uom\').value = uom[this.value]">';
                        
					   $hasil = mysqli_query($conn, "select * from member ");
					  
					   
					   echo "<option value=''>Pilih Member</option>";
                       while ($z = mysqli_fetch_assoc($hasil)){
						  echo "<option value=$z[id_member]>$z[nama_lengkap]</option>";
						   $jsArrayMember .= "nama_lengkap['" . $z['id_member'] . "'] = '" . addslashes($z['alamat']) . "';\n";
						  $jsArray2 .= "uom['" . $z['id_member'] . "'] = '" . addslashes($z['no_telp']) . "';\n"; 
						 
						  
                       }
                       echo '</select>';
                 ?> 
  								</div>
  							</div>
				
		
		<div class="control-group">
         <label class="control-label">Alamat<span class="required">*</span></label>  
             <div class="controls">
                 <input type="text" name="alamat_cust" id="alamat_cust"  readonly="true" class="span6 m-wrap" />
				 <script type="text/javascript"> <?php echo $jsArrayMember; ?> </script> 
				    <input type="text" name="t_nama_paket" id="t_uom" readonly="true" class="span3 m-wrap"/>
				 <script type="text/javascript"> <?php echo $jsArray2; ?> </script>    
					
             </div>
     </div>
	 
	 </div>
		<!-- alert alert-success -->	

<div class="alert alert-warning">


							
<div  class="control-group">
  								<label class="control-label">Paket<span class="required">*</span></label>
  								<div class="controls">
  									<?php 
                       
                       $jsArrayPaket = "var nama_paket = new Array();\n";
					   $jsArrayPaket2 = "var id_aja = new Array();\n"; 
                       echo '<select name="paket" id="select01" class="chzn-select" onchange="document.getElementById(\'harga\').value = nama_paket[this.value],document.getElementById(\'id_paket\').value = id_aja[this.value]">';
                       $hasil = mysqli_query($conn, "select * from paket");
					   echo "<option value=''>Pilih paket</option>";
                       while ($z = mysqli_fetch_assoc($hasil)){
						  echo "<option value=$z[id_paket]>$z[nama_paket]</option>";
						   $jsArrayPaket .= "nama_paket['" . $z['id_paket'] . "'] = '" . addslashes($z['harga']) . "';\n";
						   $jsArrayPaket2 .= "id_aja['" . $z['id_paket'] . "'] = '" . addslashes($z['id_paket']) . "';\n";
                       }
                       echo '</select>';
                 ?> 
  								</div>
  							</div>
				
		
		<div id="b" class="control-group ">
         <label class="control-label">harga<span class="required">*</span></label>  
             <div class="controls">
                 <input type="text" name="harga" id="harga" readonly="true" class="span6 m-wrap" />
				 <script type="text/javascript"> <?php echo $jsArrayPaket; ?> </script>
				 <input type="hidden" name="id_paket" id="id_paket" readonly="true" class="span3 m-wrap"/>
				 <script type="text/javascript"> <?php echo $jsArrayPaket2; ?> </script>    
					
             </div>
		</div>
	 
	 <div id="c" class="control-group">
         <label class="control-label">Berat<span class="required">*</span></label>  
             <div class="controls">
                 <input type="text" name="berat" id="berat" class="span6 m-wrap" />
				 	
             </div>
     </div>
	 
	 <div id="c" class="control-group">
         <label class="control-label">Keterangan</label>  
             <div class="controls">
                 <input type="text" name="ket" id="ket" class="span6 m-wrap" />
				 	
             </div>
     </div>
	 
	 <h4><a class="btn btn-primary" id="tambah2" type="button" ><i class="icon-plus icon-white"></i> Tambah Data</a></h4>
</div>		
				
	<div id="status" ></div>
	
	
	
	<div id="tampildata2" ></div>
	
	
	
	<div class="alert alert-warning">
	<div class="control-group">
  								
			<tr>
              <td id="noborder">Subtotal</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="subtotaltxt" type="text" id="subtotaltxt" class="span2 m-wrap" readonly="readonly"/></td>
            </tr>
			
			<tr>
              <td id="noborder">Uang</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="uangtxt" type="text" id="uangtxt" class="span2 m-wrap" /></td>
            </tr>
			
			<tr>
              <td id="noborder">Kembalian</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="kembaliantxt" type="text" id="kembaliantxt" class="span2 m-wrap" readonly="readonly"/></td>
            </tr>
  							</div>
		
	</div>
	
	<div class="form-actions">
	
  								<button type="submit" class="btn btn-primary" name="submit">Save <i class='icon-check icon-white'></i></button>
  								<button type="button" class="btn btn-warning" onclick='self.history.back()'>Cancel <i class='icon-remove icon-white'></i></button>
  							</div>
	</fieldset>
					</form>
					
			
					<!-- END FORM-->
	
	</div>
			    </div>
			</div>
                     	<!-- /block -->
		    </div>
                     <!-- /validation -->