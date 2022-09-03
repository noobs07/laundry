<?php
 $title='Jenis Barang';
 
include('_secure.php');

   include('header.php');
   $proses = "tambah";
if($_GET['id_barang']){
    $proses = "edit";
    extract($_GET);
}
   include('include/db.php');
    include('include/function.php');

    //fungsi untuk tambah data
if(isset($_POST['tambah']))
     {
        extract($_POST);
    $insert = "insert into services_uploade(Services_Name,Services_Type,Delivery_Price,Laundry_Price) 
     VALUES('".$Ser_Name."','".$Ser_Type."','".$Dry_Price."','".$Laundry_Price."')";

     $query = $db->query($insert);
   if($query){
   include('SMS/Change_password.php');
   }
  
};

//fungsi untuk edit data
if(isset($_POST['edit']))
     {
        extract($_POST);
    $edit = "update services_uploade set Services_Name = '".$Ser_Name."', Services_Type = '".$Ser_Type."', Delivery_Price = '".$Dry_Price."', Laundry_Price = '".$Laundry_Price."' where ID='".$id_barang."'"; 

     $query = $db->query($edit);
   if($query){
   include('SMS/Change_password.php');
   }
   //header("location:Register_Services.php");
  
};

if(isset($_GET["SRVaction"]))
{


$sel="DELETE FROM services_uploade WHERE Id ='".$_GET["ID"]."' ";
$objExecute=$db->query($sel);
  // if($info){
   if($objExecute)
   {

     include('SMS/Successful_Delete.php');

   }
    header("location:Services_record.php");
   
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
        <li class="breadcrumb-item active">All Services Record</li>
      </ol>
      <!-- Icon Cards-->
     
      <!-- Area Chart Example-->
    
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-user"></i>  Tambahan jenis</div>
        <div class="card-body">
          <form action="Services_record.php" method="POST" >
          <div class="row">
            <div class="form-group col-lg-3">
            <?php 
            if($_GET['id_barang']){
            $proses = 'edit';
            ?>
            <input type="hidden" name="id_barang" value="<?=$id_barang?>"></input>
            <?php } ?>
            <label for="">kategori </label>
            <select name="Ser_Type" class="form-control" required="" >
              <option hidden="" >Pilih Kategori</option>
               <?php $Show1=Serv_Type();
                $count='0';
                 while ($row=$Show1->fetch_object()) {
                   $count++;
                   $select='';
                   if($row->Services_Name == $kategori_barang) $select="selected";
                ?>
              <option <?=$select?> value="<?php echo $row->Services_Name ?>"><?php echo $row->Services_Name ?></option>
                  <?php };?>
            </select>
            
          </div>
         
          <div class="form-group col-lg-3">
            <label for="">Nama </label>
            <input type="text"  class="form-control" value="<?=$nama_barang?>" name="Ser_Name" required=""  placeholder="Masukan Nama Jenis">
          </div>
          <div class="form-group col-lg-3">
            <label for="exampleInputEmail1">Harga Delivery (Jika Perlu) </label>
            <input type="number"  class="form-control" name="Dry_Price" value="<?=$delivery?>" maxlength="12" minlength="12" placeholder="Masukan Harga" required="">
          </div>

          <div class="form-group col-lg-3">
            <label for="exampleInputEmail1">harga Laundry </label>
            <input type="number"  class="form-control" name="Laundry_Price" value="<?=$harga?>" maxlength="12" minlength="12" placeholder="Masukan Harga" required="">
          </div>
           <div class="form-group col-lg-12 text-right">
            <input type="submit" value="<?=$proses?>"  class="col-lg-2 btn btn-primary" name="<?=$proses?>">
            <?php if($_GET['id_barang']){?>
            <a href="Services_record.php" class="col-lg-2 btn btn-warning">Batal</a>
            <?php } ?>
          </div>
        </div>
       </form> 
        </div>
        
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Tambahan Kategori</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jenis</th>
                  <th>Harga Laundry</th>
                  <th>Harga Delivery</th>
                  <th>Action</th>
                </tr>
              </thead>
              
              
              <tbody>
                <?php $Show=Serv_record();
                $count='0';
                 while ($row=$Show->fetch_object()) {
                   $count++;
                ?>
                <tr>
                  <th><?php echo $count; ?></th>
                  <th><?php echo $row->Services_Name; ?></th>
                  <td><?php echo $row->Services_Type; ?></td>
                  <td><?php echo $row->Laundry_Price; ?></td>
                  <td><?php echo $row->Delivery_Price; ?></td>
                 
                  <td>
                  <a 
                    href="Services_record.php?kategori_barang=<?php echo $row->Services_Type; ?>&nama_barang=<?=$row->Services_Name?>&id_barang=<?php echo $row->ID; ?>&harga=<?php echo $row->Laundry_Price; ?>&delivery=<?php echo $row->Delivery_Price; ?>" class=" btn btn-warning">Edit</a>
                  <a 
                   onclick="return confirm('Are you sure you want to delete this data?')"
                    href="Services_record.php?SRVaction&ID=<?php echo $row->ID; ?>" class=" btn btn-danger">Delete</a></td>
                </tr>
                <?php  # code...
                 };?>
                
               
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include('footer.php');?>
  </div>
</body>

</html>
