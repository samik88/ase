<?php 
$index_sub=""; 
$usa_sub=""; 
$uk_sub="" ; 
$turkey_sub="" ; 
$orders_sub="active" ; 
$purchases_sub="" ; 
$ask_buy_sub="" ; 
$declaration_sub="" ; 
$faq_sub="" ; 
$contacts_sub="" ; 
include( "header.php");
if(isset($_GET["user_id"])&&isset($_GET["seen"])){
  $row=getMessage(0,3,$_GET["user_id"]);
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
                Messages 
              </h3>
            </div>
            <div class="panel-body contacts">
              <div class="row">
                <div id="result">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" id="user_id" value="<?php echo $_GET["user_id"]?> "/>
              <ul class="conversation-list nicescroll" tabindex="5001" style="overflow: hidden; outline: none;max-height:450px" id="message_area">
                <?php $i=0;
                if($_GET["seen"]==0){
                  makeSeen($_GET["user_id"]);
                }
                  while($i<sizeof($row["result"])){?>
                                                <li class="clearfix <?php if($row["result"][$i]["user2"]=="system"){echo "odd";}?>" >
                                                    <div class="chat-avatar">
                                                        <img src="../assets/images/avatar-1.jpg" alt="male">
                                                        <i><?php echo  $row["result"][$i]["timestamp"]?></i>
                                                    </div>
                                                    <div class="conversation-text">
                                                        <div class="ctext-wrap">
                                                            <i><?php echo  $row["result"][$i]["fullname"]." ".$row["result"][$i]["surname"]?></i>
                                                            <p>
                                                                <?php echo  $row["result"][$i]["message"]?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php $i++;} ?>
                                            </ul>
                                            <div  class="row"><div class="col-md-12"  style="padding: 20px 30px 10px 0px;"><a href="#" id="more" style="float:right">Load more...</a></div></div>
                                            <div class="row">
                                                <div class="col-sm-9 ">
                                                    <input type="text" class="form-control" placeholder="Enter your text" name="new_msg" id="new_msg">
                                                </div>
                                                <div class="col-sm-3">
                                                    <span class="btn btn-info btn-block waves-effect waves-light" id="sendMessage" >Send</span>
                                                </div>
                                            </div>
                                            <div  class="row"><div class="col-md-6"  style="padding: 20px 0px 0px 30px;"><a href="messages.php">All messages</a></div></div>
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
<?php include( "footer.php"); 
}
?>
<script>
var start = 0;
var limit = 3;
var odd = "odd";
$("#more").click(function() {
    start += limit;
    var id = $("#user_id").val();
    $.ajax({
        type: 'POST',
        url: 'get_thread.php',
        data: {
            'id': id,
            'start': start,
            'limit': limit
        },
        success: function(data) {
            if (data.status == "success") {
                var result = "";
                for (var i = 0; i < data.result.length; i++) {
                    if (data.result[i]["user2"] == "system") {
                        odd = "odd";
                    } else {
                        odd = "";
                    }
                    result += '<li class="clearfix ' + odd + '"> <div class = "chat-avatar" >' +
                        '<img src = "../assets/images/avatar-1.jpg" alt = "male" >' +
                        '<i> ' + data.result[i]["timestamp"] + ' </i> </div> <div class = "conversation-text" >' +
                        '<div class = "ctext-wrap" >' +
                        '<i> ' + data.result[i]["fullname"] + ' ' +
                        data.result[i]["surname"] + ' </i> <p> ' + data.result[i]["message"] + ' </p> </div> </div> </li>';
                }
                $("#message_area").html($("#message_area").html() + result);
            }
        },
    });
});

$("#sendMessage").click(function() {
    var message_body = $("#new_msg").val();
    var id = $("#user_id").val();
    $.ajax({
        type: 'POST',
        url: 'send_message.php',
        data: {
            'id': id,
            'message': message_body
        },
        success: function(data) {
            if (data.status == "success") {                
                var result = '<li class="clearfix "> <div class = "chat-avatar" >' +
                    '<img src = "../assets/images/avatar-1.jpg" alt = "male" >' +
                    '<i> ' + Date.now() + ' </i> </div> <div class = "conversation-text" >' +
                    '<div class = "ctext-wrap" >' +
                    '<i>System</i> <p>'+$("#new_msg").val()+' </p> </div> </div> </li>';
                $("#message_area").html($("#message_area").html() + result);
                $("#new_msg").val(" ");
            }else{
               $("#result").html("Message can't be sent");
            }
        },
    });
});
</script>