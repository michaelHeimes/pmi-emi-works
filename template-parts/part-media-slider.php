<?php 
$media_slider_autoplay = $args['media_slider_autoplay'] ?? null;
$media_slider_transition_delay = $args['media_slider_transition_delay'] ?? null;
$media_slides = $args['media_slides'] ?? null;
?>
<div class="media-slider overflow-hidden position-relative" data-autoplay="<?=esc_attr($media_slider_autoplay);?>" data-delay="<?= esc_attr( $media_slider_transition_delay );?>">
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
	<div class="arrows-thumbs relative">
		<div class="grid-x grid-padding-x align-middle">
			<?php if( count($media_slides) > 1 ):?>
				<div class="cell shrink swiper-btn swiper-button-prev">
					<svg xmlns="http://www.w3.org/2000/svg" width="20.267" height="32.82" viewBox="0 0 20.267 32.82"><path d="m16.41 0 3.856 3.856L7.74 16.41l12.527 12.554-3.857 3.856L0 16.41Z" fill="#4da5fc"/></svg>
				</div>
			<?php endif;?>
			<div class="cell auto">		
				<div class="overflow-hidden">
					<div class="media-slider-thumbnails">
						<div class="swiper-wrapper">
							<?php $i = 0; foreach($media_slides as $slide):
								$image = $slide['image'];
							?>
							<div class="swiper-slide">
								<div class="thumb" data-slide="<?=esc_attr($i);?>">
									<?=wp_get_attachment_image( $image['id'], 'thumbnail', false, [ 'class' => '' ] );?>
								</div>
							</div>
							<?php $i++; endforeach;?>
						</div>
					</div>
				</div>
			</div>
			<?php if( count($media_slides) > 1 ):?>
				<div class="cell shrink swiper-btn swiper-button-next">
					<svg xmlns="http://www.w3.org/2000/svg" width="20.267" height="32.82" viewBox="0 0 20.267 32.82"><path d="M3.856 0 0 3.856 12.526 16.41 0 28.964l3.856 3.856 16.41-16.41Z" fill="#4da5fc"/></svg>
				</div>
			<?php endif;?>
		</div>
	</div>
</div>