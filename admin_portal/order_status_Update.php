
<div class="modal fade" id="exampleModalchangestatus<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Customer  Name : <strong><?php echo  $USer_NAME;?></strong></h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">×</span> -->
                          </button>
                        </div>
                        <div id="Mor_Eve"></div>
                        <div class="modal-body">
                            <input type="hidden" id="QR_CODE<?php echo $count;?>"  value="<?php echo $QR_code;?>"> 
                            <select  class="form-control" 
                              id="Status_Order<?php echo $count;?>">
                              <option disabled=""> Change Status </option>
                              <option value="Pick Up"> Pick Up </option>
                               <option value="Deliver"> Deliver </option>
                            </select>
                        </div>
                        <div class="modal-footer">
                           <input  name="" type="button" 
                           onclick="submitPass<?php echo $count?>()"  class="btn btn-success form-control" value="Change Status ">
                        </div>
                      </div>
                    </div>
                  </div>

<script type="text/javascript">

  function submitPass<?php echo $count?>(){
   var Status=document.getElementById('Status_Order<?php echo $count?>').value;
   var CODE=document.getElementById('QR_CODE<?php echo $count?>').value;
   
    $.ajax({url:"status-udate-ajax.php?Status=".concat(Status,"&CODE=".concat(CODE)), success: function(result){
      setTimeout($('#exampleModalchangestatus<?php echo $count; ?>').modal('hide'), 50000);
      window.location.reload();
      $("#Mor_Eve").html(result);
     
    }});
   
  }
</script>                  