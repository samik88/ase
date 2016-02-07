<?php
include("functions.php");
if(isset($_GET["topic"],$_GET["country"],$_GET["message"], $_GET['accNumber'])){
      
      $topic = $_GET["topic"];
      $country = $_GET["country"];
      $message = $_GET["message"];
      $accNumber = $_GET['accNumber'];
       if($topic !='' and $country!='' and $message!='')
        {
           //We protect the variables
                if(sendForm($topic,$country, $message, $accNumber)){
                   echo("Thank you for your enquire");
                }else{
                  echo "Error occur while sending";
                }

        }else{
         echo "Please, fill all fields";
        }

   }
?>