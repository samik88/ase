<?php
$index_sub=""; 
$warehouse_sub=""; 
$packages_sub="active"; 
$ukn_packages_sub=""; 
$declaration_sub=""; 
$requests_sub=""; 
$purchases_sub=""; 
$news_sub=""; 
$userlist_sub=""; 
$faq_sub=""; 
$contacts_sub=""; 
$messages=""; 

include("header.php");

?>

      <link href="../assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/pages.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/menu.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css">

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
              Edit package
            </li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Package
              </h3>
            </div>
            <div class="panel-body">
              <div id="result"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12"> 
                  
                  <?php $row=getPackage($_GET["orderNum"]);
                  if($row==-1){
                     echo "No packages";
                   }else{ ?>
                   <form action="#" method="POST">
                     <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                                    <th>Customer</th>
                                                    <th>City</th>
                                                    <th>Weight</th>
                                                    <th>W type</th>
                                                    <th>W</th>
                                                    <th>H</th>
                                                    <th>L</th>
                                                    <th>Dim Unit</th>
                                                    <th>Custom Value</th>
                                                    <th>Currency</th>
                                                    <th>Content</th>
                                                    <th>Del price</th>
                                                    <th>Init date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeX">
                                            <td><select name="customer" id="customer" class="form-control">
                                              <option value="<?php echo $row["PObox"]?>"><?php echo $row["fullname"]." ".$row["surname"];?></option>
                                              <?php echo getUsersFilter("az");?>
                                            </select></td>  
                                            <td>
                                            <select name="city" id="city" class="form-control">
                                              <option value="<?php echo $row["country_id"]?>"><?php echo $row["country"]?></option>
                                              <?php echo getCountriesFilter('az')?>
                                            </select>
                                            </td>
                                            <td><input type="text" value='<?php echo $row["weight"]?>' name="weight" id="weight" class="form-control" style="width:55px"/></td>
                                            <td>
                                              <select name="weightType" id="weightType" class="form-control">
                                                  <option value="<?php echo $row["weightType"]?>"><?php echo $row["weightType"]?></option>
                                                  <option value="Lbs">Lbs</option>
                                                  <option value="Kg">Kg</option>
                                              </select>   
                                                </td>
                                            <td><input type="text" value='<?php echo $row["width"]?>' name="width" id="width" class="form-control" style="width:55px"/></td>
                                            <td><input type="text" value='<?php echo $row["height"]?>' name="height" id="height" class="form-control" style="width:55px"/></td>
                                            <td><input type="text" value='<?php echo $row["length"]?>' name="length" id="length" class="form-control" style="width:55px"/></td>
                                            <td>
                                              <select name="dimUnit" id="dimUnit" class="form-control">
                                                  <option value="<?php echo $row["dimUnit"]?>"><?php echo $row["dimUnit"]?></option>
                                                  <option value="Inch">Inch</option>
                                                  <option value="Cm">Cm</option>
                                              </select>  
                                            </td>
                                            <td><input type="text" value='<?php echo $row["customValue"]?>' name="customValue" id="customValue" class="form-control" style="width:55px"/></td>
                                            <td>
                                            <select name="currency" id="currency" class="form-control">
                                                  <option value="<?php echo $row["currency"]?>"><?php echo $row["currency"]?></option>
                                                  <option value="USD">USD</option>
                                                  <option value="EU">EU</option>
                                                  <option value="GBP">GBP</option>
                                                  <option value="TYL">TYL</option>
                                              </select>
                                            </td>
                                            <td><input type="text" value='<?php echo $row["content"]?>' name="content" id="content" class="form-control" style="width:100px"/></td>
                                            <td><input type="text" value='<?php echo $row["price"]?>' name="price" id="price" class="form-control" style="width:55px" /></td>
                                            <td width="90px"><span><?php echo $row["insert_date"]?></span></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <input type="hidden" value='<?php echo $_GET["orderNum"]?>' name="AwbNum" id="AwbNum" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["PObox"]?>' name="PObox_init" id="PObox_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["country_id"]?>' name="city_init" id="city_init" class="form-control" /> 
                                    <input type="hidden" value='<?php echo $row["weight"]?>' name="weight_init" id="weight_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["weightType"]?>' name="weightType_init" id="weightType_init" class="form-control" /> 
                                    <input type="hidden" value='<?php echo $row["width"]?>' name="width_init" id="width_init" class="form-control" /> 
                                    <input type="hidden" value='<?php echo $row["height"]?>' name="height_init" id="height_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["length"]?>' name="length_init" id="length_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["dimUnit"]?>' name="dimUnit_init" id="dimUnit_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["customValue"]?>' name="customValue_init" id="customValue_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["currency"]?>' name="currency_init" id="currency_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["content"]?>' name="content_init" id="content_init" class="form-control" />
                                    <input type="hidden" value='<?php echo $row["price"]?>' name="price_init" id="price_init" class="form-control" />
                                     </form>
                                    <?php }?>
                                            
                                            <hr>
                                            <div class="row">
                                            <div  class="col-md-6" >
                                               <div class="btn-primary md-trigger  btn  waves-light" id="save">SAVE</div>
                                           </div>
                                            <div class="btn-primary md-trigger  btn  waves-light" style="float:right
                                            "><a href="packages.php" style="color:white">BACK</a></div>
                                            </div>
                                            </div>
                                            </div>
                                      </div>
                                  </div>
                              </div>
                          </div>                          
                      </div>                      
                      <!-- End Row -->
                      <div class="row">
                        <span class="text-success">
                        </span>                        
                      </div>                 
                  </div>                  
                  <!-- container -->                 
              </div>              
              <!-- content -->              
                  <footer class="footer text-right">
                   2015-2016 © ASEshopping.
                  </footer>              
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<?php
include("footer.php");
?>


      <!-- Examples -->
      <script src="../assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
      <script src="../assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script> 
      <script src="../assets/plugins/datatables/dataTables.bootstrap.js"></script>
      <script src="../assets/pages/datatables.editable.init.js"></script>
