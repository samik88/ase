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


if (isset($_SESSION['pincode'])) {
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
     
              
                  <?php 



                  if(isset($_SESSION['accNumber']))



$r=package_by_user($_SESSION['accNumber']); //TODO track function

if($r==-1){
echo "Error while tracking";
}else{?>
                         
                            <div class="col-md-12">
                                <section id="cd-timeline" class="cd-container">
                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-success">
                                            <i class="fa fa-usd"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content">
                                            <h3>ARRIVED TO USA WAREHOUSE</h3>
                                            <span class="cd-date">May 23</span>
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-danger">
                                            <i class="md md-flight"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content">
                                            <h3>SHIPPED</h3>
                                            <span class="cd-date">May 30</span>
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-info">
                                            <i class="fa fa-warning"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content">
                                            <h3>DELIVERED TO CUSTOM BORDER</h3>
                                            <span class="cd-date">Jun 05</span>
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-pink">
                                            <i class="fa fa-thumbs-up"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content">
                                            <h3>IN BAKU ASEshopping OFFICE</h3>
                                            <span class="cd-date">Jun 14</span>
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-warning">
                                            <i class="md md-local-shipping"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content">
                                            <h3>SHIPPED VIA COURRIER DELIVERY</h3>
                                            <span class="cd-date">Jun 18</span>
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->

                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-primary">
                                            <i class="fa fa-heart"></i>
                                        </div> <!-- cd-timeline-img -->

                                        <div class="cd-timeline-content">
                                            <h3>DELIVERED TO CUSTOMER</h3>
                                            <span class="cd-date">Jun 30</span>
                                        </div> <!-- cd-timeline-content -->
                                    </div> <!-- cd-timeline-block -->
                                </section> <!-- cd-timeline -->
                            </div><!-- Row -->
         

                         <?php } ?>
                                                                                
                               
                          
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
} else {
echo "Please, login first";
}
include("footer.php");
?>


       <script type="text/javascript">
            jQuery(document).ready(function($){
            var $timeline_block = $('.cd-timeline-block');

                //hide timeline blocks which are outside the viewport
                $timeline_block.each(function(){
                    if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
                        $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
                    }
                });

                //on scolling, show/animate timeline blocks when enter the viewport
                $(window).on('scroll', function(){
                    $timeline_block.each(function(){
                        if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
                            $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
                        }
                    });
                });
            });
        </script>
