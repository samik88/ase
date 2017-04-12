      <!-- Right Sidebar -->
<div class="side-bar right-bar nicescroll">
  <h4 class="text-center">
    Write us
  </h4>
  <div class="contact-list nicescroll">
    
    <div class="panel-body">
      <div id="send_result" class="form-group">
      </div>
           <form role="form" action="#" method="POST">
                     <div class="form-group">
                        <label class="control-label">Topic</label>
                        <div>
                         <select class="form-control" name="topic" id="topic">
                              <option value="-1">Select topic</option>
                              <option value="0">Order item</option>
                              <option value="1">Delivery</option>
                              <option value="2">Payment</option>
                              <option value="3">Lost items</option>
                              <option value="4">Problem with Turkish orders</option>
                              <option value="5">Mobile phone number for Turkey orders</option>
                              <option value="6">Turkish pasport for Turkey orders </option>
                              <option value="7">Turkish credit card for Turkish orders</option>
                              <option value="8">Changing personal info</option>
                              <option value="9">Other</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label">Message body</label>

                        <div >
                           <textarea  class="form-control" name="message"  id="message"></textarea>
                        </div>
                     </div>
                  
                     <div class="form-group">
                        <label class="control-label">Country</label><br>
                        <div>
                           <select class="form-control" name="country"  id="country">
                              <option value="-1">Select country</option>
                              <option value="0">No country</option>
                              <option value="1">USA</option>
                              <option value="2">UK</option>
                              <option value="3">TURKEY</option>
                           </select>
                           
                        </div>
                     </div>
                      <div>
                        <div class="btn btn-info  waves-effect waves-light " id="sendForm">Send</div>
                      </div>
                      <input type="hidden" value="<?php echo $_SESSION['accNumber']?>" id="accNumber"/>
                  </form>
    </div>
    
  </div>
</div>
<!-- /Right-bar -->
      </div>
      <!-- END wrapper -->
      <script>
         var resizefunc = [];
      </script>
      <!-- jQuery  -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/utils.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/detect.js"></script>
      <script src="assets/js/fastclick.js"></script>
      <script src="assets/js/jquery.slimscroll.js"></script>
      <script src="assets/js/jquery.blockUI.js"></script>
      <script src="assets/js/waves.js"></script>
      <script src="assets/js/wow.min.js"></script>
      <script src="assets/js/jquery.nicescroll.js"></script>
      <script src="assets/js/jquery.scrollTo.min.js"></script>
      <script src="assets/js/jquery.app.js"></script>
      <!-- moment js  -->
      <script src="assets/plugins/moment/moment.js"></script>
      <!-- counters  -->
      <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
      <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
      <!-- sweet alert  -->
      <script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
      <!-- flot Chart -->
      <script src="assets/plugins/flot-chart/jquery.flot.js"></script>
      <script src="assets/plugins/flot-chart/jquery.flot.time.js"></script>
      <script src="assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
      <script src="assets/plugins/flot-chart/jquery.flot.resize.js"></script>
      <script src="assets/plugins/flot-chart/jquery.flot.pie.js"></script>
      <script src="assets/plugins/flot-chart/jquery.flot.selection.js"></script>
      <script src="assets/plugins/flot-chart/jquery.flot.stack.js"></script>
      <script src="assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>
      <!-- todos app  -->
      <script src="assets/pages/jquery.todo.js"></script>
      <!-- chat app  -->
      <script src="assets/pages/jquery.chat.js"></script>
      <!-- dashboard  -->
      <script src="assets/pages/jquery.dashboard.js"></script>
      <!-- orders -->
      <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
      <script type="text/javascript">
         jQuery(document).ready(function($) {
             $('.counter').counterUp({
                 delay: 100,
                 time: 1200
             });
         });
      </script>

      <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
               
            } );
            $('#sendForm').click(function(){
              var topic = $('#topic').val();
              var message = $('#message').val();
              var country_id = $('#country').val();
              var accNumber = $('#accNumber').val();
              if(topic=="-1"){
                $('#send_result').html("<div class=\"text-warning\">Please, fill TOPIC field</div>");
              }else{
                if(message==""){
                  $('#send_result').html("<div class=\"text-warning\">Please, choose MESSAGE from a list</div>");
                }else{
                  if(country_id=="-1"){
                    $('#send_result').html("<div class=\"text-warning\">Please, choose COUNTRY from a list</div>");
                  }else{
                    var str="send_forms.php?topic="+topic+"&message="+message+"&country="+country_id+"&accNumber="+accNumber;
                    ajaxFunc(str,'send_result');
                    $('#topic').val("-1");
                    $('#message').val("");
                    $('#country').val("-1");
                  }
                }
              }
              
            })
      </script>

      <script>
            var resizefunc = [];
      </script>
        

        <!-- jQuery  -->
   </body>
</html>