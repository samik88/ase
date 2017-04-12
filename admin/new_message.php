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
                Message form
              </h3>
            </div>
            <div class="panel-body contacts">
              <div class="row">
                <div id="result">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="row">
                                                <div class="col-sm-9 ">
                                                    <select class="form-control" name="PObox" id="PObox">
                                                        <?php echo  getUsersFilter("az")?>
                                                        <select/>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">
                                                <div class="col-sm-9 ">
                                                    <input type="text" class="form-control" placeholder="Enter your text" name="new_msg" id="new_msg" style="height:200px;">
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
<?php include( "footer.php"); ?>
<script>
$("#sendMessage").click(function() {
    var message_body = $("#new_msg").val();
    var id = $("#PObox").val();
    $.ajax({
        type: 'POST',
        url: 'send_message.php',
        data: {
            'id': id,
            'message': message_body
        },
        success: function(data) {
            if (data.status == "success") {
                $("#result").html("Message has been sent");
            }else{
                $("#result").html("Message can't be sent");
            }
        },
    });
});
</script>