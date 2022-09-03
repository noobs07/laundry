<?php
 $title='Selesai DiLaundry';

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
        <li class="breadcrumb-item active">Delivery Order info</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i>Order Detail</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Order </th>
                  <th>Nama </th>
                  <th>Alamat</th>
                  <th>Tanggal Ambil</th>
                  <th>Tanggal Antar</th>
                  <th>Total Harga</th>
                  <th>Status Update</th>
                  <th>Lihat Order</th>
                </tr>
              </thead>
            
              <tbody>
                <?php $Show=get_order_status_Count_complete();
                $count='0';
                $total_semua = 0;
                 while ($row=$Show->fetch_object()) {
                   $count++;
                   // $Status=$row->status;
                   // // $Boy= $row->Dilvery_Boy_Name;
                    $SID=$row->User_ID;
                   // $USer_NAME=$row->User_Name;
                    $QR_code=$row->Order_Code;
                    $total_semua+=$row->Total_Price;
                ?>
                <tr>
                  <th><?php echo $count; ?></th>
                  <th>
                    <?php  
                     echo $QR_code;?>
                   </th>
                  <td><?php echo $row->User_Name; ?></td>
                  <td><?php echo $row->Address; ?></td>
                  <td><?php echo $row->Pick_up_date; ?></td>
                  <td><?php echo $row->Delivery_date; ?></td>
                  <td><?php echo $row->Total_Price; ?></td>
                  <td><?php echo $row->Delivery_status; ?></td>
                  <th><a  data-toggle="modal" data-target="#exampleModalUser_Order<?php echo $count;?>" class=" btn btn-primary">View</a>
                <?php 
                 include('view_User_Order_detail.php');?>
                  </th>
                </tr>
                              <?php 
                               }?>
                            </tbody>
                  <tfoot><tr>
                  <th colspan="6">Total</th>
                  <th colspan="3"><?=number_format($total_semua,0,'.',',') ?></th>
                </tr></tfoot>
                          </table>
                        </div>
                      </div> 
                    </div>
    </div>
    </div>
    </div>
    <?php include('footer.php');?>
  </div>
</body>
</html>
