<?php
/**
 * Template name: Material Detail
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();

$media_slider_autoplay = get_field('media_slider_autoplay') ?? null;
$media_slider_transition_delay = get_field('media_slider_transition_delay') ?? null;
$media_slides = get_field('media_slides') ?? null;
$intro_copy = get_field('intro_copy') ?? null;
?>
	<?php get_template_part('template-parts/section', 'full-width-hero-slider');?>
	
	<div class="content main-content relative">
		<div class="inner-content relative">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<section itemprop="text">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-center">
								
								
								<?php if( $media_slides || $intro_copy ) :?>
									<div class="intro cell small-12 xxlarge-10">
										<div class="grid-x grid-padding-x medium-flex-dir-row-reverse">
										<?php if( $intro_copy ) :?>
											<div class="copy-wrap cell small-12 medium-5 entry-content">
												<?=wp_kses_post( $intro_copy );?>
											</div>
										<?php endif;?>
										<?php if($media_slides) :?>
											<div class="slider-wrap cell small-12 medium-7">
												<?php get_template_part('template-parts/part', 'media-slider',
													array(
														'media_slider_autoplay' => $media_slider_autoplay,
														'media_slider_transition_delay' => $media_slider_transition_delay,
														'media_slides' => $media_slides,
													),
												);?>
											</div>
										<?php endif;?>
									</div>
								<?php endif;?>
								
								<div class="entry-content cell small-12 large-10 xxlarge-8">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</section> <!-- end article section -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();