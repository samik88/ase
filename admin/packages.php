<?php
$index_sub=""; 
$warehouse_sub=""; 
$packages_sub="active" ; 
$ukn_packages_sub=""; 
$declaration_sub="" ; 
$requests_sub="" ; 
$purchases_sub="" ; 
$news_sub="" ; 
$userlist_sub="" ; 
$faq_sub="" ; 
$contacts_sub="" ; 
$messages=""; 

include("header.php");

?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">      
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <ol class="breadcrumb pull-right">
            <li>
              <a href="#">
                Aseshopping
              </a>
            </li>
            <li class="active">
              Packages
            </li>
          </ol>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Orders
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="row">
               
                  <div class="form-inline" role="form">
                    <div class="form-group">
                        <label for="users_filter" class="control-label">Users</label><br>
                        <select  class="form-control select2" id="users_filter">
                          <option value="">Select Customer</option>
                          <?php echo getUsersFilter()?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="country_filter" class="control-label">Country</label><br>
                        <select  class="form-control" id="country_filter">
                          <option value="">Select Country</option>
                          <?php echo getCountriesFilter('az')?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="status_filter" class=" control-label">Status</label><br>
                        <select  class="form-control" id="status_filter">
                          <option value="">Select Status</option>
                          <?php echo getStatusFilter('az')?>
                        </select>
                    </div>
                     <div class="form-group">
                      <label for="start_date" class="control-label">Start date</label><br>
                      <div class="input-group">
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="start_date">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div><!-- input-group -->
                    </div>
                     <div class="form-group">
                      <label for="end_date" class=" control-label">End date</label><br>
                        <div class="input-group">
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="end_date">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div><!-- input-group -->
                    </div>
                    <div class="form-group">
                       <label for="end_date" class=" control-label">&nbsp;</label><br>
                      <button type="button" class="btn btn-info"  id="filter" onclick="filterList()" >Filter</button>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-3" style="padding-left:0px;margin-top:10px">
                    <label for="end_date" class=" control-label">Status for all packages</label><br>
                    <select class="form-control" style="display:none" id="AwbNumAll_status">
                        <option value="">Select Status</option>
                          <?php echo getStatusFilter('az')?>
                    </select>
                  </div>
                  <div class="col-md-9"></div>
                  </div>
                  <hr>
                  
                  <div class="row">
                  <?php $r=getPackages("","","","","");
                  if($r==-1){
                     echo "No packages";
                   }else{?>                     
                   <div id="result" style="margin: 10px 0px;"></div>                                                                      
                                              <table id="packDatatable" class="table table-striped table-bordered packages" style="font-size: 11px;">
                                                <thead>
                                                  <tr>
                                                    <th><input type="checkbox" name="awbNumAll" id="awbNumAll" value="1"></th>
                                                    <th>No</th>
                                                    <th>Customer name</th>
                                                    <th>PObox</th>
                                                    <th>City</th>
                                                    <th>Weight</th>
                                                    <th>W</th>
                                                    <th>H</th>
                                                    <th>L</th>
                                                    <th>Custom Value</th>
                                                    <th>Content</th>
                                                    <th>Status</th>
                                                    <th>Del price</th>
                                                    <th>P status</th>
                                                    <th></th>
                                                    <th></th>
                                                  </tr>
                                                </thead>                                                
                                                <tbody id="packages_list">
                                                  <?php echo $r;?>
                                                </tbody>                                                  
                                              </table>
                                              <?php } ?>
                                            </div>
                                            <hr>
                                            <div class="row">
                                            <div class="col-md-6">
                                              <div class="btn btn-info" id="change_status">CHANGE STATUS</div>
                                              <div class="btn btn-info" id="remove">REMOVE</div>                                            
                                            </div>
                                            <div  class="" style="float:right">
                                            <div class="btn btn-info"><a href="new_package.php" style="color:white">ADD</a></div>
                                            </div>
                                            </div>
                                            <div class="row" style="margin-top:10px">
                                               <div class="col-md-12">
                                                 <form action="generate_labels.php" method="POST" id="label_info">
                                                    <input type="hidden" value="" name="label_info" />
                                                    <div  class="btn btn-success" id="gen_labels">GENERATE LABELS</div>   
                                                  </form>
                                               </div>
                                            </div>
                                            </div>
                                      </div>
                                  </div>
                              </div>
                          </div>                          
                      </div>                      
                      <!-- End Row -->
                      <div class="row">
                        <span class="text-success">
                        </span>                        
                      </div>                 
                  </div>                  
                  <!-- container -->                 
              </div>              
              <!-- content -->              
                  <footer class="footer text-right">
                   2015-2016 © ASEshopping.
                  </footer>              
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<?php
include("footer.php");
?>

