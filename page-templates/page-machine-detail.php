<?php
/**
 * Template name: Machine Detail
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
?>
	<?php get_template_part('template-parts/section', 'full-width-hero-slider');?>
	
	<div class="content main-content relative">
		<div class="inner-content relative">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<section itemprop="text">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-center">
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