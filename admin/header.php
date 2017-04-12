<!DOCTYPE html>
<?php
session_start();
include("admin_functions.php");
if (!isset($_SESSION['email'])) {
    header("location: http://my.aseshopping.com/dark/admin/login.php");
}
?>

<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
      <meta name="author" content="Coderthemes">
      <link rel="shortcut icon" href="../assets/images/favicon.ico">
      <title>ASEshopping - Personal delivery from USA, UK, Turkey to Baku</title>
      <link href="../assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/pages.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/menu.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css">
      <link href="../assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
      <link href="../assets/plugins/summernote/dist/summernote.css" rel="stylesheet">
      <link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
      <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">

      <script src="../assets/js/modernizr.min.js"></script>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="fixed-left">
      <!-- Begin page -->
      <div id="wrapper">
         <!-- Top Bar Start -->
         <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
               <div class="text-center">
                  <a href="index.php" class="logo"><img src="../assets/images/logo.png"/> <span>shopping</span></a>
               </div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
               <div class="container">
                  <div class="">
                     <div class="pull-left">
                        <button class="button-menu-mobile open-left">
                        <i class="fa fa-bars"></i>
                        </button>
                        <span class="clearfix"></span>
                     </div>

                     <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="dropdown hidden-xs">
                           <a href="#" data-target="#" class="dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="true">
                           <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                           </a>
                           <ul class="dropdown-menu dropdown-menu-lg">
                              <li class="text-center notifi-title">Notification</li>
                              <li class="list-group">
                                 <!-- list item-->
                                 <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                       <div class="pull-left">
                                          <em class="fa fa-user-plus fa-2x text-info"></em>
                                       </div>
                                       <div class="media-body clearfix">
                                          <div class="media-heading">New friend registered</div>
                                          <p class="m-0">
                                             <small>You have 10 unread messages</small>
                                          </p>
                                       </div>
                                    </div>
                                 </a>
                                 <!-- list item-->
                                 <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                       <div class="pull-left">
                                          <em class="fa fa-diamond fa-2x text-primary"></em>
                                       </div>
                                       <div class="media-body clearfix">
                                          <div class="media-heading">New settings</div>
                                          <p class="m-0">
                                             <small>There are new settings available</small>
                                          </p>
                                       </div>
                                    </div>
                                 </a>
                                 <!-- list item-->
                                 <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                       <div class="pull-left">
                                          <em class="fa fa-bell-o fa-2x text-danger"></em>
                                       </div>
                                       <div class="media-body clearfix">
                                          <div class="media-heading">Updates</div>
                                          <p class="m-0">
                                             <small>There are
                                             <span class="text-primary">2</span> new updates available</small>
                                          </p>
                                       </div>
                                    </div>
                                 </a>
                                 <!-- last list item -->
                                 <a href="javascript:void(0);" class="list-group-item">
                                 <small>See all notifications</small>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="hidden-xs">
                           <a href="#" id="btn-fullscreen" class="waves-effect"><i class="md md-crop-free"></i></a>
                        </li>
                        <li class="hidden-xs">
                           <a href="#" class="right-bar-toggle waves-effect"><i class="md md-chat"></i></a>
                        </li>
                        <li class="dropdown">
                           <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../assets/images/users/avatar.png" alt="user-img" class="img-circle"> </a>
                           <ul class="dropdown-menu">
                              <li><a href="profile.php"><i class="md md-face-unlock"></i> Profile</a></li>
                              <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                           </ul>
                        </li>
                     </ul>
                  </div>
                  <!--/.nav-collapse -->
               </div>
            </div>
         </div>
         <!-- Top Bar End -->
         <!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
  <div class="sidebar-inner slimscrollleft">
    <div class="user-details">
      <div class="pull-left">
        <img src="../assets/images/users/avatar.png" alt="" class="thumb-md img-circle">
      </div>
      <div class="user-info">
        <div class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <?php
echo $_SESSION['username'];
?>
                          
                          <span class="caret">
                          </span>
                       </a>
                       <ul class="dropdown-menu">
                         <li>
                           <a href="profile.php">
                             <i class="md md-face-unlock">
                             </i>
                             Profile
                             <div class="ripple-wrapper">
                             </div>
                           </a>
                         </li>
                         <li>
                           <a href="jlogout.php">
                             <i class="md md-settings-power">
                             </i>
                             Logout
                           </a>
                         </li>
                       </ul>
                    </div>
                 </div>
              </div>
              <!--- Divider -->
              <div id="sidebar-menu">
                <ul>
                  <li>
                    <a href="index.php" class="waves-effect waves-light  <?php echo $index_sub;?>">
                      <i class="md md-home">
                      </i>
                      <span>
                        Dashboard 
                      </span>
                    </a>
                  </li>
                  <li class="has_sub">
                    <a href="#" class="waves-light">
                      <i class="md md-place">
                      </i>
                      <span>
                        Warehouses 
                        <span class="pull-right">
                          <i class="md md-add">
                          </i>
                        </span>
                      </a>
                      <ul class="list-unstyled">
                        <li>
                          <a href="usa.php" class="<?php echo $warehouse_sub;?>">
                            USA
                          </a>
                        </li>
                        <li>
                          <a href="uk.php" class="<?php echo $warehouse_sub;?>">
                            UK
                          </a>
                        </li>
                        <li>
                          <a href="turkey.php" class="<?php echo $warehouse_sub;?>">
                            Turkey
                          </a>
                        </li>
                        <li>
                          <a href="germany.php" class="<?php echo $warehouse_sub;?>">
                            Germany
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="packages.php" class="waves-effect <?php echo $packages_sub;?>">
                        <i class="md  md-local-grocery-store">
                        </i>
                        <span>
                          Packages 
                        </span>
                      </a>
                  </li>
                   <li>
                      <a href="uknown_packages.php" class="waves-effect <?php echo $ukn_packages_sub;?>">
                        <i class="fa fa-user-times">
                        </i>
                        <span>
                          Uknown packages 
                        </span>
                      </a>
                  </li>
                  <li>
                    <a href="declaration.php" class="waves-effect <?php echo $declaration_sub;?>">
                      <i class="fa fa-thumbs-o-up">
                      </i>
                      <span>
                        Declaration
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="requests.php" class="waves-effect <?php echo $requests_sub;?>">
                      <i class="fa fa-star-o">
                      </i>
                      <span>
                        Requests
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="purchases.php" class="waves-effect <?php echo $purchases_sub;?>">
                      <i class="md  md-attach-money">
                      </i>
                      <span>
                        Purchases 
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="news.php" class="waves-effect <?php echo $news_sub;?>">
                      <i class="fa fa-newspaper-o">
                      </i>
                      <span>
                        News
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="users_list.php" class="waves-effect <?php echo $userlist_sub;?>">
                      <i class="md md-content-paste">
                      </i>
                      <span>
                        Users list
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="faq.php" class="waves-effect <?php echo $faq_sub;?>">
                      <i class="md  md-school">
                      </i>
                      <span>
                        FAQ 
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="contacts.php" class="waves-effect <?php echo $contacts_sub;?>">
                      <i class="md md-local-phone">
                      </i>
                      <span>
                        Contacts 
                      </span>
                    </a>
                  </li>
                   <li>
                    <a href="messages.php" class="waves-effect <?php echo $messages;?>">
                      <i class="md  md-email">
                      </i>
                      <span>
                        Messages 
                      </span>
                    </a>
                  </li>
                </ul>
                <div class="clearfix">
                </div>
              </div>
              <div class="clearfix">
              </div>
           </div>
</div>
<!-- Left Sidebar End -->