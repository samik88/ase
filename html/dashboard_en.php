<?php
session_start();
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>ASESHOPPIG</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="assets/global/plugins/simple-line-icons/simple-lineicons.min.css" rel="stylesheet" type="text/css">
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="public/logo.jpg" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN PAGE TOP -->
<?php if(isset($_SESSION['pincode'])){
?>
		<div class="page-top">
			<!-- BEGIN HEADER SEARCH BOX -->
<div class="lang"><a href="dashboard_az.php"><img src="assets/global/img/az.png"/>&nbsp;</a>
    <a href="dashboard.php"><img src="assets/global/img/rus.png"/>&nbsp;</a>
    <a href="dashboard_en.php"><img src="assets/global/img/eng.png"/>&nbsp;</a></div>
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="separator hide">
					</li>
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="username username-hide-on-mobile">
						<?php echo "Welcome ".$_SESSION['username'];?></span>
						<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
						<img alt="" class="img-circle"/>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="profile.php">
								<i class="icon-user"></i> My profile </a>
							</li>
							<li>
								<a href="logout.php">
								<i class="icon-key"></i> Exit</a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>

			<!-- END TOP NAVIGATION MENU -->
<?php }?>
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">

<?php if(isset($_SESSION['pincode'])){
?>
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li>
					<a href="dashboard_en.php">
					<i class="icon-home"></i>
					<span class="title">Homepage</span> 
					</a>
				</li>
				<li>
					<a href="orders_en.php">
					<i class="icon-bag"></i>
					<span class="title">Orders</span>
					</a>
				</li>
				<li>
					<a href="orders_view_en.php">
					<i class="icon-docs"></i>
					<span class="title">Bills</span>
					</a>
				</li>
				<li>
					<a href="howto_en.php">
					<i class="icon-info"></i>
					<span class="title">HOW-TO</span>
					</a>
				</li>				
				<li>
					<a href="faq_en.php">
					<i class="icon-question"></i>
					<span class="title">FAQ</span>
					</a>
				</li>	
				<li>
					<a href="contacts_en.php">
					<i class="fa fa-phone"></i>
					<span class="title">Contacts</span> 
					</a>
				</li>							
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
			
			<!-- END PAGE HEAD -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="portlet light">
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								
<div>

<div class="col">
									<div class="space20">
<div class="well">
	<div>
		Чтобы мы помогли Вам доставить посылку из Америки, достаточно ввести Ваш адрес(см. ниже) в поле "адрес доставки" на сайте продавца. У каждого пользователя свой уникальный код, поэтому позаботьтесь, чтобы Ваш персональный код(начинается с ASExxxx) был обязательно введен в строку адреса. Иначе, Ваша посылка может задержаться или быть утерянной. Также, просим не заказывать товары, которые включены в черный список таможни Азербайджанской Республики. Все товары, включенные в этот список, будут задержаны на таможне и не будут подлежать возврату
<br/>
Желаем удачи и хороших покупок,<br/>
Команда  ASEshopping
	</div>
	<br/>
					Your shippment address in USA: <br/><br/>
<address id="addr">
<b>Contact Name:</b> <?php if (isset($_SESSION["username"])){echo $_SESSION["username"];}?><br/>
<b>Company Name:</b> AJ Worldwide Services<br/>
<b>Address 1:</b> 901 Penhorn Avenue, Unit 7<br/>
<b>Address 2:</b> <?php if (isset($_SESSION["accNumber"])){echo $_SESSION["accNumber"];}?><br/>
<b>City:</b> Secaucus<br/>
<b>State:</b> NJ<br/>
<b>Zip Code:</b> 07094 <br/>
<b>Phone: 1-201-348-1800 x 128</b>
</address>				
</div>
</div>
<div class="col-md-6">
									<div class="space20">

</div>
</div>
								</div>
							</div>
						</div>
					</div>
				</div>
<?php }else{
    echo '<div style="min-height:300px; background-color:#fff;border-radius:5px;padding:15px;">';
	
    echo "Надо сначала <a href='http://my.aseshopping.com/login.php'>зайти</a> в систему</div>";
}?>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2015 &copy; ASESHOPPING.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script>
      jQuery(document).ready(function() {    
         Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
      });
   </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>

