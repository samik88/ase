<?php

$index_sub="";
$usa_sub="";
$uk_sub="";
$turkey_sub="";
$orders_sub="";
$purchases_sub="";
$ask_buy_sub="active";  
$declaration_sub="";
$faq_sub="";
$contacts_sub="";
include("header.php");

if (isset($_SESSION['pincode'])) {
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
              Ask to buy
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
                Ask us items you would liek to buy
              </h3>
              
            </div>
            
            <div class="panel-body">
              
              
              <div class="panel panel-default">
                
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="alert alert-success">
                      <div>
                        INFORMATION
                        <a data-toggle="collapse" data-parent="#uk" href="#order-suggestion"  style="float:right">
                          <i class="ion-minus-round">
                          </i>
                        </a>
                                                 </div>
                                                 <div id="order-suggestion">
                                                   After receiveing your order, we will send you detailed info or call about following process.
                                                   <br>
                                            
                                                 </div>
                                              </div>
                                              <form id="order_form" action="#" method="POST">
                                                <table class="table table-striped edited">
                                                  <thead>
                                                    <tr>
                                                      <th>
                                                        #
                                                      </th>
                                                      <th>
                                                        ORDER URL(SITE)
                                                      </th>
                                                      <th>
                                                        PHONE NUMBER
                                                      </th> 
                                                      <th>
                                                       COUNTRY
                                                      </th>
                                                      <th>
                                                        DETAILS
                                                      </th>
                                                      <th>
                                                        TIME
                                                      </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody id="order_list">
                                                    <tr id="1">
                                                      <td>
                                                        1
                                                      </td>
                                                      <td>
                                                        <input type="text" name="address_1" id="address_1" class="form-control"/>
                                                      </td>
                                                      <td>
                                                        <input type="text" name="phone_1" id="phone_1" class="form-control"/>
                                                      </td>
                                                      <td>
                                                         <select name="country_1" class="form-control">
                                                          <option value="USA">
                                                            USA
                                                          </option>
                                                          <option value="UK">
                                                            UK
                                                          </option>
                                                          <option value="TURKEY">
                                                            TURKEY
                                                          </option>
                                                        </select>
                                                      </td>
                                                      <td>
                                                        <textarea  name="detail_1" id="detail_1" class="form-control">
                                                        </textarea>
                                                      </td>
                                                      <td>
                                                        <select name="time_1" class="form-control">
                                                          <option value="0">
                                                            Before 14.00
                                                          </option>
                                                          <option value="1">
                                                            After 14.00
                                                          </option>
                                                        </select>
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
                        <button type="button" id="send_declaration" onclick="check_order()"  class="btn btn-success  waves-effect waves-light" >
                        Send
                      </button>
                     
                      </div>
                    </div>
                    <br>
                                              </form>
                                          </div>
                                                  </div>
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
    elem.innerHTML = ' < td >
        ' + row_num + ' < /td>
    ' +
    ' < td >
        < input type = "text"
    name = "e-store_' + row_num + '"
    id = "e-store_' + row_num + '"
    class = "form-control" / >
        < /td>
    ' +
    ' < td >
        < input type = "text"
    name = "content_' + row_num + '"
    id = "content_' + row_num + '"
    class = "form-control" / >
        < /td>
    ' +
    ' < td >

        < select name = "country_'+ row_num + '"
    class = "form-control" >
        '+
    ' < option value = "USA" >
        USA < /option>
    '+
    ' < option value = "UK" >
        UK < /option>
    '+
    ' < option value = "TURKEY" >
        TURKEY < /option>
    '+
    ' < /select> < /td>
    '+
    ' < td >

        < textarea name = "detail_'+ row_num + '"
    id = "detail_'+ row_num + '"
    class = "form-control" >
        < /textarea> < /td>
    '+

    ' < td >

        < select name = "time_' + row_num + '"
    class = "form-control" >
        '+
    ' < option value = "0" >
        Before 14.00 < /option>
    '+
    ' < option value = "1" >
        After 14.00 < /option>
    '+
    ' < /select> < /td>
    ';
    document.getElementById("order_list").appendChild(elem);
}

function check_order() {
    var container, inputs, index, row, count, empty, elem, deleted_row;

    // Get the container element
    container = document.getElementById('order_form');

    // Find its child `input` elements
    inputs = container.getElementsByTagName('input');

    l = inputs.length;
    count = 0;
    empty = 0;
    deleted_row = 0;
    for (index = 0; index < l; ++index) {
        row = (index + 5 - count) / 5 + deleted_row;

        count++;

        if (inputs[index].value == "") {
            empty++;
        } else {

            switch (count) {
                case 2:
                    if (!isNumeric(inputs[index].value)) {
                        alert("Phone should be a number");
                    } else {
                        if (inputs[index].value.length != 10) {
                            alert("Phone number should be 10 digits");
                        }
                    }


            }

        }
        if (count == 5) {
            if (empty == 3) {
                //TODO delete row
                if (row != 1) {
                    elem = document.getElementById(row);
                    elem.parentNode.removeChild(elem);
                    index -= 5;
                    deleted_row += 1;
                    l -= 5;
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
        document.getElementById("check_order").submit();
    }
}

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}
</script>
