<?php
include("admin_functions.php");
header('Content-type: application/json');
$result=removePackage($_POST);
echo json_encode($result);
?>