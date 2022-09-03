<?php
$aksi="halaman/hal_paket/aksi_paket.php";

if (!isset($_GET['act'])) { $_GET['act'] = ''; }

switch($_GET['act']){
  // Tampil paket
  default:
  ?>
  
  <div class='row-fluid'>
                        <!-- block -->
                        <div class='block'>
                            <div class='navbar navbar-inner block-header'>
                                <div class='muted pull-left'><i class="icon-th-large"></i> Data Paket Kiloan</div>
                            </div>
							
							
                            <div class='block-content collapse in'>
                                <div class='span12'>
                                  <h4>Berikut ini adalah daftar paket dan harga per 1 kilogram </h4>  
                                      <div class='btn-group bawah'>
                                         <a href='?halamane=paket&act=tambahpaket'><button class='btn btn-success'>Add New <i class='icon-plus icon-white'></i></button></a>
                                      </div>
                                  
                                    
                                    <table  class='table table-striped table-bordered' >
                                        <thead>
		  <tr style="text-center">
		  <th>No</th>
		  <th>Nama paket</th>
		  <th>Harga</th>
		  <th style="width:100px">Aksi</th>
		  </tr>
										</thead>
										<tbody>
										<?php
										 $tampil=mysqli_query($conn, "SELECT * FROM paket ORDER BY id_paket DESC");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){ ?>
       <tr><td><center><?=$no?></center></td>
             <td><?=$r['nama_paket']?></td>
             <td><?="Rp ".number_format($r['harga']).",-"?></td>
             <td><center><a class='btn btn-primary btn-mini' href='?halamane=paket&act=editpaket&id=<?=$r['id_paket']?>'>Ubah</a>
	               <a onclick=\"return confirm('Are you sure want to delete this data?')\" class='btn btn-danger btn-mini' href='<?=$aksi?>?halamane=paket&act=hapus&id=<?=$r['id_paket']?>'>Hapus</a></center>
             </td></tr>
			 <?php
      $no++;
    }	
											?>
										</tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>
                        <!-- /block -->
                    </div>
					
					
    <?php
    break;
  
  // Form Tambah paket
  case "tambahpaket":
  ?>
	<div class='row-fluid'>
                         <!-- block -->
                        <div class='block'>
                            <div class='navbar navbar-inner block-header'>
                                <div class='muted pull-left'>Form Tambah paket</div>
                            </div>
                            <div class='block-content collapse in'>
                                <div class='span12'>
					<!-- BEGIN FORM-->
					<form method='POST' action='<?=$aksi?>?halamane=paket&act=input' id='form_sample_1' class='form-horizontal'>
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
  								<label class='control-label'>Name<span class='required'>*</span></label>
  								<div class='controls'>
  									<input type='text' name='nama_paket' data-required='1' class='span12 m-wrap'/>
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
  
  // Form Edit paket  
  case "editpaket":
    $edit=mysqli_query($conn, "SELECT * FROM paket WHERE id_paket='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    	?>
		
		<div class='row-fluid'>
                         <!-- block -->
                        <div class='block'>
                            <div class='navbar navbar-inner block-header'>
                                <div class='muted pull-left'>Form Edit paket</div>
                            </div>
                            <div class='block-content collapse in'>
                                <div class='span12'>
					<!-- BEGIN FORM-->
					<form method='POST' action='<?=$aksi?>?halamane=paket&act=update' id='form_sample_1' class='form-horizontal'>
					<input type=hidden name=id value='<?=$r['id_paket']?>'>
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
  								<label class='control-label'>Name<span class='required'>*</span></label>
  								<div class='controls'>
  									<input type='text' name='nama_paket' data-required='1' class='span12 m-wrap' value='<?=$r['nama_paket']?>'/>
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
