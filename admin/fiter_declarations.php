<?php 
include('admin_functions.php');
    $r=getDeclarations($_POST['user_id'],$_POST['country_id'],$_POST['start_date'],$_POST['end_date']);
    if($r==-1){
        echo "No packages";
    }else{
        echo $r;
    }
?>