<?php
$index_sub=""; 
$warehouse_sub=""; 
$packages_sub=""; 
$ukn_packages_sub="active"; 
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
                ASEshopping
              </a>
            </li>
            <li class="active">
              New uknown package
            </li>
          </ol>
        </div>
      </div>
      
      
      <div class="row">
        <!-- contact info -->
        <div class="col-lg-12">
          
          <!-- Personal-Information -->
          <div class="panel panel-default panel-fill">
            <div class="panel-heading">
              
              <h3 class="panel-title">
                New package form
              </h3>
              
            </div>
            
            <div class="panel-body">
              
              
              <div class="panel panel-default">
                
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="alert" id="form_send_result"> </div>
                    <form action="#" method="POST" id="new_package_form">
                      <table class="table table-striped edited" id="uknown_form_table">
                        <thead>
                          <tr>
                            <th>
                              #
                            </th>
                            <th>
                              COUNTRY
                            </th>
                            <th>
                              WEIGHT
                            </th>
                            <th>
                              W TYPE
                            </th>
                            <th>
                              WIDTH
                            </th>
                            <th>
                              HEIGHT
                            </th>
                            <th>
                              LENGTH
                            </th>
                            <th>
                              D-UNIT
                            </th>
                            <th>
                              CUSTOM VALUE
                            </th>
                            <th>
                              CURRENCY
                            </th>
                            <th>
                              CONTENT
                            </th>
                          </tr>
                        </thead>
                        <tbody id="uknown_list">
                          <tr id="1">
                            <td>
                              1
                            </td>
                            <td>
                              <select class="form-control" name="country_1" id="country_1">
                                 <option value="-1">Select country</option>
                                 <?php echo getCountriesFilter('az')?>
                              </select>
                            </td>
                            <td>
                              <input type="text" name="weight_1" id="weight_1" class="form-control"  value="0"/>
                            </td>
                            <td>
                              <select name="weight_type_1" id="weight_type_1" class="form-control">
                              <option value='-1'>Select weigth type</option>
                              <option value='Lb'>Pounds</option>
                              <option value='K'>Kilos</option>
                              </select>
                            </td>
                            <td>
                             <input type="text" name="width_1" id="width_1" class="form-control" value="0"/>
                            </td>
                            <td>
                              <input type="text" name="height_1" id="height_1" class="form-control" value="0"/>
                            </td>
                            <td>
                              <input type="text" name="length_1" id="length_1" class="form-control" value="0"/>
                            </td>
                            <td>
                             <select name="dim_unit_1" id="dim_unit_1" class="form-control">
                              <option value='-1'>Select dim unit</option>
                              <option value='In'>In</option>
                              <option value='Cm'>Cm</option>
                              </select>
                            </td> 
                            <td>
                              <input type="text" name="value_1" id="value_1" class="form-control" value="0"/>
                            </td>
                            <td>
                              <select name="currency_1" id="currency_1" class="form-control">
                              <option value='-1'>Select currency</option>
                              <option value='USD'>USD</option>
                              <option value='GBP'>GBP</option>
                              <option value='EUR'>EUR</option>
                              <option value='TYL'>TYL</option>
                              </select>
                            </td>
                            <td>
                              <input type="text" name="content_1" id="content_1" class="form-control" placeholder="Enter here"/>
                            </td>                          
                          </tr>
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col-md-9">
                          <button type="button" id="add_package" class="btn btn-info  waves-effect waves-light" style="margin-left:10px">
                           <a href="uknown_packages.php" style="color:white">BACK</a>
                          </button>
                        </div>
                         <div class="col-md-3" style="text-align:right;padding-right:30px">
                      <button type="button" onclick="add_new_line()" class="btn btn-info  waves-effect waves-light" >
                        Add new item
                      </button>
                        <button type="button" id="add_package" onclick="checkNewPackage()"  class="btn btn-success  waves-effect waves-light" >
                        Send
                      </button>
                     
                      </div>
                    </div>
                    <br>
                    </form>
              </div>
            </div>
          </div>
          <!-- Personal-Information -->
          
        </div>
        
        <!-- end col -->
        
        
      </div>
      
      <!-- end row -->
      
      
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
<script>
var row_num = 1;
var rows_id = [1];

