<?php
$index_sub=""; 
$warehouse_sub=""; 
$packages_sub=""; 
$ukn_packages_sub=""; 
$declaration_sub=""; 
$requests_sub=""; 
$purchases_sub=""; 
$news_sub=""; 
$userlist_sub="active"; 
$faq_sub=""; 
$contacts_sub=""; 
$messages=""; 

include("header.php");
?>

      <link href="../assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/pages.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/menu.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css">

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
          <ol class="breadcrumb pull-right">
            <li>
              <a href="#">
                Aseshopping
              </a>
            </li>
            <li class="active">
              Customers
            </li>
          </ol>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Customers form
              </h3>
            </div>
            <div class="panel-body">
              <div id="result"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12"> 
                  
                  <?php $row=getUserEditForm($_GET["PObox"]);
                  if($row==-1){
                     echo "No packages";
                   }else{ ?>
                   <form action="#" method="POST">
                     <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                          <th>Name</th>
                                          <th>Surname</th> 
                                          <th>Email</th>
                                          <th>Pin</th>
                                          <th>Address</th>
                                          <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeX">
                                            <td><input type="text" value='<?php echo $row["fullname"]?>' name="fullname" id="fullname" class="form-control" /></td>
                                            <td><input type="text" value='<?php echo $row["surname"]?>' name="surname" id="surname" class="form-control" /></td>
                                            <td><input type="text" value='<?php echo $row["email"]?>' name="email" id="email" class="form-control" /></td>
                                            <td><input type="text" value='<?php echo $row["pin"]?>' name="pin" id="pin" class="form-control" /></td>
                                            <td><input type="text" value='<?php echo $row["address"]?>' name="address" id="address" class="form-control" /></td>
                                            <td><input type="text" value='<?php echo $row["phone"]?>' name="phone" id="phone" class="form-control" /></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <input type="hidden" value='<?php echo $row["fullname"]?>' name="fullname_init" id="fullname_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["surname"]?>' name="surname_init"  id="surname_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["email"]?>' name="email_init" id="email_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["pin"]?>' name="pin_init" id="pin_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["address"]?>' name="address_init" id="address_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["phone"]?>' name="phone_init" id="phone_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $_GET["PObox"]?>' name="PObox" id="PObox" class="form-control" />
                                     </form>
                                    <?php }?>
                                            
                                            <hr>
                                            <div class="row">
                                            <div  class="col-md-6" >
                                               <div class="btn-primary md-trigger  btn  waves-light" id="save">SAVE</div>
                                           </div>
                                            <div class="btn-primary md-trigger  btn  waves-light" style="float:right;margin-left:10px"><a href='reset_pass_admin.php?PObox=<?php echo $_GET["PObox"]?>' style='color:white'>RESET PASSWORD</a></div>
                                            <div class="btn-primary md-trigger  btn  waves-light" style="float:right
                                            "><a href="users_list.php" style="color:white">BACK</a></div>
                                            </div>
                                            </div>
                                            </div>
                                      </div>
                                  </div>
                              </div>
                          </div>                          
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
include("footer.php");
?>


      <!-- Examples -->
      <script src="../assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
      <script src="../assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script> 
      <script src="../assets/plugins/datatables/dataTables.bootstrap.js"></script>
      <script src="../assets/pages/datatables.editable.init.js"></script>
<script>

$("#save").click(function(){
  var fullname_init=$("#fullname_init").val();
  var surname_init=$("#surname_init").val();
  var email_init=$("#email_init").val();
  var pin_init=$("#pin_init").val();
  var address_init=$("#address_init").val();
  var phone_init=$("#phone_init").val();
  var PObox=$("#PObox").val();

  var fullname=$("#fullname").val();
  var surname=$("#surname").val();
  var email=$("#email").val();
  var pin=$("#pin").val();
  var address=$("#address").val();
  var phone=$("#phone").val();

  if(fullname==fullname_init){
    fullname="";
  }
  
  if(surname==surname_init){
    surname="";
  }

  if(email==email_init){
    email="";
  }

  if(pin==pin_init){
    pin="";
  }

  if(address==address_init){
    address="";
  }

  if(phone==phone_init){
    phone="";
  }

  

  $.ajax({
              type: 'POST',
              url: 'change_user_info.php',
              data: {"fullname":fullname,'surname':surname,'email':email, 'pin':pin, 'address':address, 'phone':phone,'PObox':PObox}, //It would be best to put it like that, make it the same name so it wouldn't be confusing
              success: function(data){
                  $('#result').html(data.message);
              },
  });
  
});

$(".activate").click(function(){
  $.ajax({
              type: 'POST',
              url: 'activate.php',
              data: {"email":$(this).attr("id")},
              success: function(data){
                  $('#result').html(data.message);
              },
  });
});
</script>
  