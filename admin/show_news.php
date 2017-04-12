<?php
include("admin_functions.php");
header('Content-type: application/json');
$result=getNews($start,$limit, $status);

if($result==-1){	
    $response_array['status'] = 'error'; 
    $response_array['message'] = "<div class='text-danger'>error occur</div>";
}else{
	$response_array['status'] = 'success'; 
    $response_array['message'] = "<div class='text-success'>News added</div>";
}

echo json_encode($response_array);
?>