<script type="text/javascript" src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../assets/plugins/select2/dist/js/select2.min.js"></script>

<script>
// Date Picker
jQuery('#start_date').datepicker();
jQuery('#end_date').datepicker();

var packTable=$("#packDatatable").dataTable(); 

$(".select2").select2();

$(document).ready(function(){
  $("th").width("0px" );
});
function filterList(){
  var user_id = document.getElementById("users_filter").value;
  var country_id = document.getElementById("country_filter").value;
  var status_id = document.getElementById("status_filter").value;
  var start_date = document.getElementById("start_date").value;
  var end_date = document.getElementById("end_date").value;

if((end_date=="" &&start_date!="")||(end_date!="" &&start_date=="")){
    $('#result').html("<span class='text-danger'>both start date and end date should be selected");
}else{
    $.ajax({
              type: 'POST',
              url: 'fiter_packages.php',
              data: {'user_id':user_id, 'country_id':country_id,'status_id':status_id,'start_date':start_date,'end_date':end_date}, //It would be best to put it like that, make it the same name so it wouldn't be confusing
              success: function(data){
               packTable.fnDestroy();   
               $('#packages_list').html(data);
              },
    });
}

$("#awbNumAll").change();
$("#awbNumAll").prop('checked', false);
$("#AwbNumAll_status").css('display','none');
}


$("#awbNumAll").change(function() {
   if(this.checked) {
      $("input:checkbox[name=AwbNum]").each(function(){
        $(this).prop('checked', true);      
        $(this).change();
        $("#AwbNumAll_status").css("display", 'block');
      });
    }else{
      $("input:checkbox[name=AwbNum]").each(function(){
        $(this).prop('checked', false);
        $(this).change();
        $("#AwbNumAll_status").css("display", 'none');
      });
    }
});

$('#remove').click(function() {
  var dec_ids;
  var splited_ids;
  var nRow;
  if($("input:checkbox[name=AwbNum]:checked").length==0){
    $('#result').html("No checkbox is selected");
  }else{
    var checked_num = {};
    var i = 0;
    $("input:checkbox[name=AwbNum]:checked").each(function(){
      checked_num[i]=$(this).val();
      i++;
    }); 
    $.ajax({
              type: 'POST',
              url: 'remove_package.php',
              data: checked_num,
              success: function(data){
                $('#result').html("done"); 
                $("#awbNumAll").change();
                $("#awbNumAll").prop('checked', false); 
                if(data.success==""){
                  dec_ids = data.error;  
                  //TODO alert all errors;             
                }else{
                  dec_ids = data.success;
                  splited_ids=dec_ids.split(",");
                  for(var j=0;j<splited_ids.length-1;j++){
                    nRow =  $('#packages_list tr[id="'+splited_ids[j]+'_tr"]')[0];
                    packTable.fnDeleteRow(nRow);             
                  }   
                }                 
                
              },
    });
  }
    } );
 

$("#packages_list").on("change",".AwbNum", function(){
  if(this.checked) { 
      $("#"+$(this).val()+"_select").prop("hidden",false);
      $("#"+$(this).val()+"_span").css("display", 'none');
    }else{      
      $("#"+$(this).val()+"_select").prop("hidden",true);
      $("#"+$(this).val()+"_span").css("display",'block');
    }
  });

