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
	$search_term        = ! empty( $_GET['_sf_s'] ) ? $_GET['_sf_s'] : null;
	$first_letter_slug  = $_GET['_sft_phrases-category'];
	$first_letter_term  = get_term_by( 'slug', $first_letter_slug, 'phrases-category' );
	$first_letter_array = array();
	$terms              = get_terms(
		array(
			'taxonomy'   => 'phrases-category',
			'hide_empty' => false,
		)
	);

	if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
		foreach ( $terms as $search_term ) {
			$first_letter_array[] = $search_term->name;
		}
	}

	$first_letter      = $first_letter_term ? $first_letter_term->name : $first_letter_array[0];
	$first_letter_term = get_term_by( 'name', $first_letter, 'phrases-category' );

} else {
	// No '_sft_phrases-category' parameter, set default values
	$search_term = ! empty( $_GET['_sf_s'] ) ? $_GET['_sf_s'] : null;

	$first_letter = 'All';

	// Get the entire post count for the custom post type (replace 'your-cpt' with actual CPT)
	$post_count        = wp_count_posts( 'phrases' );
	$first_letter_term = null; // No specific term, so we won't use this
}


?>
<header class="container">
	<div class="row position-relative justify-content-center">
		<?php if ( $search_term ) : ?>
		<h2 class="text-center my-4 fs-1">Showing results for "<?php echo $search_term; ?>"</h2>
		<?php elseif ( 'All' !== $first_letter ) : ?>
		<div class="col-12 first-letter letter-<?php echo $first_letter; ?> pb-3 pt-5">
			<h2 class="text-center fs-1 fw-bold text-uppercase  d-flex justify-content-center z-2">
				<img src="/wp-content/uploads/2024/09/diamond.svg" alt="Diamond" class="me-2 first-letter__diamond-img">
				<?php echo $first_letter; ?>
			</h2>
			<p class="first-letter__count text-center pt-3">
				<?php echo $first_letter_term ? $first_letter_term->count : 0; ?> results
			</p>
		</div>
		<?php endif; ?>
	</div>
</header>
