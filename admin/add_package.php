<?php
include("admin_functions.php");

if ($_POST) {
   $data=[];
   foreach ($_POST as $v) {
  	array_push($data,$v);
   }
echo addPackage($data);
}
?>