<?php
$index_sub=""; 
$warehouse_sub=""; 
$packages_sub="" ; 
$ukn_packages_sub=""; 
$declaration_sub="active"; 
$requests_sub=""; 
$purchases_sub=""; 
$news_sub=""; 
$userlist_sub=""; 
$faq_sub=""; 
$contacts_sub=""; 
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
              Declaration
            </li>
          </ol>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Declarations
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
                  <hr>
                  <div class="row">
                  <?php $r=getDeclarations("", "", "", "", "");
                  if($r==-1){
                     echo "No packages";
                   }else{?>                     
                   <div id="result" style="margin: 10px 0px;"></div>                                                                      
                                              <table id="decDatatable" class="table table-striped table-bordered packages" style="font-size: 11px;">
                                                <thead>
                                                  <tr>
                                                    <th><input type="checkbox" name="decIdAll" id="decIdAll" value="1"></th>
                                                    <th>E-Store</th>
                                                    <th>Customer</th>
                                                    <th>Country</th>
                                                    <th>Commodity</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                    <th></th>
                                                  </tr>
                                                </thead>                                                
                                                <tbody id="packages_list">
                                                 <?php echo $r;?>
                                                </tbody>                                                  
                                              </table>
                                            </div>
                                              <?php } ?>
                                            <hr>
                                            <div class="row">
                                            <div class="col-md-6">
                                              <div class="btn btn-info" id="change_status">MOVE TO PACKAGES</div>
                                              <div class="btn btn-info" id="remove">REMOVE</div>
                                            </div>                                            </div>
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

var decTable=$("#decDatatable").dataTable(); 

$(".select2").select2();

function filterList(){
  var user_id = document.getElementById("users_filter").value;
  var country_id = document.getElementById("country_filter").value;
  var start_date = document.getElementById("start_date").value;
  var end_date = document.getElementById("end_date").value;


if((end_date=="" &&start_date!="")||(end_date!="" &&start_date=="")){
    $('#result').html("<span class='text-danger'>both start date and end date should be selected");
}else{
      $.ajax({
                type: 'POST',
                url: 'fiter_declarations.php',
                data: {'user_id':user_id, 'country_id':country_id,'start_date':start_date,'end_date':end_date}, 
                success: function(data){
                 $("#decDatatable").dataTable().fnDestroy();   
                 $('#packages_list').html(data);
                },
      });
}

$("#decIdAll").change();
$("#decIdAll").prop('checked', false);
}

$("#decIdAll").change(function() {
   if(this.checked) {
      $("input:checkbox[name=decId]").each(function(){
        $(this).prop('checked', true);      
        $(this).change();
      });
    }else{
      $("input:checkbox[name=decId]").each(function(){
        $(this).prop('checked', false);
        $(this).change();
      });
    }
});

$(".makePack").click(function(){                                
    var decId=$(this).closest("tr").attr("id");
    $.ajax({
                type: 'POST',
                url: 'make_declaration.php',
                data: {'decId':decId},
                success: function(data){
                 if(data.status=='success'){
                   $("#del_"+decId).click();
                  
                 }else{
                  alert("error");
                 }
                 $('#result').html(data.message);
                },
      });
});

$('#packages_list').on( 'click', '.removeDec', function () {
   var decId=$(this).closest("tr").attr("id");
   $.ajax({
                type: 'POST',
                url: 'delete_declaration.php',
                data: {'decId':decId},
                success: function(data){
                 if(data.status=='success'){
                  
                 }else{
                  alert("error");
                 }
                 $('#result').html(data.message);
                },
      });
  var row = $(this).parents("tr").get(0);
  decTable.fnDeleteRow(decTable.fnGetPosition(row));

} );


</script>