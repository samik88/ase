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
   $contacts_sub="";
include("header.php");


$result = userList($_SESSION['email']);

if (!is_array($result)) {
while ($row = $result->
fetch_assoc()) {
$phone           = $row["phone"];
$firstname       = $row["fullname"];
$lastname        = $row["surname"];
$company         = $row["company"];
$address         = $row["address"];
$register_date   = $row["register_date"];
$last_login_date = $row["last_login_date"];
$PObox           = $row["PObox"];
$passport        = $row["passport"];
}
}


?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    
    
    
    <div class="wraper container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="bg-picture text-center" style="background-image:url('assets/images/big/bg.jpg')">
            <div class="bg-picture-overlay">
            </div>
            <div class="profile-info-name">
              <img src="assets/images/users/avatar.png" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
              <h3 class="text-white">
                <?php
echo $_SESSION['username'];
?>
              </h3>
            </div>
          </div>
          <!--/ meta -->
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-12">
          
          
          <div class="tab-content profile-tab-content">
            
            <div class="tab-pane active" id="home">
              
              <div class="row">
                <div class="col-md-12">
                  <!-- Personal-Information -->
                  <div class="panel panel-default panel-fill">
                    <div class="panel-heading">
                      
                      <h3 class="panel-title" style="width:100%">
                        Edit personal Information 
                      </h3>
                      
                      
                    </div>
                    
                    <div class="panel-body panel-collapse collapse in" id="personal-info" >
                      <form action="profile.php" method="post">
                      <div class="col-md-6">
                        <div class="about-info-p">
                          <strong>
                            Firstame
                          </strong>
                          <br>
                          <input  class="form-control" type="text" name="firstname" value="
<?php echo $firstname;?>
"/>
                        </div>
                        <div class="about-info-p">
                          <strong>
                            Lastame
                          </strong>
                          <br>
                          <input  class="form-control" type="text" name="lastname" value="
<?php echo $lastname; ?>
"/>
                        </div>
                        
                        
                        <div class="about-info-p">
                          <strong>
                            Mobile
                          </strong>
                          <br>
                          <input  class="form-control" type="text" name="phone" value="
<?php echo $phone;?>
"/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        
                        <div class="about-info-p m-b-0">
                          <strong>
                            Address
                          </strong>
                          <br>
                          <input  class="form-control" type="text" name="address" value="
<?php echo $address;?>
"/>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                      <strong>
                                        Company
                                      </strong>
                                      <br>
                                      <input  class="form-control" type="text" name="company" value="
<?php echo $company;?>
"/>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                      <strong>
                                        Passport number
                                      </strong>
                                      <br>
                                      <input class="form-control" type="text" name="passport" value="
<?php echo $passport;?>
"/>
                                    </div>
                                    
                                    
                      </div>
                      <input class="form-control" type="text" name="edited_info" value="edit" hidden>
                      <div  calss="row" style="text-align:center">
                        
                        <button class="btn btn-info btn-block waves-effect waves-light" type="submit" name="edit" style="width:10%">
                          Edit 
                        </button>
                        
                      </div>
                  </form>
                    </div>
                    
                  </div>
                  <!-- Personal-Information -->
                  
                  
                </div>
                
              </div>
              <div class="row">
                <!-- Start  adresses info-->
                
              </div>
            </div>
            
            
          </div>
          
        </div>
        
        
      </div>
      
    </div>
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