function add_new_line() {
    row_num += 1;
    var elem = document.createElement('tr');
    elem.id = row_num;
    elem.innerHTML = "<td>"+row_num+"</td><td>"+
                            "<select class='form-control' name='country_"+row_num+"' id='country_"+row_num+"'>"+
                                 "<option value='-1'>Select country</option>"+
                            "</select>"+
                            "</td><td>"+
                              "<input type='text' name='weight_"+row_num+"' id='weight_"+row_num+"' class='form-control' value='0'/>"+
                            "</td><td>"+
                              "<select name='weight_type_"+row_num+"' id='weight_type_"+row_num+"' class='form-control'>"+
                              "<option value='-1'>Select weight type</option>"+
                              "<option value='Lb'>Pounds</option>"+
                              "<option value='K'>Kilos</option>"+
                              "</select>"+
                            "</td><td>"+
                             "<input type='text' name='width_"+row_num+"' id='width_"+row_num+"' class='form-control' value='0'/>"+
                            "</td><td>"+
                              "<input type='text' name='height_"+row_num+"' id='height_"+row_num+"' class='form-control' value='0'/>"+
                            "</td><td>"+
                              "<input type='text' name='length_"+row_num+"' id='length_"+row_num+"' class='form-control' value='0'/>"+
                            "</td><td>"+
                             "<select  name='dim_unit_"+row_num+"' id='dim_unit_"+row_num+"' class='form-control'>"+
                             "<option value='-1'>Select dim unit </option>"+
                              "<option value='In'>In</option>"+
                              "<option value='Cm'>Cm</option>"+
                              "</select>"+
                            "</td><td>"+
                              "<input type='text' name='value_"+row_num+"' id='value_"+row_num+"' class='form-control' value='0'/>"+
                            "</td><td>"+
                              "<select  name='currency_"+row_num+"' id='currency_"+row_num+"' class='form-control'>"+
                              "<option value='-1'>Select currency</option>"+
                              "<option value='USD'>USD</option>"+
                              "<option value='GBP'>GBP</option>"+
                              "<option value='EUR'>EUR</option>"+
                              "<option value='TYL'>TYL</option>"+
                              "</select>"+
                            "</td><td>"+
                              "<input type='text' name='content_"+row_num+"' id='content_"+row_num+"' class='form-control' placeholder='Enter here'/>"+
                            "</td>";
                             
    rows_id.push(row_num);
    document.getElementById("uknown_list").appendChild(elem);
    $("#country_"+row_num).html($("#country_1").html());
}

