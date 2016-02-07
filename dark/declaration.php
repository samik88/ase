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

if (isset($_SESSION['pincode'])) {
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
                    <form action="#" method="POST" id="declaration_form">
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
                              <input type="text" name="e-store_1" id="e-store_1" class="form-control"/>
                            </td>
                            <td>
                              <input type="text" name="content_1" id="content_1" class="form-control"/>
                            </td>
                            <td>
                              <input type="text" name="qty_1" id="qty_1" class="form-control"/>
                            </td>
                            <td>
                              <input type="text" name="price_1" id="price_1" class="form-control"/>
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
} else {
echo "Please, login first";
}
include("footer.php");
?>
<script>
 var row_num = 1;

function add_order() {
    row_num += 1;
    var elem = document.createElement('tr');
    elem.id = row_num;
    elem.innerHTML = '<td>' + row_num + '</td>' +
        '<td><input type="text" name="e-store_' + row_num + '" id="e-store_' + row_num + '" class="form-control"/></td>' +
        '<td><input type="text" name="content_' + row_num + '" id="content_' + row_num + '"class="form-control"/></td>' +
        '<td><input type="text" name="qty_' + row_num + '" id="qty_' + row_num + '" class="form-control"/></td>' +
        '<td><input type="text" name="price_' + row_num + '" id="price_' + row_num + '" class="form-control"/></td>';
    document.getElementById("order_list").appendChild(elem);

}

function check_declaration() {
    var container, inputs, index, row, count, empty, elem, deleted_row;

    // Get the container element
    container = document.getElementById('declaration_form');

    // Find its child `input` elements
    inputs = container.getElementsByTagName('input');
    l = inputs.length;
    count = 0;
    empty = 0;
    deleted_row = 0;
    for (index = 0; index < l; ++index) {
        row = (index + 4 - count) / 4 + deleted_row;

        count++;

        if (inputs[index].value == "") {
            empty++;
        } else {
            switch (count) {
                case 2:
                case 3:
                    if (!isNumeric(inputs[index].value)) {
                        alert("Item quantity and price should be a number");
                    }


            }

        }
        if (count == 4) {
            if (empty == 4) {
                //TODO delete row
                if (row != 1) {
                    elem = document.getElementById(row);
                    elem.parentNode.removeChild(elem);
                    index -= 4;
                    deleted_row += 1;
                    l -= 4;
                } else {
                    alert("Please fill all inputs");
                }
            } else {
                if (empty != 0) {
                    alert("Please fill all inputs");
                    break;
                }
            }
            count = 0;
            empty = 0;
        }
    }
    if (1) {

    } else {
        document.getElementById("check_declaration").submit();
    }
}

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}
</script>
