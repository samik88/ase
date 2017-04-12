<!DOCTYPE html>
<?php
include("functions.php");
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

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
                    <h3 class="text-center m-t-10 text-white"> Activate your account</h3>
                </div> 

                <div class="panel-body">
                 <?php


//create_customer('tewt','jdddwd','SAMIRA','s@mail.rue','Baku', '123245', 'ama.daee@endiwddeefnk.az');

if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email'])) {
    
    $email = $_GET['email'];
}
if (isset($_GET['key']) && (strlen($_GET['key']) == 32))
//The Activation key will always be 32 since it is MD5 Hash
    {
    
    $key = $_GET['key'];
}

print_r($email);
print_r($key);
if (isset($email) && isset($key)) {
    // Update the database to set the "activation" field to null
    //create_customer();
    $res = activateUser($email, $key);
    // Print a customized message:
    if ($res == 1) //if update query was successfull
        {
        echo '<div>Ваш аккаунт теперь активен. Вы можете <a href="login.php">зайти</a> в систему</div>';
        
    } else {
        echo '<div>Ваш аккаунт не может быть активирован. Пожалуйста, перепроверте информацию или обратитесь в службу поддержки.</div>';
        
    }
    
    
} else {
    echo '<div>Произошла ошибка .</div>';
}
?>

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