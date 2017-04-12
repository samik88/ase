<?php
$index_sub=""; 
$warehouse_sub=""; 
$packages_sub=""; 
$ukn_packages_sub=""; 
$declaration_sub=""; 
$requests_sub=""; 
$purchases_sub=""; 
$news_sub=""; 
$userlist_sub="active"; 
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
              Customers list
            </li>
          </ol>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Customers
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="row">
                  <?php $r=getUsersList();
                  if($r==-1){
                     echo "No packages";
                   }else{?>                     
                   <div id="result" style="margin: 10px 0px;"></div>                                                                      
                                              <table id="userDatatable" class="table table-striped table-bordered packages">
                                                <thead>
                                                  <tr>
                                                    <th>
                                                      No
                                                    </th>
                                                    <th>
                                                      Name
                                                    </th>
                                                    <th>
                                                      Surname
                                                    </th>
                                                    <th>
                                                      PObox
                                                    </th>
                                                    <th>
                                                      Email
                                                    </th>
                                                    <th>
                                                      Pin
                                                    </th>
                                                    <th>
                                                      Address
                                                    </th>
                                                    <th>
                                                      Phone
                                                    </th>
                                                    <th>
                                                      Status
                                                    </th>
                                                    <th>   
                                                    </th>
                                                    <th>   
                                                    </th>
                                                  </tr>
                                                </thead>                                                
                                                <tbody id="users_list">
                                                  <?php echo $r;?>
                                                </tbody>                                                  
                                              </table>
                                            </div>

                                              <?php } ?>
                                            <hr>
                                            <div class="row">
                                            <div class="" style="float:right">
                                            <div class="btn btn-info"><a target="_blank" href="exportUserList.php" style="color:white">EXPORT</a></div>
                                            <div class="btn btn-info"><a href="new_user.php" style="color:white">ADD</a></div>
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

<script>

var userTable=$("#userDatatable").dataTable(); 
$("#userDatatable").on('click','.activate',function(){
  var email=$(this).attr("id");
  $.ajax({
              type: 'POST',
              url: 'activate.php',
              data: { 'email':email}, 
              success: function(data){
                 if(data.status == "success"){
                  //todo delete activate button, make span "activated"
                  }
                  $('#result').html(data.message);
              },
    });
});

function exportUserList(){

  $.ajax({
              type: 'POST',
              url: 'exportUserList.php',
              success: function(data){
                 if(data.status == "success"){
                  //todo delete activate button, make span "activated"
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

</script>