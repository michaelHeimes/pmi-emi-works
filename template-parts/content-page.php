<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */
$fields = get_fields();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<div class="entry-content main-content">
        
        <?php get_template_part('template-parts/section', 'default-hero-slider');?>
        
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center">
                <div class="cell small-12 tablet-11 xlarge-10 xxlarge-9">
                    <?php the_content();?>
                </div>
            </div>
        </div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
