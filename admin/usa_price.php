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
$country_id=1;
$row=getPriceInfo($country_id);
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
                            USA
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                PRICE TABLE 
              </h3>
                        </div>
                        <div class="panel-body contacts">
                            <div class="row">
                                <div id="result">&nbsp;</div>
                                <br/>
                                <form action="#" method="POST" id="price_form">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
 <div class="row"> 
  <input type="hidden" value="<?php echo sizeof($row);?>" name="count" id="count"/>
  <input type="hidden" value="2" name="country_id" id="country_id"/>
                                            <div class="col-md-12"  id="prices">
                                              
                                                <div class="row">
                                                    <div class='col-md-6'><label>Left column name(Name):</label></div>
                                                    <div class='col-md-6'><label>Right column name(Value):</label></div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div style='float:left'>&nbsp;&nbsp;&nbsp;</div>
                                                    <div class="col-md-11">
                                                    <div class='col-md-2'><label>AZE:</label></div>
                                                    <div class='col-md-2'><label>RU:</label></div>
                                                    <div class='col-md-2'><label>ENG:</label></div>
                                                    <div class='col-md-2'><label>AZE:</label></div>
                                                    <div class='col-md-2'><label>RU:</label></div>
                                                    <div class='col-md-2'><label>ENG:</label></div>
                                                </div>
                                                </div>
                                                <?php
                                                for($i=0; $i<sizeof($row);$i++){
                                                    echo "<div class='row price_row' id='$i'>";
                                                    echo "<div style='float:left'>";
                                                    echo "<input  type=\"checkbox\" name=\"check\" id=\"check_$i\" value=\"$i\"/>";
                                                    echo "</div>";
                                                    echo "<div class='col-md-11'>";
                                                    echo "<div class='col-md-2'>";
                                                    echo "<input class=\"form-control\" type=\"text\" name=\"category_az_$i\" id=\"category_$i\" value=\"".$row[$i]['category_az']."\"/>";
                                                    echo "</div>";
                                                    echo "<div class='col-md-2'>";
                                                    echo "<input class=\"form-control\" type=\"text\" name=\"category_ru_$i\" id=\"category_$i\" value=\"".$row[$i]['category_ru']."\"/>";
                                                    echo "</div>";
                                                    echo"<div class='col-md-2'>";                                                   
                                                    echo "<input class=\"form-control\" type=\"text\" name=\"category_en_$i\" id=\"category_en_$i\" value=\"".$row[$i]['category_en']."\"/>";
                                                    echo "</div>";
                                                    echo "<div class='col-md-2'>";
                                                    echo "<input class=\"form-control\" type=\"text\" name=\"value_az_$i\" id=\"value_az_$i\" value=\"".$row[$i]['value_az']."\"/>";
                                                    echo "</div>";
                                                    echo "<div class='col-md-2'>";
                                                    echo "<input class=\"form-control\" type=\"text\" name=\"value_ru_$i\" id=\"value_ru_$i\" value=\"".$row[$i]['value_ru']."\"/>";
                                                    echo "</div><div class='col-md-2'>";                                                   
                                                    echo "<input class=\"form-control\" type=\"text\" name=\"value_en_$i\" id=\"value_en_$i\" value=\"".$row[$i]['value_en']."\"/>";
                                                    echo "</div></div></div>";
                                                }
                                                ?>
                                    </div>
                                </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-sm-3">
                                                <span class="btn btn-info btn-block waves-effect waves-light" id="removeRows">REMOVE -</span>
                                            </div> 
                                            <div class="col-sm-3">
                                                <span class="btn btn-info btn-block waves-effect waves-light" id="addRows">ADD ROW +</span>
                                            </div> 
                                            <div class="col-sm-3">
                                                <span class="btn btn-info btn-block waves-effect waves-light" id="editPrices">EDIT</span>
                                            </div>
                                        <div class="row" style="float:right">
                                             <span class="waves-effect waves-light"><a href="uk.php">BACK</a></span>
                                        </div>  
                                        </div>                                      
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
<?php include( "footer.php"); ?>
<script>
var count = $("#count").val();

$("#addRows").click(function() {
    var newRow = "<div class='row price_row' id='" + count + "'>";
    newRow += "<div style='float:left'>";
    newRow += "<input  type='checkbox' name='check' id='check_" + count + "' value='" + count + "'/>";
    newRow += "</div>";
    newRow += "<div class='col-md-11'>";
    newRow += "<div class='col-md-2'>";
    newRow += "<input class=\"form-control\" type=\"text\" name=\"category_az_" + count + "\" id=\"category_az_" + count + "\" value=\"\"/>";
    newRow += "</div><div class='col-md-2'>";
    newRow += "<input class=\"form-control\" type=\"text\" name=\"value_az_" + count + "\" id=\"value_az_" + count + "\" value=\"\"/>";
    newRow += "</div>";
    newRow += "<div class='col-md-2'>";
    newRow += "<input class=\"form-control\" type=\"text\" name=\"category_ru_" + count + "\" id=\"category_ru_" + count + "\" value=\"\"/>";
    newRow += "</div><div class='col-md-2'>";
    newRow += "<input class=\"form-control\" type=\"text\" name=\"value_ru_" + count + "\" id=\"value_ru_" + count + "\" value=\"\"/>";
    newRow += "</div>";
    newRow += "<div class='col-md-2'>";
    newRow += "<input class=\"form-control\" type=\"text\" name=\"category_en_" + count + "\" id=\"category_en_" + count + "\" value=\"\"/>";
    newRow += "</div><div class='col-md-2'>";
    newRow += "<input class=\"form-control\" type=\"text\" name=\"value_en_" + count + "\" id=\"value_en_" + count + "\" value=\"\"/>";
    newRow += "</div></div>";
    newRow += "</div>";
    $("#prices").html($("#prices").html() + newRow);
    count++;
});

$("#editPrices").click(function() {
    var r = confirm("Are you sure?");
    var empty=true;
    if (r == true) {
        var inputs;
        $(".price_row").each(function() {
            $(this).find("input").each(function() {
                if (isEmpty($(this).val())) {
                    $("#result").html("<span class='text-danger'>Fill all inputs in the row or remove row!</span>");
                    empty=false;
                }
            });
        });
        if(empty==true){
            $.ajax({
                type: 'POST',
                url: 'edirPrice.php',
                data: $("#price_form").serialize(), 
                success: function(data){
                    $("#result").html(data);
                },
            });
        }
    }
});

function isEmpty(text) {
    return (text.trim().length == 0);
}

$("#removeRows").click(function() {
    var checked_num;
    $("input:checkbox[name=check]:checked").each(function() {
        $("#" + $(this).val()).remove();
    });
});
</script>