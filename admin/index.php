<?php
$index_sub="active"; 
$warehouse_sub=""; 
$packages_sub=""; 
$ukn_packages_sub=""; 
$declaration_sub=""; 
$requests_sub=""; 
$purchases_sub=""; 
$news_sub=""; 
$userlist_sub=""; 
$faq_sub=""; 
$contacts_sub=""; 
$messages=""; 

include("header.php");
               
//$main_info = getDashboardInfo($_SESSION["accNumber"]); 

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
            Welcome !
          </h4>
          <ol class="breadcrumb pull-right">
            <li>
              <a href="#">
                ASEshopping
              </a>
            </li>
            <li class="active">
              Dashboard
            </li>
          </ol>
        </div>
      </div>
      <div class="row">
        <!-- INBOX -->
        <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                News
              </h3>
            </div>
            <div class="panel-body">
              <div class="inbox-widget nicescroll mx-box">
                
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
        <!-- CHAT -->
        <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Our messages
              </h3>
            </div>
            <div class="panel-body todoapp ">
              <div class="inbox-widget nicescroll mx-box">
                
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
        <!-- UPDATES -->
        <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Your updates
              </h3>
            </div>
            <div class="panel-body">
              <div class="chat-conversation ">
                <div class="inbox-widget nicescroll mx-box">
                  
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!-- end col-->
      </div>
      <!-- end row -->
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
