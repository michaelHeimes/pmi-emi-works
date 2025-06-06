<?php
/**
 * Template name: Machines / Materials Archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
?>
	<div class="content main-content">
		<div class="inner-content">

			<main id="primary" class="site-main relative">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class('relative'); ?>>
				
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