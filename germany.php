  <?php 
   $index_sub="";
   $warehouse_sub="active";
   $orders_sub="";
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
                        <h4 class="pull-left page-title"></h4>
                        <ol class="breadcrumb pull-right">
                           <li><a href="#">ASEshopping</a></li>
                           <li class="active">Dashboard</li>
                        </ol>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">Germany</h3>
                           </div>
                           <div class="panel-body">
                              <div class="row">
                                 <div class="col-md-6">
                                             <div class="about-info-p">
                                                <strong>Contact Name:</strong>
                                                <p class="text-muted"> Elvira Chakhpazova</p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>Address line 1:</strong>
                                                <p class="text-muted">Emons/ Baku Gmbh
<br/>Genshagener Str. 27
</p>
                                             </div>
                                             <div class="about-info-p m-b-0">
                                                <strong>Address line 2:</strong>
                                                <p class="text-muted"><?php echo $_SESSION['accNumber']?></p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>City:</strong>
                                                <p class="text-muted">Ludwigsfelde</p>
                                             </div>
                                             <div class="about-info-p m-b-0">
                                                <strong>Zip Code:</strong>
                                                <p class="text-muted">14974</p>
                                             </div>
                                             <div class="about-info-p m-b-0">
                                                <strong>Phone:</strong>
                                                <p class="text-muted">+49(0)337013631300</p>
                                             </div>
                                          </div>
                                      
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Row -->
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
