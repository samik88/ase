<?php 

$ini_array     = parse_ini_file("../conf.ini");
$UrlCustomer   = $ini_array['UrlCustomer'];
$UrlTrack      = $ini_array['UrlTracking'];
$AccountNumber = $ini_array['AccountNumber'];
$Username      = $ini_array['Username'];
$Password      = $ini_array['Password'];
$SecurityKey   = $ini_array['SecurityKey'];
$AuthorizeCode = $ini_array['AuthorizeCode'];
$FormEmail     = $ini_array['FormEmail'];

DEFINE('WS_CUSTOMER_URL', $UrlCustomer);

DEFINE('WS_TRACKING_URL', $UrlTrack);

DEFINE('WS_USERNAME', $Username);

DEFINE('WS_PASSWORD', $Password);

DEFINE('WS_SECURITY_KEY', $SecurityKey);

DEFINE('WS_AUTHCODE', $AuthorizeCode);

DEFINE('WS_ACCNUMBER', $AccountNumber);

$MysqlHost     = $ini_array['MysqlHost'];
$MysqlUsername = $ini_array['MysqlUsername'];
$MysqlPassword = $ini_array['MysqlPassword'];
$MysqlDbname   = $ini_array['MysqlDbname'];

DEFINE('DATABASE_USER', $MysqlUsername);

DEFINE('DATABASE_PASSWORD', $MysqlPassword);

DEFINE('DATABASE_HOST', $MysqlHost);

DEFINE('DATABASE_NAME', $MysqlDbname);


$headers = array(
    "Content-type: text/xml;charset=\"utf-8\"",
    "Accept: text/xml",
    "Cache-Control: no-cache",
    "Pragma: no-cache",
    "SOAPAction: \"run\""
    );

function curlRequest($xmlRequest, $url)
{
    global $header;
    
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        
        // send xml request to a server
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequest);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $data = curl_exec($ch);
        
        curl_close($ch);
        
        
        
        //Trim the response from excess white space
        //NOTE:It may be necessary to do further sanitizing of the string
        $xmlResponse = trim($data);
        //enable error reporting
        libxml_use_internal_errors(true);
        //parse the xml response string
        $xmldata = simplexml_load_string($xmlResponse);
        //store the original xml in an array
        //$xml = explode("\n", $xmlResponse);
        //if simplexml_load_string() fails, it returns false.
        //if it returns false, collect the errors and print them to the screen

        //echo ($xml['AccountNumber']);
        if (!$xmldata) {
            $errors = libxml_get_errors();
            //print_r($errors);
            libxml_clear_errors();
            $errors[] = "error";
            return $errors;
            
            
        } else {
            return $xmldata;
        }
        //echo $data;
        //$xml = new SimpleXMLElement($data);
        //$xml=simplexml_load_string($data) ;
        //print_r($xml);
        
    }
    catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
        die("Error");
        return 0;
    }
    
}


function createCustomer($company, $fullname, $address, $city, $phone, $email)
{

    $xmlRequest = "<?xml version='1.0'?>

    <LiveCourier action='Request' version='1.0'>

        <Requestor>

            <Username>" . WS_USERNAME . "</Username>

            <Password>" . WS_PASSWORD . "</Password>

            <SecurityKey>" . WS_SECURITY_KEY . "</SecurityKey>

            <AuthorizeCode>" . WS_AUTHCODE . "</AuthorizeCode>

            <AccountNumber>" . WS_ACCNUMBER . "</AccountNumber>

        </Requestor>

        <Customers action='Add' version='1.0'>

            <Customer>

             <Main>

                 <CompanyName>" . $company . "</CompanyName>

                 <ContactName>" . $fullname . "</ContactName>

                 <Address1>" . $address . "</Address1>

                 <Address2></Address2>

                 <City>" . $city . "</City>

                 <StateProvince>Azerbaijan</StateProvince>

                 <ZipPostal>AZ1001</ZipPostal>

                 <Country>Az</Country>

                 <Phone>" . $phone . "</Phone>

                 <Email>" . $email . "</Email>

             </Main>
             <Billing>

                 <Address1>" . $address . "</Address1>

                 <Address2> </Address2>

                 <City>" . $city . "</City>

                 <StateProvince>Azerbaijan</StateProvince>

                 <ZipPostal>AZ1001</ZipPostal>

                 <Country>Az</Country>

                 <Phone>" . $phone . "</Phone>

                 <Email>" . $email . "</Email>

             </Billing>

         </Customer> 

     </Customers>

 </LiveCourier>";
    //print_r(htmlentities($xmlRequest));

 $res = curlRequest($xmlRequest, WS_CUSTOMER_URL);


 $x = $res->Customer;

 $accountNumber = $x->AccountNumber;


 return $accountNumber;
    /*foreach ($errors as $error) {
    echo display_xml_error($error, $xml);
}*/

}


function admin_login($username, $password){  
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    mysqli_query($con,"set names 'utf8'");
    $query = "select name, surname, email from  `operators` where email='$username' and password='" . md5($password) . "'"; 
    $result = mysqli_query($con, $query);
    
    if ($result->num_rows == 0) {
        $res[0] = -1;
        $res[1] = "Your username or password is wrong";
    } else {
        while ($row = $result->fetch_assoc()) {
            $res[0] = $row['name'] . " " . $row['surname'];
            $res[1] = $row['email'];            
        }
        
        $q = "update `operators` set last_log_time=now() where email='" . $username . "' and password='" . md5($password) ."'";
        mysqli_query($con, $q);       
    }
    mysqli_close($con);    
    return $res;
}



function sendPassLink($email)
{

    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    mysqli_query($con,"set names 'utf8'");
    
    $key = md5(uniqid(rand(), true));
    $query_check_user = "select 1 from operators where email='$email'";   
    $result_check_user = mysqli_query($con, $query_check_user);

    if (mysqli_num_rows($result_check_user) == 0) {
        mysqli_close($con);
        $res[0] = 0;
        $res[1] = "Такой клиент не зарегестрирован";
        return $res;
    } else { 
        $query_send_pass = "UPDATE operators SET  pass_key='$key' WHERE(email ='$email')LIMIT 1";        
        $result_send_pass = mysqli_query($con, $query_send_pass);
        if (mysqli_affected_rows($con) == 1) {
            mysqli_close($con);
            $res[0] = 1;
            $res[1] = $key;
            return $res;
        } else {
            mysqli_close($con);
            $res[0] = 0;
            $res[1] = 'Ошибка во время сбора';
            return $res;
        }
    }
}


