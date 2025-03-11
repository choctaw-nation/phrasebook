<?php
/**
 *
 * Search and Filter Results Template
 *
 * @package   ChoctawNation
 * @subpackage SearchAndFilter
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>
<div class='search-filter-results-list row'>
	<?php
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part( 'template-parts/content', 'definition-card' );
		}
		?>
</div>
<?php else : ?>
<div class='col-12 my-5 alert alert-info w-100 search-filter-results-list d-flex'
	data-search-filter-action='infinite-scroll-end'>
	<p class="text-center w-100 fs-5 m-0">End of Results</p>
</div>
<?php endif; ?>