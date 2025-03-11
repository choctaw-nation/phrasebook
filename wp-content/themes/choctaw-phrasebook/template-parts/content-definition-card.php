<?php
/**
 * Content: Definition Card
 * Displays the Choctaw word and its definition
 *
 * @since 2.0.0
 * @package ChoctawNation
 */

$audio   = get_field( 'audio_file' );
$word_id = get_field( 'word_id' );
if ( isset( $_GET['_sft_nonce'] ) && wp_verify_nonce( $_GET['_sft_nonce'], 'sft_nonce_action' ) ) {
	$first_letter = isset( $_GET['_sft_first_letter'] ) ? $_GET['_sft_first_letter'] : 'A';
} else {
	$first_letter = 'A';
}

?>
<div class="col-12 col-md-6 col-lg-4 my-3">
	<div class="card border rounded-5 border-0 p-4 h-100 w-100">
		<div class="row h-100">
			<div class="<?php echo $audio ? 'col-9' : 'col-12'; ?>">
				<h2 class="fw-bold font-gil fs-3 text-transform">
					<?php
						the_title();
					?>
				</h2>
				<?php
				if ( have_rows( 'definitions' ) ) {
					while ( have_rows( 'definitions' ) ) {
						the_row();
						$definition = get_sub_field( 'definition' );
						echo "<p class='p-3 fs-5'>{$definition}</p>";
					}
				}
				?>
			</div>
			<?php if ( $audio ) : ?>
			<div class="col-3 align-self-center d-flex justify-content-center">
				<button aria-label="Audio button for choctaw word" value="<?php echo $audio; ?>"
					class="btn btn-audio border-0" onclick="window.audioPlayer.handleClick(this)">
					<i class="fa-solid fa-play-circle fs-1"></i>
				</button>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>