function getPackage($AwbNum){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    mysqli_query($con,"set names 'utf8'");
    $query = "select p.AwbNum, p.country_id,t.trans_az country, p.weight,p.weightType, p.width, p.height, p.length, ".
    " p.dimUnit, p.customValue, p.currency, p.content, p.price, u.fullname, u.surname, p.insert_date from `packages` p, `users` u, `translation` t,".
    " `countries` c where p.AwbNum='$AwbNum' and t.id=c.translation_id and c.id=p.country_id and  u.PObox=p.accountNumber";
    $result = mysqli_query($con, $query);
    
    if (($result->num_rows == 0)||($result->num_rows == -1)) {
        $res = -1;       
    } else {  
        $res=$result->fetch_assoc();
    }
    mysqli_close($con);
    return $res;
}

function getPackages($user_id, $country_id, $status_id, $start_date, $end_date)
{

    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    mysqli_query($con,"set names 'utf8'");
    $query = "select p.AwbNum, u.fullname, u.surname, u.PObox,t.trans_az country, t1.trans_az stat, s.label, p.weight,p.weightType, p.width, p.height, p.length, p.customValue, p.currency, p.content, p.status, p.price, p.payment_status from `packages` p, `translation` t, `users` u, `statuses` s, `translation` t1 where u.PObox=p.accountNumber and t.id=p.country_id and s.id=p.status and t1.id=s.translation_id";

    if($country_id==""&&$start_date=="" &&$end_date==""&&$user_id==""&&$status_id==""){
    }else{
        if($country_id!=""){
          $query.=" and p.country_id=$country_id";
      }

      if($start_date!="" && $end_date!=""){
       $query.=" and p.insert_date between STR_TO_DATE('$start_date'    ,'%m/%d/%Y') and STR_TO_DATE('$end_date','%m/%d/%Y')";
   } 

   if($user_id !=""){
       $query.=" and p.accountNumber='$user_id'";
   }

   if($status_id!=""){
      $query.=" and p.status=$status_id";     
  }
}
$query.=" order by insert_date desc LIMIT 500";
$result = mysqli_query($con, $query);

if ($result->num_rows == 0) {
    $res = -1;       
} else {  
    $i=0;
    while ($row = $result->fetch_assoc()) {
        $res.="<tr id='".$row['AwbNum']."_tr'>";
        $res.="<td><input type='checkbox' name='AwbNum' class='AwbNum' id='".$row['AwbNum']."' value='".$row['AwbNum']."' onclick='changeStatusBox(this)'/>";
        $res.="<input type='hidden' value='".$row['PObox']."' id='PObox_".$row['AwbNum']."'/>";
        $res.="<input type='hidden' value='".$row['fullname']." ".$row['surname']."' id='name_".$row['AwbNum']."'/>";
        $res.="<input type='hidden' value='".$row['country']."' id='country_".$row['AwbNum']."'/>";
        $res.="<input type='hidden' value='".$row['weight']." ".$row['weightType']."' id='weight_".$row['AwbNum']."'/>";
        $res.="</td>";
        $res.= "<td>".$row['AwbNum']."</td>";
        $res.= "<td>".$row['fullname']." ".$row['surname']."</td>";
        $res.= "<td>".$row['PObox']."</td>";
        $res.= "<td>".$row['country']."</td>";
        $res.="<td>".$row['weight']." ".$row['weightType']."</td>";
        $res.="<td>".$row['width']."</td>";
        $res.="<td>".$row['height']."</td>";
        $res.="<td>".$row['length']."</td>";
        $res.="<td>".$row['customValue']." ".$row['currency']."</td>";
        $res.="<td>".$row['content']."</td>";
        $res.="<td  id='".$row['AwbNum']."_status' class=\"center\"><span id='".$row['AwbNum']."_span' class='label ";
        $res.=" label-".$row['label']."'>".$row['stat']."</span>"; 
        $res.="<select id='".$row['AwbNum']."_select' class='AwbNum_status' hidden>".getStatusFilter('az')."</select>";
        $res.="</td>";
        $res.="<td id='".$row['AwbNum']."_price_td'>";
        if($row["price"]!=0){
            $res.=$row["price"];
        }else{
            $res.="<input type=\"text\" name=\"price\" id='".$row["AwbNum"]."_price' style=\"max-width:50px;margin-bottom:5px\"/>";
            $res.="<button class=\"btn-primary md-trigger  btn  waves-light\" onclick=\"addPrice('".$row["AwbNum"]."')\">Add</button>";
        }
        $res.="</td><td id='".$row['AwbNum']."_pay_td'>";
        if($row["payment_status"]==0){
            $res.="<button class=\"btn-primary md-trigger  btn  waves-light\" id='".$row["AwbNum"]."_pay' onclick=\"pay('".$row["AwbNum"]."')\">Pay</button>";
        }else{
            $res.="Payed";
        }
        $res.="</td><td class=\"center\"><button class=\"btn-primary md-trigger  btn  waves-light\"><a style=\"color:white\" href=\"tracking.php?orderNum=".$row['AwbNum']."\">Track</a></button></td>";  
        $res.="<td class=\"center\"><button class=\"btn-primary md-trigger  btn  waves-light\"><a style=\"color:white\" href=\"edit_package.php?orderNum=".$row['AwbNum']."\">Edit</a></button></td>";  
        $res.=' </tr>';
        $i++;
    } 
}
mysqli_close($con);   
return $res;    
}

function getUknownPackages($country_id){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    mysqli_query($con,"set names 'utf8'");

    $query = "select p.*, t.trans_az country from `uknown_packages` p, `translation` t where  t.id=p.country_id ";
    if($country_id!=null){
      $query.=" and p.country_id=$country_id";
  }   

  $result = mysqli_query($con, $query);
  if ($result->num_rows == 0 || $result->num_rows ==-1) {
   $res = -1;       
} else {  
    $i=0;
    while ($row = $result->fetch_assoc()) {
        $i++;
        $res.="<tr id='".$row['AwbNum']."'>";
        $res.="<td>$i</td>";
        $res.= "<td>".$row['AwbNum']."</td>";
        $res.= "<td>".$row['country']."</td>";
        $res.="<td>".$row['weight']." </td>";   
        $res.="<td>".$row['weightType']."</td>";
        $res.="<td>".$row['width']."</td>";
        $res.="<td>".$row['height']."</td>";
        $res.="<td>".$row['length']."</td>";
        $res.="<td>".$row['dimUnit']."</td>";
        $res.="<td>".$row['customValue']." ".$row['currency']."</td>";
        $res.="<td>".$row['currency']."</td>";
        $res.="<td>".$row['content']."</td>";    
        $res.="<td><select name='".$row['AwbNum']."_user' id='".$row['AwbNum']."_user' class='form-control' style='width: 100%;'>";
        $res.="<option value='-1'>Select user</option>".getUsersFilter("az")."</select></td>";                
        $res.="<td class=\"center\"><span class=\"btn-primary md-trigger  btn  waves-light assign_user\"'>ASSIGN</span></td>";  
        $res.="<td class=\"center\"><span class=\"btn-primary md-trigger  btn  waves-light remove_pack\" id='".$row["AwbNum"]."_del'>REMOVE</span></td>";  
        $res.="</tr>";
    }
}
mysqli_close($con);   
return $res;  
}

