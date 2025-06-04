<?php 
$media_slider_autoplay = $args['media_slider_autoplay'] ?? null;
$media_slider_transition_delay = $args['media_slider_transition_delay'] ?? null;
$media_slides = $args['media_slides'] ?? null;
?>
<div class="module block media-slider overflow-hidden position-relative" data-autoplay="<?=esc_attr($media_slider_autoplay);?>" data-delay="<?= esc_attr( $media_slider_transition_delay );?>">
	<div class="swiper-wrapper">
		<?php foreach($media_slides as $slide):
			$type = $slide['media_type'];
			$poster_url = '';	
		?>
			<div class="swiper-slide">
				<?php if( $type == 'image' && !empty( $slide['image'] ) ) {
					echo '<div class="img-wrap has-object-fit">';
					echo wp_get_attachment_image( $slide['image']['id'], 'full', false, [ 'class' => '' ] );
					echo '</div>';
				}?>
				<?php if( $type == 'video' && !empty( $slide['video'] ) ):
				?>
					<div class="video-wrap responsive-embed widescreen">
						<?php
							$iframe = $slide['video'];
						
							// Use preg_match to find iframe src.
							preg_match('/src="(.+?)"/', $iframe, $matches);
							$src = $matches[1];
						
							// Add extra parameters to src and replace HTML.
							$params = array(
								'autoplay'    => 0,
								'muted'       => 0,
								'loop'        => 0,
								'background'  => 0,
								'controls'    => 1,
								'title'       => 0,
								'byline'      => 0,
								'portrait'    => 0,
								'playsinline' => 1,
								'dnt'         => 1,
								'responsive'  => 1,
							);
							$new_src = add_query_arg($params, $src);
							$iframe = str_replace($src, $new_src, $iframe);
						
							// Add extra attributes to iframe HTML.
							$attributes = 'frameborder="0"';
							$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
						
							// Display customized HTML.
							echo $iframe;
						?>
					</div>
				<?php endif;?>
			</div>
		<?php endforeach;?>
	</div>
	<div class="media-slider-thumbnails">
		<?php $i = 0; foreach($media_slides as $slide):
			$image = $slide['image'];
		?>
		<div class="thumb" data-slide="<?=esc_attr($i);?>">
			<?=wp_get_attachment_image( $image['id'], 'thumbnail', false, [ 'class' => '' ] );?>
		</div>
		<?php $i++; endforeach;?>
	</div>
</div>