function checkNewPackage(){
    var container = document.getElementById('new_package_form');
    var inputs = container.getElementsByTagName('select');
    var l = inputs.length;
    var rows = l/4;
    var empty = 0;
    var deleted_rows = 0;
    var success = 1;
    var country;
    var weight;
    var weightType;
    var width;
    var height;
    var length;
    var dimUnit;
    var value;
    var currency;
    var content;

    for(var row = 0 ; row < rows; row++){
        country = document.getElementById("country_"+rows_id[row-deleted_rows]).value;
        weight = document.getElementById("weight_"+rows_id[row-deleted_rows]).value;
        weightType = document.getElementById("weight_type_"+rows_id[row-deleted_rows]).value;
        width  = document.getElementById("width_"+rows_id[row-deleted_rows]).value;
        height = document.getElementById("height_"+rows_id[row-deleted_rows]).value;
        length = document.getElementById("length_"+rows_id[row-deleted_rows]).value;
        dimUnit = document.getElementById("dim_unit_"+rows_id[row-deleted_rows]).value;
        value = document.getElementById("value_"+rows_id[row-deleted_rows]).value;
        currency = document.getElementById("currency_"+rows_id[row-deleted_rows]).value;
        content = document.getElementById("content_"+rows_id[row-deleted_rows]).value;

         if(country=="-1"){
          empty++;
         }

         if(empty==1){
          if(rows_id[row-deleted_rows]!=1){
          elem = document.getElementById(rows_id[row-deleted_rows]);
          elem.parentNode.removeChild(elem);
          rows_id.splice(row-deleted_rows,1);
          deleted_rows++;
         }
         }else if(empty!=0){
            $('#form_send_result').html("<div class=\"text-info\">Please fill all inputs at row "+rows_id[row-deleted_rows]+"</div>");
            success = 0;
         }
         else{
          if(!isEmpty(weight)){
            if(!isNumeric(weight)){
              $('#form_send_result').html("<div class=\"text-info\">Weight should be a number at row "+rows_id[row-deleted_rows]+"</div>");
              success=0;
            }else if((weightType=='-1')&&(weight!=0)){
              $('#form_send_result').html("<div class=\"text-info\">Please select weight type at row "+rows_id[row-deleted_rows]+"</div>");
              success=0;
            }
          }else{
            $('#form_send_result').html("<div class=\"text-info\">Weight should be 0 or another number at row "+rows_id[row-deleted_rows]+"</div>");
            success=0;
          }

          if(!isEmpty(width)){
            if(!isNumeric(width)){
             $('#form_send_result').html("<div class=\"text-info\">Width should be a number at row "+rows_id[row-deleted_rows]+"</div>");
             success=0;
            }else if((dimUnit=='-1')&&(width!=0)){
             $('#form_send_result').html("<div class=\"text-info\">Please select dim unit at row "+rows_id[row-deleted_rows]+"</div>");
            success=0;
            }
          }else{
            $('#form_send_result').html("<div class=\"text-info\">Width should be 0 or another number at row "+rows_id[row-deleted_rows]+"</div>");
            success=0;
          }

          if(!isEmpty(height)){
            if(!isNumeric(height)){
             $('#form_send_result').html("<div class=\"text-info\">Height should be a number at row "+rows_id[row-deleted_rows]+"</div>");
             success=0;
           }else if((dimUnit=='-1')&&(height!=0)){
             $('#form_send_result').html("<div class=\"text-info\">Please select dim unit at row "+rows_id[row-deleted_rows]+"</div>");
            success=0;
           }
          }else{
            $('#form_send_result').html("<div class=\"text-info\">Height should be 0 or another number at row "+rows_id[row-deleted_rows]+"</div>");
            success=0;
          }

          if(!isEmpty(length)){
            if(!isNumeric(length)){
             $('#form_send_result').html("<div class=\"text-info\">Width should be a number at row "+rows_id[row-deleted_rows]+"</div>");
             success=0;
            }else if((dimUnit=='-1')&&(length!=0)){
             $('#form_send_result').html("<div class=\"text-info\">Please select dim unit at row "+rows_id[row-deleted_rows]+"</div>");
            success=0;
            }
          }else{
            $('#form_send_result').html("<div class=\"text-info\">Width should be 0 or another number at row "+rows_id[row-deleted_rows]+"</div>");
            success=0;
          }


          if(!isEmpty(value)){
            if(!isNumeric(value)){
             $('#form_send_result').html("<div class=\"text-info\">Custom value should be a number at row "+rows_id[row-deleted_rows]+"</div>");
             success=0;
           }else if((currency=='-1')&&(value!=0)){
             $('#form_send_result').html("<div class=\"text-info\">Please select currency  at row "+rows_id[row-deleted_rows]+"</div>");
            success=0;
           }
          }else{
            $('#form_send_result').html("<div class=\"text-info\">Custom value should be 0 or another number at row "+rows_id[row-deleted_rows]+"</div>");
            success=0;
          }
         }
         empty = 0;
    }

    if(success == 1){
    $.ajax({
        type: 'POST',
        url: 'add_uknown_package.php',
        data: $('#new_package_form').serialize(), //It would be best to put it like that, make it the same name so it wouldn't be confusing
        success: function(data){
          $('#form_send_result').html(data);
          var rows = $("#uknown_list tr");
          var nRow;
          for (var i = 1; i< rows.length; i++) {
              rows[i].remove();
          };        
          $("#country_1").val("-1");
          $("#weight_type_1").val("-1");
          $("#weight_1").val("");
          $("#width_1").val("");
          $("#height_1").val("");
          $("#length_1").val("");
          $("#dim_unit_1").val("-1");
          $("#value_1").val("");
          $("#currency_1").val("-1");
          $("#content_1").val("");

        },
      });
    }
}

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function isEmpty(text){
   return (text.trim().length==0);
}
</script>
