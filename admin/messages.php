<?php 
$index_sub=""; 
$warehouse_sub=""; 
$packages_sub=""; 
$ukn_packages_sub=""; 
$declaration_sub=""; 
$requests_sub=""; 
$purchases_sub=""; 
$news_sub=""; 
$userlist_sub=""; 
$faq_sub=""; 
$contacts_sub=""; 
$messages="active";  

include( "header.php"); 
$row=getMessages(0,20,null);
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
      
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <ol class="breadcrumb pull-right">
            <li>
              <a href="#">
                Aseshopping
              </a>
            </li>
            <li class="active">
              Messages
            </li>
          </ol>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Messages list
              </h3>
            </div>
            <div class="panel-body contacts">
              <div class="row">
                <div id="result">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="row"> <a href="new_message.php" class="btn btn-info"  style="float:right">WRITE NEW</a></div>
                  <div class="inbox-widget nicescroll mx-box" tabindex="5000" style="overflow: hidden; outline: none;">
                  <?php 
                  $i=0;
                  while($i<sizeof($row["result"])){
                    ?>
                  
                    <a href="message_thread.php?user_id=<?php echo  $row["result"][$i]["user"]."&seen=".$row["result"][$i]["user2read"]?>">
                      <div class="inbox-item <?php if($row["result"][$i]["user2read"]==0){ ?> unread <?php } ?>">
                        <div class="inbox-item-img">
                          <img src="../assets/images/users/avatar.png" class="img-circle" alt="">
                        </div>
                        <?php if($row["result"][$i]["user2read"]==0){?>
                    <p class="unread-badge">!</p>
                    <?php } ?>
                        <p class="inbox-item-author">
                          <?php echo  $row["result"][$i]["fullname"]?>
                        </p>
                        <p class="inbox-item-text">
                         <?php echo  $row["result"][$i]["message"]?>
                        </p>
                        <p class="inbox-item-date">
                          <?php echo  $row["result"][$i]["timestamp"]?>
                        </p>
                      </div> 
                    </a>
                   <?php $i++; }?>
                  </div>
                  <div class="row" style="float:right"> <a href="new_message.php" class="btn btn-info">WRITE NEW</a></div>
                </div>
              </div>
            </div>
            <!-- End Row -->
          </div>
          <!-- container -->
        </div>
                <!-- content -->
        <footer class="footer text-right">
          2015-2016 © ASEshopping.
        </footer>
        
      </div>
<?php include( "footer.php"); ?>
<script>
$("#edit").click(function(){  
  var r = confirm("Are you sure you want to remove this news!");
  if (r == true) {
    var phone=$("#phone").val();
    var email=$("#email").val();
    var addr_1_az=$("#adress_1_az").val();
    var addr_2_az=$("#adress_2_az").val();
    var addr_1_ru=$("#adress_1_ru").val();
    var addr_2_ru=$("#adress_2_ru").val();
    var addr_1_en=$("#adress_1_en").val();
    var addr_2_en=$("#adress_2_en").val();
    $.ajax({
        type: 'POST',
        url: 'edit_contacts.php',
        data:{'phone':phone,'email':email,'addr_1_az':addr_1_az,'addr_2_az':addr_2_az,'addr_1_ru':addr_1_ru,'addr_2_ru':addr_2_ru,'addr_1_en':addr_1_en,'addr_2_en':addr_2_en},
        success: function(data){
          $('#result').html(data.message);
        },
    });
  }
});


</script>