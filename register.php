<!DOCTYPE html>
<?php
session_start();
include("functions.php");
include("mail.php");
              
//This is the address that will appear coming from ( Sender )
define('EMAIL', 's.allahverdiyeva@gmail.com');

/*Define the root url where the script will be found such as
http://website.com or http://website.com/Folder/ */
DEFINE('WEBSITE_URL', 'http://my.aseshopping.com');
 // $message = " Please follow this link to activate your account \n\n";
//$message .= WEBSITE_URL . '/activation.php?email=' . urlencode('Gulya@ase.az') . "&key=bed0f8a0e3f0a75a3039ce238efb57fb";
//sendMail('Gulya@ase.az','Gulya',$message);
?>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <script>
    function showTip(obj){
       document.getElementById(obj).style.display="block";
    }

    function hideTip(obj){
       document.getElementById(obj).style.display="none";

    }
    </script>
    <style>
.hover_img a { position:relative; }
.hover_img span { position:absolute; display:none; z-index:99; }

    </style>
<meta charset="utf-8"/>
<title>ASETRADE</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">

</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<div style="text-align:right"><a href="http://my.aseshopping.com/register.php">x</a></div>
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="#" method="post">
		<?php

if (isset($_POST['formsubmitted'])) {
    $error = array(); //Declare An Array to store any error message
    if (empty($_POST['Fullname'])) { //if no name has been supplied
        $error[] = 'Пожалуйста, введите имя'; //add to array "error"
    } else {
        $Name = $_POST['Fullname']; //else assign it a variable
    }

 if (empty($_POST['Surname'])) { //if no name has been supplied
        $error[] = 'Пожалуйста, введите фамилию'; //add to array "error"
    } else {
        $Surname = $_POST['Surname']; //else assign it a variable
    }

    if (empty($_POST['Passport'])) { //if no name has been supplied
        $error[] = 'Пожалуйста, введите пинкод паспорта'; //add to array "error"
    } else {
        $Passport = $_POST['Passport']; //else assign it a variable
    }


if (empty($_POST['Phone'])) { //if no name has been supplied
        $error[] = 'Пожалуйста, введите номер телефона'; //add to array "error"
    } else {
    	if (!preg_match('/^[0-9]+$/', $_POST['Phone'])) {
          $error[] = 'Телефон должен состоять только из чисел';
        } else {
       $Phone = $_POST['Phone']; //else assign it a variable
        }
        
    }


    if (empty($_POST['Email'])) {
        $error[] = 'Пожалуйста, введите email ';
    } else {

        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",
            $_POST['Email'])) {
        	if(check_user($_POST['Email'])==1){
            //regular expression for email validation
            $Email = $_POST['Email'];
        }else{
        	 $error[] = 'Такой мейл уже зарегистрирован';
        }
        } else {
            $error[] = 'Email неверен';
        }

    }

    if (empty($_POST['Password'])) {
        $error[] = 'Пожалуйста, введите пароль';
    } else {
        $Password = $_POST['Password'];
    }

    if (empty($_POST['Password2'])) {
        $error[] = 'Пожалуйста, введите повторно пароль';
    } else {
        $Password2 = $_POST['Password2'];
    }

    if (empty($error)) //send to Database if there's no error '

    { // If everything's OK...

        // Make sure the email address is available:
        
       
        $result_verify_email = check_user($Email);
        if (!$result_verify_email) { //if the Query Failed ,similar to if($result_verify_email==false)
            echo ' Database Error Occured ';
        }

        if ($result_verify_email == 1) { // IF no previous user is using this email .

         if($Password==$Password2){
            // Create a unique  activation code:
            $activation = md5(uniqid(rand(), true));

           
            $result_insert_user = create_user_locally($Passport,$Password,$_POST['Company'],$Name,$Surname,$_POST['Address'],$_POST['City'],$Phone,$Email,$activation);
            if ($result_insert_user==0) {
                echo 'Query Failed ';
            }

            if ($result_insert_user == 1) { //If the Insert Query was successfull.

                // Send the email:
                $message = " Please follow this link to activate your account \n\n";
                $message .= WEBSITE_URL . '/activation.php?email=' . urlencode($Email) . "&key=$activation";
             
                if(sendMail($Email,$Name, $message)!=1){
                  echo "Email не послалася";

                };
              
                // Flush the buffered output.

                // Finish the page:
                echo '<div class="success">Спасибо за регистрацию! <br/> Подтверждение  высланно на электронную почту ' . $Email .
                    ' <br/>Нажмите на линк, чтобы активировать Ваш аккаунт.<br/><br/>
                    Если Вы не получили письмо на email, проверьте правильность email адреса.<br/><br/>
                    Если адрес верен, но Вы все равно не получаете письмо, <a href="http://aseshopping.com/contacts">свяжитесь</a> с нами</div>';

            } else { // If it did not run OK.
                echo '<div class="errormsgbox">Регистрация не удалась из-за системной ошибки. Приносим извенения за неудобства.</div>';
            }
}else{

                echo '<div class="errormsgbox">Регистрация не удалась. Пароли не совпадают</div>';
}
        } else { // The email address is not available.
            echo '<div class="errormsgbox" >Данный email адресс уже зарегистрирован.
</div>';
        }

    } else { //If the "error" array contains error msg , display them

        echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {

            echo '	<li>' . $values . '</li>';

        }
        echo '</ol></div>';

    }

 

}else{ // End of the main Submit conditional.
	?>
		<h3 class="form-title">Регистрация</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Name*</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Имя*" name="Fullname"/>
		</div>
                <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Surname*</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Фамилия*" name="Surname"/>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email*</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email*" name="Email"/>
        </div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Password*</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Пароль*" name="Password"/>
		</div>        
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Password*</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Пароль повторно*" name="Password2"/>
        </div>
		
		<div class="form-group" style="margin-bottom:0px">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <div>
			<label class="control-label visible-ie8 visible-ie9">Passport number*</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Серия паспорта*" name="Passport"/>
        </div>
            <div class="hover_img" style="text-align:right">
              <a href="#" onmouseover="showTip('pass')" onmouseout="hideTip('pass')">пример</a>
              <span id="pass" style="display:none"><img src="assets/global/img/pass.jpg" alt="image" height="260" /></span>
            </div>
		</div>
			<div class="form-group" >
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
           	<label class="control-label visible-ie8 visible-ie9">Phone*</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Телефон*  (пример:0501234567)" name="Phone"/>
            
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Company</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Компания" name="Company"/>
		</div>

		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">City</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Город" name="City"/>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Address</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Адрес" name="Address"/>
			<input type="hidden" name="formsubmitted" value="TRUE" />

		</div>
        
	<div style="text-align:right">* - обязательные поля</div>

		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Зарегистрироваться</button>
			
		</div>
		
	</form>
	<!-- END LOGIN FORM -->
<?php }	?>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
