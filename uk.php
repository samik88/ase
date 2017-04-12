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
          <div class="panel panel-default ">
            
            
            <div class="panel-heading">
              <h3 class="panel-title">
                UK
              </h3>
            </div>
            <div class="panel-body">
              <div id="pie-chart">
                <div class="row" >
                  <div class="col-md-6">
                    <div class="about-info-p">
                      <strong>
                        Contact Name:
                      </strong>
                      <p class="text-muted">
                        Major Saini <?php echo $_SESSION['accNumber']?>
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
                        Global House Poyle Road 
                      </p>
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
                  
                  <div class="col-md-6">
                    <div class="alert alert-danger">
                      <div>
                        ATTENTION
                        <a data-toggle="collapse" data-parent="#uk" href="#uk-danger"  style="float:right">
                          <i class="ion-minus-round">
                          </i>
                        </a>
                      </div>
                      <div id="uk-danger">
                        PLEASE, ALWAYS FILL DECLARATIONS WHEN ORDER ITEMS FROM UK.
                        <br>
                        Go to the submenu "Declaration", fill form and press "Send" button.
                        <br>
                        Please, do it asap after your purchase
                      </div>
                    </div>
                    <div class="alert alert-warning">
                      <div>
                        REMINDER
                        <a data-toggle="collapse" data-parent="#uk" href="#uk-warning"   style="float:right">
                          <i class="ion-minus-round">
                          </i>
                        </a>
                      </div>
                      <div id="uk-warning">
                        PLEASE!!! DON'T FORGET TO INDICATE Major Saini AS RECEIVER WHILE YOUR PURCHASE!!!
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
