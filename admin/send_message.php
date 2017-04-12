<?php
include("admin_functions.php");
header('Content-type: application/json');
$result=sendMessage($_POST["id"],$_POST["message"]);
echo json_encode($result);
?>