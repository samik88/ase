<?php
include('functions.php');

$accNumber = $_POST["accountNumber"];
unset($_POST['accountNumber']);
$count = $_POST["count"];
unset($_POST['count']);

$data=[];

$hash = md5(uniqid(rand(), true));

if ($_POST) {

  foreach ($_POST as $v) {
  	array_push($data,$v);
  }

  $i = 0;
  $j = 0;
  while($i < sizeof($data)) {
  	$j++;
    (addDeclaration($data[$i],$data[$i+1], $data[$i+2], $data[$i+3], $data[$i+4], $accNumber, $hash));
    echo "row number ".$j." sent <br>";
    $i += 5;
  }
}
?>