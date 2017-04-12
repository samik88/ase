<?php
include("functions.php");

$ini_array     = parse_ini_file("conf.ini");
$AccountNumber = $ini_array['AccountNumber'];
$Username      = $ini_array['Username'];
$Password      = $ini_array['Password'];
$SecurityKey   = $ini_array['SecurityKey'];
$AuthorizeCode = $ini_array['AuthorizeCode'];
DEFINE('WS_USERNAME', $Username);
DEFINE('WS_PASSWORD', $Password);
DEFINE('WS_SECURITY_KEY', $SecurityKey);
DEFINE('WS_AUTHCODE', $AuthorizeCode);
DEFINE('WS_ACCNUMBER', $AccountNumber);
$headers     = array(
    "Content-type: text/xml;charset=\"utf-8\"",
    "Accept: text/xml",
    "Cache-Control: no-cache",
    "Pragma: no-cache"
);
$rawData     = file_get_contents("php://input");
$xmlResponse = trim($rawData);
//print_r($xmlResponse);
//enable error reporting
libxml_use_internal_errors(true);
//parse the xml response string
$xmldata = simplexml_load_string($xmlResponse);

if (!$xmldata) {
    $errors = libxml_get_errors();
    libxml_clear_errors();
    
    print_r($errors);
    
} else {
   
    xmlParser($xmldata);
}


function xmlParser($xmlRequest)
{
    $requestor     = $xmlRequest->Requestor;
    $username      = $requestor->Username;
    $password      = $requestor->Password;
    $securityKey   = $requestor->SecurityKey;
    $authorizeCode = $requestor->AuthorizeCode;
    $accountNumber = $requestor->AccountNumber; //add to database
    
    
    if (($username == WS_USERNAME) && ($password == WS_PASSWORD) && ($securityKey == WS_SECURITY_KEY) && ($authorizeCode == WS_AUTHCODE)) {
        
        $shipments = $xmlRequest->Shipments;
        
        $shipment = $shipments->Shipment;
        foreach ($shipment as $sh) {
            $sql = "insert into packages values(0,'$accountNumber','init',";
            
            // add into packages table;
            $details  = $sh->Details;
            $billing  = $sh->Billing;
            $shipper  = $sh->Shipper;
            $receiver = $sh->Receiver;
            $packages = $sh->Packages;
            
            $date              = $details->Date;
            $serviceType       = $details->ServiceType;
            $serviceCode       = $details->ServiceCode;
            $customerReference = $details->CustomerReference;
            $dhipmentReference = $details->ShipmentReference;
            $AwbNum            = $details->AwbNum;
            
            $dhargesBillToAccountNumber = $billing->ChargesBillToAccountNumber;
            $dhargesBillToType          = $billing->ChargesBillToType;
            $dutiesBillToAccountNumber  = $billing->DutiesBillToAccountNumber;
            $dutiesBillToType           = $billing->DutiesBillToType;
            
            $companyName   = $shipper->CompanyName;
            $contactName   = $shipper->ContactName;
            $address1      = $shipper->Address1;
            $address2      = $shipper->Address2;
            $city          = $shipper->City;
            $stateProvince = $shipper->StateProvince;
            $zipPostal     = $shipper->ZipPostal;
            $country       = $shipper->Country;
            $phone         = $shipper->Phone;
            $email         = $shipper->Email;
            $reference     = $shipper->Reference;
            
            $companyName   = $receiver->CompanyName;
            $contactName   = $receiver->ContactName;
            $address1      = $receiver->Address1;
            $address2      = $receiver->Address2;
            $city          = $receiver->City;
            $stateProvince = $receiver->StateProvince;
            $zipPostal     = $receiver->ZipPostal;
            $country       = $receiver->Country;
            $phone         = $receiver->Phone;
            $email         = $receiver->Email;
            $reference     = $receiver->Reference;
            
            
            $nop     = $packages->NumberOfPackages;
            $package = $packages->Package;
            foreach ($package as $p) {
                $sequenceNumber = $p->SequenceNumber;
                
                $packageType = $p->PackageType;
                
                $weight = $p->Weight;
                
                $weightType = $p->WeightType;
                
                $length = $p->Length;
                
                $width = $p->Width;
                
                $height = $p->Height;
                
                $dimUnit = $p->DimUnit;
                
                $customsValue = $p->CustomsValue;
                
                $currency = $p->Currency;
                
                $content = $p->Content;
                
                
                $finalSql = $sql . "'$packageType',$weight,$length,$width,'$dimUnit',$customsValue,'$currency','$content','$AwbNum',now())";


                
                $r=insertPackage($finalSql);
                
            }
            $labelType = $sh->LabelType;
            
            $commercialInvoice = $sh->CommercialInvoice;
            
            
        }
    
        if($r==1){

        $date = new DateTime();
        $date=date_format('U');
        $res  = "<?xml version='1.0'?>
<LiveCourier action='Response' version='1.0' timestamp='" . $date . "' 
reference='CAEC0319'>
<Package action='Add' version='1.0'>
<Result>Success</Result>
</Package>
</LiveCourier>";

}else{
   $date = new DateTime();
   $date=date_format('U');
        $res  = "<?xml version='1.0'?>
<LiveCourier action='Response' version='1.0' timestamp='" . $date . "' 
reference='CAEC0319'>
<Package action='Add' version='1.0'>
<Result>Fault</Result>
</Package>
</LiveCourier>"; 
}
        // return $x;
        
    } else {
        $date = new DateTime();
        $date=date_format('U');
        $res  = "<?xml version='1.0'?>
<LiveCourier action='Response' version='1.0' timestamp='" . $date . "' 
reference='CAEC0319'>
<Package action='Add' version='1.0'>
<Result>Fault</Result>
</Package>
</LiveCourier>";
    }
    
    print_r(htmlentities($res));
}
?>

