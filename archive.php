<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
?>

	<main id="primary" class="site-main main-content relative">
		<div class="grid-container relative">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-12 tablet-11 xlarge-10 xxlarge-9">
					<div class="intro entry-content">
						<?php if (is_category()) : ?>
							<h1 class="wp-block-heading">
								Category: <?php single_cat_title(); ?>
							</h1>
						<?php endif;?>
					</div>
					<?php
					if ( have_posts() ) :
						
						if( is_home() && !empty(get_post_field( 'post_content', $posts_page_id )) ):?>
							<div class="intro entry-content">
								<?=get_post_field( 'post_content', $posts_page_id );?>
							</div>
						<?php endif;
			
						/* Start the Loop */
						echo '<div class="posts-wrap">';
						while ( have_posts() ) :
								the_post();
				
								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/loop', 'post' );
						endwhile;
						echo '</div>';
			
						echo '<div class="grid-x grid-padding-x align-center">';
							echo '<div class="inner cell small-12 medium-10 tablet-4 position-relative font-header uppercase">';
								trailhead_page_navi();
							echo '</div>';
						echo '</div>';
			
					else :
			
						get_template_part( 'template-parts/content', 'none' );
			
					endif;
					?>
					
					<?php get_template_part('template-parts/section', 'post-footer-nav');?>
					
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
