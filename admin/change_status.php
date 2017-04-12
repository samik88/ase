<?php
include("admin_functions.php");
header('Content-type: application/json');
$result=changeStatus($_POST);
echo json_encode($result);
?>

