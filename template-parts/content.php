<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header entry-content">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="wp-block-heading">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;?>
	</header><!-- .entry-header -->

	<div class="entry-content main-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'trailhead' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'trailhead' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer entry-content main-content">
		<nav class="post-navigation uppercase grid-container">
			<div class="nav-links grid-x grid-padding-x align-center">
				<?php
				$prev_post = get_previous_post(false); // 'false' ignores category
				$next_post = get_next_post(false);
		
				if ($prev_post) {
					echo '<div class="cell shrink"><a class="nav-previous align-middle" href="' . get_permalink($prev_post->ID) . '"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="16.194" viewBox="0 0 10 16.194"><path d="m8.097 0 1.9 1.9-6.178 6.2L10 14.294l-1.9 1.9-8.1-8.1Z" fill="#4da5fc"/></svg><b>Prev</b></a></div>';
				}
				echo '<div class="cell small-1 large-2"></div>';
				if ($next_post) {
					echo '<div class="cell shrink"><a class="nav-next align-middle" href="' . get_permalink($next_post->ID) . '"><b>Next</b><svg xmlns="http://www.w3.org/2000/svg" width="10" height="16.194" viewBox="0 0 10 16.194"><path d="M1.903 0 0 1.9l6.181 6.2L0 14.291l1.9 1.9 8.1-8.1Z" fill="#4da5fc"/></svg></a></div>';
				}
				?>
			</div>
		</nav>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
