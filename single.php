<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package trailhead
 */

get_header();
?>

	<main id="primary" class="site-main main-content">
		<?php get_template_part('template-parts/section', 'default-hero-slider');?>
		<div class="grid-container relative">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-12 tablet-11 xlarge-10 xxlarge-9">
					<?php
					while ( have_posts() ) :
						the_post();
			
						get_template_part( 'template-parts/content', get_post_type() );
			
					endwhile; // End of the loop.
					?>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
