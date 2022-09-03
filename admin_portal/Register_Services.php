<?php
 $title='Kategori Barang';
  include('header.php');
   include('include/db.php');
   include('include/function.php');

include('_secure.php');
$proses = "tambah";
if($_GET['id_kategori']){
    $proses = "edit";
}              
 if(isset($_POST['tambah']))
     {
        extract($_POST);
    $insert = "insert into services_type(Services_Name) 
     VALUES('".$Services_Name."')";

     $query = $db->query($insert);
   if($query){
   include('SMS/Change_password.php');
   }
  
};
if(isset($_POST['edit']))
     {
        extract($_POST);
    $edit = "update services_type set Services_Name = '".$Services_Name."' where Id='".$id_kategori."'"; 

     $query = $db->query($edit);
   if($query){
   include('SMS/Change_password.php');
   }
   //header("location:Register_Services.php");
  
};
if(isset($_GET["SNaction"]))
{

$sel="DELETE FROM services_type WHERE Id ='".$_GET["ID"]."' ";
$objExecute=$db->query($sel);
  // if($info){
   if($objExecute)
   {

     include('SMS/Successful_Delete.php');

   }
   header("location:Register_Services.php");
   
}




    ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Kategori</li>
      </ol>
      <!-- Icon Cards-->
     
      <!-- Area Chart Example-->
    
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-user"></i>  <?=$proses?> kategori</div>
        <div class="card-body">
          <form action="Register_Services.php" method="POST" >
          <div class="row">
            
         
          <div class="form-group col-lg-6">
            <label for=""> <?=$proses?> kategori </label>
            <input type="text"  class="form-control" <?php if($_GET['id_kategori']){$kategori = $_GET['nama_kategori']; echo 'value="'.$kategori.'"';}?> name="Services_Name" required=""  placeholder="Masukan Kategori">
            <?php 
            if($_GET['id_kategori']){
            $proses = 'edit';
            ?>
            <input type="hidden" name="id_kategori" value=<?=$_GET['id_kategori']?>></input>
            <?php } ?>
          </div>
         
           <div class="form-group col-lg-6">
            <label for="">Proses</label><br>
            <input type="submit" value="<?=$proses?>"   class="btn btn-primary" name="<?=$proses;?>">
            <?php if($_GET['id_kategori']){?>
            <a href="Register_Services.php" class="btn btn-warning">Batal</a>
            <?php } ?>
          </div>
        </div>
       </form> 
        </div>
        
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Kategori Yang Sudah Ada</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Action</th>
                </tr>
              </thead>
              
              
              <tbody>
                <?php
                 $Show=Serv_typ_record();
                $count='0';
                 while ($row=$Show->fetch_object()) {
                   $count++;
                ?>
                <tr>
                  <th><?php echo $count; ?></th>
                  <th><?php echo $row->Services_Name; ?></th>
                  <td>
                    <a 
                    href="Register_Services.php?nama_kategori=<?=$row->Services_Name?>&id_kategori=<?php echo $row->ID; ?>" class=" btn btn-warning">Edit</a>
                    <a 
                   onclick="return confirm('Are you sure you want to delete this data?')"
                    href="Register_Services.php?SNaction&ID=<?php echo $row->ID; ?>" class=" btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php  # code...
                 };?>
                
               
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include('footer.php');?>
  </div>
</body>
</html>
