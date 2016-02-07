<!DOCTYPE html>
<?php
include("functions.php");

/*Define the root url where the script will be found such as
http://website.com or http://website.com/Folder/ */
DEFINE('WEBSITE_URL', 'http://my.aseshopping.com');
 // $message = " Please follow this link to activate your account \n\n";

include("mail.php");
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
               <h3 class="text-center m-t-10 text-white"> Create a new Account </h3>
            </div>
            <div class="panel-body">

<?php
$name     = "";
$surname  = "";
$passport = "";
$city     = "";
$prefix   = "";
$phone    = "";
$email    = "";
$password = "";
$company  = "";
$address  = "";
$reference= "";


if (isset($_POST['formsubmitted'])) {
    if(isset($_GET['reference'])){
      $reference = $_GET['reference'];
    }else{
      if(isset($_POST['reference'])){
      $reference = $_POST['reference'];
      }
    }

    $error = array(); //Declare An Array to store any error message
    if (empty($_POST['firstname'])) { //if no name has been supplied
        $error[] = 'Пожалуйста, введите имя'; //add to 3array "error"
    } else {
        $name = $_POST['firstname']; //else assign it a variable
    }
    
    
    if (empty($_POST['lastname'])) { //if no name has been supplied
        $error[] = 'Пожалуйста, введите фамилию'; //add to array "error"
    } else {
        $surname = $_POST['lastname']; //else assign it a variable
    }
   
    if (empty($_POST['passport'])) { //if no name has been supplied
        
        $error[] = 'Пожалуйста, введите пинкод паспорта'; //add to array "error"
    } else {
        
        if (strlen($_POST['passport']) < 8) {
            $error[] = 'Пожалуйста, введите правильный номер паспорта!!!'; //add to array "error"
        } else {
            $passport = $_POST['passport']; //else assign it a variable
        }
    }

    
    
    if (empty($_POST['city']) || ($_POST['city'] == "-1")) {
        $error[] = 'Пожалуйста, выберите город!!!';
    } else {
        $city = $_POST["city"];
        
    }

   
    
    if (empty($_POST['phone'])) { //if no name has been supplied
        $error[] = 'Пожалуйста, введите номер телефона'; //add to array "error"
    } else {
        
        if (!preg_match('/^[0-9]+$/', $_POST['phone'])) {
            $error[] = 'Телефон должен состоять только из цифр';
        } else {
            
            if (strlen($_POST['phone']) != 7) {
                $error[] = 'Телефон должен состоять  из 7 цифр';
                
            } else {
                $phone = $_POST['phone']; //else assign it a variable
            }
        }
        
        
    }
   
    
    if (empty($_POST['prefix']) || ($_POST['prefix'] == "-1")) {
        $error[] = 'Пожалуйста, выберите мобильного оператора'; //add to array "error"
    } else {
        $prefix = $_POST["prefix"];
    }
    
    
    if (empty($_POST['email'])) {
        $error[] = 'Пожалуйста, введите email ';
    } else {
      
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])) {
        
             if (checkuser($_POST['email']) == 1) {
              
                //regular expression for email validation
                $email = $_POST['email'];
            } else {
               
                $error[] = 'Такой мейл уже зарегистрирован';
            }
        } else {
          
            $error[] = 'Email неверен';
        }
        
    }
    
    if (empty($_POST['pass1'])) {
        $error[] = 'Пожалуйста, введите пароль';
    } else {
        $password = $_POST['pass1'];
      

if( strlen($password) > 20 ) {
  $error[]= "Password too long! 
";
}

if( strlen($password) < 8 ) {
  $error[]= "Password too short! 
";
}

if( !preg_match("#[0-9]+#", $password) ) {
  $error[]= "Password must include at least one number! 
";
}


if( !preg_match("#[a-z]+#", $password) ) {
  $error[]= "Password must include at least one letter! 
";
}


if( !preg_match("#[A-Z]+#", $password) ) {
  $error[]= "Password must include at least one CAPS! 
";
}



if( !preg_match("#\W+#", $password) ) {
  $error[]= "Password must include at least one symbol! 
";
}
    }
    
    
    if (empty($_POST['pass2'])) {
        $error[] = 'Пожалуйста, введите повторно пароль';
    } else {
        $password2 = $_POST['pass2'];
    }
    
    
    if (empty($_POST['company'])) {
        $company = 'no company';
    } else {
        $company = $_POST['company'];
    }
    
  
    if (empty($_POST['address'])) {
        $error[] = 'Пожалуйста, введите адрес';
    } else {
        $address = $_POST['address'];
    }
    
    if (empty($error)) //send to Database if there's no error '
        { // If everything's OK...
        
        // Make sure the email address is available:
        
        $result_verify_email = checkUser($Email);
        if (!$result_verify_email) { //if the Query Failed ,similar to if($result_verify_email==false)
            echo ' Database Error Occured ';
        }

        if ($result_verify_email == 1) { // IF no previous user is using this email .
            
            if ($password == $password2) {
                // Create a unique  activation code:
                $activation = md5(uniqid(rand(), true));
                $friend_reference = md5(uniqid(rand(), true));
              
                $result_insert_user = createUserLocally($passport, $password, $company, $name, $surname, $address, $city, $prefix.$phone, $email, $activation, $friend_reference, $reference);
                if ($result_insert_user == 0) {
                    echo 'Query Failed ';
                }
                
                if ($result_insert_user == 1) { //If the Insert Query was successfull.
                   

                    // Send the email:
                    $message = " Please follow this link to activate your account \n\n";
                    $message .= WEBSITE_URL . '/activation.php?email=' . urlencode($email) . "&key=$activation";
                    
                    
                    /*if (sendMail($email, $name, $message) != 1) {
                        echo "Email не послалася";
                        
                    }*/
                    
                    $message.="<br/> name= ".$name." <br> surname= ".$surname." <br> phone = ".$phone."<br> address = ".$address;
                  //  sendMail('s.allahverdiyeva@gmail.com', $name, 'new user registered ' . $name . "   " . $message);
                    
                    // Flush the buffered output.
                    
                    // Finish the page:
                    echo '<div class="success">Спасибо за регистрацию! <br/> Подтверждение  высланно на электронную почту ' . $email . ' <br/>Нажмите на линк, чтобы активировать Ваш аккаунт.<br/><br/>
                    Если Вы не получили письмо на email, проверьте правильность email адреса.<br/><br/>
                    Если адрес верен, но Вы все равно не получаете письмо, <a href="http://aseshopping.az/contacts/?lang=ru">свяжитесь</a> с нами</div>';
                    
                } else { // If it did not run OK.
                    echo '<div class="errormsgbox">Регистрация не удалась из-за системной ошибки. Приносим извенения за неудобства.</div>';
                }
            } else {
                
                echo '<div class="errormsgbox">Регистрация не удалась. Пароли не совпадают</div>';
            }
        } else { // The email address is not available.
            echo '<div class="errormsgbox" >Данный email адресс уже зарегистрирован.
</div>';
        }
        
    } else { //If the "error" array contains error msg , display them
        
        echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '  <li>' . $values . '</li>';
            
        }
        echo '</ol></div>';
        
    }
    
    
    
}  // End of the main Submit conditional.
 
