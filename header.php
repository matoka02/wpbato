<?php
/**
 * The header for our theme
 * @package goit
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
		<title>AIE</title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header  class="page-header">
	<div class="container  header-container">

		<a href="<?php echo home_url(); ?>" class="logo">
			<picture>
				<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-AIE1-desktop-@1x.png 1x, <?php echo get_template_directory_uri(); ?>/assets/images/Logo-AIE1-desktop-@2x.png 2x"
								media="(min-width: 768px)" type="image/png">
				<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-AIE1-mobile-@1x.png 1x, <?php echo get_template_directory_uri(); ?>/assets/images/Logo-AIE1-mobile-@2x.png 2x"
								media="(max-width: 768px)"
								type="image/png">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-AIE1-mobile-@1x.png" alt="logo">
			</picture>
		</a>

		<div class="navigation">
			<?php
			wp_nav_menu( [
				'theme_location' => 'header_menu',
				'menu_id' => 'header-menu',
				'container' => 'nav',
				'container_class' => 'header-menu',
				'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			]);
			?>

			<a href="tel:+0596763818" class="nav__phone">
				<svg width="14" height="14">
					<use href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#phone"></use>
				</svg>
				0596 76 38 18
			</a>
		</div>

	</div>
</header>