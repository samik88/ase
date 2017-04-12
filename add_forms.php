<?php
include('functions.php');

$accNumber = $_POST["accountNumber"];
unset($_POST['accountNumber']);
$count = $_POST["count"];
unset($_POST['count']);

$data=[];

if ($_POST) {

  foreach ($_POST as $v) {
    array_push($data,$v);
  }
  $i = 0;
  $j = 0;
  while($i < sizeof($data)) {
    $j++;
    (addBuyRequest($data[$i],$data[$i+1], $data[$i+2], $data[$i+3], $accNumber));
    echo "row number ".$j." sent <br>";
    $i += 4;
  }
}

?>