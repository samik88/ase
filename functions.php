<?php 

$ini_array     = parse_ini_file("conf.ini");
$UrlCustomer   = $ini_array['UrlCustomer'];
$UrlTrack      = $ini_array['UrlTracking'];
$AccountNumber = $ini_array['AccountNumber'];
$Username      = $ini_array['Username'];
$Password      = $ini_array['Password'];
$SecurityKey   = $ini_array['SecurityKey'];
$AuthorizeCode = $ini_array['AuthorizeCode'];

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
        
        if (!$xmldata) {
            $errors = libxml_get_errors();
            //print_r($errors);
            libxml_clear_errors();
            $errors[] = "error";
            return $errors;
        } else {
            return $xmldata;
        }
    } catch (Exception $e) {
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
    $res = curlRequest($xmlRequest, WS_CUSTOMER_URL);
    if ($res->Error->Code!=null) {
        $result["status"]="-1";
        $result["message"]= (string)$res->Error->Code;
    } else {
        $result["status"]="1";
        $result["message"]= (string)$res->Customer->AccountNumber;
    }
    return $result;
}


function createUserLocally($pin, $password, $company, $fullname, $surname, $address, $city, $phone, $email, $activation, $friend_reference, $reference)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
   
    $query = "INSERT INTO `users` (`pin`,`password`,`email`,`fullname`, `surname`,`company`,
        `address`,  `city`,`phone`,`activation`,`register_date`, `friend_reference`) VALUES ('" . $pin . "','" . md5($password) . "','" . $email . "','" . $fullname . "','" . $surname . "','" . $company . "','" . $address . "',
       '" . $city . "', '" . $phone . "','" . $activation . "',now(),'".$friend_reference."')";
    
    mysqli_query($con, $query);

    $inserted_id = mysqli_insert_id($con);

    $res = mysqli_affected_rows($con);

    if ($reference!="") {
        $query_reference_id= "select id from  `users` where friend_reference='" . $reference . "'";
    
        $result_reference_id = mysqli_query($con, $query_reference_id);

        $row = mysqli_fetch_array($result_reference_id);
         
        $reference_id = $row[0];

        $query_friend = "INSERT INTO `friends` VALUES (NULL,".$inserted_id.",".$reference_id.")";

        mysqli_query($con, $query_friend);
    }
    
    //TODO call log()
    
    mysqli_close($con);
    
    return $res;
}

function registerUser($user_info)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $fullname = $user_info['firstname'];
    $surname  = $user_info['surname'];
    $password = $user_info['pass1'];
    $company  = $user_info['company'];
    $passport = $user_info['passport'];
    $address  = $user_info['address'];
    $city     = $user_info['city'];
    $prefix   = $user_info['prefix'];
    $phone    = $user_info['phone'];
    $email    = $user_info['email'];


    if (checkUser($user_info["email"])==1) {
        if ($company=="") {
            $company="No company";
        }
        $POboxRes = createCustomer($company, $fullname." ".$surname, $address, $city, $prefix.$phone, $email);
        if ($POboxRes["status"]==-1) {
            $res=$POboxRes["message"];
        } else {
            $PObox=$POboxRes["message"];
            $friend_reference = md5(uniqid(rand(), true));
            $query = "INSERT INTO `users` (`PObox`,`pin`,`password`,`email`,`fullname`, `surname`,`company`,
                `address`, `city`,`phone`,`register_date`,`friend_reference`) VALUES ('".$PObox."','" . $passport . "','" . md5($password) . "','" .
                $email . "','" . $fullname . "','" . $surname . "','" . $company . "','" . $address . "','" . $city . "', '" .
                $prefix.$phone . "',now(),'".$friend_reference."')";
            $result = mysqli_query($con, $query);
            if ((mysqli_affected_rows($con) == 0)||(mysqli_affected_rows($con) == -1)) {
                $res = -2;
            } else {
                $res=1;
            }
        }
    } else {
        $res=-1;
    }
    mysqli_close($con);
    return $res;
}

