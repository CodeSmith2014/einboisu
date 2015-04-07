<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<title>
		@section('title')
		E Iboisu
		@show
	</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- #CSS Links -->
	<!-- Basic Styles -->
	{{HTML::style("/assets/css/bootstrap.min.css")}}
	{{HTML::style("/assets/css/font-awesome.min.css")}}

	<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
	{{HTML::style("/assets/css/smartadmin-production-plugins.min.css")}}
	{{HTML::style("/assets/css/smartadmin-production.min.css")}}
	{{HTML::style("/assets/css/smartadmin-skins.min.css")}}
	<!-- SmartAdmin RTL Support -->
	{{HTML::style("/assets/css/smartadmin-rtl.min.css")}}
	<!-- We recommend you use "your_style.css" to override SmartAdmin
	     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
	     <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css">
	 -->

	 <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
	 <!-- 		<link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css"> -->

	 <!-- #FAVICONS -->
	 <link rel="shortcut icon" href="/assets/img/favicon/favicon.ico" type="image/x-icon">
	 <link rel="icon" href="/assets/img/favicon/favicon.ico" type="image/x-icon">

	 <!-- #GOOGLE FONT -->
	 <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	 <!-- #APP SCREEN / ICONS -->
		<!-- Specifying a Webpage Icon for Web Clip 
		Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="/assets/img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/assets/img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/assets/img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="/assets/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="/assets/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="/assets/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

	</head>

	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #MAIN PANEL               |  main panel                    |
	|  13. #MAIN CONTENT             |  content holder                |
	|  14. #PAGE FOOTER              |  page footer                   |
	|  15. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  16. #PLUGINS                  |  all scripts and plugins       |
	
	===================================================================
	
-->

<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
	<body class="">

		<!-- #HEADER -->
		<header id="header">
			<div id="logo-group">
				<!-- PLACE YOUR LOGO HERE -->
				<a href="{{URL::route('dashboard')}}"><span id="logo">{{HTML::image('assets/img/logo.png',$alt="Smart Admin");}}</span></a>
				<!-- END LOGO PLACEHOLDER -->
			</div>

			<!-- #TOGGLE LAYOUT BUTTONS -->
			<!-- pulled right: nav area -->
			<div class="pull-right">

				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->

				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="/logout" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
				</div>

				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
				</div>
				<!-- end search mobile button -->

				<!-- #SEARCH -->
				<!-- input: search field -->
				<form action="search.html" class="header-search pull-right">
					<input id="search-fld" type="text" name="param" placeholder="Find reports and more">
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
					<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
				</form>
				<!-- end input: search field -->
			</div>
			<!-- end pulled right: nav area -->
		</header>
		<!-- END HEADER -->

		@include('admin.navigation')


		<!-- Page Modals (if any)-->
		@yield('modals')
		<!-- End Page Modals-->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">
				<span class="ribbon-button-alignment"> 
					<!-- <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span>  -->
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					@section('breadcrumb')
					<li>Home</li>
					@show
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
					<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span> -->
<!-- 					<span class="ribbon-button-alignment pull-right">
						<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa fa-plus"></i> Add</span>
					</span> -->
				<!-- <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
			</span> -->

		</div>
		<!-- END RIBBON -->



		<!-- MAIN CONTENT -->
		<div id="content">
			<!-- row -->
			<div class="row">
				<!-- col -->
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
					<h1 class="page-title txt-color-blueDark">
						<i class="fa-fw fa fa-@yield('page_title_icon')"></i>
						@yield('page_title')
					</h1>
				</div>
				<!-- end col -->

				<!-- right side of the page with the sparkline graphs -->
				<!-- col -->
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
					@yield('page_title_right')
				</div>
				<!-- end col -->
			</div>

			@if(isset($message))
			<div class="alert alert-success" role="alert">
				{{$message}}
			</div>
			@endif
			
			<!-- end row -->
			@yield('content')
		</div>
		<!-- END MAIN CONTENT -->
	</div>
	<!-- END MAIN PANEL -->

	<!-- PAGE FOOTER -->
	<div class="page-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<span class="txt-color-white">SmartAdmin 1.5 <span class="hidden-xs"> - Web Application Framework</span> © 2014-2015</span>
			</div>
		</div>
	</div>
	<!-- END PAGE FOOTER -->

	<!--================================================== -->
	<!-- <script data-pace-options='{ "restartOnRequestAfter": true }' src="/assets/js/plugin/pace/pace.min.js"></script> -->
	<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
	if (!window.jQuery) {
		document.write('<script src="/assets/js/libs/jquery-2.1.1.min.js"><\/script>');
	}
	</script>

	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script>
	if (!window.jQuery.ui) {
		document.write('<script src="/assets/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
	}
	</script>

	<!-- IMPORTANT: APP CONFIG -->
	{{HTML::script("/assets/js/app.config.js");}}

	<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
	{{HTML::script("/assets/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js");}}

	<!-- BOOTSTRAP JS -->
	{{HTML::script("/assets/js/bootstrap/bootstrap.min.js");}}

	<!-- CUSTOM NOTIFICATION -->
	{{HTML::script("/assets/js/notification/SmartNotification.min.js");}}

	<!-- JARVIS WIDGETS -->
	{{HTML::script("/assets/js/smartwidgets/jarvis.widget.min.js");}}

	<!-- EASY PIE CHARTS -->
	{{HTML::script("/assets/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js");}}

	<!-- SPARKLINES -->
	{{HTML::script("/assets/js/plugin/sparkline/jquery.sparkline.min.js");}}

	<!-- JQUERY VALIDATE -->
	{{HTML::script("/assets/js/plugin/jquery-validate/jquery.validate.min.js");}}

	<!-- JQUERY MASKED INPUT -->
	{{HTML::script("/assets/js/plugin/masked-input/jquery.maskedinput.min.js");}}

	<!-- JQUERY SELECT2 INPUT -->
	{{HTML::script("/assets/js/plugin/select2/select2.min.js");}}

	<!-- JQUERY UI + Bootstrap Slider -->
	{{HTML::script("/assets/js/plugin/bootstrap-slider/bootstrap-slider.min.js");}}

	<!-- browser msie issue fix -->
	{{HTML::script("/assets/js/plugin/msie-fix/jquery.mb.browser.min.js");}}

	<!-- FastClick: For mobile devices -->
	{{HTML::script("/assets/js/plugin/fastclick/fastclick.min.js");}}


	<!--[if IE 8]>

	<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

	<![endif] -->

	<!-- MAIN APP JS FILE -->
	{{HTML::script("/assets/js/app.min.js");}}

	<!-- SmartChat UI : plugin -->
	{{HTML::script("/assets/js/smart-chat-ui/smart.chat.ui.min.js");}}
	{{HTML::script("/assets/js/smart-chat-ui/smart.chat.manager.min.js");}}


	<!-- PAGE RELATED PLUGIN(S) 
	<script src="..."></script>-->
	@yield('page_scripts')

	<script type="text/javascript">

	$(document).ready(function() {
		pageSetUp();
		
		@yield('document_ready')
	});
	</script>
	@yield('javascript')

</body>

</html>