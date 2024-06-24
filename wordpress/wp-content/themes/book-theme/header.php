<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
	<div class="container">
		<div class="header-main">
			<div class="nav-menu">
			<div class="navlinks">
				<?php wp_nav_menu(["theme_location" => "primary",]); ?>
			</div>
			</div>
		</div>
	</div>
 </header>