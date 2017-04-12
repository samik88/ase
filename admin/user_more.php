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
              Customers
            </li>
          </ol>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Customers list
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12"> 
                  
                  <?php $r=getUsersListDetails($_GET["PObox"]);
                  if($r==-1){
                     echo "No packages";
                   }else{ echo $r; } ?>
                                            
                                            <hr>
                                            <div class="row">
                                            <div  class="col-md-6" >
                                               <div class="btn-primary md-trigger  btn  waves-light" ><a href='edit_user_info.php?PObox=<?php echo $_GET["PObox"]?>' style='color:white'>EDIT INFO</a></div>
                                            <div class="btn-primary md-trigger  btn  waves-light" ><a href='reset_pass_admin.php?PObox=<?php echo $_GET["PObox"]?>' style='color:white'>RESET PASSWORD</a></div>
                                           </div>
                                            <div class="btn-primary md-trigger  btn  waves-light" style="float:right
                                            "><a href="users_list.php" style="color:white">BACK</a></div>
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
