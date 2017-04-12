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
                Ask us items you would like to buy
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
                                              <div class="alert" id="form_send_result"> </div>
                                              <form id="order_form" action="#" method="POST">
                                                <input type="hidden" name="accountNumber" id="accountNumber" class="form-control"/>
                                                <input type="hidden" name="count" id="count" class="form-control" value="4"/>
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
                                                         <select name="country_1" id="country_1" class="form-control">
                                                          <option value="-1">
                                                            Select country
                                                          </option>
                                                          <option value="1">
                                                            USA
                                                          </option>
                                                          <option value="2">
                                                            UK
                                                          </option>
                                                          <option value="3">
                                                            TURKEY
                                                          </option>
                                                        </select>
                                                      </td>
                                                      <td>
                                                        <textarea  name="detail_1" id="detail_1" class="form-control" value=""></textarea>
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
                        <button type="button" id="send_request" onclick="check_order()"  class="btn btn-success  waves-effect waves-light" >
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
include("footer.php");
?>

<script>
var row_num = 1;
var rows_id = [1] ;

function add_order(){
    row_num += 1;
    var elem = document.createElement('tr');
    elem.id = row_num;
    elem.innerHTML = '<td>' + row_num + '</td> ' +
    '<td> <input type = "text" name = "address_' + row_num + '" id = "address_' + row_num + '" class = "form-control" /></td>' +
    '<td> <input type = "text" name = "phone_' + row_num + '" id = "phone_' + row_num + '" class = "form-control" /></td>' +
    ' <td> <select name = "country_'+ row_num + '"  id = "country_'+ row_num + '" class = "form-control">'+
    ' <option value = "-1">Select country</option>'+
    ' <option value = "1">USA</option>'+
    ' <option value = "2">UK</option>'+
    ' <option value = "3">TURKEY </option>'+
    ' </select> </td>'+
    ' <td><textarea name = "detail_'+ row_num + '" id = "detail_'+ row_num + '" class = "form-control"></textarea> </td>';
    rows_id.push(row_num);
    document.getElementById("order_list").appendChild(elem);
}

function check_order(){
    var container = document.getElementById('order_form');
    var inputs = container.getElementsByTagName('input');
    var l = inputs.length;
    var rows = (l-2)/2;
    var empty = 0;
    var deleted_rows = 0;
    var success = 1;
    var address;
    var phone;
    var country;
    var detail;
    var time;
    var elem;

    $("#accountNumber").val($('#accNumber').val());

    for(var row = 0 ; row < rows; row++){
        address = document.getElementById("address_"+rows_id[row-deleted_rows]);
        phone   = document.getElementById("phone_"+rows_id[row-deleted_rows]);
        country = document.getElementById("country_"+rows_id[row-deleted_rows]);
        detail  = document.getElementById("detail_"+rows_id[row-deleted_rows]);
        time    = document.getElementById("time_"+rows_id[row-deleted_rows]);

         if(isEmpty(address.value)){
          empty++;
         }

         if(isEmpty(phone.value)){
          empty++;
         }

         if(country.value=="-1"){
          empty++;
         } 

         if(isEmpty(detail.value)){
          empty++;
         }


         if(empty==4){
          elem = document.getElementById(rows_id[row-deleted_rows]);
          elem.parentNode.removeChild(elem);
          rows_id.splice(row-deleted_rows,1);
          deleted_rows++;
         }else if(empty!=0){
          $('#form_send_result').html("<div class=\"text-info\">Please fill all inputs at row "+rows_id[row-deleted_rows]+"</div>");
          success = 0;
         }
         else if(!isNumeric(phone.value)){
             $('#form_send_result').html("<div class=\"text-info\">Phone number should be a number at row "+rows_id[row-deleted_rows]+"</div>");
             success=0;
         }else if(phone.value.length!=10){
             $('#form_send_result').html("<div class=\"text-info\">Phone number should be a 10 digits number at row "+rows_id[row-deleted_rows]+"</div>");
             success=0;
         }
         empty = 0;
    }


    if(success == 1){
    $.ajax({
    type: 'POST',
    url: 'add_forms.php',
    data: $('#order_form').serialize(), //It would be best to put it like that, make it the same name so it wouldn't be confusing
    success: function(data){
       $('#form_send_result').html(data);
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
