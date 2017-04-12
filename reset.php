<!DOCTYPE html>
<?php
include("functions.php");


/*Define the root url where the script will be found such as
http://website.com or http://website.com/Folder/ */
DEFINE('WEBSITE_URL', 'http://my.aseshopping.com');
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>ASEshopping - Personal delivery from USA, UK, Turkey to Baku</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>ASEshopping</strong> </h3>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal m-t-20" action="#">
<?php                    

if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',
$_GET['email'])) {
$email = $_GET['email'];
}
if (isset($_GET['key']) && (strlen($_GET['key']) == 32))
//The Activation key will always be 32 since it is MD5 Hash
{
$key = $_GET['key'];
}
if (isset($_POST['pasformsubmitted'])) {

if($_POST['pass1']==$_POST['pass2']){
            if( changePass($_GET['email'],$_GET['key'],$_POST['pass1'])!=1){

            echo "Во время смены пароля произошла ошибка! <a href='http://my.aseshopping.com/login.php'>Перейти </a>на страницу входа</a>";
            }  else{
                echo "Пароль успешно сменился. <a href='http://my.aseshopping.com/login.php'>Зайти в систему</a>";
                            }
                             }
           else{
              echo "Пароли не совпадают";
           }
}else{ 




// End of the main Submit conditional.
?>
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

                  
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Set new password</button>
                        </div>
                    </div>

                  <input type="hidden" name="email" value="<?php echo $email;?>" />
                    <input type="hidden" name="key" value="<?php echo $key;?>" />
                    <input type="hidden" name="pasformsubmitted" value="TRUE" />
                </form> 
                </div>                                 
                
            </div>
        </div>

        
        <script>
            var resizefunc = [];
        </script>

        <!-- Main  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/jquery.app.js"></script>
    
    </body>
</html>
                     
