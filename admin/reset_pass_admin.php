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
                Customers
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12"> 
                                            <div class="row">
                                              <?php                    

if (isset($_GET['PObox']))
//The Activation key will always be 32 since it is MD5 Hash
{
$PObox = $_GET['PObox'];
}

if (isset($_POST['pasformsubmitted'])) {
if($_POST['pass1']==$_POST['pass2']){
echo "<div class='row'>";
if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$_POST['pass1'])){
  echo "<span class='text-danger'>Password must include: <ul><li> at least one lowercase char</li>".
"<li> at least one uppercase char</li>".
"<li>at least one digit</li>".
"<li> at least one special sign of @#-_$%^&+=§!?</li></span>"; 
}else{

            if( changePass($_POST['PObox'],$_POST['pass1'])!=1){

            echo "<span class='text-danger'> Во время смены пароля произошла ошибка!</span>";
            }  else{
                echo "<span class='text-success'>Пароль успешно сменился. </span>";
                            }
                          }
                             }
           else{
              echo "<span class='text-danger'> Пароли не совпадают</span>";
           }
           echo "</div>";
}

// End of the main Submit conditional.
?>
                                              <div class="col-md-6">
                                               <form class="form-horizontal" action="#" method="POST">
                                                   <div class="form-group">
                                                       <div class="col-xs-12">
                                                        <input class="form-control input-lg" type="password" required="" autocomplete="off" placeholder="Enter new password" name="pass1" >
                                                      </div>
                                                    </div>

                                                    <div class="form-group">
                                                      <div class="col-xs-12">
                                                         <input class="form-control input-lg" type="password" required="" autocomplete="off" placeholder="Re-enter new password" name="pass2">
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <div class="col-xs-12" >
                                                        <button class="btn btn-primary btn-small  waves-effect waves-light" type="submit">Set new password</button>
                                                       </div>
                                                    </div>

                                                    <input type="hidden" name="PObox" value="<?php echo $PObox; ?>" />
                                                    <input type="hidden" name="pasformsubmitted" value="TRUE" />
                                              </form> 
                                            </div>  
                                            </div>         
                                            <div  class="" style="float:right">
                                                <div class="btn-primary md-trigger  btn  waves-light"><a href="users_list.php" style="color:white">USERS LIST</a></div>
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
