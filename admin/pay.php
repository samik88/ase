<?php
include("admin_functions.php");
header('Content-type: application/json');

$result=payDelivery($_POST['AwbNum']);
if($result==-1){
	$response_array['status'] = 'error'; 
    $response_array['message'] = "<div class='text-danger'>Error occur</div>";
}else{
	$response_array['status'] = 'success'; 
    $response_array['message'] = "<span class='text-success'>Price successufuly added</div>";
}
echo json_encode($response_array);
?>