?>
               <form class="form-horizontal m-t-20" action="#" method="POST">
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control input-lg" type="text" required="" name="firstname" value="<?php echo $name; ?>" placeholder="Firstname*">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control input-lg" type="text" required="" name="lastname" value="<?php echo $surname;?>" placeholder="Lastname*">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control input-lg" type="email" required=""  name="email" value="<?php echo $email;?>" placeholder="Email*">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12 tip-input">
                        <input class="form-control input-lg" type="password" required="" autocomplete="off" name="pass1"  placeholder="Password*">
                        <span class="toltip">Password should contain at least<br/>
                          1 uppercase letter,<br/>
                          1 lowcase letter, <br/>
                          1 digit,<br/> 1 symbol ([#,$, etc.])<br/>
                          length should be between 8 and 20 letters. </span>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control input-lg" type="password" required="" autocomplete="off" name="pass2"  placeholder="Re-enter password*">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control input-lg" type="text" required="" name="passport"  value="<?php echo $passport;?>" placeholder="Passport number*">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12 tip-input">
                        <select class="form-control input-lg" name="prefix" required=""  value="<?php echo $prefix;?>" style=" width: 20%; display: inline;">
                           <option value="-1">Prefix</option>
                           <option value="050">050</option>
                           <option value="051">051</option>
                           <option value="050">070</option>
                           <option value="051">077</option>
                           <option value="051">055</option>
                        </select>
                        <input class="form-control input-lg" type="text" size="9" required=""  value="<?php echo $phone;?>" name="phone" placeholder="Phone number*" style=" width: 79%; display: inline;">
                        <span class="toltip">Phone number should not start with "0"<br>
                          For example, if you number is "055-555-55-55"<br>
                          chose 050 from prefix input and<br>
                          wirte seven numbers without hyphen or spaces (i.e. 5555555) in phone input 

                        </span>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control input-lg" type="text" required="" value="<?php echo $company;?>" name="company" placeholder="Company">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <select class="form-control input-lg" name="city" required="" value="<?php echo $city?>">
                           <option value="-1">City </option>
                           <option value="Baku">Baku</option>
                           <option value="Agdash">Agdash</option>
                           <option value="Agjabadi">Agjabadi</option>
                           <option value="Agstafa">Agstafa</option>
                           <option value="Agsu">Agsu</option>
                           <option value="Astara">Astara</option>
                           <option value="Babek">Babek</option>
                           <option value="Balaken">Balaken</option>
                           <option value="Barda">Barda</option>
                           <option value="Beylagan">Beylagan</option>
                           <option value="Bilasuvar">Bilasuvar</option>
                           <option value="Dashkasan">Dashkasan</option>
                           <option value="Davachi">Davachi</option>
                           <option value="Gadabay">Gadabay</option>
                           <option value="Ganja">Ganja</option>
                           <option value="Goranboy">Goranboy</option>
                           <option value="Goychay">Goychay</option>
                           <option value="Goygol">Goygol, formerly Khanlar (Xanlar)</option>
                           <option value="Hajigabul">Hajigabul</option>
                           <option value="Imishli">Imishli</option>
                           <option value="Ismailli">Ismailli</option>
                           <option value="Jalilabad">Jalilabad</option>
                           <option value="Julfa">Julfa</option>
                           <option value="Khachmaz">Khachmaz</option>
                           <option value="Khyrdalan">Khyrdalan</option>
                           <option value="Kurdamir">Kurdamir</option>
                           <option value="Lankaran">Lankaran</option>
                           <option value="Lerik">Lerik</option>
                           <option value="Masally">Masally</option>
                           <option value="Mingacevir">Mingacevir</option>
                           <option value="Naftalan">Naftalan</option>
                           <option value="Neftchala">Neftchala</option>
                           <option value="Oguz">Oguz</option>
                           <option value="Ordubad">Ordubad</option>
                           <option value="Qabala">Qabala</option>
                           <option value="Qakh">Qakh</option>
                           <option value="Qazakh">Qazakh</option>
                           <option value="Quba">Quba</option>
                           <option value="Qusar">Qusar</option>
                           <option value="Saatly">Saatly</option>
                           <option value="Sabirabad">Sabirabad</option>
                           <option value="Salyan">Salyan</option>
                           <option value="Shakhbuz">Shakhbuz</option>
                           <option value="Shaki">Shaki</option>
                           <option value="Shamakhy">Shamakhy</option>
                           <option value="Shamkir">Shamkir</option>
                           <option value="Sharur">Sharur</option>
                           <option value="Shirvan">Shirvan, formerly Ali Bayramli</option>
                           <option value="Siazan">Siazan</option>
                           <option value="Sumqayit">Sumqayit</option>
                           <option value="Tartar">Tartar</option>
                           <option value="Tovuz">Tovuz</option>
                           <option value="Ujar">Ujar</option>
                           <option value="Yardimly">Yardimly</option>
                           <option value="Yevlakh">Yevlakh</option>
                           <option value="Zaqatala">Zaqatala</option>
                           <option value="Zardab">Zardab</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control input-lg" type="text" required="" name="address"  value="<?php echo $address;?>" placeholder="Address*" >
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <div class=" ">
                           <span>
                           * - required field
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                           <input id="checkbox-signup" type="checkbox" checked="checked">
                           <label for="checkbox-signup">
                           I accept <a href="#">Terms and Conditions</a>
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group text-center m-t-40">
                     <div class="col-xs-12">
                        <button class="btn btn-primary waves-effect waves-light btn-lg w-lg" type="submit">Register</button>
                     </div>
                  </div>
                  <div class="form-group m-t-30">
                     <div class="col-sm-12 text-center">
                        <a href="login.php">Already have account?</a>
                     </div>
                  </div>
                     <input type="hidden" name="formsubmitted" value="TRUE" />
                     
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