<?php
/**
 * Template Name: Alphabet
 *
 * @package ChoctawNation
 */

get_header();
?>
<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row my-5">
					<h1>The Choctaw Alphabet</h1>
				</div>
				<div class="row my-5">
					<?php if ( have_rows( 'alphabets' ) ) : ?>
					<audio id="audioPlayer" src=""></audio>
					<ul class="col sentences-list p-0 m-0 list-unstyled">
						<?php
						while ( have_rows( 'alphabets' ) ) :
							the_row();
							$letter                = get_sub_field( 'alphabet' );
							$sentence              = get_sub_field( 'sentences' );
							$alphabet_audio_button = get_sub_field( 'alphabet_audio_button' );
							?>
						<li class="sentences-list__item ps-1 fs-5">
							<?php if ( $alphabet_audio_button ) : ?>
							<button aria-label="Audio button to hear sample Choctaw word" value="<?php echo $alphabet_audio_button; ?>" class="btn py-3"
									onclick="window.audioPlayer.handleClick(this)">
								<i class="m-2 fa-solid fa-play-circle fa-2xl"></i>
							</button>
							<?php endif; ?>
							<?php echo esc_textarea( $letter ) . ' - ' . acf_esc_html( $sentence ); ?>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>
				</div>
				<div class="row my-5">
					<div class="col-12 fs-5">
						<?php echo acf_esc_html( get_field( 'alphabet_body' ) ); ?>
					</div>
				</div>
				<div class="row my-5 justify-content-center align-items-center">
					<div class="col text-center">
						<a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg">Return to Dictionary</a>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
