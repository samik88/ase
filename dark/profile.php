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

if (isset($_SESSION['pincode'])) {

if(isset($_POST['edited_info'])){
$phone           = $_POST["phone"];
$firstname       = $_POST["firstname"];
$lastname        = $_POST["lastname"];
$company         = $_POST["company"];
$address         = $_POST["address"];
$passport        = $_POST["passport"];

    updateUser($firstname, $lastname, $phone, $company, $address, $passport, $_SESSION['accNumber']);
    unset($_SESSION['edited_info']);
}


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
$passport        = $row["pin"];
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
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="assets/images/users/avatar.png" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h3 class="text-white"><?php
    echo $_SESSION['username'];
?>
</h3>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <div class="row user-tabs">
                        <div class="">
                            <ul class="nav nav-tabs tabs">
                            <li class="active tab">
                                <a href="#home" data-toggle="tab" aria-expanded="false" class="active"> 
                                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                    <span class="hidden-xs">About Me</span> 
                                </a> 
                            </li> 
                            <li class="tab"> 
                                <a href="#Orders" data-toggle="tab" aria-expanded="false"> 
                                    <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                    <span class="hidden-xs">Orders</span> 
                                </a> 
                            </li> 
                            <li class="tab"> 
                                <a href="#Purchases" data-toggle="tab" aria-expanded="true"> 
                                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                    <span class="hidden-md">Purchases</span> 
                                </a> 
                            </li> 
                            <li class="tab"> 
                                <a href="#Friends" data-toggle="tab" aria-expanded="false"> 
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                    <span class="hidden-xs">Friends</span> 
                                </a> 
                            </li> 
                            <li class="tab"> 
                                <a href="#Bonuses" data-toggle="tab" aria-expanded="false"> 
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                    <span class="hidden-xs">Bonuses</span> 
                                </a> 
                            </li> 
                            <li class="tab"> 
                                <a href="#Messages" data-toggle="tab" aria-expanded="false"> 
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                    <span class="hidden-xs">Messages</span> 
                                </a> 
                            </li> 
                        <div class="indicator"></div></ul> 
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
                                                <h3 class="panel-title" style="width:100%">Personal Information 
                                                    <a data-toggle="collapse" data-parent="#usa-accordion" href="#personal-info" style="float: right;"><i class="ion-minus-round"></i></a>
                                                    <a class=" btn-rounded btn btn-primary waves-effect waves-light" style="margin-left:15px;" href="edit_profile.php"> Edit </a>  
                                                </h3> 
                                               
                                            </div> 
                                            <div class="panel-body panel-collapse collapse in" id="personal-info" > 
                                                <div class="col-md-6">
                                                <div class="about-info-p">
                                                    <strong>Firstame</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $firstname; ?> </p>
                                                </div>
                                                 <div class="about-info-p">
                                                    <strong>Lastame</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $lastname; ?> </p>
                                                </div> 
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $_SESSION['email'];?></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Mobile</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $phone;?></p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Address</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $address;?></p>
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                <div class="about-info-p m-b-0">
                                                    <strong>Company</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $company;?></p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Passport number</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $passport;?></p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Registration date</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $register_date;?></p>
                                                </div>
                                                  <div class="about-info-p m-b-0">
                                                    <strong>Last login date</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $last_login_date;?></p>
                                                </div>  
                                                <div class="about-info-p m-b-0">
                                                    <strong>PObox</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $PObox;?></p>
                                                </div>

                                            </div> 
                                        </div>
                                        </div>
                                        <!-- Personal-Information -->

                                       

                                    </div>

                                </div>
                                <div class="row">
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
                                 <span class="divider"></span>
                                 <a data-toggle="collapse" data-parent="#usa-accordion" href="#usa-portlet"><i class="ion-minus-round"></i></a>
                                
                              </div>
                              <div class="clearfix"></div>
                           </div>
                           <div id="usa-portlet" class="panel-collapse collapse in">
                              <div class="portlet-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div id="pie-chart">
                                          <div id="pie-chart-container" class="flot-chart" style="height: 500px">
                                             <div class="about-info-p">
                                                <strong>Contact Name:</strong>
                                                <p class="text-muted"> Mehdi Ahmadov</p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>Company Name:</strong>
                                                <p class="text-muted">AJ Worldwide Services</p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>Address line 1:</strong>
                                                <p class="text-muted">901 Penhorn Avenue, Unit 7</p>
                                             </div>
                                             <div class="about-info-p m-b-0">
                                                <strong>Address line 2:</strong>
                                                <p class="text-muted">ASE1004</p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>City:</strong>
                                                <p class="text-muted">Secaucus</p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>State:</strong>
                                                <p class="text-muted">NJ</p>
                                             </div>
                                             <div class="about-info-p m-b-0">
                                                <strong>Zip Code:</strong>
                                                <p class="text-muted">07094</p>
                                             </div>
                                             <div class="about-info-p m-b-0">
                                                <strong>Phone:</strong>
                                                <p class="text-muted">1-201-348-1800 x 128</p>
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
                                 <span class="divider"></span>
                                 <a data-toggle="collapse" data-parent="#uk-accordion" href="#uk-portlet"><i class="ion-minus-round"></i></a>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                           <div id="uk-portlet" class="panel-collapse collapse in">
                              <div class="portlet-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div id="pie-chart">
                                          <div id="pie-chart-container" class="flot-chart" style="height: 500px">
                                             <div class="about-info-p">
                                                <strong>Contact Name:</strong>
                                                <p class="text-muted"> Major Saini ASE1004</p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>Company Name:</strong>
                                                <p class="text-muted">OCS Worldwide</p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>Address line 1:</strong>
                                                <p class="text-muted">Global House Poyle Road /p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>City:</strong>
                                                <p class="text-muted">Colnbrook Slough </p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>County(State):</strong>
                                                <p class="text-muted">Berkshire</p>
                                             </div>
                                             <div class="about-info-p m-b-0">
                                                <strong>Zip Code:</strong>
                                                <p class="text-muted">SL3 0AY </p>
                                             </div>
                                             <div class="about-info-p m-b-0">
                                                <strong>Phone:</strong>
                                                <p class="text-muted">+44 (0) 20 7640 3922</p>
                                             </div>
                                             <div>
                                                <span class="text-danger">ATTENTION!!! INDICATE Major Saini AS RECEIVER IS REQUIRED!!!</span>
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
                                 <span class="divider"></span>
                                 <a data-toggle="collapse" data-parent="#turkey-accordion" href="#turkey-portlet"><i class="ion-minus-round"></i></a>                              </div>
                              <div class="clearfix"></div>
                           </div>
                           <div id="turkey-portlet" class="panel-collapse collapse in">
                              <div class="portlet-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div id="pie-chart">
                                          <div id="pie-chart-container" class="flot-chart" style="height: 500px">
                                             <div class="about-info-p">
                                                <strong>Contact Name:</strong>
                                                <p class="text-muted"> Mehdi Ahmadov</p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>Company Name:</strong>
                                                <p class="text-muted">ASE Asya Afrika hızlı kargo</p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>Address line 1:</strong>
                                                <p class="text-muted">Çobançeşme,Kalender Sk. No:8 Bahçelievler</p>
                                             </div>
                                             <div class="about-info-p m-b-0">
                                                <strong>Address line 2:</strong>
                                                <p class="text-muted">ASE1004</p>
                                             </div>
                                             <div class="about-info-p">
                                                <strong>City:</strong>
                                                <p class="text-muted">İstanbul</p>
                                             </div>
                                             <div class="about-info-p m-b-0">
                                                <strong>Zip Code:</strong>
                                                <p class="text-muted">34196</p>
                                             </div>
                                             <div class="about-info-p m-b-0">
                                                <strong>Phone:</strong>
                                                <p class="text-muted">0850 472 1 472</p>
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
                                </div>
                            </div> 




                            <div class="tab-pane" id="Orders">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    
                                    <div class="panel-body"> 
                                                   <?php if(isset($_SESSION['accNumber']))

$r=packageByUser($_SESSION['accNumber']);

if($r==-1){
echo "У Вас нет заказов";
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
                                                  </tr>
                                                </thead>
                                                
                                                
                                                <tbody>
                                                  <?php echo $r;

?>
                                                      
                                                      
                                                      
                                                  </tbody>
                                                  <tfoot>
                                                    <tr>
                                                      <td class="text-success" colspan=9 style="text-align:right">
                                                        <small>
                                                          all dimensions are in inches and lbs
                                                        </small>
                                                      </td>
                                                    </tr>
                                                    
                                                  </tfoot>
                                              </table>
                                              <?php } ?>
                                                                                 </div>
                                    </div> 
                                </div>
                                <!-- Personal-Information -->
                            </div> 



                            <div class="tab-pane" id="Purchases">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">My Projects</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Project Name</th>
                                                                        <th>Start Date</th>
                                                                        <th>Due Date</th>
                                                                        <th>Status</th>
                                                                        <th>Assign</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Moltran Admin</td>
                                                                        <td>01/01/2015</td>
                                                                        <td>07/05/2015</td>
                                                                        <td><span class="label label-info">Work in Progress</span></td>
                                                                        <td>Coderthemes</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Moltran Frontend</td>
                                                                        <td>01/01/2015</td>
                                                                        <td>07/05/2015</td>
                                                                        <td><span class="label label-success">Pending</span></td>
                                                                        <td>Coderthemes</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Moltran Admin</td>
                                                                        <td>01/01/2015</td>
                                                                        <td>07/05/2015</td>
                                                                        <td><span class="label label-pink">Done</span></td>
                                                                        <td>Coderthemes</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>Moltran Frontend</td>
                                                                        <td>01/01/2015</td>
                                                                        <td>07/05/2015</td>
                                                                        <td><span class="label label-purple">Work in Progress</span></td>
                                                                        <td>Coderthemes</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>Moltran Admin</td>
                                                                        <td>01/01/2015</td>
                                                                        <td>07/05/2015</td>
                                                                        <td><span class="label label-warning">Coming soon</span></td>
                                                                        <td>Coderthemes</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>

                                    </div> 
                                </div>
                                <!-- Personal-Information -->
                            </div> 


                            <div class="tab-pane" id="Friends">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Friends you've invited</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                     
                                    </div> 
                                </div>
                                <!-- Personal-Information -->
                            </div> 

                              <div class="tab-pane" id="Bonuses">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Bonuses you've earned</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                     
                                    </div> 
                                </div>
                                <!-- Personal-Information -->
                                   
                                </div>
                                <!-- Personal-Information -->
                            
                            <div class="tab-pane" id="Messages">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Edit Profile</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <form role="form">
                                          
                                        </form>

                                    </div> 
                                </div>
                                <!-- Personal-Information -->
                            </div> 
                            </div> 

                        </div> 
                    </div>
                    </div>
                </div> <!-- container -->
                               
                </div> <!-- content -->

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

