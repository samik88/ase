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
              New user
            </li>
          </ol>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                New user form
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="row">
                  <div class="col-md-3"></div>
                   <div class="col-md-6">
                    <div><span class="text-danger" id="result"></span></div>
                  <form class="form-horizontal m-t-20" action="#" method="POST" id="new_user">
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control input-sm" type="text" required="" name="firstname" value="<?php echo $name; ?>" placeholder="Firstname*">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control input-sm" type="text" required="" name="surname" value="<?php echo $surname;?>" placeholder="Lastname*">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control input-sm" type="email" required=""  name="email" value="<?php echo $email;?>" placeholder="Email*">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12 tip-input">
                        <input class="form-control input-sm" type="password" required="" autocomplete="off" name="pass1"  placeholder="Password*">
                        <span class="toltip">Password should contain at least<br/>
                          1 uppercase letter,<br/>
                          1 lowcase letter, <br/>
                          1 digit,<br/> 1 symbol ([#,$, etc.])<br/>
                          length should be between 8 and 20 letters. </span>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input id="password" class="form-control input-sm" type="password" required="" autocomplete="off" name="pass2"  placeholder="Re-enter password*">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control input-sm" type="text" required="" name="passport"  value="<?php echo $passport;?>" placeholder="Passport number*">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12 tip-input">
                        <select class="form-control input-sm" name="prefix" required=""  value="<?php echo $prefix;?>" style=" width: 20%; display: inline;">
                           <option value="-1">Prefix</option>
                           <option value="050">050</option>
                           <option value="051">051</option>
                           <option value="050">070</option>
                           <option value="051">077</option>
                           <option value="051">055</option>
                        </select>
                        <input class="form-control input-sm" type="text" size="9" required=""  value="<?php echo $phone;?>" name="phone" placeholder="Phone number*" style=" width: 79%; display: inline;">
                        <span class="toltip1">Phone number should not start with "0"<br>
                          For example, if you number is "055-555-55-55"<br>
                          chose 050 from prefix input and<br>
                          wirte seven numbers without hyphen or spaces (i.e. 5555555) in phone input 

                        </span>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input class="form-control input-sm" type="text" required="" value="<?php echo $company;?>" name="company" placeholder="Company">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <select class="form-control input-sm" name="city" required="" value="<?php echo $city?>">
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
                        <input class="form-control input-sm" type="text" required="" name="address"  value="<?php echo $address;?>" placeholder="Address*" >
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
                  <div class="form-group text-center m-t-40">
                     <div class="col-xs-12">
                        <span class="btn btn-primary waves-effect waves-light btn-sm w-sm" id="register" >Register</span>
                     </div>
                  </div>
                     <input type="hidden" name="formsubmitted" value="TRUE" />         
               </form>
             </div>
              <div class="col-md-3"></div>
                  </div>         
                  <!-- End Row -->  
                  <div class="row"><a href="users_list.php">BACK</a></div>             
                  </div>                  
                  <!-- container -->  
                  </div>               
              </div>
              </div>
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

<script>
$("#register").click(function(){
  var firstname=$("input:text[name='firstname']").val();
  var surname=$("input:text[name='surname']").val();
  var email=$("input[name=email]").val();
  var pass1=$("input[name='pass1']").val();
  var pass2=$("input[name=pass2]").val();
  var passport=$("input:text[name=passport]").val();
  var prefix=$("select[name='prefix'] option:selected").val();
  var phone=$("input:text[name=phone]").val();
  var company=$("input:text[name=company]").val();
  var city=$("select[name='city'] option:selected").val();
  var address=$("input:text[name=address]").val();
  var re;

  if(isEmpty(firstname)){
    $("#result").html("Firstname can't be empty");   
    return false; 
  }
  if(isEmpty(surname)){
     $("#result").html("Surname can't be empty");
     return false;
  }
  if(isEmpty(email)){
    $("#result").html("Email can't be empty");
    return false;
  }
  if(isEmpty(pass1)){
    $("#result").html("Password can't be empty");
    return false;
  }
  if(pass1==pass2){
    if(pass1.length < 6) {
      $("#result").html("Error: Passwords don't match!");
      form.pass1.focus();
      return false;
    }

    re = /[0-9]/;
    if(!re.test(pass1)) {
    $("#result").html("Error: password must contain at least one number (0-9)!");
      form.pass1.focus();
      return false;
    }

    re = /[a-z]/;
    if(!re.test(pass1)) {
    $("#result").html("Error: password must contain at least one lowercase letter (a-z)!");
      form.pass1.focus();
      return false;
    }

    re = /[A-Z]/;
    if(!re.test(pass1)) {
      $("#result").html("Error: password must contain at least one uppercase letter (A-Z)!");
      form.pass1.focus();
      return false;
    }
  }
  
  if(isEmpty(passport)){
    $("#result").html("Error: Passport can't be empty!");
    return false;
  }
    
  if(!isNumeric(passport)){
    $("#result").html("Error: Passport number must contain only numbers!");
    return false;
  }
      
  if(prefix=="-1"){
    $("#result").html("Prefix can't be empty");
    return false;
  }

  if(isEmpty(phone)){
    $("#result").html("Phone can't be empty");
    return false;
  }
  
  if(!isNumeric(phone)){
    $("#result").html("Error: Phone number must contain only numbers!");
    return false;
  }
  
  if((phone.length)!=7) {
    $("#result").html("Error: Phone number must contain 7 numbers!");
    return false;
  }
  
  if(city=="-1"){
    $("#result").html("City can't be empty");
    return false;
  }

  if(isEmpty(address)){
    $("#result").html("Address can't be empty");
    return false;
  }
  $("#result").html("");
  
  $.ajax({
              type: 'POST',
              url: '../register_user.php',
              data:$('#new_user').serializeArray(), 
              success: function(data){                
                  if(data.status == "success"){
                  //todo delete activate button, make span "activated"
                  }
                  $('#result').html(data.message);
              },
    });
});

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function isEmpty(text){
   return (text.trim().length==0);
}
</script>