function getUsersFilter($lang){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    mysqli_query($con,"set names 'utf8'");

    $query = "select u.fullname, u.surname, u.PObox from users u where PObox!=''";
    $result = mysqli_query($con, $query);
    
    if ($result->num_rows == 0 || $result->num_rows ==-1) {
        $res = -1;       
    } else {  
        while ($row = $result->fetch_assoc()) {
            $res.="<option value=\"".$row['PObox']."\">".$row["fullname"]." ".$row["surname"]."</option>";
        }
    }
    mysqli_close($con);   
    return $res;  
}

function getCountriesFilter($lang){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $trans_lang='az';
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    mysqli_query($con,"set names 'utf8'");
    switch($lang){
        case 'az':
        $trans_lang='trans_az';
        break;
        case 'ru':
        $trans_lang='trans_ru';
        break;
        case 'en':
        $trans_lang='trans_en';
        break;
    }

    $query = "select t.$trans_lang  country, c.id from countries c, translation t where t.id=c.translation_id";

    $result = mysqli_query($con, $query);
    
    if ($result->num_rows == 0 || $result->num_rows==-1) {
        $res = -1;       
    } else {  
        while ($row = $result->fetch_assoc()) {
            $res.="<option value=\"".$row['id']."\">".$row["country"]."</option>";
        }
    }
    mysqli_close($con);   
    return $res;  
}


function getStatusFilter($lang){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    switch($lang){
        case 'az':
        $trans_lang='trans_az';
        break;
        case 'ru':
        $trans_lang='trans_ru';
        break;
        case 'en':
        $trans_lang='trans_en';
        break;
    }
    mysqli_query($con,"set names 'utf8'");
    $query = "select t.$trans_lang status, s.id from statuses s, translation t where t.id=s.translation_id";
    $result = mysqli_query($con, $query);
    
    if ($result->num_rows == 0 || $result->num_rows==-1) {
        $res = -1;       
    } else {  
        while ($row = $result->fetch_assoc()) {
            $res.="<option value=\"".$row['id']."\">".$row["status"]."</option>";
        }
    }
    mysqli_close($con);   
    return $res;  
}


function changeStatus($awbNums){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    foreach($awbNums as $key=>$value){
        $query = "UPDATE `packages` SET  status='$value' WHERE AwbNum ='$key'";        
        $result = mysqli_query($con, $query);
        if($value == 12||$value ==14){
            $query = "DELETE FROM `onhold_orders` WHERE order_id ='$key'";  
            $result = mysqli_query($con, $query);
        }
        $query = "INSERT INTO tracking(`AwbNum`,`status`,`date`) VALUES('$key',$value,now())";
        $result = mysqli_query($con, $query);
        if ((mysqli_affected_rows($con) == 0)|| (mysqli_affected_rows($con) == -1)) {
            $res1.=$key.",";
        }else{
            $res2.=$key.",";
        }

        $res["success"]=$res2;
        $res["error"]=$res1;
    }
    mysqli_close($con);   
    return $res; 
}

function removePackage($awbNums){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $res2="";
    $res1="";
    foreach($awbNums as $key=>$value){
        $query = "DELETE from `onhold_orders` WHERE order_id ='$value'";        
        $result = mysqli_query($con, $query);
        $query = "DELETE from `packages`  WHERE AwbNum ='$value'";        
        $result = mysqli_query($con, $query);
        if ((mysqli_affected_rows($con) == 0)|| (mysqli_affected_rows($con) == -1)) {
            $res1.=$value.",";
        }else{
            $res2.=$value.",";
        }
    }

    $res["success"]=$res2;
    $res["error"]=$res1;
    mysqli_close($con);   
    return $res; 
}

function addNews($title, $newsText, $status_id){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $res=1;
    $query= "INSERT INTO news(`title`,`news_body`,`timestamp`,`category`,`status`) VALUES('$title','".mysqli_real_escape_string($con,$newsText)."',now(),1,".$status_id.")";
    mysqli_query($con, $query);      
    if(mysqli_affected_rows($con) != 1) {
      $res = -1;       
  } 
  mysqli_close($con);    
  return $res;
}

function payDelivery($AwbNum){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $res=1;
    $query= "update `packages` set payment_status=1, payment_date=now() where AwbNum='$AwbNum'";
    mysqli_query($con, $query);      
    if(mysqli_affected_rows($con) != 1) {
      $res = -1;       
  } 
  mysqli_close($con);    
  return $res;
}

function addPrice($AwbNum, $price){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $res=1;
    $query= "update `packages` set price=$price where AwbNum='$AwbNum'";
    mysqli_query($con, $query);     
    if((mysqli_affected_rows($con) == -1)||(mysqli_affected_rows($con) == 0)) {
      $res = -1;       
  } 
  mysqli_close($con);    
  return $res;
}

function addPackage($data){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    mysqli_query($con,"set names 'utf8'");
    $query = "";
    $query_tracking="";
    $tracking_num=0;
    $res="";
    $i = 0;
    $j = 0;

    while($i < sizeof($data)) {
       $j++;
       $query_tracking="select prefix, maxnum from package_tracking where country_id=".$data[$i];
       $result=mysqli_query($con, $query_tracking);
       $row = $result->fetch_assoc();
       $tracking_num=$row["prefix"]+$row["maxnum"]+1;
       $query="INSERT INTO `packages`
       (`AwbNum`,`country_id`,`accountNumber`,`weight`,`weightType`,`width`,`height`,`length`,`dimUnit`,`customValue`,`currency`,`content`,`price`,`status`)
       VALUES('".$tracking_num."',".$data[$i].",'".$data[$i+1]."',". $data[$i+2].",'". $data[$i+3]."',". $data[$i+4].",".$data[$i+5].",". $data[$i+6].",'".$data[$i+7]."',".$data[$i+8].",'".$data[$i+9]."','".$data[$i+10]."',".$data[$i+11].",".$data[$i+12].")";

       mysqli_query($con, $query);   
       if($data[$i+12]!=12){
           $inserted_id = mysqli_insert_id($con);
       }  
       if(mysqli_affected_rows($con) != -1 && mysqli_affected_rows($con)!=0 ) {
        $res = "<span class='text-success'>row number ".$j." was saved </span><br>";   
        $query="INSERT INTO onhold_orders(order_id) values($tracking_num)"; 
        mysqli_query($con, $query);
        $query_tracking="Update package_tracking set maxnum=maxnum+1 where country_id=".$data[$i]; 
        $result=mysqli_query($con, $query_tracking);
    } else{
        $res = "<span class='text-danger'> row number ".$j." wasn't saved </sapn><br>";
    }
    $i += 13;
}

mysqli_close($con);    
return $res;

}


