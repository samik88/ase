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

include( "header.php"); 
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
                      News list
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
                <div class="panel-body news">
                  <div class="row">
                    <div id="result"></div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php $news=getNews(0,9,null);
                        if($news["status"]=="success"){
                        ?>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="panel panel-default panel-border" id="<?php echo $news["result"][0]["id"] ?>_news">
                            <div class="panel-heading">                              
                              <h3 class="panel-title" style="display:inline">
                                <?php echo $news["result"][0]["title"];?>
                              </h3>
                              <div class="news-tool">
                                    <a href="e_news.php?id=<?php echo $news["result"][0]["id"] ?>" data-toggle="reload"><i class="ion-edit"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" class="remove" id="<?php echo $news["result"][0]["id"];?>"><i class="ion-close-round"></i></a>
                               </div>                              
                            </div>                            
                            <div class="panel-body">
                                <input type="checkbox" class="read-more-state" id="post-1" />
                                <p id="news-1" class="read-more-wrap">
                                    <?php echo substr($news["result"][0]["news_body"],0,300);?>
                                </p>
                                <div class="read-more-target">
                                    <?php echo $news["result"][0]["news_body"];?>
                                </div>
                                <label for="post-1" class="read-more-trigger">...</label>                              
                            </div> 
                            <div class="btn-info btn btn-sm publish" id="<?php echo $news["result"][0]["id"];?>"><?php if($news["result"][0]["status"]==0){ echo "PUBLISH";}else{ echo "DISABLE";}?></div>                         
                            <input type="hidden" id="<?php echo $news["result"][0]["id"];?>_status" value="<?php echo $news["result"][0]["status"];?>" />
                          </div>
                        </div>
                         <div class="col-lg-4">
                          <div class="panel panel-primary panel-border" id="<?php echo $news["result"][1]["id"] ?>_news">
                            <div class="panel-heading">                              
                              <h3 class="panel-title" style="display:inline">
                                <?php echo $news["result"][1]["title"];?>
                              </h3>
                              <div class="news-tool">
                                    <a href="e_news.php?id=<?php echo $news["result"][1]["id"] ?>" data-toggle="reload"><i class="ion-edit"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" class="remove" id="<?php echo $news["result"][1]["id"];?>"><i class="ion-close-round"></i></a>
                               </div>                              
                            </div>                            
                            <div class="panel-body">
                                <input type="checkbox" class="read-more-state" id="post-2" />
                                <p id="news-2" class="read-more-wrap">
                                    <?php echo substr($news["result"][1]["news_body"],0,300);?>
                                </p>
                                <div class="read-more-target">
                                    <?php echo $news["result"][1]["news_body"];?>
                                </div>
                                <label for="post-2" class="read-more-trigger">...</label>                              
                            </div>      
                            <div class="btn-info btn btn-sm publish" id="<?php echo $news["result"][1]["id"];?>"><?php if($news["result"][1]["status"]==0){ echo "PUBLISH";}else{ echo "DISABLE";}?></div>                                               
                          </div>
                        </div>
                       <div class="col-lg-4">
                          <div class="panel panel-success panel-border" id="<?php echo $news["result"][2]["id"] ?>_news">
                            <div class="panel-heading">                              
                              <h3 class="panel-title" style="display:inline">
                                <?php echo $news["result"][2]["title"];?>
                              </h3>
                              <div class="news-tool">
                                    <a href="e_news.php?id=<?php echo $news["result"][2]["id"] ?>" data-toggle="reload"><i class="ion-edit"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" class="remove" id="<?php echo $news["result"][2]["id"];?>"><i class="ion-close-round"></i></a>
                               </div>                              
                            </div>                            
                            <div class="panel-body">
                                <input type="checkbox" class="read-more-state" id="post-3" />
                                <p id="news-3" class="read-more-wrap">
                                    <?php echo substr($news["result"][2]["news_body"],0,300);?>
                                </p>
                                <div class="read-more-target">
                                    <?php echo $news["result"][2]["news_body"];?>
                                </div>
                                <label for="post-3" class="read-more-trigger">...</label>                              
                            </div>                 
                            <div class="btn-info btn btn-sm publish" id="<?php echo $news["result"][2]["id"];?>"><?php if($news["result"][2]["status"]==0){ echo "PUBLISH";}else{ echo "DISABLE";}?></div>                                    
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="panel panel-info panel-border" id="<?php echo $news["result"][3]["id"] ?>_news">
                            <div class="panel-heading">                              
                              <h3 class="panel-title" style="display:inline">
                                <?php echo $news["result"][3]["title"];?>
                              </h3>
                              <div class="news-tool">
                                    <a href="e_news.php?id=<?php echo $news["result"][3]["id"] ?>" data-toggle="reload"><i class="ion-edit"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" class="remove" id="<?php echo $news["result"][3]["id"];?>"><i class="ion-close-round"></i></a>
                               </div>                              
                            </div>                            
                            <div class="panel-body">
                                <input type="checkbox" class="read-more-state" id="post-4" />
                                <p id="news-4" class="read-more-wrap">
                                    <?php echo substr($news["result"][3]["news_body"],0,300);?>
                                </p>
                                <div class="read-more-target">
                                    <?php echo $news["result"][3]["news_body"];?>
                                </div>
                                <label for="post-4" class="read-more-trigger">...</label>                              
                            </div>          
                            <div class="btn-info btn btn-sm publish" id="<?php echo $news["result"][3]["id"];?>"><?php if($news["result"][3]["status"]==0){ echo "PUBLISH";}else{ echo "DISABLE";}?></div>                                                        
                          </div>
                        </div>
                       <div class="col-lg-4">
                          <div class="panel panel-warning panel-border" id="<?php echo $news["result"][4]["id"] ?>_news">
                            <div class="panel-heading">                              
                              <h3 class="panel-title" style="display:inline">
                                <?php echo $news["result"][4]["title"];?>
                              </h3>
                              <div class="news-tool">
                                    <a href="e_news.php?id=<?php echo $news["result"][4]["id"]; ?>" data-toggle="reload"><i class="ion-edit"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" class="remove" id="<?php echo $news["result"][4]["id"];?>"><i class="ion-close-round"></i></a>
                               </div>                              
                            </div>                            
                            <div class="panel-body">
                                <input type="checkbox" class="read-more-state" id="post-5" />
                                <p id="news-5" class="read-more-wrap">
                                    <?php echo substr($news["result"][4]["news_body"],0,300);?>
                                </p>
                                <div class="read-more-target">
                                    <?php echo $news["result"][4]["news_body"];?>
                                </div>
                                <label for="post-5" class="read-more-trigger">...</label>                              
                            </div>
                            <div class="btn-info btn btn-sm publish" id="<?php echo $news["result"][4]["id"];?>"><?php if($news["result"][4]["status"]==0){ echo "PUBLISH";}else{ echo "DISABLE";}?></div>                         
                          </div>
                        </div>
                       <div class="col-lg-4">
                          <div class="panel panel-danger panel-border" id="<?php echo $news["result"][5]["id"] ?>_news">
                            <div class="panel-heading">                              
                              <h3 class="panel-title" style="display:inline">
                                <?php echo $news["result"][5]["title"];?>
                              </h3>
                              <div class="news-tool">
                                    <a href="e_news.php?id=<?php echo $news["result"][5]["id"] ?>" data-toggle="reload"><i class="ion-edit"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" class="remove" id="<?php echo $news["result"][5]["id"];?>"><i class="ion-close-round"></i></a>
                               </div>                              
                            </div>                            
                            <div class="panel-body">
                                <input type="checkbox" class="read-more-state" id="post-6" />
                                <p id="news-6" class="read-more-wrap">
                                    <?php echo substr($news["result"][5]["news_body"],0,300);?>
                                </p>
                                <div class="read-more-target">
                                    <?php echo $news["result"][5]["news_body"];?>
                                </div>
                                <label for="post-6" class="read-more-trigger">...</label>                              
                            </div>  
                            <div class="btn-info btn btn-sm publish" id="<?php echo $news["result"][5]["id"];?>"><?php if($news["result"][5]["status"]==0){ echo "PUBLISH";}else{ echo "DISABLE";}?></div>                                                   
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="panel panel-purple panel-border" id="<?php echo $news["result"][6]["id"] ?>_news">
                            <div class="panel-heading">                              
                              <h3 class="panel-title" style="display:inline">
                                <?php echo $news["result"][6]["title"];?>
                              </h3>
                              <div class="news-tool">
                                    <a href="e_news.php?id=<?php echo $news["result"][6]["id"] ?>" data-toggle="reload"><i class="ion-edit"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" class="remove" id="<?php echo $news["result"][6]["id"];?>"><i class="ion-close-round"></i></a>
                               </div>                              
                            </div>                            
                            <div class="panel-body">
                                <input type="checkbox" class="read-more-state" id="post-7" />
                                <p id="news-7" class="read-more-wrap">
                                    <?php echo substr($news["result"][6]["news_body"],0,300);?>
                                </p>
                                <div class="read-more-target">
                                    <?php echo $news["result"][6]["news_body"];?>
                                </div>
                                <label for="post-7" class="read-more-trigger">...</label>                              
                            </div>  
                            <div class="btn-info btn btn-sm publish" id="<?php echo $news["result"][6]["id"];?>"><?php if($news["result"][6]["status"]==0){ echo "PUBLISH";}else{ echo "DISABLE";}?></div>                                                   
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="panel panel-pink panel-border" id="<?php echo $news["result"][7]["id"] ?>_news">
                            <div class="panel-heading">                              
                              <h3 class="panel-title" style="display:inline">
                                <?php echo $news["result"][7]["title"];?>
                              </h3>
                              <div class="news-tool">
                                    <a href="e_news.php?id=<?php echo $news["result"][7]["id"] ?>" data-toggle="reload"><i class="ion-edit"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" class="remove" id="<?php echo $news["result"][7]["id"];?>"><i class="ion-close-round"></i></a>
                               </div>                              
                            </div>                            
                            <div class="panel-body">
                                <input type="checkbox" class="read-more-state" id="post-8" />
                                <p id="news-8" class="read-more-wrap">
                                    <?php echo substr($news["result"][7]["news_body"],0,300);?>
                                </p>
                                <div class="read-more-target">
                                    <?php echo $news["result"][7]["news_body"];?>
                                </div>
                                <label for="post-8" class="read-more-trigger">...</label>                              
                            </div>             
                            <div class="btn-info btn btn-sm publish" id="<?php echo $news["result"][7]["id"];?>"><?php if($news["result"][7]["status"]==0){ echo "PUBLISH";}else{ echo "DISABLE";}?></div>                                        
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="panel panel-inverse panel-border" id="<?php echo $news["result"][8]["id"] ?>_news">
                            <div class="panel-heading">                              
                              <h3 class="panel-title" style="display:inline">
                                <?php echo $news["result"][8]["title"];?>
                              </h3>
                              <div class="news-tool">
                                    <a href="e_news.php?id=<?php echo $news["result"][8]["id"]?>" data-toggle="reload"><i class="ion-edit"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" class="remove" id="<?php echo $news["result"][8]["id"];?>"><i class="ion-close-round"></i></a>
                               </div>                              
                            </div>                            
                            <div class="panel-body">
                                <input type="checkbox" class="read-more-state" id="post-9" />
                                <p id="news-9" class="read-more-wrap">
                                    <?php echo substr($news["result"][8]["news_body"],0,300);?>
                                </p>
                                <span class="read-more-target">
                                    <?php echo $news["result"][8]["news_body"];?>
                                </span>
                                <label for="post-9" class="read-more-trigger">...</label>                              
                            </div>      
                            <div class="btn-info btn btn-sm publish" id="<?php echo $news["result"][8]["id"];?>"><?php if($news["result"][8]["status"]==0){ echo "PUBLISH";}else{ echo "DISABLE";}?></div>                                               
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                      <input type="hidden" value="<?php  ?>"/>
                      <ul class="pagination m-b-5">
                        <li>
                          <a href="#" aria-label="Previous">
                            <i class="fa fa-angle-left">
                            </i>
                          </a>
                        </li>
                        <li>
                          <a href="#" class="page">
                           1
                          </a>
                        </li>
                        <li class="active">
                          <a href="#" class="page">
                            2
                          </a>
                        </li>
                        <li>
                          <a href="#" class="page">
                            3
                          </a>
                        </li>
                        <li class="disabled">
                          <a href="#">
                            4
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            5
                          </a>
                        </li>
                        <li>
                          <a href="#" aria-label="Next">
                            <i class="fa fa-angle-right">
                            </i>
                          </a>
                        </li>
                      </ul>
                      <div>
                        <div><a href="n_news.php" class="btn btn-info" id="addNews">Add</a></div>
                  </div>
                      <?php }else{
                        echo "Error occur";
                      } ?>
                    </div>
                  </div>
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
$(".remove").click(function(){
  var id = $(this).attr("id");
  var r = confirm("Are you sure you want to remove this news!");
  if (r == true) {
    $.ajax({
        type: 'POST',
        url: 'remove_news.php',
        data: { 'id':id}, 
        success: function(data){
            if(data.status == "success"){
              $("#"+id+"_news").html("NEWS REMOVED");
            }
            $('#result').html(data.message);
        },
    });
  }
});

$(".publish").click(function(){
  var id = $(this).attr("id");
  var status = $("#"+id+"_status").val();
  if(status==1){
    status=0;
  }else{
    status=1;
  }
  var r = confirm("Are you sure you want to change status of this news!");
  if (r == true) {
    $.ajax({
        type: 'POST',
        url: 'edit_news.php',
        data: {'id':id,'title':'','news':'','status':status}, 
        success: function(data){
            if(data.status == "success"){
              if(status==0){
                $("#"+id+".publish").html("PUBLISH");
                $("#"+id+"_status").val(0);
              }else{
                $("#"+id+".publish").html("DISABLE");
                $("#"+id+"_status").val(1);
              }
            }
            $('#result').html(data.message);
        },
    });
  }
});
/*
var offset=9;
var page=1;
$(".page").click(function(){
    page=$(this).text();
    $.ajax({
        type: 'POST',
        url: 'show_news.php',
        data: { 'page':page,'offset':offset}, 
        success: function(data){
            if(data.status == "success"){}
            $('#result').html(data.message);
        },
    });
});

*/

</script>