function checkUser($email)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $query_verify_email = "SELECT * FROM users  WHERE email ='" . $email . "'";
    
    $result_verify_email = mysqli_query($con, $query_verify_email);
    
    
    if (mysqli_num_rows($result_verify_email) == 0) {
        $res = 1;
    } else {
        $res = 0;
    }
    mysqli_close($con);
    return $res;
}

function login($username, $password)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    echo "login1";
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        return "ere";
        // exit();
    }
    echo "login after";
    $query = "select * from  `users` where email='" . $username . "' and password='" . md5($password) . "' and activation is NULL and PObox is not NULL";
    
    $result = mysqli_query($con, $query);
    
    if ($result->num_rows == 0) {
        $res[0] = -1;
        $res[1] = "Your username or password is wrong";
    } else {
        while ($row = $result->fetch_assoc()) {
            $res[0] = $row['pin'];
            $res[1] = $row['fullname'] . " " . $row['surname'];
            $res[2] = $row['PObox'];
            $res[3] = $row['email'];
        }
        
        $q = "update `users` set last_login_date=now() where email='" . $username . "' and password='" . md5($password) ."'";

        mysqli_query($con, $q);
    }
    mysqli_close($con);
    
    return $res;
}

function activateUser($email, $key)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
        
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
        
    $query_get_customer = "SELECT * FROM users where email='$email' and activation='$key'";
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
    //$accountNumber=createCustomer('Unibank','Samira Allahverdiyeva','Rahid Behbudov 55','Baku', '0777447704', 'samira.allahverdiyeva@aiesc.net');
      
       if ($accountNumber!='') {
           $query_activate_account  = "UPDATE users SET activation=NULL, PObox='$accountNumber' , activation_date=now() WHERE email ='$email' AND activation='$key' LIMIT 1";
           $result_activate_account = mysqli_query($con, $query_activate_account);
           if (mysqli_affected_rows($con) == 1) {
               return 1;
           } else {
               return 0;
           }
       } else {
           return 0;
       }
    } else {
        return 0;
    }
    mysqli_close($con);
}

function updateUser($firstname, $lastname, $phone, $company, $address, $passport, $accountNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    
    $query_update_user_info = "UPDATE  users  SET  fullname ='$firstname',  surname = '$lastname',  phone = '$phone',   company = '$company', address = '$address', pin = '$passport' WHERE PObox = '$accountNumber' LIMIT 1";

    $result_change_pass = mysqli_query($con, $query_update_user_info);
    if (mysqli_affected_rows($con) == 1) {
        mysqli_close($con);
        return 1;
    } else {
        mysqli_close($con);
        return 0;
    }
}

function adminLogin($username, $password)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $query = "select * from  `operators` where email='" . $username . "' and pass='" . md5($password) . "' ";
    
    $result = mysqli_query($con, $query);
    
    if ($result->num_rows == 0) {
        $res[0] = -1;
        $res[1] = "Your username or password is wrong";
    } else {
        while ($row = $result->fetch_assoc()) {
            $res[0] = $row['email'];
            $res[1] = $row['username'];
        }
        
        $query = "update  `operators` set last_log_date=now() where email='" . $username . "' and pass='" . md5($password) . "'";
        
        $result = mysqli_query($con, $query);
    }
    mysqli_close($con);
    
    return $res;
}


function userList($email)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $query = "select * from `users` where email='$email'";
    
    $result = mysqli_query($con, $query);
    
    if ($result->num_rows == 0) {
        $res[0] = -1;
        $res[1] = "Error occured";
        mysqli_close($con);
        return $res;
    } else {
        mysqli_close($con);
        return $result;
    }
    return $res;
}

