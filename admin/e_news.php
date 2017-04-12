<?php
   
   $index_sub="active";
   $usa_sub="";
   $uk_sub="";
   $turkey_sub="";
   $orders_sub="";
   $purchases_sub="";
   $ask_buy_sub="";  
   $declaration_sub="";
   $faq_sub="";
   $contacts_sub="";

if(isset($_GET["id"])){
include("header.php");
$id=$_GET["id"];
$news_body=getNewsBy($id);

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
            Editors
          </h4>
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
                  <input type="hidden"  name="id" value="<?php echo $id;?>"/>
                  <label for="title">TITLE:</label>
                  <input class="form-control input-lg" type="text"  name="title" value="<?php echo $news_body["message"]["title"];?>"/>
                </div> 
                <br/>
                <label for="summernote">BODY:</label>  
                <div class="summernote" id="summernote">
                    <?php echo $news_body["message"]["news_body"];?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form>
                            <input type="radio" name="status" value="1" <?php if($news_body["message"]["status"]==1){ ?>checked="checked" <?php } ?> > Publish<br>
                            <input type="radio" name="status" value="0" <?php if($news_body["message"]["status"]==0){ ?>checked="checked" <?php } ?> > Save draft<br>
                        </form>
                    </div>
                </div>              
                <div class="row" style="float:right">
                    <div class="btn btn-info" id="editNews">
                            Edit
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
}
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

  $("#editNews").click(function(){
    var title=$('input:text[name=title]').val();
    var news=$('#summernote').code();
    var status=$('input:radio[name=status]').val();
    var id=$('input[name=id]').val();
    $.ajax({
              type: 'POST',
              url: 'edit_news.php',
              data: {'id':id,'title':title, 'news':news,'status':status}, 
              success: function(data){
                alert(data);
                 /*if(data.status == "success"){
                  }
                  $('#result').html(data.message);*/
              },
    });
  });
</script>

    