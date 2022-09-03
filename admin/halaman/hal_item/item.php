<?php
$aksi="halaman/hal_item/aksi_item.php";

if (!isset($_GET['act'])) { $_GET['act'] = ''; }

switch($_GET['act']){
  // Tampil item
  default:
  ?>
  <div class='row-fluid'>
                        <!-- block -->
                        <div class='block'>
                            <div class='navbar navbar-inner block-header'>
                                <div class='muted pull-left'><i class="icon-th-large"></i> Data Item Pcs</div>
                            </div>
							
                            <div class='block-content collapse in'>
                                <div class='span12'>
								<h4>Berikut ini adalah daftar item dan harga per 1 pcs </h4>  
                                   
                                      <div class='btn-group bawah'>
                                         <a href='?halamane=item&act=tambahitem'><button class='btn btn-success'>Add New <i class='icon-plus icon-white'></i></button></a>
                                      </div>
                                      
                                  
                                    
                                    <table  class='table table-striped table-bordered' >
                                        <thead>
		  <tr>
		  <th>No</th>
		  <th>Nama Item Group</th>
		  <th>Type</th>
		  <th>Harga</th>
		 <th style="width:100px">Aksi</th>
		  </tr>
										</thead>
										<tbody><?php
										 $tampil=mysqli_query($conn, "SELECT * FROM item ORDER BY item_name ASC");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){ ?>
       <tr><td><center><?=$no?></center></td>
             <td><?=$r['item_name']?></td>
             <td><?=$r['type']?></td>
             <td><?="Rp ".number_format($r['harga']).",-"?></td>
             <td><center><a class='btn btn-primary btn-mini' href='?halamane=item&act=edititem&id=<?=$r['id_item']?>'>Ubah</a>
	               <a onclick=\"return confirm('Are you sure want to delete this data?')\" class='btn btn-danger btn-mini' href='<?=$aksi?>?halamane=item&act=hapus&id=<?=$r['id_item']?>'>Hapus</a></center>
             </td></tr>
			 <?php
      $no++;
    }	?>
											
										</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
				<?php	
    
    break;
  
  // Form Tambah item
  case "tambahitem": ?>
  
<div class='row-fluid'>
                         <!-- block -->
                        <div class='block'>
                            <div class='navbar navbar-inner block-header'>
                                <div class='muted pull-left'>Form Tambah item</div>
                            </div>
                            <div class='block-content collapse in'>
                                <div class='span12'>
					<!-- BEGIN FORM-->
					<form method='POST' action='<?=$aksi?>?halamane=item&act=input' id='form_sample_1' class='form-horizontal'>
						<fieldset>
							<div class='alert alert-error hide'>
								<button class='close' data-dismiss='alert'></button>
								You have some form errors. Please check below.
							</div>
							<div class='alert alert-success hide'>
								<button class='close' data-dismiss='alert'></button>
								Your form validation is successful!
							</div>
							
							
  							<div class='control-group'>
  								<label class='control-label'>item_name<span class='required'>*</span></label>
  								<div class='controls'>
  									<input type='text' name='item_name' data-required='1' class='form-control span6 m-wrap'/>
  								</div>
  							</div>
							
							
							
							<div class='control-group'>
  								<label class='control-label'>Type<span class='required'>*</span></label>
  								<div class='controls'>
  									
									 <select name='type' data-required='1' class='span6 m-wrap'>
										<option value='Laundry' >Laundry</option>
									  <option value='Wet Cleaning' >Wet Cleaning</option>
									</select>
  								</div>
  							</div>
							
							<div class='control-group'>
  								<label class='control-label'>harga<span class='required'>*</span></label>
  								<div class='controls'>
  									<input type='text' name='harga' data-required='1' class='span6 m-wrap'/>
  								</div>
  							</div>
  							
  							<div class='form-actions'>
  								<button type='submit' class='btn btn-primary '>Validate <i class='icon-check icon-white'></i></button>
  								<button type='button' class='btn btn-warning ' onclick='self.history.back()'>Cancel <i class='icon-remove icon-white'></i></button>
  							</div>
						</fieldset>
					</form>
					<!-- END FORM-->
				</div>
			    </div>
			</div>
                     	<!-- /block -->
		    </div>
<?php
     break;
  
  // Form Edit item  
  case "edititem":
    $edit=mysqli_query($conn, "SELECT * FROM item WHERE id_item='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
?>
  <div class='row-fluid'>
                         <!-- block -->
                        <div class='block'>
                            <div class='navbar navbar-inner block-header'>
                                <div class='muted pull-left'>Form Edit item</div>
                            </div>
                            <div class='block-content collapse in'>
                                <div class='span12'>
					<!-- BEGIN FORM-->
					<form method='POST' action='<?=$aksi?>?halamane=item&act=update' id='form_sample_1' class='form-horizontal'>
					<input type=hidden name='id' value='<?=$r['id_item']?>'>
						<fieldset>
							<div class='alert alert-error hide'>
								<button class='close' data-dismiss='alert'></button>
								You have some form errors. Please check below.
							</div>
							<div class='alert alert-success hide'>
								<button class='close' data-dismiss='alert'></button>
								Your form validation is successful!
							</div>
							
							
  							<div class='control-group'>
  								<label class='control-label'>item_name<span class='required'>*</span></label>
  								<div class='controls'>
  									<input type='text' name='item_name' data-required='1' class='span6 m-wrap' value='<?=$r['item_name']?>'/>
  								</div>
  							</div>
							
							
							
							<div class='control-group'>
  								<label class='control-label'>Type<span class='required'>*</span></label>
  								<div class='controls'>
  									
									 <select name='type' data-required='1' class='span6 m-wrap'>
<option value='Laundry' <?php if($r['type'] == 'Laundry') {echo 'selected';} ?> >Laundry</option>
									  <option value='Wet Cleaning' <?php if($r['type'] == 'Wet Cleaning') {echo 'selected';} ?>>Wet Cleaning</option>
									</select>
  								</div>
  							</div>
							
							<div class='control-group'>
  								<label class='control-label'>harga<span class='required'>*</span></label>
  								<div class='controls'>
  									<input type='text' name='harga' data-required='1' class='span6 m-wrap' value='<?=$r['harga']?>'/>
									
  								</div>
  							</div>
  							
  							<div class='form-actions'>
  								<button type='submit' class='btn btn-primary '>Validate <i class='icon-check icon-white'></i></button>
  								<button type='button' class='btn btn-warning ' onclick='self.history.back()'>Cancel <i class='icon-remove icon-white'></i></button>
  							</div>
						</fieldset>
					</form>
					<!-- END FORM-->
					
				</div>
			    </div>
			</div>
                     	<!-- /block -->
		    </div>
			<?php
    break;  
}
?>