function packageByUser($accNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    mysqli_query($con, "set names 'utf8'");
    //select p.AwbNum, u.fullname, u.surname, u.PObox,t.trans_az country, t1.trans_az stat, s.label, p.weight,p.weightType, p.width, p.height, p.length, p.customValue, p.currency, p.content, p.status, p.price, p.payment_status from `packages` p, `translation` t, `users` u, `statuses` s, `translation` t1 where u.PObox=p.accountNumber and t.id=p.country_id and s.id=p.status and t1.id=s.translation_id
    $query = "select p.AwbNum, t.trans_az country,t1.trans_az stat, s.label, p.weight,p.weightType, p.width, p.height, p.length, p.customValue, p.currency, p.content, p.status from `packages` p, `translation` t,`statuses` s,`translation` t1 where p.accountNumber='$accNumber' and t.id=p.country_id  and t1.id=s.translation_id and 
s.id=p.status order by insert_date desc";
    $result = mysqli_query($con, $query);
    
    if ($result->num_rows == 0) {
        $res = -1;
    } else {
        $i=1;
        while ($row = $result->fetch_assoc()) {
            $res.='<tr>';
            $res .="<td>".$i."</td>";
            $res .= "<td>".$row['AwbNum']."</td>";
            $res .= "<td>".$row['country']."</td>";
            $res.="<td>".$row['weight']." ".$row['weightType']."</td>";
            $res.="<td>".$row['width']."</td>";
            $res.="<td>".$row['height']."</td>";
            $res.="<td>".$row['length']."</td>";
            $res.="<td>".$row['customValue']." ".$row['currency']."</td>";
            $res .="<td>".$row['content']."</td>";
            $res.="<td  id='".$row['AwbNum']."_status' class=\"center\"><span id='".$row['AwbNum']."_span' class='label ";
            $res.=" label-".$row['label']."'>".$row['stat']."</span>";
            $res.="</td>";
            $res.="<td class=\"center\"><!--button class=\"btn-primary md-trigger  btn  waves-light\"><a style=\"color:white\" href=\"track.php?orderNum=".$row['AwbNum']."\">Track</a></button--></td>";
          
            $res.=' </tr>';
            $i++;
        }
    }
    mysqli_close($con);
    return $res;
}

function changePass($email, $key, $pass)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $query_change_pass = "UPDATE users SET  pass_key=NULL, password= md5('$pass') WHERE(email ='$email' AND pass_key='$key')LIMIT 1";
    
    $result_change_pass = mysqli_query($con, $query_change_pass);
    if (mysqli_affected_rows($con) == 1) {
        mysqli_close($con);
        return 1;
    } else {
        mysqli_close($con);
        return 0;
    }
}


function changePassProfile($email, $old_pass, $new_pass, $accountNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }


    $query_check_old_pass="select * from users where email ='$email' and PObox='$accountNumber'  and password='".md5($old_pass)."'";
    $result_check_old_pass = mysqli_query($con, $query_check_old_pass);
    if ($result_check_old_pass->num_rows != 0) {
        $query_change_pass = "UPDATE users SET  password= md5('$new_pass') WHERE(email ='$email' and PObox='$accountNumber') LIMIT 1";
    
        $result_change_pass = mysqli_query($con, $query_change_pass);
        if (mysqli_affected_rows($con) == 1) {
            mysqli_close($con);
            return 1;
        } else {
            mysqli_close($con);
            return 0;
        }
    } else {
        return 0;
    }
}


function sendPassLink($email)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $key = md5(uniqid(rand(), true));
    
    $query_check_user = "select * from users where email='$email'";
    
    $result_check_user = mysqli_query($con, $query_check_user);
    
    
    
    if (mysqli_num_rows($result_check_user) == 0) {
        mysqli_close($con);
        $res[0] = 0;
        $res[1] = "Такой клиент не зарегестрирован";
        return $res;
    } else {
        $query_send_pass = "UPDATE users SET  pass_key='$key' WHERE(email ='$email')LIMIT 1";
        
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




function insertPackage($sql, $country_id)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    
    $result_change_pass = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        $query_tracking="Update package_tracking set maxnum=maxnum+1 where country_id=".$country_id;
        mysqli_query($con, $query_tracking);
        mysqli_close($con);
        return 1;
    } else {
        mysqli_close($con);
        
        return 0;
    }
}




