<?php
   $index_sub="";
   $usa_sub="";
   $uk_sub="";
   $turkey_sub="";
   $orders_sub="";
   $purchases_sub="";
   $ask_buy_sub="";  
   $declaration_sub="";
   $faq_sub="";
   $contacts_sub="active";
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
                     Contacts
                  </li>
               </ol>
            </div>
         </div>
         <div class="row">
            <!-- contact info -->
            <!-- Personal-Information -->
            <div class="panel panel-default panel-fill">
               <div class="panel-heading">
                  <h3 class="panel-title">
                     Office Information
                      <a data-toggle="collapse" data-parent="#contact-form" href="#office-info"  style="float:right">
                          <i class="ion-minus-round">
                          </i>
                        </a>
                  </h3>
               </div>
               <div class="panel-body  collapsed in" id="office-info">
                  <div class="col-md-5">
                     <div class="about-info-p m-b-0">
                        <i class="md md-place">
                        </i>
                        <strong>
                        Location
                        </strong>
                        <br>
                        <p class="text-muted">
                           Uzeyir Hacibeyov str, 61b
                        </p>
                     </div>
                     <div class="about-info-p">
                        <i class="md md-local-phone">
                        </i>
                        <strong>
                        Phone
                        </strong>
                        <br>
                        <p class="text-muted">
                           +994 12 493 84 73
                           <br/>
                           +994 12 497 3775(ext 10)
                        </p>
                     </div>
                     <div class="about-info-p">
                        <i class="md md-email">
                        </i>
                        <strong>
                        Email
                        </strong>
                        <br>
                        <p class="text-muted">
                           support@aseshopping.com 
                        </p>
                     </div>
                  </div>
                  <div class="col-md-7">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.5677930655597!2d49.84770921498362!3d40.37410686615527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307da94c37f7b9%3A0x1af4406d8b35abea!2sASE+express!5e0!3m2!1sen!2sus!4v1454234042476" width="600" height="450" frameborder="0" style="border:0" allowfullscreen>
                     </iframe>
                  </div>
               </div>
               <!-- Personal-Information -->
            </div>
            <!-- end col -->
         </div>
         <!-- end row -->
         <!-- start column with conatct form -->
         <div class="row">
            <div class="panel panel-default panel-fill">
               <div class="panel-heading">
                  <h3 class="panel-title">
                     Contact form 
                     <a data-toggle="collapse" data-parent="#contact-form" href="#contact-form"  style="float:right">
                          <i class="ion-minus-round">
                          </i>
                        </a>
                  </h3>
               </div>
               <div class="panel-body" id="contact-form">
                <div id="send_result" class="form-group">
                </div>
                  <form class="form-horizontal" role="form" action="#" method="POST">
                     <div class="form-group">
                        <label class="col-md-2 control-label">Topic</label>
                        <div class="col-md-10">
                         <select class="form-control" name="topic" id="topic">
                              <option value="-1">Select topic</option>
                              <option value="0">Order item</option>
                              <option value="1">Delivery</option>
                              <option value="2">Payment</option>
                              <option value="3">Lost items</option>
                              <option value="4">Problem with Turkish orders</option>
                              <option value="5">Mobile phone number for Turkey orders</option>
                              <option value="6">Turkish pasport for Turkey orders </option>
                              <option value="7">Turkish credit card for Turkish orders</option>
                              <option value="8">Changing personal info</option>
                              <option value="9">Other</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-2 control-label">Message body</label>
                        <div class="col-md-10">
                           <textarea  class="form-control" name="message" id="message"></textarea>
                        </div>
                     </div>
                  
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="country" id="country">
                              <option value="-1">Select country</option>
                              <option value="0">No country</option>
                              <option value="1">USA</option>
                              <option value="2">UK</option>
                              <option value="3">TURKEY</option>
                           </select>
                           
                        </div>
                     </div>
                      <div >
                          <label class="col-sm-2 control-label"></label>
                          <div  class="btn btn-info  waves-effect waves-light" id="sendForm">Send</div>
                      </div>
                  </form>
               </div>
            </div>
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

      <script type="text/javascript">
            $('#sendForm').click(function(){
              var topic = $('#topic').val();
              var message = $('#message').val();
              var country = $('#country').val();
              var accNumber = $('#accNumber').val();
              if(topic=="-1"){
                $('#send_result').html("<div class=\"text-warning\">Please, fill TOPIC field</div>");
              }else{
                if(message==""){
                  $('#send_result').html("<div class=\"text-warning\">Please, choose MESSAGE from a list</div>");
                }else{
                  if(country=="-1"){
                    $('#send_result').html("<div class=\"text-warning\">Please, choose COUNTRY from a list</div>");
                  }else{
                    var str="send_forms.php?topic="+topic+"&message="+message+"&country="+country+"&accNumber="+accNumber;
                    ajaxFunc(str,'send_result');
                    $('#topic').val("-1");
                    $('#message').val("");
                    $('#country').val("-1");
                  }
                }
              }
              
            })
      </script>

