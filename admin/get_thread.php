<?php
include("admin_functions.php");
header('Content-type: application/json');
$result=getMessage($_POST["start"],$_POST["limit"],$_POST["id"]);
echo json_encode($result);
?>