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

   if(isset($_POST["topic"],$_POST["country"],$_POST["message"])){
      $topic = $_POST["topic"];
      $country = $_POST["country"];
      $message = $_POST["message"];

      if(get_magic_quotes_gpc()){
         $topic = stripslashes($topic);
         $country = stripslashes($country);
         $message = stripslashes($message);
      }
      
       if($_POST['title']!='' and $_POST['recip']!='' and $_POST['message']!='')
        {
           //We protect the variables
                $topic = mysql_real_escape_string($topic);
                $country = mysql_real_escape_string($country);
                $message = mysql_real_escape_string(nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
                if(send_form($topic,$country, $message,$PObox)){
                   echo("thank you for your enquire");
                }else{
                  echo "Error occur while sending";
                }

        }else{
         echo "Please, fill all fields";
        }

      unset($_POST);
      $_POST = array();

   }
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
                  <form class="form-horizontal" role="form" action="#" method="POST">
                     <div class="form-group">
                        <label class="col-md-2 control-label">Topic</label>
                        <div class="col-md-10">
                         <select class="form-control" name="topic">
                              <option value="">Order item</option>
                              <option>Delivery</option>
                              <option>Payment</option>
                              <option>Lost items</option>
                              <option>Problem with Turkish orders</option>
                              <option>Mobile phone number for Turkey orders</option>
                              <option>Turkish pasport for Turkey orders </option>
                              <option>Turkish credit card for Turkish orders</option>
                              <option>Changing personal info</option>
                              <option>Other</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-2 control-label">Message body</label>
                        <div class="col-md-10">
                           <textarea  class="form-control" name="message"></textarea>
                        </div>
                     </div>
                  
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="country">
                              <option value="no country">No country</option>
                              <option value="USA">USA</option>
                              <option value="UK">UK</option>
                              <option value="TURKEY">TURKEY</option>
                           </select>
                           
                        </div>
                     </div>
                      <div >
                          <label class="col-sm-2 control-label"></label>
                          <button type="button" class="btn btn-info  waves-effect waves-light ">Send</button>
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
<!-- Right Sidebar -->
<div class="side-bar right-bar nicescroll">
   <h4 class="text-center">
      Write us
   </h4>
   <div class="contact-list nicescroll">
      form here
   </div>
</div>
<!-- /Right-bar -->
<?php
   include("footer.php");
   ?>
