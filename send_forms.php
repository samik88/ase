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
                   echo "<div class=\"text-success\">Thank you for your enquire</div>";
                }else{
                  echo "<div class=\"text-error\">Error occur while sending</div>";
                }

        }else{
         echo "<div class=\"text-error\">Please, fill all fields</div>";
        }

   }
?>