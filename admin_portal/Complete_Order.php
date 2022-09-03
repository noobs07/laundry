<?php
 $title='Dashboard';

include('_secure.php');
   include('header.php');
   include('include/db.php');
    include('include/function.php');?>

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
        <li class="breadcrumb-item active">Compelte Order</li>
      </ol>
      <!-- Icon Cards-->
     
      <!-- Area Chart Example-->
     
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i>Compelte Order</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>User name</th>
                  <th>Phone No </th>
                  <th>Address</th>
                  <th>Total Items </th>
                  <th>Total Price</th>
                  <th>View Order</th>
                  <th>View</th>
                  
                </tr>
              </thead>
              
              <tbody>
                <?php $Show=compulete_order_Count();
                $count1='0';
                 while ($row=$Show->fetch_object()) {
                   $count1++;
                   $code=$row->Order_Code;
                ?>
                <tr>
                  <th><?php echo $count1; ?></th>
                  <td><?php echo $row->C_Name; ?></td>
                  <td><?php echo $row->Phone_No; ?></td>
                  <td><?php echo $row->Address; ?></td>
                  <td><?php echo $row->Total_item; ?></td>
                  <td><?php echo $row->Total_bill; ?></td>
                  <td><?php echo $row->Dilvery_Boy_Name; ?></td>
                  <th>  <a  data-toggle="modal" data-target="#exampleModalUser_Order<?php echo $count1;?>" class=" btn btn-primary">View</a>
                <?php
                     
                 include('view_User_Order_detail.php');?>
               </th>
                </tr>
                <?php  # code...
                 };?>
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include('footer.php');?>
  </div>
</body>

</html>
