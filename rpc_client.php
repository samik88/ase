<?php
include("functions.php");

//xmltest();

$request = "<?xml version='1.0'?>
    <LiveCourier action='Request' version='1.0'>
    <Requestor>
        <Username>aseExpress</Username>
        <Password>9856ase58</Password>
        <SecurityKey>396351965e0adde658e1ef0f7fb51a18</SecurityKey>
        <AuthorizeCode>102</AuthorizeCode>
        <AccountNumber>12345</AccountNumber>
    </Requestor>
    <Shipments>
        <Shipment>
            <Details>
                <Date>2015-05-06</Date>
                <ServiceType>D</ServiceType>
                <ServiceCode>4e1c8b37c8873</ServiceCode>
                <AwbNum>test123</AwbNum>

                <CustomerReference>CusRef</CustomerReference>
                <ShipmentReference>shipRef</ShipmentReference>
            </Details>
            <Billing>
                <ChargesBillToAccountNumber>10005</ChargesBillToAccountNumber>
                <ChargesBillToType>S</ChargesBillToType>
                <DutiesBillToAccountNumber>10005</DutiesBillToAccountNumber>
                <DutiesBillToType>S</DutiesBillToType>
            </Billing>
            <Shipper>
                <CompanyName>SenderCompany</CompanyName>
                <ContactName>ContactName</ContactName>
                <Address1>Address1</Address1>
                <Address2>Address2</Address2>
                <City>City</City>
                <StateProvince>NY</StateProvince>
                <ZipPostal>10013</ZipPostal>
                <Country>US</Country>
                <Phone>2123365552</Phone>
                <Email>shipper@shipper.com</Email>
                <Reference>SRef</Reference>
                <Accnum>ASE0000</Accnum>
            </Shipper>
            <Receiver>
                <CompanyName>ReceiverCompany</CompanyName>
                <ContactName>RcpContact</ContactName>
                <Address1>RAddress1</Address1>
                <Address2>RAddress2</Address2>
                <City>Rcity</City>
                <StateProvince>NY</StateProvince>
                <ZipPostal>11235</ZipPostal>
                <Country>US</Country>
                <Phone></Phone>
                <Email></Email>
                <Reference>RRef</Reference>
                <Accnum>ASE0000</Accnum>
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
</LiveCourier>";

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