function clientList()
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    $query = "select * from users";
    $result = mysqli_query($con, $query);
    echo "<table>";
    echo "<tr style='border-bottom:1px solid'>";
    echo "<td style='min-width:30px'>id</td>";
    echo "<td>name</td>";
    echo "<td>surname</td>";
    echo "<td>passport</td>";
    echo "<td style='min-width:100px'>PObox</td>";
    echo "<td>email</td>";
    echo "<td style='min-width:100px'>phone</td>";
    echo "<td>address</td>";
    echo "<td>registration date</td>";
    echo "</tr>";

    $i=0;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$row['fullname']."</td>";
        echo "<td>".$row['surname']."</td>";
        echo "<td>".$row['pin']."</td>";
        echo "<td>".$row['PObox']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['register_date']."</td>";
        echo "</tr>";
        $i++;
    }
    echo "</table>";
    mysqli_close($con);
}


function ordersOnhold()
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    $query = "select * from packages where status=\"init\"";
    $result = mysqli_query($con, $query);
    echo "<table>";
    echo "<tr style='border-bottom:1px solid'>";
    echo "<td style='min-width:30px'>id</td>";
    echo "<td style='min-width:130px'>accountNumber</td>";
    echo "<td style='min-width:50px'>weight</td>";
    echo "<td style='min-width:50px'>width</td>";
    echo "<td style='min-width:50px'>length</td>";
    echo "<td style='min-width:50px'>height</td>";
    echo "<td style='min-width:90px'>custom value</td>";
    echo "<td style='min-width:130px'>content</td>";
    echo "<td style='min-width:120px'>AWBnumber</td>";
    echo "<td>insert date</td>";
    echo "</tr>";

    $i=0;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$row['accountNumber']."</td>";
        echo "<td>".$row['weight']."</td>";
        echo "<td>".$row['width']."</td>";
        echo "<td>".$row['length']."</td>";
        echo "<td>".$row['height']."</td>";
        echo "<td>".$row['customValue']."</td>";
        echo "<td>".$row['content']."</td>";
        echo "<td>".$row['AwbNum']."</td>";
        echo "<td>".$row['insert_date']."</td>";
        echo "</tr>";
        $i++;
    }
    echo "</table>";
    mysqli_close($con);
}



function bulkTracking()
{
}

function trackByNumber($Awbnum)
{
    /*if(status!='del'){

    }
    */
}

function addBonus($user_id, $bonus)
{
}

function getDashboardInfo($accountNumber)
{
    $bonuses = getBonuses($accountNumber);
    $orders = getActiveOrders($accountNumber);
    $amount_to_pay = getAmountToPay($accountNumber);
    $friends = getFriends($accountNumber);
    $unread_messages = getUnreadMessageCount($accountNumber);
    //$updates = getUpdatesCount();*/
    $news = getNewsCount($accountNumber);
    
    $main_info["bonuses"] = $bonuses["points"];
    $main_info["friends"] = $friends["friends_count"];
    $main_info["active_orders"] = $orders["active_orders"];
    $main_info["amount_to_pay"] = $amount_to_pay["amount_to_pay"];
    
    $main_info["unread_messages"] = $unread_messages["count"];
   // $main_info["updates"] = $updates["count"];
    $main_info["news"] = $news["count"];
    
    mysqli_close($con);
    return $main_info;
}


function getBonuses($accountNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $query = "select sum(points) points from bonuses where user_id='".$accountNumber."' and used = 0 and deadline > now()";
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();

    return $row;
}

function getFriends($accountNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $query = "select count(*) friends_count from friends where referenced_user_id='".$accountNumber."'";
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();
    return $row;
}

function getActiveOrders($accountNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $query = "select count(*) active_orders from packages p , onhold_orders o where p.accountNumber='".$accountNumber."' and p.AwbNum = o.order_id";
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();
    return $row;
}

