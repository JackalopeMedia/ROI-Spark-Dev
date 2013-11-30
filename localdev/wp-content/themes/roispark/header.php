<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--. <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right') ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="ROISpark, Austin based PPC campaign managment.">
	<meta name="author" content="<?php bloginfo('description')?>">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700,500italic,700italic' rel='stylesheet'>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet'>


	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	<link rel="shortcut icon" href="img/icons/favicon.ico">
	<link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="container-non-responsive">
		<div class="row">
<!-- HEADER -->
			<header class="main-header section-content">
				<div class="col-xs-7">
					<a href="<?php echo home_url(); ?>" class="logo"><img src="<?php print IMAGES; ?>/roispark-logo.png" alt="<?php bloginfo('name'); ?>" /></a>
				</div>
				<div class="col-xs-3">	
					<div class="pull-right">
						<ul class="social inline social-icons-padding">
								<li><a href="https://www.facebook.com/roisparkconsulting" target="_blank" class="i-facebook"><img src="http://kickstartyourbiz.info/wp-content/uploads/2013/11/Facebook1.png"></a></li>
								<li><a href="https://plus.google.com/+Roispark/posts" target="_blank" class="i-google"><img src="http://kickstartyourbiz.info/wp-content/uploads/2013/11/Googleplus1.png"></a></li>
								<li><a href="http://kickstartyourbiz.info/contact/" target="_blank" class="i-mail"><img src="http://kickstartyourbiz.info/wp-content/uploads/2013/11/Email1.png"></a></li>
								<li><a href="http://www.linkedin.com/company/roi-spark" target="_blank" class="i-linkedin"><img src="http://kickstartyourbiz.info/wp-content/uploads/2013/11/Linkedin1.png"></a></li>
						</ul>
					</div>
				</div>
				<div class="col-xs-2">
					<div class="pull-right">	
						<ul class="social inline phone-number-padding">
								<h1>512.XXX.XXX</h1>
						</ul>
					</div>
				</div>
			</header>
		</div>
	</div>
	<nav class="main-nav">
		<div class="container-non-responsive">
		<?php 
		wp_nav_menu(array(
			'theme_location' => 'main-menu',
			'container-non-responsive' => '',
			'menu_class' => 'inline'
		));	
		?>
		</div>
	</nav>
	<nav class="main-head">
		<div class="container-non-responsive">
		</div>
	</nav>