<?php
   $index_sub="";
   $usa_sub="";
   $uk_sub="";
   $turkey_sub="";
   $orders_sub="active";
   $purchases_sub="";
   $ask_buy_sub="";  
   $declaration_sub="";
   $faq_sub="";
   $contacts_sub="";
include("header.php");

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
                                <h4 class="pull-left page-title">Editable Table</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">Editable Table</li>
                                </ol>
                            </div>
                        </div>


                        <div class="panel">
                            
                            <div class="panel-body">
                                 <?php $r=getUsersList();
                  if($r==-1){
                     echo "No packages";
                   }else{?>              
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="m-b-30">
                                            <button id="addToTable" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <table class="table table-bordered table-striped" id="datatable-editable">
                                    <thead>
                                                  <tr>
                                                    <th>
                                                      No
                                                    </th>
                                                    <th>
                                                      Name
                                                    </th>
                                                    <th>
                                                      Surname
                                                    </th>
                                                    <th>
                                                      PObox
                                                    </th>
                                                    <th>
                                                      Email
                                                    </th>
                                                    <th>
                                                      Pin
                                                    </th>
                                                    <th>
                                                      Address
                                                    </th>
                                                    <th>
                                                      Phone
                                                    </th>
                                                    <th>
                                                      Status
                                                    </th>
                                                    <th>   
                                                    </th>
                                                    <th>   
                                                    </th>
                                                    <th>
                                                    </th>

                                                  </tr>
                                                </thead>      
                                    <tbody>
                                        <?php echo $r;?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                            <!-- end: page -->

                        </div> <!-- end Panel -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
    
<?php
include("footer.php");
?>
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->    

     
      <script src="../assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
      <script src="../assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script> 
      <script src="../assets/plugins/datatables/dataTables.bootstrap.js"></script>
      <script src="../assets/pages/datatables.editable.init.js"></script>
  
	</body>
</html>