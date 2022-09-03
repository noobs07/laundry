<?php
$aksi="halaman/hal_members/aksi_member.php";

if (!isset($_GET['act'])) { $_GET['act'] = ''; }

switch($_GET['act']){
  // Tampil member
  default: ?>
  <div class='row-fluid'>
                        <!-- block -->
                        <div class='block'>
                            <div class='navbar navbar-inner block-header'>
                                <div class='muted pull-left'><i class="icon-th-large"></i> Data member</div>
                            </div>
                            <div class='block-content collapse in'>
                                <div class='span12'>
                                  
                                     
                                  
                                    
                                    <table class='table table-striped table-bordered'>
                                        <thead>
		  <tr>
		  <th>No</th>
		  <th>Nama Lengkap</th>
		  <th>Alamat</th>
		  <th>No Telp</th>
		  <th>Username</th>
		  <th>Password</th>
		  <th>Aktif</th>
		  <th style="width:100px">Aksi</th>
		  </tr>
										</thead>
										<tbody>
	
	
	<?php

	$tampil=mysqli_query($conn, "SELECT * FROM member ORDER BY id_member ASC");
	
	
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){ ?>
			<tr><td><center><?=$no?></center></td>
             <td><?=$r['nama_lengkap']?></td>
             <td><?=$r['alamat']?></td>
             <td><?=$r['no_telp']?></td>
             <td><?=$r['username']?></td>
             <td><?=$r['password']?></td>
             <td><?php 
			 if ($r['aktif'] == 1) { ?>
			 <span class="label bg-green">Aktif</span>
			 <?php } else { ?>
			 <span class="label bg-red">Nonaktif</span>
			 <?php } ?>
			 </td>
             <td><center><a class='btn btn-primary btn-mini' href='?halamane=member&act=editmember&id=<?=$r['id_member']?>'>Ubah</a>
	               <a onclick="return confirm('Are you sure want to delete this data?')" class='btn btn-danger btn-mini' href='<?=$aksi?>?halamane=member&act=hapus&id=<?=$r['id_member']?>'>Hapus</a></center>
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
  
  // Form Edit member  
  case "editmember":
    $edit=mysqli_query($conn, "SELECT * FROM member WHERE id_member='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
	?>

    	<div class='row-fluid'>
                         <!-- block -->
                        <div class='block'>
                            <div class='navbar navbar-inner block-header'>
                                <div class='muted pull-left'>Form Edit member</div>
                            </div>
                            <div class='block-content collapse in'>
                                <div class='span12'>
					<!-- BEGIN FORM-->
					<form method='POST' action='<?=$aksi?>?halamane=member&act=update' id='form_sample_1' class='form-horizontal'>
					<input type=hidden name=id value='<?=$r['id_member']?>'>
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
  								<label class='control-label'>Nama Lengkap<span class='required'>*</span></label>
  								<div class='controls'>
  									<input type='text' name='nama_lengkap' value='<?=$r['nama_lengkap']?>' data-required='1' class='span6 m-wrap'/>
  								</div>
  							</div>
							
							<div class='control-group'>
  								<label class='control-label'>Username<span class='required'>*</span></label>
  								<div class='controls'>
  									<input type='text' name='username' value='<?=$r['username']?>'  data-required='1' class='span6 m-wrap'/>
  								</div>
  							</div>
							
							<div class='control-group'>
  								<label class='control-label'>Password<span class='required'>*</span></label>
  								<div class='controls'>
  									<input type='password' name='password' value='<?=$r['password']?>'  data-required='1' class='span6 m-wrap'/>
  								</div>
  							</div>
							
							<div class='control-group'>
  								<label class='control-label'>Telp<span class='required'>*</span></label>
  								<div class='controls'>
  									<input type='text' name='no_telp' value='<?=$r['no_telp']?>' data-required='1' class='span6 m-wrap'/>
  								</div>
  							</div>
							
							<div class='control-group'>
  								<label class='control-label'>Alamat<span class='required'>*</span></label>
  								<div class='controls'>
  									<input type='text' name='alamat' value='<?=$r['alamat']?>' data-required='1' class='span6 m-wrap'/>
  								</div>
  							</div>
							
							
							<div class='control-group'>
  								<label class='control-label'>Aktif<span class='required'>*</span></label>
  								<div class='controls'>
  									<label class="radio-inline" ><input type="radio" name="aktif" value="1" <?php if ($r['aktif'] == 1) echo "checked"?> >Aktifkan</label>
									<label class="radio-inline" ><input type="radio" name="aktif" value="0" <?php if ($r['aktif'] == 0) echo "checked"?>>Nonaktifkan</label>
  								</div>
  							</div>
							
							
  							
  							<div class='form-actions'>
  								<button type='submit' class='btn btn-primary '>Validate <i class='icon-check icon-white'></i></button>
  								<button type='button' class='btn btn-warning ' onclick='self.history.back()'>Cancel <i class='icon-remove icon-white'></i></button>
  							</div>
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
