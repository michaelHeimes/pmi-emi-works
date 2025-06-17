<?php
$alignment = $args['alignment'] ?? null;
$button_links = $args['button_links'] ?? null;
if($button_links):
?>	
<div class="btns-group grid-x grid-padding-x <?=$alignment;?> align-middle">
	<?php foreach($button_links as $button_link):
		$style = $button_link['style'] ?? null;
		$add_phone_icon = $button_link['add_phone_icon'] ?? null;
		$link = $button_link['link'] ?? null;
	?>
		<?php 
		if( $link ): 
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
		<div class="cell shrink">
			<?php if ($style == 'transparent') :?>
				<a class="button grid-x align-center no-bg icon-left" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
					<?php if ($style == 'transparent' && $add_phone_icon == 'true' ):?>
						<svg class="phone-icon" xmlns="http://www.w3.org/2000/svg" width="11.14" height="17.506" viewBox="0 0 11.14 17.506"><path d="M8.753 0H2.387A2.384 2.384 0 0 0 0 2.387v12.732a2.384 2.384 0 0 0 2.387 2.387h6.366a2.384 2.384 0 0 0 2.387-2.387V2.387A2.384 2.384 0 0 0 8.753 0ZM7.161 15.914H3.979v-.8h3.183Zm2.586-2.387H1.392V2.387h8.355Z" fill="#0032a0"/></svg>
					<?php endif; ?>
					<span><?php echo esc_html( $link_title ); ?></span>
				</a>
			<?php else:?>
				<?php get_template_part('template-parts/part', 'chev-btn',
					array(
						'link' => $link,
						'bg-color' => 'primary',
						'title-color' => 'white',
						'chev-width' => '9'
					),
				);?>
			<?php endif;?>
		</div>
		<?php endif; ?>
	<?php endforeach;?>
</div>
<?php endif; ?>