function addUknownPackage($data){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query = "";
    $query_tracking="";
    $tracking_num=0;
    $res="";
    $i = 0;
    $j = 0;

    mysqli_query($con,"set names 'utf8'");

    while($i < sizeof($data)) {
       $j++;
       $query_tracking="select prefix, maxnum from package_tracking where country_id=".$data[$i];
       $result=mysqli_query($con, $query_tracking);
       $row = $result->fetch_assoc();
       $tracking_num=$row["prefix"]+$row["maxnum"]+1;
       $query="INSERT INTO `uknown_packages`
       (`AwbNum`,`country_id`,`weight`,`weightType`,`width`,`height`,`length`,`dimUnit`,`customValue`,`currency`,`content`)
       VALUES('".$tracking_num."',".$data[$i].",".$data[$i+1].",'". $data[$i+2]."',". $data[$i+3].",". $data[$i+4].",".$data[$i+5].",'". $data[$i+6]."',".$data[$i+7].",'".$data[$i+8]."','".$data[$i+9]."')";
       mysqli_query($con, $query);     
       if(mysqli_affected_rows($con) != -1 && mysqli_affected_rows($con)!=0 ) {
        $res = "<span class='text-success'>row number ".$j." was saved </span><br>";   
        $query_tracking="Update package_tracking set maxnum=maxnum+1 where country_id=".$data[$i]; 

        mysqli_query($con, $query_tracking);
    } else{
        $res = "<span class='text-danger'> row number ".$j." wasn't saved </sapn><br>";
    }
    $i += 10;
}

mysqli_close($con);    
return $res;

}

function assignUknownPackage($AwbNum, $PObox){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query = "";
    $res="";
    $i = 0;
    $j = 0;

    $query="INSERT INTO `packages` (`AwbNum`,`accountNumber`,`country_id`,`weight`,`weightType`,`width`,`height`,`length`,`dimUnit`,`customValue`,`currency`,`content`,`status`) SELECT `AwbNum`,'$PObox',`country_id`,`weight`,`weightType`,`width`,`height`,`length`,`dimUnit`,`customValue`,`currency`,`content` , 13 FROM `uknown_packages` where AwbNum='$AwbNum'";
    mysqli_query($con, $query);     
    if(mysqli_affected_rows($con) != -1 && mysqli_affected_rows($con)!=0 ) {
       $res = "<span class='text-success'> Package  number ".$AwbNum." assigned to user ".$PObox."</span><br>";
   } else{
    $res = -1;
}

mysqli_close($con);    
return $res;
}

function getUsersList()
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $res="";
    mysqli_query($con,"set names 'utf8'");
    $query = "select * from `users`";    
    $result = mysqli_query($con, $query);
    if ($result->num_rows == 0) {
        $res = -1;
    }else{
        $i=0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            $res.="<tr class='gradeC'>";
            $res.="<td>$i</td>";
            $res.= "<td>".$row["fullname"]."</td>";
            $res.="<td>".$row["surname"]."</td>";
            $res.="<td>".$row["PObox"]."</td>";
            $res.="<td>".$row["email"]."</td>";
            $res.="<td>".$row["pin"]."</td>";
            $res.="<td>".$row["address"]."</td>";
            $res.="<td>".$row["phone"]."</td>";
            $res.="<td>";
            if($row["PObox"]==null){
                $res.="<span class='btn-primary md-trigger  btn  waves-light assign_user activate' id='".$row["email"]."'>Activate</span>";
            }else{
                $res.="Active";     
            }
            $res.="</td>";
            $res.="<td><button class=\"btn-primary md-trigger  btn  waves-light assign_user\" ><a href='reset_pass_admin.php?PObox=".$row[PObox]."' style='color:white'>Reset P</a></button></td>";
            $res.="<td><button class=\"btn-primary md-trigger  btn  waves-light assign_user\" ><a href='user_more.php?PObox=".$row[PObox]."' style='color:white'>More</a></button></td>";
            $res.="</tr>";
        }
    }
    mysqli_close($con);
    return $res;   
}

function getUsersListDetails($PObox){

    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $res="";
    mysqli_query($con,"set names 'utf8'");
    $query = "select * from `users` where PObox='$PObox'";    
    $result = mysqli_query($con, $query);
    if ($result->num_rows == 0) {
        $res = -1;
    }else{
        while ($row = $result->fetch_assoc()) {
            $res.="<table class=\"table table-striped table-bordered\"><thead><tr><th>Name</th><th>Surname</th><th>PObox</th><th>Email</th><th>Pin</th><th>Address</th><th>Phone</th><th>City</th><th>Company</th></tr></thead><tbody>";
            $res.="<tr id='".$row['PObox']."_tr'>";
            $res.= "<td>".$row["fullname"]."</td>";
            $res.="<td>".$row["surname"]."</td>";
            $res.="<td>".$row["PObox"]."</td>";
            $res.="<td>".$row["email"]."</td>";
            $res.="<td>".$row["pin"]."</td>";
            $res.="<td>".$row["address"]."</td>";
            $res.="<td>".$row["phone"]."</td>";
            $res.="<td>".$row["city"]."</td>";
            $res.="<td>".$row["company"]."</td>";
            $res.="</tr></tbody></table>";
            $res.="<table class=\"table\"><thead><tr><th>Status</th><th>RDate</th><th>ADate</th><th>login date</th><th>Friend ref</th><th></th></tr></thead><tbody>";                                                                       
            $res.="<tr>";
            $res.="<td>";
            if($row["PObox"]==null){
                $res.="Inactive";
            }else{
                $res.="Active";     
            }
            $res.="</td>";
            $res.="<td>".$row["register_date"]."</td>";
            $res.="<td>".$row["activation_date"]."</td>";
            $res.="<td>".$row["last_login_date"]."</td>";
            $res.="<td>".$row["friend_reference"]."</td>";
            $res.="</tr></tbody></table>";                                               
        }
    }
    mysqli_close($con);
    return $res;   
}

function changePass($PObox, $pass)
{   
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $query_change_pass = "UPDATE users SET  pass_key=NULL, password= md5('$pass') WHERE PObox ='$PObox' LIMIT 1";
    $result_change_pass = mysqli_query($con, $query_change_pass);
    if (mysqli_affected_rows($con) == 1) {
        mysqli_close($con);
        return 1;
    } else {
        mysqli_close($con);
        return 0;
    } 
}


function getUserEditForm($PObox){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $res="";
    mysqli_query($con,"set names 'utf8'");
    $query = "select u.fullname, u.surname, u.email, u.pin, u.address, u.city, u.phone from `users` u where PObox='$PObox'";   
    $result = mysqli_query($con, $query);
    if ($result->num_rows == 0) {
        $res = -1;
    }else{
        $res=$result->fetch_assoc();
    }
    mysqli_close($con);
    return $res;   
}

