<?php
include("admin_functions.php");
header('Content-type: application/json');
$result=editNews($_POST["id"], $_POST["title"],$_POST["news"], $_POST["status"]);

if($result==-1){  
    $response_array['status'] = 'error'; 
    $response_array['message'] = "<div class='text-danger'>error occur</div>";
}else{
  $response_array['status'] = 'success'; 
    $response_array['message'] = "<div class='text-success'>News edited</div>";
}

echo json_encode($response_array);
?>