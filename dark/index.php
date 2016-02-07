<?php
   
   $index_sub="active";
   $usa_sub="";
   $uk_sub="";
   $turkey_sub="";
   $orders_sub="";
   $purchases_sub="";
   $ask_buy_sub="";  
   $declaration_sub="";
   $faq_sub="";
   $contacts_sub="";
include("header.php");
               
$main_info = getDashboardInfo($_SESSION["accNumber"]); 

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
      <!-- Start Widget -->
      <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-3">
          <div class="mini-stat clearfix bx-shadow bg-info">
            <span class="mini-stat-icon">
              <i class="ion-social-usd">
              </i>
            </span>
            <div class="mini-stat-info text-right">
              <span class="counter">
               <?php echo $main_info["amount_to_pay"];?>
              </span>
              Amount to pay
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
          <div class="mini-stat clearfix bg-purple bx-shadow">
            <span class="mini-stat-icon">
              <i class="ion-ios7-cart">
              </i>
            </span>
            <div class="mini-stat-info text-right">
              <span class="counter">
               <?php echo $main_info["active_orders"];?>
              </span>
              Active orders
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
          <div class="mini-stat clearfix bg-success bx-shadow">
            <span class="mini-stat-icon">
              <i class="ion-eye">
              </i>
            </span>
            <div class="mini-stat-info text-right">
              <span class="counter">
               <?php echo $main_info["bonuses"];?>
              </span>
              Available points
            </div>
            
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
          <div class="mini-stat clearfix bg-primary bx-shadow">
            <span class="mini-stat-icon">
              <i class="ion-android-contacts">
              </i>
            </span>
            <div class="mini-stat-info text-right">
              <span class="counter">
               <?php echo $main_info["friends"];?>
              </span>
              Invited friends
            </div>
          </div>
        </div>
      </div>
      <!-- End row-->
      <!-- Start  adresses info-->
      <div class="row">
        <div class="col-lg-4">
          <div class="portlet">
            <!-- /portlet heading -->
            <div class="portlet-heading">
              <h3 class="portlet-title text-dark text-uppercase">

                USA warehouse
              </h3>
              <div class="portlet-widgets">
                <span class="divider">
                </span>
                <a data-toggle="collapse" data-parent="#usa-accordion" href="#usa-portlet">
                  <i class="ion-minus-round">
                  </i>
                </a>
                <span class="divider">
                </span>
                <a href="#" data-toggle="remove">
                  <i class="ion-close-round">
                  </i>
                </a>
              </div>
              <div class="clearfix">
              </div>
            </div>
            <div id="usa-portlet" class="panel-collapse collapse in">
              <div class="portlet-body">
                <div class="row">
                  <div class="col-md-12">
                    <div id="pie-chart">
                      <div id="pie-chart-container" class="flot-chart" style="height: 500px">
                        <div class="about-info-p">
                          <strong>
                            Contact Name:
                          </strong>
                          <p class="text-muted">
                            Mehdi Ahmadov
                          </p>
                        </div>
                        <div class="about-info-p">
                          <strong>
                            Company Name:
                          </strong>
                          <p class="text-muted">
                            AJ Worldwide Services
                          </p>
                        </div>
                        <div class="about-info-p">
                          <strong>
                            Address line 1:
                          </strong>
                          <p class="text-muted">
                            901 Penhorn Avenue, Unit 7
                          </p>
                        </div>
                        <div class="about-info-p m-b-0">
                          <strong>
                            Address line 2:
                          </strong>
                          <p class="text-muted">
                            ASE1004
                          </p>
                        </div>
                        <div class="about-info-p">
                          <strong>
                            City:
                          </strong>
                          <p class="text-muted">
                            Secaucus
                          </p>
                        </div>
                        <div class="about-info-p">
                          <strong>
                            State:
                          </strong>
                          <p class="text-muted">
                            NJ
                          </p>
                        </div>
                        <div class="about-info-p m-b-0">
                          <strong>
                            Zip Code:
                          </strong>
                          <p class="text-muted">
                            07094
                          </p>
                        </div>
                        <div class="about-info-p m-b-0">
                          <strong>
                            Phone:
                          </strong>
                          <p class="text-muted">
                            1-201-348-1800 x 128
                          </p>
                        </div>
                        <br/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /Portlet -->
        </div>
        <!-- end col -->
        <div class="col-lg-4">
          <div class="portlet">
            <!-- /portlet heading -->
            <div class="portlet-heading">
              <h3 class="portlet-title text-dark text-uppercase">
                UK warehouse
              </h3>
              <div class="portlet-widgets">
                <span class="divider">
                </span>
                <a data-toggle="collapse" data-parent="#uk-accordion" href="#uk-portlet">
                  <i class="ion-minus-round">
                  </i>
                </a>
                <span class="divider">
                </span>
                <a href="#" data-toggle="remove">
                  <i class="ion-close-round">
                  </i>
                </a>
              </div>
              <div class="clearfix">
              </div>
            </div>
            <div id="uk-portlet" class="panel-collapse collapse in">
              <div class="portlet-body">
                <div class="row">
                  <div class="col-md-12">
                    <div id="pie-chart">
                      <div id="pie-chart-container" class="flot-chart" style="height: 500px">
                        <div class="about-info-p">
                          <strong>
                            Contact Name:
                          </strong>
                          <p class="text-muted">
                            Major Saini ASE1004
                          </p>
                        </div>
                        <div class="about-info-p">
                          <strong>
                            Company Name:
                          </strong>
                          <p class="text-muted">
                            OCS Worldwide
                          </p>
                        </div>
                        <div class="about-info-p">
                          <strong>
                            Address line 1:
                          </strong>
                          <p class="text-muted">
                            Global House Poyle Road </p>
                          </div>
                        <div class="about-info-p">
                          <strong>
                            City:
                          </strong>
                          <p class="text-muted">
                            Colnbrook Slough 
                          </p>
                        </div>
                        <div class="about-info-p">
                          <strong>
                            County(State):
                          </strong>
                          <p class="text-muted">
                            Berkshire
                          </p>
                        </div>
                        <div class="about-info-p m-b-0">
                          <strong>
                            Zip Code:
                          </strong>
                          <p class="text-muted">
                            SL3 0AY 
                          </p>
                        </div>
                        <div class="about-info-p m-b-0">
                          <strong>
                            Phone:
                          </strong>
                          <p class="text-muted">
                            +44 (0) 20 7640 3922
                          </p>
                        </div>
                        <div>
                          <span class="text-danger">
                            ATTENTION!!! INDICATE Major Saini AS RECEIVER IS REQUIRED!!!
                          </span>
                        </div>
                        <br/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /Portlet -->
        </div>
        <!-- end col -->
        <div class="col-lg-4">
          <div class="portlet">
            <!-- /portlet heading -->
            <div class="portlet-heading">
              <h3 class="portlet-title text-dark text-uppercase">
                Turkey warehouse
              </h3>
              <div class="portlet-widgets">
                <span class="divider">
                </span>
                <a data-toggle="collapse" data-parent="#turkey-accordion" href="#turkey-portlet">
                  <i class="ion-minus-round">
                  </i>
                </a>
                <span class="divider">
                </span>
                <a href="#" data-toggle="remove">
                  <i class="ion-close-round">
                  </i>
                </a>
              </div>
              <div class="clearfix">
              </div>
            </div>
            <div id="turkey-portlet" class="panel-collapse collapse in">
              <div class="portlet-body">
                <div class="row">
                  <div class="col-md-12">
                    <div id="pie-chart">
                      <div id="pie-chart-container" class="flot-chart" style="height: 500px">
                        <div class="about-info-p">
                          <strong>
                            Contact Name:
                          </strong>
                          <p class="text-muted">
                            Mehdi Ahmadov
                          </p>
                        </div>
                        <div class="about-info-p">
                          <strong>
                            Company Name:
                          </strong>
                          <p class="text-muted">
                            ASE Asya Afrika hızlı kargo
                          </p>
                        </div>
                        <div class="about-info-p">
                          <strong>
                            Address line 1:
                          </strong>
                          <p class="text-muted">
                            Çobançeşme,Kalender Sk. No:8 Bahçelievler
                          </p>
                        </div>
                        <div class="about-info-p m-b-0">
                          <strong>
                            Address line 2:
                          </strong>
                          <p class="text-muted">
                            ASE1004
                          </p>
                        </div>
                        <div class="about-info-p">
                          <strong>
                            City:
                          </strong>
                          <p class="text-muted">
                            İstanbul
                          </p>
                        </div>
                        <div class="about-info-p m-b-0">
                          <strong>
                            Zip Code:
                          </strong>
                          <p class="text-muted">
                            34196
                          </p>
                        </div>
                        <div class="about-info-p m-b-0">
                          <strong>
                            Phone:
                          </strong>
                          <p class="text-muted">
                            0850 472 1 472
                          </p>
                        </div>
                        <br/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /Portlet -->
        </div>
        <!-- end col -->
      </div>
      <!-- End row -->
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
