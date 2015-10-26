<?php
global $vi_options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="shortcut icon" href=" <?php echo $vi_options['favicon']['url']; ?>" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="header" class="site-header">
		<div class="container">
			<div class="logo">
				<?php vi_theme_logo($vi_options['logo-on'], $vi_options['logo-image']['url']); ?>
			</div>
		</div>
		<div class="main-menu">
			<div class="container">
				<?php vi_theme_menu('premary'); ?>
			</div>
		</div>
	</header><!-- #header -->
	<section class="content-area">
		<div class="container">