function getAmountToPay($accountNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $query = "select sum(price) amount_to_pay from packages p, onhold_orders o where p.accountNumber='".$accountNumber."' and p.id = o.order_id";
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();
    return $row;
}

function getUnreadMessageCount($accountNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $query = "select count(*) count from messages m where m.user2='$accountNumber' and m.user2read=0";
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();
    return $row;
}

function getUpdatesCount()
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $query = "select count(*) count from user_updates u where u.user_id='".$accountNumber."' and u.user_read=0";
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();
    return $row;
}

function getNewsCount($user_id)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    //TODO write query
    $query="select count(*) count from user_news where user_id='$user_id' and status=0";
    echo $query;
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();
    return $row;
}

function getBonusesInfo($accountNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $query = "select * from bonuses where user_id='$accountNumber'";
    $result = mysqli_query($con, $query);
    $i=0;

    if ($result->num_rows == 0) {
        $res = -1;
    } else {
        $res = "";
        while ($row = $result->fetch_assoc()) {
            $res .= "<tr>";
            $res .=  "<td>".$i."</td>";
            $res .=  "<td>".$row['points']."</td>";
            $res .=  "<td>".$row['date']."</td>";
            $res .=  "<td>".$row['deadline']."</td>";
            $res .=  "<td>".$row['used']."</td>";
            $res .=  "</tr>";
            $i++;
        }
    }
    mysqli_close($con);
    return $res;
}

function getFriendsInfo($accountNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $query = "select u.fullname, u.surname, u.email from `friends` f, `users` u where u.PObox=f.user_id and f.referenced_user_id='$accountNumber' ";
    $result = mysqli_query($con, $query);
    $i=0;
    if ($result->num_rows == 0) {
        $res = -1;
    } else {
        $res= "";
        while ($row = $result->fetch_assoc()) {
            $res.= "<tr>";
            $res.= "<td>".$i."</td>";
            $res.= "<td>".$row['fullname']."</td>";
            $res.= "<td>".$row['surname']."</td>";
            $res.= "<td>".$row['email']."</td>";
            $res.= "</tr>";
            $i++;
        }
    }
    mysqli_close($con);
    return $res;
}

function getOrdersInfo($accountNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $query = "select * from packages where accountNumber='".$accountNumber."'";
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();
    mysqli_close($con);
    return $row;
}

function sendForm($topic, $country_id, $message, $accountNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (get_magic_quotes_gpc()) {
        $topic = stripslashes($topic);
        $country_id = stripslashes($country_id);
        $message = stripslashes($message);
    }
    $topic = mysqli_real_escape_string($con, $topic);
    $country_id = mysqli_real_escape_string($con, $country_id);
    $message = mysqli_real_escape_string($con, nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8'))) ;
   
    $query = "insert into `messages`(title, user1, user2, message, country, user1read, user2read, timestamp) VALUES('$topic','$accountNumber','system', '$message', ".$country_id.", 2,0, now())";
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        return false;
    }
}

function addDeclaration($estore, $content, $country_id, $quantity, $price, $accountNumber, $hash)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $query = "insert into `declarations`(estore, commodity, quantity, price, country_id, accountNumber, hash) VALUES('$estore', '$content', $quantity, $price, $country_id, '$accountNumber', '$hash')";
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        return false;
    }
}

function addBuyRequest($link, $phone, $country_id, $details, $accountNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    $query = "insert  into `buy_request`(link, phone, country_id, details, accountNumber) VALUES('$link','$phone',$country_id, '$details', '$accountNumber')";
    print_r($query);
    if (mysqli_query($con, $query)) {
        return true;
    } else {
        return false;
    }
}

function getMessages($accountNumber)
{
}


function readMessage($message_id)
{
}

function getUpdates()
{
}

function getNews()
{
}



function getNotifications()
{
    //TODO
    /*getUnreadMessages()
    getUpdates()
    getNews()
    */
}

function package_by_user($accountNumber)
{
}
