<?php
   $index_sub="";
   $usa_sub="";
   $uk_sub="";
   $turkey_sub="";
   $orders_sub="active";
   $purchases_sub="";
   $ask_buy_sub="";  
   $declaration_sub="";
   $faq_sub="";
   $contacts_sub="";
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
          <h4 class="pull-left page-title">
            Orders list
          </h4>
          <ol class="breadcrumb pull-right">
            <li>
              <a href="#">
                Aseshopping
              </a>
            </li>
            <li class="active">
              Orders
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
                  <?php if(isset($_SESSION['accNumber']))

$r=packageByUser($_SESSION['accNumber']);

if($r==-1){
   echo "You don't have any orders";
}else{?>
                                              
                                              
                                              <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>
                                                      No
                                                    </th>
                                                    <th>
                                                      OrderNo
                                                    </th>
                                                    <th>
                                                      Weight
                                                    </th>
                                                    <th>
                                                      Width
                                                    </th>
                                                    <th>
                                                      Height
                                                    </th>
                                                    <th>
                                                      Length
                                                    </th>
                                                    <th>
                                                      Custom Value
                                                    </th>
                                                    <th>
                                                      Content
                                                    </th>
                                                    <th>
                                                      Status
                                                    </th>
                                                    <th>
                                                      Tracking
                                                    </th>
                                                  </tr>
                                                </thead>
                                                
                                                
                                                <tbody>
                                                  <?php echo $r;

?>
                                                      
                                                      
                                                      
                                                  </tbody>
                                                  
                                              </table>
                                              <?php } ?>
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