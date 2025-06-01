<?php
$global_social_links = get_field('global_social_links', 'option') ?? null;
$classes = $args['classes'] ?? null;
if($global_social_links):
?>
<ul class="global-social-links cell shrink grid-x grid-padding-x menu horizontal <?=esc_attr($classes);?>">
	<?php foreach($global_social_links as $pre_header_social_link):
		$icon = $pre_header_social_link['icon'] ?? null;
		$link = $pre_header_social_link['link'] ?? null;
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
				<span class="show-for-sr"><?php echo esc_html( $link_title ); ?></span>
			</a>
	
		</li>
	<?php endif; endforeach;?>
</ul>
<?php endif;?>