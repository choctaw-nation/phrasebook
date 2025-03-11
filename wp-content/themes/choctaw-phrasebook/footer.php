<?php
/**
 * Basic Footer Template
 *
 * @since 1.0
 * @package ChoctawNation
 */

?>

<footer class="footer py-5 container-fluid gx-5 text-white text-center d-flex flex-column align-items-center">
	<?php
	if ( has_nav_menu( 'footer_menu' ) ) {
		wp_nav_menu(
			array(
				'theme_location'  => 'footer_menu',
				'menu_class'      => 'navbar__menu p-0 m-0 d-inline-flex',
				'container'       => 'nav',
				'container_class' => 'footer-nav navbar',
			)
		);
	}
	?>
	<div id="copyright" class="text-black">
		<?php echo '&copy;&nbsp;' . gmdate( 'Y' ) . '&nbsp;<a href="https://www.choctawnation.com" target="_blank" class="text-black link-underline" >Choctaw Nation of Oklahoma</a>'; ?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>