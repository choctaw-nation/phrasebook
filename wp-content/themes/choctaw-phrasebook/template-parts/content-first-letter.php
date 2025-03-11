<?php
/**
 * Shows the First Letter based on URL Param
 *
 * @package ChoctawNation
 * @since 2.0.0
 */

 // phpcs:disable WordPress.Security.NonceVerification.Recommended

// Check if the '_sft_phrases-category' parameter exists in the URL
if ( isset( $_GET['_sft_phrases-category'] ) && ! empty( $_GET['_sft_phrases-category'] ) ) {
	$search_term            = ! empty( $_GET['_sf_s'] ) ? $_GET['_sf_s'] : null;
	$phrases_category_slug  = $_GET['_sft_phrases-category'];
	$phrases_category_term  = get_term_by( 'slug', $phrases_category_slug, 'phrases-category' );
	$phrases_category_array = array();
	$phrases_category_terms = get_terms(
		array(
			'taxonomy'   => 'phrases-category',
			'hide_empty' => false,
		)
	);

	if ( ! is_wp_error( $phrases_category_terms ) && ! empty( $phrases_category_terms ) ) {
		foreach ( $phrases_category_terms as $category_term ) {
			$phrases_category_array[] = $category_term->name;
		}
	}

	$phrases_category      = $phrases_category_term ? $phrases_category_term->name : $phrases_category_array[0];
	$phrases_category_term = get_term_by( 'name', $phrases_category, 'phrases-category' );

} else {
	// No '_sft_phrases-category' parameter, set default values
	$search_term = ! empty( $_GET['_sf_s'] ) ? $_GET['_sf_s'] : null;

	$phrases_category = 'All';

	// Get the entire post count for the custom post type (replace 'your-cpt' with actual CPT)
	$post_count            = wp_count_posts( 'phrases' );
	$phrases_category_term = null; // No specific term, so we won't use this
}


?>
<header class="container">
	<div class="row position-relative justify-content-center">
		<?php if ( $search_term ) : ?>
		<h2 class="text-center my-4 fs-1">Showing results for "<?php echo $search_term; ?>"</h2>
		<?php elseif ( 'All' !== $phrases_category ) : ?>
		<div class="col-12 first-letter letter-<?php echo $phrases_category; ?> pb-3 pt-5">
			<h2 class="text-center fs-1 fw-bold text-uppercase  d-flex justify-content-center z-2">
				<img src="/wp-content/uploads/2024/09/diamond.svg" alt="Diamond" class="me-2 first-letter__diamond-img">
				<?php echo $phrases_category; ?>
			</h2>
			<p class="first-letter__count text-center pt-3">
				<?php echo $phrases_category_term ? $phrases_category_term->count : 0; ?> results
			</p>
		</div>
		<?php endif; ?>
	</div>
</header>