function changeUserInfo($data){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $res="";
    $query = "update `users` u set ";
    $i=0;

    if($data["fullname"]!=""){
        $query.=" fullname='".$data["fullname"]."' ";
        $i++;
    }
    if($data["surname"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" surname='".$data["surname"]."' ";
        $i++;
    }
    if($data["email"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" email='".$data["email"]."' ";
        $i++;
    }
    if($data["pin"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" pin='".$data["pin"]."' ";
        $i++;
    }
    if($data["address"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" address='".$data["address"]."' ";
        $i++;
    }
    if($data["phone"]!=""){
        $query.=" phone='".$data["phone"]."' ";
    }

    $query .=" where PObox='".$data["PObox"]."'"; 
    $result = mysqli_query($con, $query);

    if(mysqli_affected_rows($con) != -1 && mysqli_affected_rows($con)!=0 ) {
       $res = "<span class='text-success'> User info has changed</span><br>";
   } else{
    $res = -1;
}
mysqli_close($con);
return $res;  
}

function activate($email){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query_get_customer = "SELECT * FROM users where email='$email'";        
    $result_get_customer = mysqli_query($con, $query_get_customer);
    
    if (mysqli_num_rows($result_get_customer) != 0) {
        while ($row = $result_get_customer->fetch_assoc()) {

            $company  = $row['company'];
            $fullname = $row['fullname'];
            $surname  = $row['surname'];
            $address  = $row['address'];
            $city     = $row['city'];
            $phone    = $row['phone'];
            $email    = $row['email'];

        }
        $name = $fullname . " " . $surname;    
        $accountNumber = createCustomer($company, $name, $address, $city, $phone, $email);

        if ($accountNumber!='') {

            $query_activate_account  = "UPDATE users SET activation=NULL, PObox='$accountNumber' , activation_date=now() WHERE email ='$email' LIMIT 1";    
            echo $query_activate_account;
            $result_activate_account = mysqli_query($con, $query_activate_account);        
            if (mysqli_affected_rows($con) == 1) {
                $res="<span class='text-success'>User info was updated</span>";
            } else {
                $res=-1;
            }
        } else {
            $res=-1;

        }
    }else{
        $res=-1;
    }
    mysqli_close($con);
    return $res;
}

function changePacakgeInfo($data){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $res="";
    $query = "update `packages`  set ";
    $i=0;

    if($data["PObox"]!=""){
        $query.=" accountNumber='".$data["PObox"]."' ";
        $i++;
    }
    if($data["city"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" country_id='".$data["city"]."' ";
        $i++;
    }
    if($data["weight"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" weight=".$data["weight"]." ";
        $i++;
    }
    if($data["weightType"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" weightType='".$data["weightType"]."' ";
        $i++;
    }
    if($data["width"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" width=".$data["width"]." ";
        $i++;
    }
    if($data["height"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" height=".$data["height"]." ";
        $i++;
    }
    if($data["length"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" length=".$data["length"]." ";
        $i++;
    }

    if($data["dimUnit"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" dimUnit='".$data["dimUnit"]."' ";
        $i++;
    }

    if($data["customValue"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" customValue=".$data["customValue"]." ";
        $i++;
    } 
    if($data["currency"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" currency='".$data["currency"]."' ";
        $i++;
    }
    if($data["content"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" content='".$data["content"]."' ";
        $i++;
    }
    if($data["price"]!=""){
        if($i!=0){
            $query.=" , ";
        }
        $query.=" price=".$data["price"]." ";
    }


    $query .=" where AwbNum='".$data["AwbNum"]."'"; 
    $result = mysqli_query($con, $query);

    if(mysqli_affected_rows($con) != -1 && mysqli_affected_rows($con)!=0 ) {
       $res = "<span class='text-success'> User info has changed</span><br>";
   } else{
    $res = -1;
}
mysqli_close($con);
return $res;  
}

function getDeclarations($user_id, $country_id,  $start_date, $end_date)
{

    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    mysqli_query($con,"set names 'utf8'");
    $query = "select d.id, d.estore, d.commodity, d.quantity, d.price, d.country_id, d.accountNumber,d.timestamp , u.fullname, u.surname,t.trans_az country 
    from `declarations` d , `users` u, `countries` c, `translation` t where u.PObox=d.accountNumber and t.id=c.translation_id and c.id=d.country_id ";

    if($country_id==""&&$start_date=="" &&$end_date==""&&$user_id ==""){
     $query.=" order by timestamp desc LIMIT 500";
 }else{
    if($country_id!=""){
      $query.=" and d.country_id=$country_id";
  }

  if($start_date!="" && $end_date!=""){
   $query.=" and d.timestamp between STR_TO_DATE('$start_date'    ,'%m/%d/%Y') and STR_TO_DATE('$end_date','%m/%d/%Y')";
} 

if($user_id !=""){
   $query.=" and d.accountNumber='$user_id'";
}
}

$result = mysqli_query($con, $query);

if ($result->num_rows == 0) {
    $res = -1;       
} else {  
    while ($row = $result->fetch_assoc()) {
        $i++;
        $res.="<tr id='".$row['id']."'>";
        $res.="<td><input type=\"checkbox\" name=\"decId\"  value='".$row['id']."'></td>";
        $res.= "<td>".$row["estore"]."</td>";
        $res.= "<td>".$row["fullname"]." ".$row["surname"]."</td>";
        $res.="<td>".$row["country"]."</td>";
        $res.="<td>".$row["commodity"]."</td>";
        $res.="<td>".$row["quantity"]."</td>";
        $res.="<td>".$row["price"]."</td>";
        $res.="<td>".$row["timestamp"]."</td>";
        $res.="<td><span class=\"btn-primary md-trigger  btn  waves-light makePack\">Package</span></td>";
        $res.="<td><span class=\"btn-primary md-trigger  btn  waves-light removeDec \" id=\"del_".$row['id']."\">Delete</span></td>";
        $res.="</tr>";
    }
}
mysqli_close($con);   
return $res; 
}

function getRequests($user_id, $country_id,  $start_date, $end_date, $status_id)
{

    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }   
    mysqli_query($con,"set names 'utf8'");
    $query = "select d.id, d.link, d.details, d.accountNumber, d.country_id, d.phone, d.timestamp,d.status_id status, u.fullname, u.surname, t.trans_az country 
    from `buy_request` d , `users` u, `countries` c, `translation` t where u.PObox=d.accountNumber and t.id=c.translation_id and c.id=d.country_id  and d.status_id=".$status_id;

    if($country_id==""&&$start_date=="" &&$end_date==""&&$user_id ==""){
     $query.=" order by timestamp desc LIMIT 500";
 }else{
    if($country_id!=""){
      $query.=" and d.country_id=$country_id";
  }

  if($start_date!="" && $end_date!=""){
   $query.=" and d.timestamp between STR_TO_DATE('$start_date'    ,'%m/%d/%Y') and STR_TO_DATE('$end_date','%m/%d/%Y')";
} 

if($user_id !=""){
   $query.=" and d.accountNumber='$user_id'";
}
}

$result = mysqli_query($con, $query);

if ($result->num_rows == 0) {
    $res = -1;       
} else {  
    while ($row = $result->fetch_assoc()) {
        $i++;
        $res.="<tr id='".$row['id']."_tr'>";
        $res.="<td><input type=\"checkbox\" name=\"reqId\" class=\"reqId\"  value='".$row['id']."'></td>";
        $res.= "<td>".$row["link"]."</td>";
        $res.= "<td>".$row["fullname"]." ".$row["surname"]."</td>";
        $res.="<td>".$row["phone"]."</td>";
        $res.="<td>".$row["country"]."</td>";
        $res.="<td>".$row["details"]."</td>";
        $res.="<td>".$row["timestamp"]."</td>";
        $res.="<td>".$row["status"]."</td>";
        $res.="</tr>";
    }
}
mysqli_close($con);   
return $res; 
}

function makePackage($decId){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query_tracking="select p.prefix, p.maxnum from package_tracking p, declarations d  where p.country_id=d.country_id and d.id=$decId";
    $result=mysqli_query($con, $query_tracking);
    $row = $result->fetch_assoc();
    $tracking_num=$row["prefix"]+$row["maxnum"]+1;

    $query = "INSERT into packages(AwbNum, content, customValue, country_id, accountNumber, status) SELECT '$tracking_num', commodity, price, country_id, accountNumber,13 from declarations where id=$decId ";
    $result=mysqli_query($con, $query);
    if ((mysqli_affected_rows($con) != -1)&&(mysqli_affected_rows($con) != 0)) {
        $query_tracking="Update package_tracking set maxnum=maxnum+1 where country_id=".$data[$i]; 
        $result=mysqli_query($con, $query_tracking);
        $res="<span class='text-success'>New package was created</span>";
    } else {
        $res=-1;
    }
    
    mysqli_close($con);   
    return $res;
}

function deleteDecl($decId){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query = "DELETE from declarations where id=$decId";
    $result=mysqli_query($con, $query);

    if (mysqli_affected_rows($con) == 1) {
       $res="<span class='text-success'>New package was created</span>";

   } else {
    $res=-1;
}

mysqli_close($con);   
return $res;
}

function deleteUnknownPackage($AwbNum){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query = "DELETE from uknown_packages where AwbNum=$AwbNum";
    $result=mysqli_query($con, $query);

    if (mysqli_affected_rows($con) == 1) {
       $res="<span class='text-success'>Unknown package was removed</span>";

   } else {
    $res=-1;
}

mysqli_close($con);   
return $res;
}

function doneRequest($awbNums){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    foreach($awbNums as $key=>$value){
        $query = "UPDATE `buy_request` SET  status_id=1 WHERE id ='$value'";        
        $result = mysqli_query($con, $query);
        
        if ((mysqli_affected_rows($con) == 0)|| (mysqli_affected_rows($con) == -1)) {
            $res1.=$value.",";
        }else{
            $res2.=$value.",";
        }

        $res["success"]=$res2;
        $res["error"]=$res1;
    }
    mysqli_close($con);   
    return $res; 
}

function getNews($start,$end, $status){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="SELECT count(id) count FROM news";
    $result = mysqli_query($con, $query);
    mysqli_query($con,"set names 'utf8'");
    if ($result->num_rows == 0) {
        $res["status"]="error";
        $res["result"] =-1;       
    } else {  
        $row = $result->fetch_assoc();
        $res["count"]=$row["count"];
        $query="SELECT * FROM news";
        if($status!=null){
            $query.=" and status=$status";
        }
        $query.=" ORDER BY timestamp DESC LIMIT $start, $end";
        $result = mysqli_query($con, $query);
        $arr=[];
        while($row=$result->fetch_assoc()){
            array_push($arr,$row);
        }
        if ($result->num_rows == 0) {
            $res["status"]="error";
            $res["result"] =-2;
        }else{  
            $res["status"]="success";
            $res["result"]=$arr;
        }
    }   
    mysqli_close($con);   
    return $res;
}

function getNewsBy($id){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="SELECT * FROM news WHERE id=$id";
    mysqli_query($con,"set names 'utf8'");
    $result = mysqli_query($con, $query);
    if ($result->num_rows == 0) {
        $res["status"] = "error";       
    } else {
        $res["status"] = "success";
        $res["message"] = $result->fetch_assoc();
    }
    mysqli_close($con);   
    return $res;
}

function editNews($id, $title, $news, $status){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $query="UPDATE news SET status=$status ";
    if($title!=""){
        $query.=" ,title='".mysqli_real_escape_string($con,$news)."'";
    }
    if($news!=""){
        $query.=" ,news_body='". mysqli_real_escape_string($con,$news)."'";
    }
    $query.=" , timestamp=now() WHERE id=$id";
    mysqli_query($con,"set names 'utf8'");
    $result = mysqli_query($con, $query);
    if ((mysqli_affected_rows($con) == 0)|| (mysqli_affected_rows($con) == -1)) {
        $res=-1;       
    } else {
        $res=1; 
    }
    mysqli_close($con);   
    return $res;
}

function removeNews($id){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="DELETE FROM news WHERE id=$id";
    $result = mysqli_query($con, $query);
    if ((mysqli_affected_rows($con) == 0)|| (mysqli_affected_rows($con) == -1)) {
        $res=-1;       
    } else {
        $res=1;
    }
    mysqli_close($con);   
    return $res;
}

function getContacts(){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="SELECT * FROM contact_info LIMIT 1";
    mysqli_query($con,"set names 'utf8'");
    $result = mysqli_query($con, $query);
    if ($result->num_rows == 0) {
        $res = -1;       
    } else {
        $res = $result->fetch_assoc();
    }
    mysqli_close($con);   
    return $res;
}

function editContacts($info){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="UPDATE contact_info SET work_phone='".$info["phone"]."', email='".$info["email"]."' , 
    address_line_1_az='".$info["addr_1_az"]."', address_line_2_az='".$info["addr_2_az"]."', address_line_1_ru='".$info["addr_1_ru"]."',
    address_line_2_ru='".$info["addr_2_ru"]."', address_line_1_en='".$info["addr_1_en"]."' , address_line_2_en='".$info["addr_2_en"]."'";
    mysqli_query($con,"set names 'utf8'");
    $result = mysqli_query($con, $query);
    if ((mysqli_affected_rows($con) == 0)|| (mysqli_affected_rows($con) == -1)) {
        $res=-1;       
    } else {
        $res=1;
    }
    mysqli_close($con);   
    return $res;
}
function getFaq($start,$end, $status){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="SELECT count(id) count FROM faq";
    $result = mysqli_query($con, $query);
    mysqli_query($con,"set names 'utf8'");
    if ($result->num_rows == 0) {
        $res["status"]="error";
        $res["result"] =-1;       
    } else {  
        $row = $result->fetch_assoc();
        $res["count"]=$row["count"];
        $query="SELECT * FROM faq";
        if($status!=null){
            $query.=" and status=$status";
        }
        $query.=" ORDER BY timestamp DESC LIMIT $start, $end";
        $result = mysqli_query($con, $query);
        $arr=[];
        while($row=$result->fetch_assoc()){
            array_push($arr,$row);
        }
        if ($result->num_rows == 0) {
            $res["status"]="error";
            $res["result"] =-2;
        }else{  
            $res["status"]="success";
            $res["result"]=$arr;
        }
    }   
    mysqli_close($con);   
    return $res;
}

function getMessages($start,$limit,$user){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="SELECT count(id) count FROM messages";
    $result = mysqli_query($con, $query);
    mysqli_query($con,"set names 'utf8'");
    if ($result->num_rows == 0) {
        $res["status"]="error";
        $res["result"] =-1;       
    } else {  
        $row = $result->fetch_assoc();
        $res["count"]=$row["count"];
        $query="SELECT m.*, u.fullname, u.surname FROM (SELECT * from messages order by timestamp desc) m, users u WHERE u.PObox=m.user GROUP BY m.user LIMIT $start,$limit ";
        $result = mysqli_query($con, $query);
        $arr=[];
        while($row=$result->fetch_assoc()){
            array_push($arr,$row);
        }
        if ($result->num_rows == 0) {
            $res["status"]="error";
            $res["result"] =-2;
        }else{  
            $res["status"]="success";
            $res["result"]=$arr;
        }
    }   
    mysqli_close($con);   
    return $res;
}

function getMessage($start,$limit,$user_id){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="SELECT count(id) count FROM messages";
    $result = mysqli_query($con, $query);
    mysqli_query($con,"set names 'utf8'");
    if ($result->num_rows == 0) {
        $res["status"]="error";
        $res["result"] =-1;       
    } else {  
        $row = $result->fetch_assoc();
        $res["count"]=$row["count"];
        $query="SELECT m.*, u.fullname, u.surname FROM messages m, users u ";
        
        $query.=" WHERE m.user='$user_id' and u.PObox=m.user  ORDER BY timestamp DESC LIMIT $start,$limit ";
        $result = mysqli_query($con, $query);
        $arr=[];
        while($row=$result->fetch_assoc()){
            array_push($arr,$row);
        }
        if ($result->num_rows == 0) {
            $res["status"]="error";
            $res["result"] =-2;
        }else{  
            $res["status"]="success";
            $res["result"]=$arr;
        }
    }   
    mysqli_close($con);   
    return $res;
}

function makeSeen($id){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="SELECT id FROM messages WHERE timestamp=(SELECT max(timestamp) from messages WHERE user='$id')";
    $result = mysqli_query($con, $query);
    $msg_id=$result->fetch_object()->id;
    $query="UPDATE messages set user2read=1 WHERE id=$msg_id";
    $result = mysqli_query($con, $query);
    if ((mysqli_affected_rows($con) == 0)|| (mysqli_affected_rows($con) == -1)) {
        $res=-1;       
    } else {
        $res=1;
    }
    mysqli_close($con);   
    return $res;
}

function sendMessage($id,$message){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="INSERT INTO messages(user1, user2, message, user) VALUES('system','$id', '$message','$id')";
    $result = mysqli_query($con, $query);
    if ((mysqli_affected_rows($con) == 0)|| (mysqli_affected_rows($con) == -1)) {
        $res["status"]="error";       
    } else {
        $res["status"]="success";
    }
    mysqli_close($con);   
    return $res;
}

function getCountryInfo($id){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="SELECT * FROM country_info WHERE country_id=$id";
    mysqli_query($con,"set names 'utf8'");
    $result = mysqli_query($con, $query);
    if ($result->num_rows == 0) {        
        $res=-1;       
    } else {
        $res=$result->fetch_assoc();
    }
    mysqli_close($con);   
    return $res;
}

function editCountryInfo($country_id,$company,$contact_name,$address1,$state,$city,$zip,$phone,$attention,$reminder){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="UPDATE country_info SET company_name='$company', address_1='$address1', city='$city', zip='$zip',phone='$phone',state='$state', contact_name='$contact_name', warning='".mysqli_real_escape_string($con,$attention)."', reminder='".mysqli_real_escape_string($con,$reminder)."'  WHERE country_id=$country_id";
    mysqli_query($con,"set names 'utf8'");
    $result = mysqli_query($con, $query);
    if ((mysqli_affected_rows($con) == 0)|| (mysqli_affected_rows($con) == -1)) {
        $res=-1;       
    } else {
        $res=1;
    }
    mysqli_close($con);   
    return $res;
}

function getPriceInfo($id){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);  
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="SELECT * FROM prices WHERE country_id=$id";
    mysqli_query($con,"set names 'utf8'");
    $res=[];
    $result = mysqli_query($con, $query);
    while($row=$result->fetch_assoc()){
       $arr["id"]=$row["id"];
       $arr["value_az"]=$row["value_az"];
       $arr["category_az"]=$row["category_az"];  
       $arr["value_en"]=$row["value_en"];
       $arr["category_en"]=$row["category_en"];  
       $arr["value_ru"]=$row["value_ru"];
       $arr["category_ru"]=$row["category_ru"];       
       array_push($res,$arr);
   }
   mysqli_close($con);   
   return $res;
}

function editPriceInfo($price_table, $country_id){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $res="";
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $country_id=$price_table["country_id"];
    array_splice($price_table, 0,1);
    $query="DELETE FROM prices WHERE country_id=$country_id";
    mysqli_query($con,"set names 'utf8'");
    $result = mysqli_query($con, $query);
    for($i=0;$i<sizeof($price_table)/6;$i++){
        $query="INSERT INTO prices(category_az,category_ru,category_en,value_az,value_ru,value_en,country_id) 
        VALUES('".$price_table["category_az_$i"]."','".$price_table["category_ru_$i"]."','".$price_table["category_en_$i"].
        "','".$price_table["value_az_$i"]."','".$price_table["value_ru_$i"]."','".$price_table["value_en_$i"]."',".$country_id.")";  
        $result = mysqli_query($con, $query);
        if ((mysqli_affected_rows($con) == 0)|| (mysqli_affected_rows($con) == -1)) {
           $res.="<div class='text-danger'>Row number ".($i+1)." wasn't added</span></br>";
       }else{
           $res.="<div class='text-success'>Row number ".($i+1)." was added</span></br>";
       }
   }
   mysqli_close($con);  
   return $res;
}

function getTracking($AwbNum){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $res=[];
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="SELECT * FROM tracking WHERE AwbNum=$AwbNum";
    mysqli_query($con,"set names 'utf8'");
    $result = mysqli_query($con, $query);
    while($row=$result->fetch_assoc()){
       $arr["id"]=$row["id"];
       $arr["AwbNum"]=$row["AwbNum"]; 
       $arr["date"]=$row["date"]; 
       $res[$row["status"]]=$arr;
   }
   mysqli_close($con);  
   return $res;
}

function addTracking($trackInfo){
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $res="";
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    mysqli_query($con,"set names 'utf8'");
    $AwbNum=$trackInfo["order_num"];

    if($trackInfo["wait_id"]!=null){
        if($trackInfo["wait_date"]!=null){
            $date="STR_TO_DATE('".$trackInfo["wait_date"]."','%m/%d/%Y')";
        }else{
            $date="NULL";
        }
        $query="UPDATE tracking SET `date`=$date WHERE id=".$trackInfo["wait_id"];
        $result = mysqli_query($con, $query);
    }elseif($trackInfo["wait_date"]!=null){
        $query="INSERT INTO tracking(`date`,`status`,`AwbNum`) VALUES(STR_TO_DATE('".$trackInfo["wait_date"]."','%m/%d/%Y'),13,'$AwbNum')";
        $result = mysqli_query($con, $query);
    }
    
    if($trackInfo["ban_id"]!=null){ 
        if($trackInfo["ban_date"]!=null){
            $date="STR_TO_DATE('".$trackInfo["ban_date"]."','%m/%d/%Y')";
        }else{
            $date="NULL";
        }
        $query="UPDATE tracking SET `date`=$date WHERE id=".$trackInfo["ban_id"];
        $result = mysqli_query($con, $query);
    }elseif($trackInfo["ban_date"]!=null){
        $query="INSERT INTO tracking(`date`,`status`,`AwbNum`) VALUES(STR_TO_DATE('".$trackInfo["ban_date"]."','%m/%d/%Y'),14,'$AwbNum')";
        $result = mysqli_query($con, $query);
    }

    if($trackInfo["customs_id"]!=null){
        if($trackInfo["customs_date"]!=null){
            $date="STR_TO_DATE('".$trackInfo["customs_date"]."','%m/%d/%Y')";
        }else{
            $date="NULL";
        }
        $query="UPDATE tracking SET `date`=$date WHERE id=".$trackInfo["customs_id"];
        $result = mysqli_query($con, $query);
    }elseif($trackInfo["customs_date"]!=null){
        $query="INSERT INTO tracking(`date`,`status`,`AwbNum`) VALUES(STR_TO_DATE('".$trackInfo["customs_date"]."','%m/%d/%Y'),10,'$AwbNum')";
        $result = mysqli_query($con, $query);
    }

    if($trackInfo["baki_id"]!=null){
        if($trackInfo["baki_date"]!=null){
            $date="STR_TO_DATE('".$trackInfo["baki_date"]."','%m/%d/%Y')";
        }else{
            $date="NULL";
        }
        $query="UPDATE tracking SET `date`=$date WHERE id=".$trackInfo["baki_id"];
        $result = mysqli_query($con, $query);
    }elseif($trackInfo["baki_date"]!=null){
        $query="INSERT INTO tracking(`date`,`status`,`AwbNum`) VALUES(STR_TO_DATE('".$trackInfo["baki_date"]."','%m/%d/%Y'),11,'$AwbNum')";
        $result = mysqli_query($con, $query);
    }

    if($trackInfo["delivery_id"]!=null){
        if($trackInfo["delivery_date"]!=null){
            $date="STR_TO_DATE('".$trackInfo["delivery_date"]."','%m/%d/%Y')";
        }else{
            $date="NULL";
        }
        $query="UPDATE tracking SET `date`=$date WHERE id=".$trackInfo["delivery_id"];
        $result = mysqli_query($con, $query);
    }elseif($trackInfo["delivery_date"]!=null){
        $query="INSERT INTO tracking(`date`,`status`,`AwbNum`) VALUES(STR_TO_DATE('".$trackInfo["delivery_date"]."','%m/%d/%Y'),12,'$AwbNum')";
        $result = mysqli_query($con, $query);
    }

    if($trackInfo["courier_id"]!=null){
        if($trackInfo["courier_date"]!=null){
            $date="STR_TO_DATE('".$trackInfo["courier_date"]."','%m/%d/%Y')";
        }else{
            $date="NULL";
        }
        $query="UPDATE tracking SET `date`=$date WHERE id=".$trackInfo["courier_id"];
        $result = mysqli_query($con, $query);
    }elseif($trackInfo["courier_date"]!=null){
        $query="INSERT INTO tracking(`date`,`status`,`AwbNum`) VALUES(STR_TO_DATE('".$trackInfo["courier_date"]."','%m/%d/%Y'),15,'$AwbNum')";
        $result = mysqli_query($con, $query);
    }

    if($trackInfo["country_id"]!=null){
        if($trackInfo["country_date"]!=null){
            $date="STR_TO_DATE('".$trackInfo["country_date"]."','%m/%d/%Y')";
        }else{
            $date="NULL";
        }
        if($trackInfo["status_filter"]!=""){
         $query="UPDATE tracking SET `date`=$date, status=".$trackInfo["status_filter"]." WHERE id=".$trackInfo["country_id"];
         $result = mysqli_query($con, $query);
     }
 }elseif($trackInfo["country_date"]!=null){
    $query="INSERT INTO tracking(`date`,`status`,`AwbNum`) VALUES(STR_TO_DATE('".$trackInfo["country_date"]."','%m/%d/%Y'),".$trackInfo["status_filter"].",'$AwbNum')";
    $result = mysqli_query($con, $query);
}

mysqli_close($con);  
return $res;
}

function array2csv()
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $res=[];
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query="SELECT * FROM users";
    mysqli_query($con,"set names 'utf8'");
    $result = mysqli_query($con, $query);
    while($row=$result->fetch_assoc()){
        $arr[] = $row; // Inside while loop
    }
    mysqli_close($con);  

    if (count($arr) == 0) {
        return '';
    }
    ob_start();
    $df = fopen("php://output", 'w');
    fputcsv($df, array_keys(reset($arr)));
    foreach ($arr as $row) {
        fputcsv($df, $row);
    }
    // reset the file pointer to the start of the file
    fseek($df, 0);
    // tell the browser it's going to be a csv file
    header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="userList.csv";');
    // make php send the generated csv lines to the browser
    fpassthru($df);
    fclose($df);
}


?>