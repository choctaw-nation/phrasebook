<?php
/**
 * Template Name: Primary
 *
 * @package ChoctawNation
 */

get_header();
?>
<style>
/* s.sf-field-taxonomy-phrases-category {
	display: none !important;
} */
</style>
<div id="content" class="site-content container-fluid g-0 mb-5">
	<div id="primary" class="content-area">
		<div class="container-fluid py-3" id='secondary-header'>
			<div class="row search row-gap-5 row-gap-xl-0">
				<div class="col-12 col-lg-6 col-xl-4 py-3 d-flex justify-content-center order-first">
					<?php echo do_shortcode( '[searchandfilter id="56"]' ); ?>
					<?php get_template_part( 'template-parts/content', 'modal' ); ?>
				</div>
				<div class="col-12 col-xl-5 order-lg-last text-center d-flex flex-column justify-content-center">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle px-2 btn fs-4" type="button"
							id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="fas fa-newspaper mx-2"></i>Browse Categories
						</button>
						<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
							<li><a class="dropdown-item menu-item menu-item-type-custom menu-item-object-custom"
									href="/">All</a></li>
							<?php
							$terms = get_terms(
								array(
									'taxonomy'   => 'phrases-category',
									'orderby'    => 'name',
									'order'      => 'ASC',
									'hide_empty' => false,
								)
							);
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
								foreach ( $terms as $custom_term ) {
									if ( ! empty( $custom_term->name ) ) {
										echo '<li><a class="dropdown-item menu-item menu-item-type-custom menu-item-object-custom ' . $custom_term->slug . '" href="/?_sft_phrases-category=' . $custom_term->slug . '">' . esc_html( $custom_term->name ) . '</a></li>';
									}
								}
							}
							?>
						</ul>
					</div>

				</div>
				<div class="col-12 col-lg-6 col-xl-3 text-center order-last order-lg-2 order-xl-last">
					<?php get_template_part( 'template-parts/content', 'color-mode-toggle' ); ?>
				</div>
			</div>
		</div>
		<main id="main" class="site-main">
			<audio id="audioPlayer" src=""></audio>
			<?php get_template_part( 'template-parts/content', 'first-letter' ); ?>
			<div class="search-filter-results container py-3">
				<?php echo do_shortcode( '[searchandfilter id="56" show="results"]' ); ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();