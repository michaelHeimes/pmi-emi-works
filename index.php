<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
$posts_page_id = get_option('page_for_posts'); // Retrieve the ID of the posts page
?>

	<main id="primary" class="site-main">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-12 tablet-11 xlarge-10 xxlarge-9">
					<?php
					if ( have_posts() ) :
			
						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;
						
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
