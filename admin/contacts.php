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
$contacts_sub="active"; 
$messages=""; 

include( "header.php"); 
$row=getContacts();
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
          <h4 class="pull-left page-title">
            News list
                  </h4>
                  <ol class="breadcrumb pull-right">
                    <li>
                      <a href="#">
                        Aseshopping
                      </a>
                    </li>
                    <li class="active">
                      News
                    </li>
                  </ol>
              </div>
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">
                    News 
                  </h3>
                </div>
                <div class="panel-body contacts">
                  <div class="row">
                    <div id="result"></div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <table>
                        <tr>
                         <td>
                          <label for="phone">Phone:</label></td><td>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $row["work_phone"]?>"/>
                          </td>
                          <td width="100px"></td>
                          <td>
                            <label for="email">Email:</label></td><td>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $row["email"]?>"/>
                          </td>
                        </tr>
                        <tr>
                         <td>
                          <label for="adress_1_az">Address line 1 AZE:</label></td><td>
                            <input type="text" name="adress_1_az" id="adress_1_az" class="form-control" value="<?php echo $row["address_line_1_az"]?>"/>
                          </td>
                          <td width="100px"></td>
                          <td>
                            <label for="adress_2_az">Address line 2 AZE:</label></td><td>
                            <input type="text" name="adress_2_az" id="adress_2_az" class="form-control" value="<?php echo $row["address_line_2_az"]?>"/>
                          </td>
                        </tr>
                        <tr>
                         <td>
                          <label for="adress_1_en">Address line 1 RUS:</label></td><td>
                            <input type="text" name="adress_1_en" id="adress_1_en" class="form-control" value="<?php echo $row["address_line_1_ru"]?>"/>
                          </td>
                          <td width="100px"></td>
                          <td>
                            <label for="adress_2_en">Address line 2 RUS:</label></td><td>
                            <input type="text" name="adress_2_en" id="adress_2_en" class="form-control" value="<?php echo $row["address_line_2_ru"]?>"/>
                          </td>
                        </tr>
                        <tr>
                         <td>
                          <label for="adress_1_ru">Address line 1 ENG:</label>
                         </td>
                           <td>
                            <input type="text" name="adress_1_ru" id="adress_1_ru" class="form-control" value="<?php echo $row["address_line_1_en"]?>"/>
                          </td>
                          <td width="100px">&nbsp;</td>
                          <td>
                            <label for="adress_2_ru">Address line 2 ENG:</label></td><td>
                            <input type="text" name="adress_2_ru" id="adress_2_ru" class="form-control" value="<?php echo $row["address_line_2_en"]?>"/>
                          </td>
                        </tr>
                      </table>
                    <div class="row" style="float:right">
                      <span class="btn btn-info btn-sm" id="edit">Edit</span>
                    </div>
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