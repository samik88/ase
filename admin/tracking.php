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
if(isset($_POST["order_num"])){
    addTracking($_POST);
}
if(isset($_GET["orderNum"])){
    $row=getTracking($_GET["orderNum"]);
    if($row[13]["date"]!=null){
        $date = new DateTime($row[13]["date"]);
        $waitDate = $date->format('m/d/Y');
    }else{
        $waitDate="";
    }

    if($row[14]["date"]!=null){
        $date = new DateTime($row[14]["date"]);
        $banDate = $date->format('m/d/Y');
    }else{
        $banDate ="";
    }

    if($row[1]["date"]!=null){
        $date = new DateTime($row[1]["date"]);
        $countryDate = $date->format('m/d/Y');
    }elseif($row[2]["date"]!=null){
        $date = new DateTime($row[2]["date"]);
        $countryDate = $date->format('m/d/Y');
    }elseif($row[3]["date"]!=null){
        $date = new DateTime($row[3]["date"]);
        $countryDate = $date->format('m/d/Y');
    }elseif($row[4]["date"]!=null){
        $date = new DateTime($row[4]["date"]);
        $countryDate = $date->format('m/d/Y');
    }else{
        $countryDate = "";
    }
    
    if($row[11]["date"]!=null){
        $date = new DateTime($row[11]["date"]);
        $baki_date = $date->format('m/d/Y');
    }else{
        $baki_date="";
    }
    
    if($row[10]["date"]!=null){
        $date = new DateTime($row[10]["date"]);
        $customs_date = $date->format('m/d/Y');
    }else{
        $customs_date="";
    }

    if($row[12]["date"]!=null){
        $date = new DateTime($row[12]["date"]);
        $delivery_date = $date->format('m/d/Y');
    }else{
        $delivery_date="";
    }

    if($row[15]["date"]!=null){
        $date = new DateTime($row[15]["date"]);
        $courier_date = $date->format('m/d/Y');
    }else{
        $courier_date="";
    }


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
                            Tracking
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                Tracking 
              </h3>
                        </div>
                        <div class="panel-body contacts">
                            <div class="row">
                                <div id="result">&nbsp;</div>
                                <br/>
                                <form action="#" method="POST" id="tracking_form">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="hidden" type="text" name="order_num" id="order_num" value="<?php echo $_GET["orderNum"];?>"/>
                                        <div class="form-inline" role="form">
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="wait_status" class=" control-label">Status: Gözləmək</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="wait_date" class="control-label">Start date</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="wait_date" name="wait_date" 
                                                        value="<?php echo $waitDate?>">
                                                        <input type="hidden" type="text" name="wait_id" id="wait_id" value="<?php echo $row[13]["id"];?>"/>
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="ban_status" class=" control-label">Status: Qadağa</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="ban_date" class="control-label">Start date</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="ban_date" name="ban_date"
                                                        value="<?php echo $banDate;?>">
                                                        <input type="hidden" type="text" name="ban_id" id="ban_id" value="<?php echo $row[14]["id"];?>"/>
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="status_filter" class=" control-label">Status</label>
                                                    <select class="form-control" id="status_filter" name="status_filter">
                                                        <option value="" >Select Status</option>
                                                        <option value="1" <?php if($row[1]["date"]!=null){echo "selected";}?>>USA</option>
                                                        <option value="2" <?php if($row[2]["date"]!=null){echo "selected";}?>>UK</option>
                                                        <option value="3" <?php if($row[3]["date"]!=null){echo "selected";}?>>TURKEY</option>
                                                        <option value="4" <?php if($row[4]["date"]!=null){echo "selected";}?>>UAE</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="country_date" class="control-label">Start date</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="country_date" name="country_date"
                                                        value="<?php echo $countryDate;?>">
                                                        <input type="hidden" type="text" name="country_id" id="country_id" value="<?php echo $row[1]["id"].$row[2]["id"].$row[3]["id"].$row[4]["id"];?>"/>
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="customs_status" class=" control-label">Status: Gömrük</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="customs_date" class="control-label">Start date</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="customs_date" name="customs_date" value="<?php echo $customs_date;?>">
                                                        <input type="hidden" type="text" name="customs_id" id="customs_id" value="<?php echo $row[10]["id"];?>"/>
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="baki_status" class=" control-label">Status: Bakı</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="baki_date" class="control-label">Start date</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="baki_date" name="baki_date"
                                                        value="<?php echo $baki_date;?>">
                                                        <input type="hidden" type="text" name="baki_id" id="baki_id" value="<?php echo $row[11]["id"];?>"/>
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="delivery_status" class=" control-label">Status: Çatdırılıb</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="delivery_date" class="control-label">Start date</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="delivery_date" name="delivery_date" value="<?php echo $delivery_date;?>">
                                                        <input type="hidden" type="text" name="delivery_id" id="delivery_id" value="<?php echo $row[12]["id"]; ?>"/>
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="courier_status" class=" control-label">Status: Kuryer</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="couirer_date" class="control-label">Start date</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="courier_date" name="courier_date" value="<?php echo $courier_date;?>">
                                                        <input type="hidden" type="text" name="courier_id" id="courier_id" value="<?php echo $row[15]["id"]; ?>"/>
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <span class="btn btn-info" id="editTracking">Edit</span>
                                            <a style="float:right" href="packages.php">BACK</a>

                                        </div>
                                    </div>
                                </form>
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

<?php } 
include("footer.php"); ?>

<script type="text/javascript" src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script>
jQuery('#wait_date').datepicker({ dateFormat: 'yy-mm-dd' });
jQuery('#ban_date').datepicker();
jQuery('#country_date').datepicker();
jQuery('#country_date').datepicker();
jQuery('#customs_date').datepicker();
jQuery('#baki_date').datepicker();
jQuery('#delivery_date').datepicker();
jQuery('#courier_date').datepicker({
    dateFormat: "yy-mm-dd"
});

$("#editTracking").click(function() {
    var r = confirm("Are you sure?");
    if (r == true) {
        $("#tracking_form").submit();
    }
});
</script>