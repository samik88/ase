<?php 
include('admin_functions.php');
    $r=getRequests($_POST['user_id'],$_POST['country_id'],$_POST['start_date'],$_POST['end_date'],$_POST['status_id']);
    if($r==-1){
        echo "No packages";
    }else{
        echo $r;
    }
?>