<script>

$("#save").click(function(){
  var PObox_init=$("#customer_init").val();
  var city_init=$("#city_init").val();
  var weight_init=$("#weight_init").val();
  var weightType_init=$("#weightType_init").val();
  var width_init=$("#width_init").val();
  var height_init=$("#height_init").val();
  var length_init=$("#length_init").val();
  var dimUnit_init=$("#dimUnit_init").val();
  var customValue_init=$("#customValue_init").val();
  var currency_init=$("#currency_init").val();
  var content_init=$("#content_init").val();
  var price_init=$("#price_init").val();
  var AwbNum=$("#AwbNum").val();

  var PObox=$("#customer").val();
  var city=$("#city").val();
  var weight=$("#weight").val();
  var weightType=$("#weightType").val();
  var width=$("#width").val();
  var height=$("#height").val();
  var length=$("#length").val();
  var dimUnit=$("#dimUnit").val();
  var customValue=$("#customValue").val();
  var currency=$("#currency").val();
  var content=$("#content").val();
  var price=$("#price").val();

  if(PObox==PObox_init){
    PObox="";
  }
  
  if(city==city_init){
    city="";
  }

  if(weight==weight_init){
    weight="";
  }

  if(weightType==weightType_init){
    weightType="";
  }

  if(width==width_init){
    width="";
  }

  if(height==height_init){
    height="";
  }

  if(length==length_init){
    length="";
  }

  if(dimUnit==dimUnit_init){
    dimUnit="";
  }

  if(customValue==customValue_init){
    customValue="";
  }

  if(currency==currency_init){
    currency="";
  }

  if(content==content_init){

  if(price==price_init){
    price="";
  }
    content="";
  }

  $.ajax({
              type: 'POST',
              url: 'change_package_info.php',
              data: {"AwbNum":AwbNum,"PObox":PObox,'city':city,'weight':weight, 'weightType':weightType, 'width':width, 'height':height,'length':length,'dimUnit':dimUnit,'customValue':customValue,'currency':currency,'content':content,'price':price}, 
              success: function(data){
                  $('#result').html(data.message);
              },
  });
  
});

$(".activate").click(function(){
  $.ajax({
              type: 'POST',
              url: 'activate.php',
              data: {"email":$(this).attr("id")},
              success: function(data){
                  $('#result').html(data.message);
              },
  });
});
</script>
  