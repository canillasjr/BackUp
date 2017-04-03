<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="backmenu"></div>
<div class="menu-mobile-container">
	<nav class="m-nav-menu">
		<?php wp_nav_menu(array(
			'theme_location' => 'primary'
		)); ?>
	</nav>
</div>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding  desktop-version">
			<h1 class="site-title">
				<?php if ( undiscovered_options( 'logotype' ) ) : ?>
					<a class="logotype-img" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo undiscovered_options( 'logotype' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
				<?php else : ?>
					<a class="logotype-text" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php endif; ?>
			</h1>
		</div>

		<nav id="site-navigation" class="main-navigation  desktop-version" role="navigation">
			<?php wp_nav_menu(array(
				'theme_location' => 'primary',
				'items_wrap' => my_nav_wrap()
			)); ?>
			<div id="search-box" class="collapse">
				<?php get_search_form() ?>
			</div>
		</nav>

		<div class="row mobile-version" >
			<div class="col-xs-6 padding-0">
				<div class="site-branding">
					<h1 class="site-title">
						<?php if ( undiscovered_options( 'logotype' ) ) : ?>
							<a class="logotype-img" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo undiscovered_options( 'logotype' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
						<?php else : ?>
							<a class="logotype-text" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					</h1>
				</div>
			</div>
			<div class="col-xs-6 padding-0">
				<div class="menu-nav-btn" data-click="collapse-nav" ><i class="fa fa-bars" aria-hidden="true"></i></div>
				<div class="search-btn-box"><img src="<?php echo get_template_directory_uri() ?>/img/search-btn.png">
				</div>
			</div>
		<div id="search-box-m" style="display: none">
						<?php get_search_form() ?>
				</div>
		</div>
	</header>
	
	<div id="content" class="site-content">
