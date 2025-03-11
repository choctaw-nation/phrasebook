<?php
/**
 * Content Modal
 * Gives the user more info about using the dictionary search tool
 *
 * @since 2.0.0
 * @package ChoctawNation
 */

?>
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title font-gil" id="infoModalLabel">Search Information</h2>
				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				>
				</button>
			</div>
			<div class="modal-body">
				<p>To clear a search or selected letter category please use the "Reset" button</p>
				<p>To add a Choctaw letter character to a search, select one of the character buttons (a̱,i̱,o̱, or ʋ) from below the search field.</p> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light btn-lg" data-bs-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>
</div>