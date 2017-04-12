<?php
include("functions.php");
//print_r($_POST);
if($_POST["new_pass"]== $_POST["new_pass_2"]){
  if( changePassProfile( $_POST["email"],$_POST["old_pass"],$_POST["new_pass"], $_POST["accountNumber"])){
  	echo "<span class='text-success'>Password changed</span>";
  }else{
  	echo "<span class='text-danger'>Error occur while changing</span>";
  }
}else{
	echo "<span class='text-danger'>Password do not match</span>";
}
?>