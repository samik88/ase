<?php


$ini_array     = parse_ini_file("conf.ini");
$Url           = $ini_array['UrlCustomer'];
$AccountNumber = $ini_array['AccountNumber'];
$Username      = $ini_array['Username'];
$Password      = $ini_array['Password'];
$SecurityKey   = $ini_array['SecurityKey'];
$AuthorizeCode = $ini_array['AuthorizeCode'];

DEFINE('WS_URL', $Url);

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

function curl_request($xmlRequest)
{
    global $header;
    
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, WS_URL);
        curl_setopt($ch, CURLOPT_POST, 1);
        
        // send xml request to a server
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequest);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $data = curl_exec($ch);
        
        curl_close($ch);
        
        print_r($data);
        
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


function create_customer($company, $fullname, $address, $city, $phone, $email)
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
    
    $res = curl_request($xmlRequest);
    
    print_r($res);
    $x = $res->Customer;
    
    $accountNumber = $x->AccountNumber;
    
    
    return $accountNumber;
    /*foreach ($errors as $error) {
    echo display_xml_error($error, $xml);
    }*/
    
}



function get_tracking()
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

<Track action='Track' version='1.0'>

<Shipment>

<TrackingNbr>12010</TrackingNbr>

</Shipment>

</Track>

</LiveCourier>";
    
    $res = curl_request($XmlRequest);
    
    
}

function create_user_locally($pin, $password, $company, $fullname, $surname, $address, $city, $phone, $email, $activation)
{
    
    
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $query = "INSERT INTO `users` (`pin`,`password`,`email`,`fullname`, `surname`,`company`,
        `address`,  `city`,`phone`,`activation`,`register_date`) VALUES ('" . $pin . "','" . md5($password) . "','" . $email . "','" . $fullname . "','" . $surname . "','" . $company . "','" . $address . "',
       '." . $city . "', '" . $phone . "','" . $activation . "',now())";
    
    mysqli_query($con, $query);
    
    $res = mysqli_affected_rows($con);
    
    //$query_log="INSERT INTO `logs`"
    
    mysqli_close($con);
    
    return $res;
    
}



function login($username, $password)
{
    
    
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $query = "select * from  `users` where email='" . $username . "' and password='" . md5($password) . "'";
    
    $result = mysqli_query($con, $query);
    
    if ($result->num_rows == 0) {
        $res[0] = -1;
        $res[1] = "Your username or password is wrong";
    } else {
        while ($row = $result->fetch_assoc()) {
            $res[0] = $row['pin'];
            $res[1] = $row['fullname'] . " " . $row['surname'];
            $res[2] = $row['PObox'];
        }
        
        
    }
    mysqli_close($con);
    
    return $res;
    
}
function check_user($Email)
{
    
    
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $query_verify_email = "SELECT * FROM users  WHERE email ='" . $Email . "'";
    
    $result_verify_email = mysqli_query($con, $query_verify_email);
    
    
    if (mysqli_num_rows($result_verify_email) == 0) {
        
        return 1;
    } else {
        return 0;
    }
    mysqli_close($con);
}

function activate_user($email, $key)
{
    
    echo $email;
    echo $key;
    //$accountNumber=create_customer('Unibank','Samira Allahverdiyeva','Rahid Behbudov 55','Baku', '0777447704', 's.allahverdiyeva@gmail.com');
    
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    
    $query_get_customer = "SELECT * FROM users where email='$email' and activation='$key'";
    
    $result_get_customer = mysqli_query($con, $query_get_customer);
    echo $query_get_customer;
    
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
    
    $accountNumber = create_customer($company, $name, $address, $city, $phone, $email);
    
    if ($accountNumber != 0) {
        $query_activate_account  = "UPDATE users SET activation=NULL, PObox='$accountNumber' , activation_date=now() WHERE(email ='$email' AND activation='$key')LIMIT 1";
        $result_activate_account = mysqli_query($con, $query_activate_account);
        
        if (mysqli_affected_rows($con) == 1) {
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
        
    }
    
    mysqli_close($con);
}


function admin_login($username, $password)
{
    
    
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $query = "select * from  `operators` where email='" . $username . "' and pass='" . md5($password) . "'";
    
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


function user_list()
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $query = "select * from `users`";
    
    $result = mysqli_query($con, $query);
    
    if ($result->num_rows == 0) {
        $res[0] = -1;
        $res[1] = "Error occured";
    } else {
        while ($row = $result->fetch_assoc()) {
            $res[0] = $row['email'];
            $res[1] = $row['fullname'];
            $res[2]=$row['surname'];
            $res[3]=$row['pin'];
            $res[4]=$row['company'];
            $res[5]=$row['address'];
            $res[6]=$row['phone'];
            $res[7]=$row['PObox'];
            $res[8]=$row['activation_date'];
            $res[9]=$row['register_date'];
            $res[10]=$row['last_login_date'];

        }
        
        
    }
    mysqli_close($con);
    
    return $res;
    
    w
}

function package_by_user($accNumber)
{
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $query = "select * from `packages` where accountNumber='$accNumber'";
    
    $result = mysqli_query($con, $query);
    
    if ($result->num_rows == 0) {
        $res[0] = -1;
        $res[1] = "Error occured";
    } else {
        while ($row = $result->fetch_assoc()) {
            $res[0] = $row['id'];
            $res[1] = $row['status'];
            $res[2]=$row['type'];
            $res[3]=$row['weight'];
            $res[4]=$row['length'];
            $res[5]=$row['height'];
            $res[6]=$row['dimUnit'];
            $res[7]=$row['customValue'];
            $res[8]=$row['currency'];
            $res[9]=$row['content'];
          

        }
        
        
    }
    mysqli_close($con);
    
    return $res;
    
    
}

function change_pass($email, $key, $pass)
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




function insertPackage($sql)
{
    
    
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    
    $result_change_pass = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        mysqli_close($con);
        
        return 1;
    } else {
        mysqli_close($con);
        
        return 0;
    }
    
    mysqli_close($con);
}


function user_lit()
{
    
    
    $con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    
    $query_change_pass = "select * from packages where id=4";
    
    $result_change_pass = mysqli_query($con, $query_change_pass);
    while ($row = $result_change_pass->fetch_assoc()) {
        
        print_r($row['packageXml']);
        
    }
    
    mysqli_close($con);
}


?>
