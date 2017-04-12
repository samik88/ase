<?php
$index_sub=""; 
$warehouse_sub=""; 
$packages_sub=""; 
$ukn_packages_sub=""; 
$declaration_sub=""; 
$requests_sub=""; 
$purchases_sub=""; 
$news_sub="active"; 
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
            <li>
              <a href="#">
                News
              </a>
            </li>
            <li class="active">
              Editors
            </li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                News Editor
              </h3>
            </div>
            <div class="panel-body">       
                <div id="result"></div>   
                <div>
                  <label for="title">TITLE:</label>
                  <input class="form-control input-lg" type="text"  name="title" placeholder="title"/>
                </div> 
                <br/>
                <label for="summernote">BODY:</label>      
                <div class="summernote" id="summernote">
                    Start here
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form>
                            <input type="radio" name="status" value="1"  checked="checked"> Publish<br>
                            <input type="radio" name="status" value="0"> Save draft<br>
                        </form>
                    </div>
                </div>              
                <div class="row" style="float:right">
                    <div class="btn btn-info" id="addNews">
                            Add
                    </div>
                    <div class="btn btn-info">
                        <a href="news.php" style="color:white">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
          </div>
        </div>        
      </div>      
      <!-- End row -->     
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
<script src="../assets/plugins/summernote/dist/summernote.min.js"></script>

<script>
  
  jQuery(document).ready(function(){
    
    $('.summernote').summernote({
      height: 200,                 // set editor height
      
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      
      focus: true                 // set focus to editable area after initializing summernote
    });
    
  });

  $("#addNews").click(function(){   
    var title=$('input:text[name=title]').val();
    var news=$('#summernote').code();
    var status=$('input:radio[name=status]').val();
    $.ajax({
              type: 'POST',
              url: 'add_news.php',
              data: { 'title':title,'news':news,'status':status}, 
              success: function(data){
                 if(data.status == "success"){
                  //todo delete activate button, make span "activated"
                  $('#summernote').code("");
                  }
                  $('#result').html(data.message);
              },
    });
  });
</script>