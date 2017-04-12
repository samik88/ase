<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Moltran - Responsive Admin Dashboard Template</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>

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
                        <a href="index.html" class="logo"><i class="md md-terrain"></i> <span>Moltran </span></a>
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
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

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
                                                    <div class="media-heading">New user registered</div>
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
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
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
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">John Doe <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="index.html" class="waves-effect waves-light"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md md-mail"></i><span> Mail </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="inbox.html">Inbox</a></li>
                                    <li><a href="email-compose.html">Compose Mail</a></li>
                                    <li><a href="email-read.html">View Mail</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="calendar.html" class="waves-effect"><i class="md md-event"></i><span> Calendar </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md md-palette"></i> <span> Elements </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="typography.html">Typography</a></li>
                                    <li><a href="buttons.html">Buttons</a></li>
                                    <li><a href="panels.html">Panels</a></li>
                                    <li><a href="checkbox-radio.html">Checkboxs-Radios</a></li>
                                    <li><a href="tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                    <li><a href="modals.html">Modals</a></li>
                                    <li><a href="bootstrap-ui.html">BS Elements</a></li>
                                    <li><a href="progressbars.html">Progress Bars</a></li>
                                    <li><a href="notification.html">Notification</a></li>
                                    <li><a href="sweet-alert.html">Sweet-Alert</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md md-invert-colors-on"></i><span> Components </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="grid.html">Grid</a></li>
                                    <li><a href="portlets.html">Portlets</a></li>
                                    <li><a href="widgets.html">Widgets</a></li>
                                    <li><a href="nestable-list.html">Nesteble</a></li>
                                    <li><a href="ui-sliders.html">Sliders </a></li>
                                    <li><a href="gallery.html">Gallery </a></li>
                                    <li><a href="pricing.html">Pricing Table </a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md md-redeem"></i> <span> Icons </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="material-icon.html">Material Design</a></li>
                                    <li><a href="ion-icons.html">Ion Icons</a></li>
                                    <li><a href="font-awesome.html">Font awesome</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light active"><i class="md md-now-widgets"></i><span> Forms </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="active"><a href="form-elements.html">General Elements</a></li>
                                    <li><a href="form-validation.html">Form Validation</a></li>
                                    <li><a href="form-advanced.html">Advanced Form</a></li>
                                    <li><a href="form-wizard.html">Form Wizard</a></li>
                                    <li><a href="form-editor.html">WYSIWYG Editor</a></li>
                                    <li><a href="code-editor.html">Code Editors</a></li>
                                    <li><a href="form-uploads.html">Multiple File Upload</a></li>
                                    <li><a href="form-xeditable.html">X-editable</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md md-view-list"></i><span> Data Tables </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="tables.html">Basic Tables</a></li>
                                    <li><a href="table-datatable.html">Data Table</a></li>
                                    <li><a href="tables-editable.html">Editable Table</a></li>
                                    <li><a href="responsive-table.html">Responsive Table</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md md-poll"></i><span> Charts </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="morris-chart.html">Morris Chart</a></li>
                                    <li><a href="chartjs.html">Chartjs</a></li>
                                    <li><a href="flot-chart.html">Flot Chart</a></li>
                                    <li><a href="peity-chart.html">Peity Charts</a></li>
                                    <li><a href="charts-sparkline.html">Sparkline Charts</a></li>
                                    <li><a href="chart-radial.html">Radial charts</a></li>
                                    <li><a href="other-chart.html">Other Chart</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md md-place"></i><span> Maps </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="gmap.html"> Google Map</a></li>
                                    <li><a href="vector-map.html"> Vector Map</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md md-pages"></i><span> Pages </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="profile.html">Profile</a></li>
                                    <li><a href="timeline.html">Timeline</a></li>
                                    <li><a href="invoice.html">Invoice</a></li>
                                    <li><a href="email-template.html">Email template</a></li>
                                    <li><a href="contact.html">Contact-list</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="recoverpw.html">Recover Password</a></li>
                                    <li><a href="lock-screen.html">Lock Screen</a></li>
                                    <li><a href="blank.html">Blank Page</a></li>
                                    <li><a href="maintenance.html">Maintenance</a></li>
                                    <li><a href="coming-soon.html">Coming-soon</a></li>
                                    <li><a href="404.html">404 Error</a></li>
                                    <li><a href="404_alt.html">404 alt</a></li>
                                    <li><a href="500.html">500 Error</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="md md-share"></i><span>Multi Level </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul>
                                    <li class="has_sub">
                                        <a href="javascript:void(0);" class="waves-effect waves-light"><span>Menu Level 1.1</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                        <ul style="">
                                            <li><a href="javascript:void(0);"><span>Menu Level 2.1</span></a></li>
                                            <li><a href="javascript:void(0);"><span>Menu Level 2.2</span></a></li>
                                            <li><a href="javascript:void(0);"><span>Menu Level 2.3</span></a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><span>Menu Level 1.2</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 



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
                                <h4 class="pull-left page-title">General elements</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">General elements</li>
                                </ol>
                            </div>
                        </div>


                        <div class="row">
                            <!-- Basic example -->
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Basic example</h3></div>
                                    <div class="panel-body">
                                        <form role="form">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox1" type="checkbox">
                                                    <label for="checkbox1">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            
                            <!-- Horizontal form -->
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Horizontal form</h3></div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                <div class="col-sm-9">
                                                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword4" class="col-sm-3 control-label">Re Password</label>
                                                <div class="col-sm-9">
                                                  <input type="password" class="form-control" id="inputPassword4" placeholder="Retype Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            Check me out !
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-b-0">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                  <button type="submit" class="btn btn-info waves-effect waves-light">Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->



                        <!-- Inline Form -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Inline Form</h3></div>
                                    <div class="panel-body">
                                    
                                        <form class="form-inline" role="form">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                                            </div>
                                              
                                            <div class="form-group m-l-10">
                                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                                            </div>
                                            <div class="form-group m-l-10">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox3" type="checkbox">
                                                    <label for="checkbox3">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success waves-effect waves-light m-l-10">Sign in</button>
                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                             
                        </div> <!-- End row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Form elements</h3></div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form">                                    
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Text</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="Some text value...">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Email</label>
                                                <div class="col-md-10">
                                                    <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Password</label>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control" value="password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Readonly</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" readonly="readonly" value="Readonly value">
                                                </div>
                                            </div>                                    
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Disabled</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" disabled="disabled" value="Disabled value">
                                                </div>
                                            </div>                                    
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Placeholder</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" placeholder="placeholder">
                                                </div>
                                            </div>                                                                        
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Text area</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Static control</label>
                                                <div class="col-sm-10">
                                                  <p class="form-control-static">email@example.com</p>
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Helping text</label>
                                                <div class="col-sm-7">
                                                  <input type="text" class="form-control" placeholder="Helping text">
                                                  <span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span>
                                                </div>
                                            </div>  

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Input Select</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                    <h6>Multiple select</h6>
                                                    <select multiple="multiple" class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                           
                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->




                        <div class="row">

                            <!-- Input States -->
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Input States</h3></div>
                                    <div class="panel-body">
                                    
                                        <form class="form-horizontal" role="form">
                                          
                                            <div class="form-group has-success">
                                                <label class="col-md-3 control-label" for="state-success">Success</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="state-success" name="state-success" class="form-control" placeholder="...">
                                                </div>
                                            </div>


                                            <div class="form-group has-warning">
                                                <label class="col-md-3 control-label" for="state-warning">Warning</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="state-warning" name="state-warning" class="form-control" placeholder="...">
                                                </div>
                                            </div>

                                            <div class="form-group has-error">
                                                <label class="col-md-3 control-label" for="state-danger">Danger</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="state-danger" name="state-danger" class="form-control" placeholder="...">
                                                </div>
                                            </div>

                                            <div class="form-group has-success has-feedback">
                                                <label class="col-sm-3 control-label">Input with success </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control">
                                                    <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="form-group has-warning has-feedback">
                                                <label class="col-sm-3 control-label">Input with warning </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control inputmask">
                                                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="form-group has-error has-feedback">
                                                <label class="col-sm-3 control-label">Input with error </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control inputmask">
                                                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="form-group has-feedback">
                                                <label class="col-sm-3 control-label">Custom Icons</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Custom icons">
                                                    <i class="fa fa-envelope form-control-feedback l-h-34"></i>
                                                </div>
                                            </div>
                                        </form>
                                    
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Input Sizes</h3></div>
                                    <div class="panel-body">
                                    
                                        <form role="form" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="example-input-small">Small</label>
                                                <div class="col-sm-6">
                                                    <input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=".input-sm">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="example-input-normal">Normal</label>
                                                <div class="col-sm-6">
                                                    <input type="text" id="example-input-normal" name="example-input-normal" class="form-control" placeholder="Normal">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="example-input-large">Large</label>
                                                <div class="col-sm-6">
                                                    <input type="text" id="example-input-large" name="example-input-large" class="form-control input-lg" placeholder=".input-lg">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Grid Sizes</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" placeholder=".col-sm-4">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-5 col-sm-offset-3">
                                                    <input type="text" class="form-control" placeholder=".col-sm-5">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="text" class="form-control" placeholder=".col-sm-6">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9 col-sm-offset-3">
                                                    <input type="text" class="form-control" placeholder=".col-sm-9">
                                                </div>
                                            </div>
                                        </form>
                                    
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->

                        <!-- Input groups -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Input groups</h3></div>
                                    <div class="panel-body">
                                    
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">

                                                <label class="col-md-2 control-label" for="example-input1-group1">Static</label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                        <input type="text" id="example-input1-group1" name="example-input1-group1" class="form-control" placeholder="Username">
                                                    </div>
                                                </div>

                                                <div class="col-md-7 col-md-offset-2">
                                                    <div class="input-group m-t-10">
                                                        <input type="email" id="example-input2-group1" name="example-input2-group1" class="form-control" placeholder="Email">
                                                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-md-offset-2">
                                                    <div class="input-group m-t-10">
                                                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                                        <input type="text" id="example-input3-group1" name="example-input3-group1" class="form-control" placeholder="..">
                                                        <span class="input-group-addon">.00</span>
                                                    </div>
                                                </div>
                                            </div> <!-- form-group -->

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-input1-group2">Buttons</label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                        <button type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-search"></i></button>
                                                        </span>
                                                        <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search">
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-md-offset-2">
                                                    <div class="input-group m-t-10">
                                                        <input type="email" id="example-input2-group2" name="example-input2-group2" class="form-control" placeholder="Email">
                                                        <span class="input-group-btn">
                                                        <button type="button" class="btn waves-effect waves-light btn-primary">Submit</button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-md-offset-2">
                                                    <div class="input-group m-t-10">
                                                        <span class="input-group-btn">
                                                        <button type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-facebook"></i></button>
                                                        </span>
                                                        <input type="text" id="example-input3-group2" name="example-input3-group2" class="form-control" placeholder="Search">
                                                        <span class="input-group-btn">
                                                        <button type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-twitter"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> <!-- form-group -->

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-input1-group3">Dropdowns</label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn waves-effect waves-light btn-primary dropdown-toggle" data-toggle="dropdown" style="overflow: hidden; position: relative">Action <span class="caret"></span></button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="javascript:void(0)">Action</a></li>
                                                                <li><a href="javascript:void(0)">Another action</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="javascript:void(0)">Separated link</a></li>
                                                            </ul>
                                                        </div>
                                                        <input type="text" id="example-input1-group3" name="example-input1-group3" class="form-control" placeholder="Username">
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-md-offset-2">
                                                    <div class="input-group m-t-10">
                                                        <input type="email" id="example-input2-group3" name="example-input2-group3" class="form-control" placeholder="Email">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn waves-effect waves-light btn-primary dropdown-toggle" data-toggle="dropdown" style="overflow: hidden; position: relative">Action <span class="caret"></span></button>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a href="javascript:void(0)">Action</a></li>
                                                                <li><a href="javascript:void(0)">Another action</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="javascript:void(0)">Separated link</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-md-offset-2">
                                                    <div class="input-group m-t-10">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn waves-effect waves-light btn-primary" style="overflow: hidden; position: relative">Action</button>
                                                            <button type="button" class="btn waves-effect waves-light btn-primary dropdown-toggle" data-toggle="dropdown" style="overflow: hidden; position: relative"><span class="caret"></span></button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="javascript:void(0)">Action</a></li>
                                                                <li><a href="javascript:void(0)">Another action</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="javascript:void(0)">Separated link</a></li>
                                                            </ul>
                                                        </div>
                                                        <input type="text" id="example-input3-group3" name="example-input3-group3" class="form-control" placeholder="..">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn waves-effect waves-light btn-primary dropdown-toggle" data-toggle="dropdown" style="overflow: hidden; position: relative"><span class="caret"></span></button>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a href="javascript:void(0)">Action</a></li>
                                                                <li><a href="javascript:void(0)">Another action</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="javascript:void(0)">Separated link</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- form-group -->
                                          
                                        </form>
                                    
                                   </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->


        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- Main  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/jquery.app.js"></script>
	
	</body>
</html>