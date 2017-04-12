<?php
$index_sub=""; 
$warehouse_sub=""; 
$packages_sub="" ; 
$ukn_packages_sub="active"; 
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
              Unknown packages
            </li>
          </ol>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Packages list
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="row">
                  <?php $r=getUknownPackages(null);
                  if($r==-1){
                     echo "No packages";
                   }else{?>                     
                   <div id="result" style="margin: 10px 0px;"></div>                                                                      
                                              <table id="uknownDatatable" class="table table-striped table-bordered packages">
                                                <thead>
                                                  <tr>
                                                    <th>
                                                      No
                                                    </th>
                                                    <th>
                                                      OrderNo
                                                    </th>
                                                    <th>
                                                      City
                                                    </th>
                                                    <th>
                                                      Weight
                                                    </th>
                                                    <th>
                                                      Weight Type
                                                    </th>
                                                    <th>
                                                      W
                                                    </th>
                                                    <th>
                                                      H
                                                    </th>
                                                    <th>
                                                      L
                                                    </th>
                                                    <th>
                                                      Dim Unit
                                                    </th>
                                                    <th>
                                                      Custom Value
                                                    </th>
                                                    <th>
                                                      Currency
                                                    </th>
                                                    <th>
                                                      Content
                                                    </th>
                                                    <th>
                                                      Assign to user
                                                    </th>
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
                                            <div  class="" style="float:right">
                                            <div class="btn btn-info"><a href="new_uknown_package.php" style="color:white">ADD</a></div>
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

var uknownDatatable=$("#uknownDatatable").dataTable(); 

$(".assign_user").click(function(){
  var AwbNum = $(this).closest("tr").attr("id");
  var PObox = $("#"+AwbNum+"_user").val();
  var nRow;
   if(PObox !="-1"){
      $.ajax({
              type: 'POST',
              url: 'assign_uknown_package.php',
              data: { 'AwbNum':AwbNum,'PObox':PObox}, //It would be best to put it like that, make it the same name so it wouldn't be confusing
              success: function(data){
                  if(data.status == "success"){
                    $("#"+AwbNum+"_del").click();
                  }
                  $('#result').html(data.message);
              },
    });
   }else{
    alert("Please, select customer to assign");
   }
});

$(".remove_pack").click(function(){
    var AwbNum = $(this).closest("tr").attr("id");
    $.ajax({
              type: 'POST',
              url: 'delete_uknown_package.php',
              data: { 'AwbNum':AwbNum}, //It would be best to put it like that, make it the same name so it wouldn't be confusing
              success: function(data){
                  if(data.status == "success"){
                    nRow =  $('#packages_list tr[id="'+AwbNum+'"]')[0];
                    uknownDatatable.fnDeleteRow(nRow); 
                  }
                  $('#result').html(data.message);
              },
    });

});

$("#packages_list").on("change",".AwbNum", function(){
  
  if(this.checked) { 
      $("#"+$(this).val()+"_select").prop("hidden",false);
      $("#"+$(this).val()+"_span").css("display", 'none');
    }else{      
      $("#"+$(this).val()+"_select").prop("hidden",true);
      $("#"+$(this).val()+"_span").css("display",'block');
    }
  });

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function isEmpty(text){
   return (text.trim().length==0);
}

</script>