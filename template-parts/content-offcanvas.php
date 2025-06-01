<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: https://jointswp.com/docs/off-canvas-menu/
 */
 $pre_header_links = get_field('pre-header_links', 'options') ?? null;
?>

<div class="off-canvas position-right" id="off-canvas" data-off-canvas>

	<div class="inner">
	
		<?php trailhead_off_canvas_nav(); ?>
		
		<?php if($pre_header_links || $global_social_links): ?>
			<div class="pre-header grid-x grid-padding-x align-right align-middle">
				<div class="cell shrink">
					<div class="inner">
						<div class="grid-x grid-padding-x align-right align-middle">
							<?php if($pre_header_links):?>
								<ul class="pre-header-links cell shrink grid-x grid-padding-x menu horizontal">
									<?php foreach($pre_header_links as $pre_header_link):
										$icon = $pre_header_link['icon'] ?? null;
										$link = $pre_header_link['link'] ?? null;
										if ($link) :
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<li>
											<a class="font-header color-light-gray grid-x align-middle" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
												<?php if($icon) {
													echo wp_get_attachment_image( $icon['id'], 'full', false, [ 'class' => 'style-svg' ] );
												};?>
												<b><?php echo esc_html( $link_title ); ?></b>
											</a>
					
										</li>
									<?php endif; endforeach;?>
								</ul>
							<?php endif;?>
							
							<?php get_template_part('template-parts/part', 'social-links');?>
							
						</div>
					</div>
				</div>
			</div>
		<?php endif;?>
				
	</div>

	<?php if ( is_active_sidebar( 'offcanvas' ) ) : ?>

		<?php dynamic_sidebar( 'offcanvas' ); ?>

	<?php endif; ?>

</div>
