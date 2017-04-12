<?php

$index_sub="";
$usa_sub="";
$uk_sub="";
$turkey_sub="";
$orders_sub="";
$purchases_sub="";
$ask_buy_sub="";  
$declaration_sub="active";
$faq_sub="";
$contacts_sub="";
include("header.php");


//TODO send mail to operators about declaration
/*if(){
sendMail('s.allahverdiyeva@gmail.com', $name, 'new user registered ' . $name . "   " . $message);

}*/
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
          </h4>
          <ol class="breadcrumb pull-right">
            <li>
              <a href="#">
                ASEshopping
              </a>
            </li>
            <li class="active">
              Declaration
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
                Declaration form
              </h3>
              
            </div>
            
            <div class="panel-body">
              
              
              <div class="panel panel-default">
                
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="alert alert-success">
                      <div>
                        ATTENTION
                        <a data-toggle="collapse" data-parent="#uk" href="#order-suggestion"  style="float:right">
                          <i class="ion-minus-round">
                          </i>
                        </a>
                      </div>
                      <div id="order-suggestion">
                        PLEASE, INDICATE ITEMS ONE BY ONE.
                        <br>
                        For example, if you have 1 bag of clothing. You should indicate them separately.  1 top from Zara, 2 tops from Mango, 1 bag form Mango, 1 bag form Zara
                        <br>
                        You can write once and choose more "Quantity" only of the same item. For example, 2 same bags, 3 same tops, etc.
                      </div>
                    </div>
                     <div class="alert" id="form_send_result"> </div>
                    <form action="#" method="POST" id="declaration_form">
                      <input type="hidden" name="accountNumber" id="accountNumber" class="form-control"/>
                      <input type="hidden" name="count" id="count" class="form-control" value="5"/>
                      <table class="table table-striped edited">
                        <thead>
                          <tr>
                            <th>
                              #
                            </th>
                            <th>
                              E-STORE
                            </th>
                            <th>
                              COMMODITY(content)
                            </th>
                            <th>
                              COUNTRY
                            </th>
                            <th>
                              ITEM Q-TY
                            </th>
                            <th>
                              TOTAL PRICE
                            </th>
                          </tr>
                        </thead>
                        <tbody id="order_list">
                          <tr id="1">
                            <td>
                              1
                            </td>
                            <td>
                              <input type="text" name="e-store_1" id="e-store_1" class="form-control" placeholder="Enter here"/>
                            </td>
                            <td>
                              <input type="text" name="content_1" id="content_1" class="form-control" placeholder="Enter here"/>
                            </td>
                            <td>
                            <select class="form-control" name="country_1" id="country_1">
                              <option value="-1">Select country</option>
                              <option value="0">No country</option>
                              <option value="1">USA</option>
                              <option value="2">UK</option>
                              <option value="3">TURKEY</option>
                           </select>
                            </td>
                            <td>
                              <input type="text" name="qty_1" id="qty_1" class="form-control" placeholder="Enter here"/>
                            </td>
                            <td>
                              <input type="text" name="price_1" id="price_1" class="form-control" placeholder="Enter here"/>
                            </td>
                          </tr>
                                                 </tbody>
                      </table>
                      <div class="row">
                        <div class="col-md-9">
                        </div>
                         <div class="col-md-3" style="text-align:right;padding-right:30px">
                      <button type="button" onclick="add_order()" class="btn btn-info  waves-effect waves-light" >
                        Add new item
                      </button>
                        <button type="button" id="send_declaration" onclick="check_declaration()"  class="btn btn-success  waves-effect waves-light" >
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

function add_order() {
    row_num += 1;
    var elem = document.createElement('tr');
    elem.id = row_num;
    elem.innerHTML = '<td>' + row_num + '</td>' +
        '<td><input type="text" name="e-store_' + row_num + '" id="e-store_' + row_num + '" class="form-control" placeholder="Enter here"/></td>' +
        '<td><input type="text" name="content_' + row_num + '" id="content_' + row_num + '"class="form-control" placeholder="Enter here"/></td>' +
        '<td><select class="form-control" name="country_' + row_num + '" id="country_'+ row_num +'">'+
                              '<option value="-1">Select country</option>'+
                              '<option value="0">No country</option>'+
                              '<option value="1">USA</option>'+
                              '<option value="2">UK</option>'+
                              '<option value="3">TURKEY</option>'+
                           '</select></td>'+
        '<td><input type="text" name="qty_' + row_num + '" id="qty_' + row_num + '" class="form-control" placeholder="Enter here"/></td>' +
        '<td><input type="text" name="price_' + row_num + '" id="price_' + row_num + '" class="form-control" placeholder="Enter here"/></td>';
        rows_id.push(row_num);
    document.getElementById("order_list").appendChild(elem);

}

function check_declaration(){
    var container = document.getElementById('declaration_form');
    var inputs = container.getElementsByTagName('input');
    var l = inputs.length;
    var rows = (l-2)/4;
    var empty = 0;
    var deleted_rows = 0;
    var success = 1;
    var e_store;
    var content;
    var country;
    var qty;
    var price;
    var elem;

    $("#accountNumber").val($('#accNumber').val());

    for(var row = 0 ; row < rows; row++){
        e_store = document.getElementById("e-store_"+rows_id[row-deleted_rows]);
        content   = document.getElementById("content_"+rows_id[row-deleted_rows]);
        country = document.getElementById("country_"+rows_id[row-deleted_rows]);
        qty  = document.getElementById("qty_"+rows_id[row-deleted_rows]);
        price    = document.getElementById("price_"+rows_id[row-deleted_rows]);

         if(isEmpty(e_store.value)){
          empty++;
         }

         if(isEmpty(content.value)){
          empty++;
         }

         if(country.value=="-1"){
          empty++;
         } 

         if(isEmpty(qty.value)){
          empty++;
         }

         if(isEmpty(price.value)){
          empty++;
         }

         if(empty==5){
          elem = document.getElementById(rows_id[row-deleted_rows]);
          elem.parentNode.removeChild(elem);
          rows_id.splice(row-deleted_rows,1);
          deleted_rows++;
         }else if(empty!=0){
  $('#form_send_result').html("<div class=\"text-info\">Please fill all inputs at row "+rows_id[row-deleted_rows]+"</div>");
          success = 0;
         }
         else{
          if(!isNumeric(qty.value)){
     $('#form_send_result').html("<div class=\"text-info\">Phone number should be a number at row "+rows_id[row-deleted_rows]+"</div>");
             success=0;
          }else if(!isNumeric(price.value)){
     $('#form_send_result').html("<div class=\"text-info\">Price should be a number at row "+rows_id[row-deleted_rows]+"</div>");
             success=0;
          }
         }
         empty = 0;
    }

    if(success == 1){
    $.ajax({  
    type: 'POST',
    url: 'add_declaration.php',
    data: $('#declaration_form').serialize(), //It would be best to put it like that, make it the same name so it wouldn't be confusing
    success: function(data){
      $('#form_send_result').html(data);
      var rows = $("#order_list tr");
      var nRow;
      for (var i = 1; i< rows.length; i++) {
              rows[i].remove();
      };  
      $("#e-store_1").val("");
      $("#country_1").val("-1");
      $("#content_1").val("");
      $("#price_1").val("");
      $("#qty_1").val("");
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
