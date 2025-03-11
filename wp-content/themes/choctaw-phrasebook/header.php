<?php
/**
 * Basic Header Template
 *
 * @package ChoctawNation
 */

use ChoctawNation\Navwalker;

?>

<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'overflow-x-hidden position-relative' ); ?>>
	<?php wp_body_open(); ?>
	<header class="navbar navbar-expand-xl overflow-y-hidden py-0" id="site-header">
		<div class="container-fluid">
			<div class="row align-items-center flex-grow-1">
				<div class="col-12 col-xl-2 py-2 position-relative d-flex" id='logo-container'>
					<div class="header-diamond z-1 d-none d-xl-block position-absolute"></div>
					<div class="header-diamond__bg z-2 w-75 position-absolute h-100 top-0 d-none d-lg-block"
						style='right:0;'></div>
					<a class="d-md-block home-logo position-relative z-3 align-self-start"
						href="<?php echo esc_url( home_url() ); ?>">
						<img src="/wp-content/uploads/2024/09/Choctawlogo.svg" alt="Choctaw Nation logo"
							class="py-1 w-100 m-auto logo">
					</a>
				</div>
				<div class="col-6 col-xl-4 offset-xl-2 text-start text-lg-center">
					<h1 class="fs-3 m-0 font-gil" id='site-title'>Choctaw Phrases</h1>
				</div>
				<div class="col-6 col-xl-4 align-self-start py-2">
					<button class="navbar-toggler border-0 my-4 float-end" type="button" data-bs-toggle="offcanvas"
						data-bs-target="#mainMenu" aria-controls="mainMenu" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="offcanvas offcanvas-end" tabindex="-1" id="mainMenu">
						<div class="offcanvas-header">
							<button type="button" class="btn-close" data-bs-dismiss="offcanvas"
								aria-label="Close"></button>
						</div>
						<?php
						if ( has_nav_menu( 'primary_menu' ) ) {
							wp_nav_menu(
								array(
									'theme_location'  => 'primary_menu',
									'menu_class'      => 'navbar-nav',
									'container'       => 'div',
									'container_class' => 'offcanvas-body align-self-xl-end',
									'walker'          => new Navwalker(),
								)
							);
						}
						?>
					</div>

				</div>
			</div>
		</div>
	</header>