<?php
include("admin_functions.php");
    /* add custom message */ 
header('Content-type: application/json');
$result=addPrice($_POST['AwbNum'],$_POST['price']);
if($result==-1){
    $response_array['status'] = 'error'; 
    $response_array['message'] = "<div class='text-danger'>error occur</div>";
}else{
	$response_array['status'] = 'success'; 
    $response_array['message'] = "<span class='text-success'>Price successufuly added</div>";
}

echo json_encode($response_array);
?>