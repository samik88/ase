<?php
include("admin_functions.php");
array_splice($_POST, 0,1);
header('Content-type: application/json');
$result=editPriceInfo($_POST);

echo json_encode($result);

?>