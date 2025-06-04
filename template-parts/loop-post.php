<?php
/**
 * Template part for displaying a single post
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('relative'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="grid-x grid-padding-x">
		<div class="thumb-wrap cell small-12 medium-7 tablet-4">
			<?php the_post_thumbnail('full'); ?>
		</div>
		<div class="cell small-12 tablet-8">
			<header class="article-header">	
				<h1 class="entry-title single-title h4" itemprop="headline"><?php the_title(); ?></h1>
			</header> <!-- end article header -->
							
			<section class="entry-content" itemprop="text">
				<p><?=get_custom_excerpt_or_trimmed_content();?></p>
				<div class="link-wrap">
					<a class="button chev-btn grid-x align-middle bg-primary color-white" href="<?=esc_url(get_the_permalink());?>" target="_self">
						<span class="weight-semibold">Read <span class="inline-icon-wrap">More
							<svg xmlns="http://www.w3.org/2000/svg" width="9" viewBox="0 0 12 19.433"><path d="M2.283 0 0 2.283l7.417 7.433L0 17.15l2.283 2.283L12 9.716Z" fill="#4da5fc"></path></svg>
						</span></span>
					</a>
				</div>
			</section> <!-- end article section -->
								
			<footer class="article-footer">
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'trailhead' ), 'after'  => '</div>' ) ); ?>
				<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'trailhead' ) . '</span> ', ', ', ''); ?></p>	
			</footer> <!-- end article footer -->
		</div>
	</div>	
</article> <!-- end article -->