$(".AwbNum").change(function() {
    if(this.checked) { 
      $("#"+$(this).val()+"_select").prop("hidden",false);
      $("#"+$(this).val()+"_span").css("display", 'none');
    }else{      
      $("#"+$(this).val()+"_select").prop("hidden",true);
      $("#"+$(this).val()+"_span").css("display",'block');
    }
});

$("#AwbNumAll_status").change(function() {
  $(".AwbNum_status").each(function(){
    $(this).val($("#AwbNumAll_status").val());
  });
});

$('#change_status').click(function(){
  if($("input:checkbox[name=AwbNum]:checked").length==0){
    $('#result').html("No checkbox is selected");
  }else{
    var checked_num = {};
    var i = 0;
    $("input:checkbox[name=AwbNum]:checked").each(function(){
      checked_num[$(this).val()]=$("#"+$(this).val()+"_select").val();
      i++;
    }); 

    $.ajax({
              type: 'POST',
              url: 'change_status.php',
              data: checked_num, //It would be best to put it like that, make it the same name so it wouldn't be confusing
              success: function(data){
                //$('#result').html(data); 
                if(data.success==""){
                  dec_ids = data.error;  
                  //TODO alert all errors;             
                }else{
                  dec_ids = data.success;
                  splited_ids=dec_ids.split(",");
                  var selected_val;
                  var country;
                  for(var j=0;j<splited_ids.length-1;j++){
                    selected_val=$("#"+splited_ids[j]+"_select").val();
                    country=$("#"+splited_ids[j]+"_select [value='"+selected_val+"']").text();
                    $("#"+splited_ids[j]+"_span").text(country);
                  }   
                }   

                $("#awbNumAll").prop('checked', false);
                $("#awbNumAll").change();
              },
    });
  }
    
});


function addPrice(AwbNum){
  var price = $("#"+AwbNum+"_price").val();
  if(isEmpty(price)){
    alert("Please, enter price");
  }else{
    if(isNumeric(price)){
     $.ajax({
              type: 'POST',
              url: 'add_price.php',
              data: {"AwbNum":AwbNum,"price":price}, 
              success: function(data){
                if(data.status == "success"){
                    $('#'+AwbNum+"_price_td").html(price);
                }
                $('#result').html(data.message); 
              },
    });
  }else{
  alert("Price should be a number");
 }
}
}

function pay(AwbNum){
      $.ajax({
              type: 'POST',
              url: 'pay.php',
              data: {"AwbNum":AwbNum}, 
              success: function(data){
                if(data.status == "success"){
                    $('#'+AwbNum+"_pay_td").html("Paid");
                    $('#result').html(data.message); 
                }else{
                    $('#result').html(data.message); 
                }
              },
      });
}

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function isEmpty(text){
   return (text.trim().length==0);
}

function deleteRow(r) {
  alert("delete");
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("datatable").deleteRow(i);
}


$('#gen_labels').click(function(){
  var AwbNum;
  var info="{";
  if($("input:checkbox[name=AwbNum]:checked").length==0){
    $('#result').html("No checkbox is selected");
  }else{
    var i=0;
    $("input:checkbox[name=AwbNum]:checked").each(function(){
      AwbNum=$(this).val();
      info+='"'+i+'":{';
      info+='"AwbNum":"'+AwbNum+'",';
      info+='"PObox":"'+$("#PObox_"+AwbNum).val()+'",';
      info+='"name":"'+$("#name_"+AwbNum).val()+'",';
      info+='"weight":"'+$("#weight_"+AwbNum).val()+'",';
      info+='"country":"'+$("#country_"+AwbNum).val()+'"';
      info+="},";
      i++;
    }); 
  info+="}";
  $("input[name=label_info]").val(info);
  $("#label_info").submit();
  } 
});

</script>