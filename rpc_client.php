<?php
include("functions.php");

//xmltest();

$request = "<?xml version='1.0'?>

<LiveCourier action='Request' version='1.0'> 

<Requestor> 

<Username>demo_user</Username> 

<Password>demo_pass</Password> 

<SecurityKey>d7ebe7b1bca0c2e6bdb8d3d5f0921c6e</SecurityKey> 

<AuthorizeCode>114</AuthorizeCode> 

<AccountNumber>8000471</AccountNumber> 

</Requestor> 

<Shipments> 

<Shipment> 

<Details> 

<Date>2014-01-18</Date> 

<ServiceType>D</ServiceType>

<ServiceCode>4e1c8b37c8873</ServiceCode> 

<CustomerReference>Cus Ref</CustomerReference> 

<ShipmentReference>ship Ref</ShipmentReference> 

</Details> 

<Billing> 

<ChargesBillToAccountNumber>10005</ChargesBillToAccountNumber> 

<ChargesBillToType>S</ChargesBillToType> 

<DutiesBillToAccountNumber>10005</DutiesBillToAccountNumber> 

<DutiesBillToType>S</DutiesBillToType> 

</Billing> 

<Shipper> 

<CompanyName>Sender Company</CompanyName> 

<ContactName>Contact Name</ContactName> 

<Address1>Address 1</Address1> 

<Address2>Address 2</Address2> 

<City>City</City> 

<StateProvince>NY</StateProvince> 

<ZipPostal>10013</ZipPostal> 

<Country>US</Country> 

<Phone>212 336 5552</Phone> 

<Email>shipper@shipper.com</Email> 

<Reference>S Ref</Reference> 

</Shipper> 

<Receiver> 

<CompanyName>Receiver Company</CompanyName> 

<ContactName>Rcp Contact</ContactName> 

<Address1>R Address 1</Address1> 

<Address2>R Address 2</Address2> 

<City>Rcity</City> 

<StateProvince>NY</StateProvince> 

<ZipPostal>11235</ZipPostal> 

<Country>US</Country> 

<Phone></Phone> 

<Email></Email> 

<Reference>R Ref</Reference> 

</Receiver> 

<Packages> 

<NumberOfPackages>1</NumberOfPackages> 

<Package> 

<SequenceNumber>1</SequenceNumber> 

<PackageType>P</PackageType> 

<Weight>5</Weight> 

<WeightType>LB</WeightType> 

<Length>1</Length> 

<Width>2</Width> 

<Height>3</Height> 

<DimUnit>IN</DimUnit> 

<CustomsValue>8</CustomsValue> 

<Currency>USD</Currency> 

<Content>Samples</Content> 

</Package> 

</Packages> 

<LabelType>A4</LabelType>

<CommercialInvoice>T</CommercialInvoice>

</Shipment> 

</Shipments> 

</LiveCourier>
";

//insertPackage($request);
//xmltest();
$headers = array(
    "Content-type: text/xml;charset=\"utf-8\"",
    "Accept: text/xml",
    "Cache-Control: no-cache",
    "Pragma: no-cache");


$url = "http://my.aseshopping.com/shipment.php";  
// fake - obviosly!

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request); 
// what to post
curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);

print_r($result);

curl_close($ch);


?>
