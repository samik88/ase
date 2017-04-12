<?php
include("admin_functions.php");
header('Content-type: application/json');
$result=doneRequest($_POST);
echo json_encode($result);
?>
