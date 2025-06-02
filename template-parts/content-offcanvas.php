<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: https://jointswp.com/docs/off-canvas-menu/
 */
 $pre_header_links = get_field('pre-header_links', 'options') ?? null;
 $get_info_link = get_field('get_info_link', 'option') ?? null;
?>

<div class="off-canvas position-right" id="off-canvas" data-off-canvas>

	<ul class="close-btn-wrap menu grid-x align-right">
		<li><a class="menu-toggle close" data-toggle="off-canvas"><span></span><span></span><span></span></a></li>
	</ul>
	

	<?php trailhead_off_canvas_nav(); ?>
	
	<?php if($pre_header_links): ?>
		<ul class="pre-header-links cell shrink grid-x grid-padding-x menu horizontal align-center">
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
	
	<?php if( $get_info_link ):?>
		<div class="get-info-wrap grid-x align-center">
			<?php get_template_part('template-parts/part', 'chev-btn',
				array(
					'link' =>  $get_info_link,
					'bg-color' => 'link-blue',
					'title-color' => 'white',
					'chev-width' => '9'
				),
			);?>
		</div>
	<?php endif;?>

</div>
