<?php
include("functions.php");
header('Content-type: application/json');
$result=registerUser($_POST);
if($result==-2){	
    $response_array['status'] = 'error'; 
    $response_array['message'] = "<div class='text-danger'>Error occur</div>";
}else{
	if($result==-1){
       $response_array['status'] = 'error'; 
       $response_array['message'] = "<div class='text-danger'>This email already registered</div>";
	}else{
		$response_array['status'] = 'success'; 
    	$response_array['message'] = "<div class='text-success'>User added</div>";
	}
	
}

switch($result){
	case -1:
		$response_array['status'] = 'error'; 
    	$response_array['message'] = "<div class='text-danger'>This email already registered</div>";
		break;
	case -2:
		$response_array['status'] = 'error'; 
    	$response_array['message'] = "<div class='text-danger'>Error occur</div>";
		break;
	case 902.0:
		$response_array['status'] = 'error'; 
    	$response_array['message'] = "<div class='text-danger'>Empty Value</div>";
		break;
	case 902.1:
		$response_array['status'] = 'error'; 
    	$response_array['message'] = "<div class='text-danger'>Phone can not be shorter than 10 characters</div>";
		break;
	case 902.4:
		$response_array['status'] = 'error'; 
    	$response_array['message'] = "<div class='text-danger'>Email is not a valid email address</div>";
		break;
	case 903.2:
		$response_array['status'] = 'error'; 
    	$response_array['message'] = "<div class='text-danger'>Email is already in the system</div>";
	 	break;
	default:
	    $response_array['status'] = 'success'; 
    	$response_array['message'] = "<div class='text-success'>User added</div>";
    	break;
}
echo json_encode($response_array);
?>