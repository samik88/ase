<?php 
$index_sub=""; 
$warehouse_sub="active"; 
$packages_sub="" ; 
$ukn_packages_sub=""; 
$declaration_sub="" ; 
$requests_sub="" ; 
$purchases_sub="" ; 
$news_sub="" ; 
$userlist_sub="" ; 
$faq_sub="" ; 
$contacts_sub="" ; 
$messages=""; 

include( "header.php");
$country_id=2;
if(isset($_POST["company"])&&isset($_POST["address1"])&&isset($_POST["city"])){
    $company=$_POST["company"];
    $contact_name=$_POST["contact_name"];
    $address1=$_POST["address1"];
    $state=$_POST["state"];
    $city=$_POST["city"];
    $zip=$_POST["zip"];
    $phone=$_POST["phone"];
    $attention=$_POST["attention"];
    $reminder=$_POST["reminder"];
    $result=editCountryInfo($country_id, $company, $contact_name, $address1, $state, $city, $zip, $phone, $attention, $reminder);
}

$row=getCountryInfo($country_id);
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
                            Warehouse->UK
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                UK 
              </h3>
                        </div>
                        <div class="panel-body contacts">
                            <form action="#" method="POST" id="country_form">
                                <div class="row">
                                    <div id="result"><?php if($result==1){echo "<span class='text-success'>Info is updated</span>";}?></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Contact Name:</label>
                                                <input class="form-control" type="text" name="contact_name" id="contact_name" value="<?php echo $row['contact_name'];?>" />
                                                <label>Company Name:</label>
                                                <input class="form-control" type="text" name="company" id="company" value="<?php echo $row['company_name'];?>" />
                                                <label>Address line 1:</label>
                                                <input class="form-control" type="text" name="address1" id="address1" value="<?php echo $row['address_1'];?>" />
                                                <label>City:</label>
                                                <input class="form-control" type="text" name="city" id="city" value="<?php echo $row['city'];?>" />
                                                <label>County(State):</label>
                                                <input class="form-control" type="text" name="state" id="state" value="<?php echo $row['state'];?>" />
                                                <label>Zip Code:</label>
                                                <input class="form-control" type="text" name="zip" id="zip" value="<?php echo $row['zip'];?>" />
                                                <label>Phone:</label>
                                                <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $row['phone'];?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <label>Attention:</label>
                                                <br/>
                                                <textarea name="attention" id="attention" class="form-control"><?php echo trim($row[ 'warning']);?></textarea>
                                                <br/>
                                                <label>Reminder:</label>
                                                <textarea name="reminder" id="reminder" class="form-control"><?php echo trim($row[ 'reminder']);?></textarea>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <span class="btn btn-info  waves-effect waves-light" id="sendMessage">EDIT</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="btn btn-info  waves-effect waves-light" style="float:right"><a href="uk_price.php"  style="color:white">PRICE TABLE</a></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
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
    var r = confirm("Are you sure?");
    if (r==true) {
        $("#country_form").submit();
    }
});
</script>