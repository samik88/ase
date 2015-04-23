<?php
session_start();
if(isset($_SESSION['pincode'])){
echo $_SESSION['pincode'];
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title>ASESHOPPIG</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link
	href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all"
	rel="stylesheet" type="text/css">
<link
	href="assets/global/plugins/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
<link
	href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
	rel="stylesheet" type="text/css">
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css"
	rel="stylesheet" type="text/css">
<link href="assets/global/plugins/uniform/css/uniform.default.css"
	rel="stylesheet" type="text/css">
<link
	href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
	rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components-rounded.css"
	id="style_components" rel="stylesheet" type="text/css" />
<link href="assets/global/css/plugins.css" rel="stylesheet"
	type="text/css" />
<link href="assets/admin/layout4/css/layout.css" rel="stylesheet"
	type="text/css" />
<link id="style_color"
	href="assets/admin/layout4/css/themes/light.css" rel="stylesheet"
	type="text/css" />
<link href="assets/admin/layout4/css/custom.css" rel="stylesheet"
	type="text/css" />
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico" />
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
				<a href="index.html"> <img src="../../public/logo.jpg"
					alt="logo" class="logo-default" />
				</a>
				<div class="menu-toggler sidebar-toggler">
					<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
				</div>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler responsive-toggler"
				data-toggle="collapse" data-target=".navbar-collapse"> </a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN PAGE TOP -->
<?php if(isset($_SESSION['pincode'])){
?>
			<div class="page-top">
				<!-- BEGIN HEADER SEARCH BOX -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li class="separator hide"></li>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-user dropdown-dark"><a href="#"
							class="dropdown-toggle" data-toggle="dropdown"
							data-hover="dropdown" data-close-others="true"> <span
								class="username username-hide-on-mobile"> 						<?php echo "Добро пожаловать, ".$_SESSION['username'];?></span></span>
								<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
								<img alt="" class="img-circle" />
						</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li><a href="profile.php"> <i class="icon-user"></i>
										Мой профиль
								</a></li>
								<li><a href="logout.php"> <i class="icon-key"></i>
										Выйти
								</a></li>
							</ul></li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul>
				</div>
				<!-- END TOP NAVIGATION MENU -->
			</div>
			<!-- END PAGE TOP -->
<?php }?>
		</div>
		<!-- END HEADER INNER -->
	</div>
	<!-- END HEADER -->
	<div class="clearfix"></div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container" style="margin-top:55px">
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
				<ul class="page-sidebar-menu " data-keep-expanded="false"
					data-auto-scroll="true" data-slide-speed="200">
					<li><a href="dashboard.php"> <i class="icon-home"></i> <span
							class="title">Главная</span>
					</a></li>
					<li><a href="orders.php"> <i class="icon-bag"></i> <span
							class="title">Товары</span>
					</a></li>
					<li><a href="orders_view.php"> <i class="icon-docs"></i> <span
							class="title">Оплаты</span>
					</a></li>
					<li><a href="howto.php"> <i class="icon-info"></i> <span
							class="title">HOW-TO</span>
					</a></li>
					<li><a href="faq.php"> <i class="icon-question"></i> <span
							class="title">FAQ</span>
					</a></li>
					<li><a href="contacts.php"> <i class="fa fa-phone"></i> <span
							class="title">Контакты</span>
					</a></li>
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<div class="modal fade" id="portlet-config" tabindex="-1"
					role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"
									aria-hidden="true"></button>
								<h4 class="modal-title">Modal title</h4>
							</div>
							<div class="modal-body">Widget settings form goes here</div>
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

								<h1>Часто задаваемые вопросы</h1>
								<div class="content-page">
									<div class="row">
										<div class="col-md-3 col-sm-3">
											<ul class="tabbable faq-tabbable">
												<li class="active"><a href="#tab_1" data-toggle="tab">Общие
														вопросы</a></li>
												<li><a href="#tab_2" data-toggle="tab">Оплата</a></li>
												<li><a href="#tab_3" data-toggle="tab">Правила
														использования</a></li>
												<li><a href="#tab_4" data-toggle="tab">Таможня</a></li>
												<li><a href="#tab_5" data-toggle="tab">Другие
														вопросы</a></li>
											</ul>
										</div>
										<div class="col-md-9 col-sm-9">
											<div class="tab-content"
												style="padding: 0; background: #fff;">
												<!-- START TAB 1 -->
												<div class="tab-pane active" id="tab_1">
													<div class="panel-group" id="accordion1">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a href="#accordion1_1" data-parent="#accordion1"
																		data-toggle="collapse" class="accordion-toggle">
																		1. Что такое объемный вес и как осуществляется его
																		расчет? </a>
																</h4>
															</div>
															<div class="panel-collapse collapse in" id="accordion1_1">
																<div class="panel-body">
																	При авиаперевозке вес вычисляется с учётом габаритов
																	упаковки. Расчёт производится по формуле : ДЛИННА (см)
																	Х ШИРИНА(см) Х ВЫСОТА (см)/ 6000 - Если полученное
																	значение меньше чем физический вес посылки в кг ,то
																	используется обычный вес,если больше-то обьемный. <a
																		href="/calculator">См. калькулятор.</a>
																</div>
															</div>
														</div>
														<div class="panel panel-success">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a href="#accordion1_2" data-parent="#accordion1"
																		data-toggle="collapse"
																		class="accordion-toggle collapsed"> 2. Что важно
																		знать о Государственной почте Америки The United
																		States Postal Service (USPS)? </a>
																</h4>
															</div>
															<div class="panel-collapse collapse" id="accordion1_2">
																<div class="panel-body">Чаще всего для перевозок
																	магазинами используется почтовый сервис USPS, в связи с
																	его недорогой оплатой. Но нужно отметить, что в
																	сервисных процедурах данной компании существует
																	некоторое отличие. Первое, что нужно знать - это то,
																	что компания USPS не доставляет посылки на склад по
																	субботам, а только проводит регистрацию в своей
																	системе, загружает товар и готовится к авто-сдаче по
																	адресу в понедельник. Вследствие этого, предметы
																	получают пометку “доставлено” (delivered), что на самом
																	деле не соответствует действительности и вводит
																	пользователя в заблуждение. Переговоры с ними не
																	привели к существенным результатам, нам было отмечено,
																	что компания не может внести изменения в формат работы.
																	Просьба, приобретая важный для Вас предмет, учитывать
																	наличие выбора других почтовых курьеров и делать свой
																	правильный выбор.</div>
															</div>
														</div>
														<div class="panel panel-warning">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a href="#accordion1_3" data-parent="#accordion1"
																		data-toggle="collapse
"
																		class="accordion-toggle collapsed"> 3. Время
																		доставок посылок. </a>
																</h4>
															</div>
															<div class="panel-collapse collapse" id="accordion1_3">
																<div class="panel-body">Время доставки посылки
																	гарантируется в пределах от 7 до 14 дней в зависимости
																	от правильного заполнения документов и сезонной
																	активности. В случае отсутствия посылки в системе
																	trackinga в течении 30дней мы возвращаем клиенту все
																	его затраты.</div>
															</div>
														</div>
														<div class="panel panel-danger">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a href="#accordion1_4" data-parent="#accordion1"
																		data-toggle="collapse"
																		class="accordion-toggle collapsed"> 4. Информация
																		о посылках </a>
																</h4>
															</div>
															<div class="panel-collapse collapse" id="accordion1_4">
																<div class="panel-body">По прибытии вашей покупки
																	из онлайн магазина на наш склад, принимающий складской
																	работник расписывается в получении, И с этого момента
																	посылка попадает в зону нашей ответственности и может
																	быть прослежена с помощью trackinga. Если посылка не
																	попала к вам за максимальный 14-тидневный период, то
																	надо сообщить все детали; если на 30-ый день посылка не
																	найдется, затраты клиента будут возмещены.</div>
															</div>
														</div>
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a href="#accordion1_5" data-parent="#accordion1"
																		data-toggle="collapse"
																		class="accordion-toggle collapsed"> 5. Правила
																		заполнения . </a>
																</h4>
															</div>
															<div class="panel-collapse collapse" id="accordion1_5">
																<div class="panel-body">При покупке, в
																	обязательном порядке надо вписывать ID код полученный
																	при регистрации на сайте в "Адрес лайн 2" Если
																	интернет-магазин не принимает ZIP/Postal code
																	полностью, Вы можете указать только первые 5 (Пять)
																	цифр - 07094 Также учтите, что штат, указанный у нас на
																	сайте NJ-сокращенное от New Jersy...</div>
															</div>
														</div>
													</div>
												</div>
												<!-- END TAB 1 -->
												<!-- START TAB 2 -->
												<div class="tab-pane" id="tab_2">
													<div class="panel-group" id="accordion2">
														<div class="panel panel-warning">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a href="#accordion2_1" data-parent="#accordion2"
																		data-toggle="collapse" class="accordion-toggle">
																		1. Как происхожит оплата? </a>
																</h4>
															</div>
															<div class="panel-collapse collapse in" id="accordion2_1">
																<div class="panel-body">
																	<p>Оплата за товар производится клиентом
																		самостоятельно на любом нужном ему сайте. Обычно,
																		оплата транспортировки купленного товара до склада
																		нашей фирмы в регионе ,производится На сайте магазина
																		продавца. А вот оплата доставки до Азербайджана должна
																		быть произведена либо наличными ,при получении товара
																		в оффисе нашей фирмы,либо онлайн с вебсайта
																		www.aseshopping.com</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- END TAB 2 -->
												<!-- START TAB 3 -->
												<div class="tab-pane" id="tab_3">
													<div class="panel-group" id="accordion3">
														<div class="panel panel-danger">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a href="#accordion3_1" data-parent="#accordion3"
																		data-toggle="collapse" class="accordion-toggle">
																		1.Как правильно пользоваться системой доставки? </a>
																</h4>
															</div>
															<div class="panel-collapse collapse in" id="accordion3_1">
																<div class="panel-body">
																	<p>При регистрации на сайте должны вводится
																		реальные данные клиента : правильно написанные
																		имя,фамилия, адрес,действующий номер телефона и верный
																		номер личного удостоверения.</p>
																	<p>Иначе могут возникать проблемв при выдаче или
																		доставке товара После регистрации клиенту
																		присваивается уникальный ID номер который присутствует
																		в адресе нашего склада в регионе совершения покупки
																		.Только по этому номеру работник заграничного склада
																		определяет кому принадлежит покупка в Азербайджане.</p>
																	<p>Что бы определить местонахождение посылки
																		,клиент может пользоватся сервисом треуинга посфлок на
																		нашем сайте. Так же он может получить уведомление о
																		приходе посфлки на склад в Азербайджане по електронной
																		почте или смс на мобильный телефон.</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- END TAB 3 -->
												<!-- START TAB 4 -->
												<div class="tab-pane" id="tab_4">
													<div class="panel-group" id="accordion4">
														<div class="panel panel-danger">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a href="#accordion4_1" data-parent="#accordion4"
																		data-toggle="collapse" class="accordion-toggle">
																		1. Каковы ограничения на доставку согласно таможенному
																		законадельству? </a>
																</h4>
															</div>
															<div class="panel-collapse collapse in" id="accordion4_1">
																<div class="panel-body">
																	<p>Все клиентские заказы проходят таможенный
																		контроль, даже если отсутствует необходимость платить
																		пошлины или иные сборы. Дело в том что существуют
																		определенные ограничения на импорт товаров некоторых
																		видов .Одни виды запрещены для завоза
																		полностью,некоторые товары имеют количественные
																		ограничения. Более подробный перечень запрещенных и
																		лимитированных товаров можно скачать здесь.... Что
																		касается импортных пошлин ,то на данный момент по
																		законам Республики Азербайджан каждый грвжданин имеет
																		право завозить в месяц товаров ,разрешенных
																		законодательством,не более чем на $1000 без оплаты
																		таможенных пошлин и сборов</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- END TAB 4 -->
												<!-- START TAB 5 -->
												<div class="tab-pane " id="tab_5">
													<div class="panel-group" id="accordion5">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a href="#accordion5_1" data-parent="#accordion5"
																		data-toggle="collapse" class="accordion-toggle">1.Могут
																		ли быть разногласия в оценке доставки?</a>
																</h4>
															</div>
															<div class="panel-collapse collapse in" id="accordion5_1">
																<div class="panel-body">Клиентам следует помнить
																	что: В случае разногласий по определению веса посылки
																	надо учесть, что физический вес может быть намного
																	меньше, чем обьемный в случае габаритной
																	посылки.Стоимость доставки калькулируется по обьемному
																	весу.</div>
															</div>
														</div>
														<div class="panel panel-warning">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a href="#accordion5_2" data-parent="#accordion5"
																		data-toggle="collapse"
																		class="accordion-toggle collapsed"> 2. Как ведутся
																		расчеты стоимости доставки? </a>
																</h4>
															</div>
															<div class="panel-collapse collapse" id="accordion5_2">
																<div class="panel-body">Расчеты ведутся в манатах,
																	но в привязке к курсу американского доллара, так как
																	расчеты с международными перевозчиками происходят в
																	долларах</div>
															</div>
														</div>
														<div class="panel panel-success">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a href="#accordion5_3" data-parent="#accordion5"
																		data-toggle="collapse"
																		class="accordion-toggle collapsed"> 3. Что
																		происходит в случае задержки товара?</a>
																</h4>
															</div>
															<div class="panel-collapse collapse" id="accordion5_3">
																<div class="panel-body">В случаезадержки посылки
																	более 14 дней, начинается поиск посылки по уточненным
																	данным от клиента. Если посылка не найдена, то все
																	затраты клиента возмещаются непозже 30го дня от даты
																	поступления посылки на наш зарубежный склад.</div>
															</div>
														</div>
													</div>
												</div>


												<!-- END TAB 5 -->
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
			<!-- END CONTAINER -->
			<!-- BEGIN FOOTER -->
			<div class="page-footer">
				<div class="page-footer-inner">2015 &copy; ASESHOPPING.</div>
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
			<script src="assets/global/plugins/jquery.min.js"
				type="text/javascript"></script>
			<script src="assets/global/plugins/jquery-migrate.min.js"
				type="text/javascript"></script>
			<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
			<script
				src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"
				type="text/javascript"></script>
			<script
				src="assets/global/plugins/bootstrap/js/bootstrap.min.js"
				type="text/javascript"></script>
			<script
				src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
				type="text/javascript"></script>
			<script
				src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
				type="text/javascript"></script>
			<script src="assets/global/plugins/jquery.blockui.min.js"
				type="text/javascript"></script>
			<script src="assets/global/plugins/jquery.cokie.min.js"
				type="text/javascript"></script>
			<script
				src="assets/global/plugins/uniform/jquery.uniform.min.js"
				type="text/javascript"></script>
			<script
				src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
				type="text/javascript"></script>
			<!-- END CORE PLUGINS -->
			<script src="assets/global/scripts/metronic.js"
				type="text/javascript"></script>
			<script src="assets/admin/layout4/scripts/layout.js"
				type="text/javascript"></script>
			<script src="assets/admin/layout4/scripts/demo.js"
				type="text/javascript"></script>
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
