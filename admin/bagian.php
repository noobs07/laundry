<?php

session_start();
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		
		 <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		 <link href="assets/img/icon.png" rel="shortcut icon"/>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><img src="assets/img/icon.png" class="img responsive" style="width:30px;padding-right:10px;margin-top:-3px"/>Laundry dan Wet Cleaning</a>
					
					
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                               
                                <?php include "profile.php"; ?> 
                            </li>
                        </ul>

                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php include "menu.php"; ?> 
                
                <!--/span-->
                <div class="span9" id="content" style="margin-top:20px">
                    <div class="row-fluid">
                        
                        	<div class='navbar'>
                            	<div class='navbar-inner'>
	                                <ul class='breadcrumb'>
	                                    <i class='icon-chevron-left hide-sidebar'><a href='#' title='Hide Sidebar' rel='tooltip'>&nbsp;</a></i>
	                                    <i class='icon-chevron-right show-sidebar' style='display:none;'><a href='#' title='Show Sidebar' rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href='bagian.php?halamane=home'>Dashboard</a> <span class='divider'>/</span>	
	                                    </li>
	                                   
	                                    <?php include "breadcrumb.php"; ?>
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    <div class="row-fluid">
                       <?php include "content.php"; ?> 
                    </div>
                   
                </div>
            </div>
            <br>
            <br>
            <div class="navbar-fixed-bottom">
			 <div class="navbar-inner">
				<div class="container-fluid">
                <div class="navbar-text"><b>&copy; 2018 - Aplikasi Jasa Laundry Erbe </b></div>
				</div>
             </div>
            </div>
        </div>
       <!--/.fluid-container-->
        <link href="vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">
		<?php 
		if ($_GET['halamane'] !=='order_laundry_pcs' or $_GET['halamane'] !=='order_laundry_kiloan'){
		echo"<script src='vendors/jquery-1.9.1.js'></script>";
		}
		?>
		 
      
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/jquery.uniform.min.js"></script>
        <script src="vendors/chosen.jquery.min.js"></script>
        <script src="vendors/bootstrap-datepicker.js"></script>

        <script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript" src="vendors/jquery-validation/dist/jquery.validate.js"></script>
	<script src="assets/form-validation.js"></script>
     <!--/.Data table-->
	<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/DT_bootstrap.js"></script>   
	 <!--/.Data table-->	
	<script src="assets/scripts.js"></script>
	
	<script>
	$(document).ready(function()
{	

	detail();
	detail2();
	subtotal();
	
	
	//detail() is a funtion fetching brand record from database whenever page is load
	function detail(){
		$.ajax({
			url	:	"halaman/hal_order_laundry_pcs/aksi_order_laundry.php",
			method:	"POST",
			data	:	{detail:1},
			success	:	function(data){
				$("#tampildata").html(data);
			}
		})
	};
	//detail() is a funtion fetching brand record from database whenever page is load
	function detail2(){
		$.ajax({
			url	:	"halaman/hal_order_laundry_kiloan/aksi_order_laundry.php",
			method:	"POST",
			data	:	{detail:1},
			success	:	function(data){
				$("#tampildata2").html(data);
			}
		})
	};
	
	//subtotal() is a funtion fetching brand record from database whenever page is load
	function subtotal(){
		$.ajax({
			url	:	"halaman/hal_order_laundry_pcs/aksi_order_laundry.php",
			method:	"POST",
			data	:	{subtotal:1},
			success	:	function(data){
				$("#subtotaltxt").val(data);
			}
		})
	};
	
	//subtotal() is a funtion fetching brand record from database whenever page is load
	function subtotal2(){
		$.ajax({
			url	:	"halaman/hal_order_laundry_kiloan/aksi_order_laundry.php",
			method:	"POST",
			data	:	{subtotal:1},
			success	:	function(data){
				$("#subtotaltxt").val(data);
			}
		})
	};
	
	function ilang(){
		$("#id_item").val("");
		$("#id_paket").val("");
		$("#harga").val("");
		$("#jumlah").val("");
		$("#berat").val("");
		$("#ket").val("");
	};
	
	
	$("#tambah").click(function(){
		
		var inc = $("#inc").val();
		var id_item = $("#id_item").val();
		var harga = $("#harga").val();
		var jumlah = $("#jumlah").val();
		
		
		if (harga == "") {
			$("#b").addClass("error");	
		}
		if (jumlah == "") {
			$("#c").addClass("error");		
		} else { 	
			$.ajax({
				url	:	"halaman/hal_order_laundry_pcs/aksi_order_laundry.php",
				method:	"POST",
				data	:	{input_detail:1,
							 inc: inc, 
							 s_id_item: id_item, 
							 s_harga: harga,
							 s_jumlah: jumlah},
				success	:	function(data){
					detail();
					subtotal();
					ilang();
					$("#status").html(data);
				}
			});
		}
 	});
	
	
	$("#tambah2").click(function(){
		
		var inc = $("#inc").val();
		var id_paket = $("#id_paket").val();
		var harga = $("#harga").val();
		var berat = $("#berat").val();
		var ket = $("#ket").val();
		
		
		if (harga == "") {
			$("#b").addClass("error");	
		}
		if (berat == "") {
			$("#c").addClass("error");		
		} else { 	
			$.ajax({
				url	:	"halaman/hal_order_laundry_kiloan/aksi_order_laundry.php",
				method:	"POST",
				data	:	{input_detail:1,
							 inc: inc, 
							 s_id_paket: id_paket, 
							 ket: ket, 
							 s_harga: harga,
							 s_berat: berat},
				success	:	function(data){
					detail2();
					subtotal2();
					ilang();
					$("#status").html(data);
				}
			});
		}
 	});
	
	<?php
	//transaksi_pcs
  $tampil=mysqli_query($conn, "SELECT * FROM order_laundry P, order_detail	 O, member M WHERE P.username=M.username AND P.order_id=O.order_id GROUP BY P.order_id ORDER BY P.order_id ASC ");
   
    while ($r=mysqli_fetch_array($tampil)){
	
	?>
	  $("#detail_click_<?=$r['id']?>").click(function(){

			var tid = $(this).attr('tid');
			$.ajax({
				url	:	"halaman/hal_transaksi/aksi_transaksi.php",
				method:	"POST",
				data	:	{detail:1,
							 tid: tid},
				success	:	function(data){
					$("#tampil_detail").css('display', 'block');
					$("#transaksi_pcs").css('display', 'none');
					$("#tampil_detail").html(data);
				}
			});
			
		});
			 
	<?php } ?>	


	
	
	$("body").delegate("#tutup","click",function(event){
		
		$("#tampil_detail").css('display', 'none');
		$("#transaksi_kiloan").css('display', 'block');
		$("#transaksi_pcs").css('display', 'block');
		
 	});
	
	$("#uangtxt").keyup(function(){
       var subtotal =  $("#subtotaltxt").val();
       var uang =  $("#uangtxt").val();
	   var kembalian = uang - subtotal;
	   $("#kembaliantxt").val(kembalian);
    });
	
	
	
	
	
	
	$("body").delegate("#hapus","click",function(event){
	 	
		var inc = $(this).attr('inc');
		
		$.ajax({
				url	:	"halaman/hal_order_laundry_pcs/aksi_order_laundry.php",
				method:	"POST",
				data	:	{hapus:1,
							 s_inc: inc},
				success	:	function(data){
					detail();
					subtotal();
					$("#status").html(data);
					
				}
			});
		
 	});
	
	
});

	</script>
	
		
	
        <script>

	jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
	
    </body>

</html>
