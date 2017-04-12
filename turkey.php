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
          <h4 class="pull-left page-title">
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
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                TURKEY
              </h3>
            </div>
            <div class="panel-body">
              <div id="pie-chart">
                <div class="row">
                  <div class="col-md-6">
                    <div class="about-info-p">
                      <strong>
                        Contact Name:
                      </strong>
                      <p class="text-muted">
                        <?php echo $_SESSION["username"]?>
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
                        <?php echo $_SESSION['accNumber']?>
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
                  <div class="col-md-6">
                    <div class="alert alert-success">
                      <div>
                        ATTENTION
                        <a data-toggle="collapse" data-parent="#uk" href="#uk-danger"  style="float:right">
                          <i class="ion-minus-round">
                          </i>
                        </a>
                      </div>
                      <div id="uk-danger">
                        Sometimes turkish onine stores ask you to provide your pasport, mobile phone or turkish credit card information
                        <br>
                        If you have such an issue, please, contact us.
                        <br>
                        You can:
                        <ol>
                        <li>write us message here or 
                        <li> by email support@aseshopping.com
                        <li>call +994 12 493 84 73 or 
                        <li>visit us by address Uzeyir Hacibeyov 61b(in front of Main Post Office)
                        </ol>
                      </div>
                    </div>
                  </div>
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
