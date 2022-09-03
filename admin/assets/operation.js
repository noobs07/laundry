$(document).ready(function()
{

	var inc = 0;
	 $('#tampildata').load("halaman/hal_purchase_order_pcs/tampil-data.php");
	 $('#suplier').load("bagian.php?halamane=suplier");
	 
	//Hapus temp_purchase_order_detail
 	$('.hapus_temp_purchase_order_detail').live("click", function()
 	{
 		var url = "halaman/hal_purchase_order_pcs/action.php";
 		a = this.id;
 		var loadpage = "halaman/hal_purchase_order_pcs/tampil-data.php";
 		
 		var answer = confirm("Apakah Anda ingin menghapus data ini?");
 		if(answer)
 		{
 			$.post(url, {hapus: a}, function()
 			{
 				$.post(loadpage,function(data)
 		        {
 			        $('#tampildata').html(data).show();
 			        $("#msg").show();
                    $("#msg").fadeOut(2500);
				    $('#msg').html("Succesfully deleted");
 		        });
 			});
 		}
 	});
	
	
	
	//tidak dipake
	$('.savepurchaseorder').live("click", function()
 	{	var url = "halaman/hal_purchase_order_pcs/aksi_purchase_order.php?halamane=phurchase_order&act=input";
 		var loadpage = "bagian.php?halamane=suplier";
		
 		var take_select_supplier = $('select[name=t_select_supplier]').val();
 		var take_purchase_order_no = $('input:text[name=t_purchase_order_no]').val();
 		var take_po_date = $('input:text[name=t_po_date]').val();
		
 		var answer = confirm("Apakah Anda ingin menyimpan data ini?");
 		if(answer)
 		{	$.post(url, {t_select_supplier: take_select_supplier,t_purchase_order_no: take_purchase_order_no, t_po_date: take_po_date}, function()
 			
 			{
 				$.post(loadpage, {quantity: quantity}, function(data)
 		        {
 			        $('#suplier').html(data).show();
 			        $("#msg").show();
                    $("#msg").fadeOut(2500);
				    $('#msg').html("Succesfully Updates");
 		        });
 			});
 		}
 	});
	//tidak dipake
	
	$(".tambah").click(function(){
		$("#tampildata").css("display", "block"); 
 	});

 	$('#savedata').bind("click", function(event)
 	{
 		var url = "halaman/hal_purchase_order_pcs/action.php";
 		var loadpage = "halaman/hal_purchase_order_pcs/tampil-data.php";
 		var get_inc = $('input:text[name=u_inc]').val();
		var get_id_item = $('select[name=u_id_item]').val();
 		var get_item_name = $('input:text[name=u_item_name]').val();
 		var get_quantity = $('input:text[name=u_quantity]').val();
 		var get_price = $('input:text[name=u_price]').val();
 		
		var take_id_item = $('select[name=t_id_item]').val();
 		var take_item_name = $('input:text[name=t_item_name]').val();
 		var take_quantity = $('input:text[name=t_quantity]').val();
 		var take_price = $('input:text[name=t_price]').val();
 		var quantity = $('select[name=quantity]').val();

 		$.post(url, {u_inc: get_inc, u_item_name: get_item_name, u_id_item: get_id_item, u_quantity: get_quantity, u_price: get_price,
					 t_id_item: take_id_item,t_item_name: take_item_name, t_quantity: take_quantity, t_price: take_price,
					 id: inc, quantity: quantity}, function()
 		{
 			$("#kotakdialog").modal("hide");
            $.post(loadpage, {quantity: quantity}, function(data)
 		    {
 			    $('#tampildata').html(data).show();
 			    $("#msg").show();
                $("#msg").fadeOut(2500);
 		    });
          
 		});
 	});
	
	
		
	
});
