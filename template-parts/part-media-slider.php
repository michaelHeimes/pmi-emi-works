<?php 
$id = $args['id'] ?? null;
$media_slider_autoplay = $args['media_slider_autoplay'] ?? null;
$media_slider_transition_delay = $args['media_slider_transition_delay'] ?? null;
$media_slides = $args['media_slides'] ?? null;
?>
<div class="media-slider overflow-hidden position-relative" data-autoplay="<?=esc_attr($media_slider_autoplay);?>" data-delay="<?= esc_attr( $media_slider_transition_delay );?>">
	<div class="swiper-wrapper">
		<?php $i = 1; foreach($media_slides as $slide):
			$type = $slide['media_type'] ?? null;
			$video_source = $slide['video_source'] ?? null;
			$poster_url = '';	
			$image = $slide['image'] ?? null;
			$video_url = $slide['video'] ?? null;
			$video_file = $slide['video_file'] ?? null;
		?>
			<div class="swiper-slide no-swipe grid-x align-middle">
				<?php if( $type == 'image' && !empty( $image ) ) {
					echo '<div class="img-wrap has-object-fit">';
					echo wp_get_attachment_image( $image['id'], 'full', false, [ 'class' => '' ] );
					echo '</div>';
				}?>
				<?php if( $type == 'video' ):?>
					<div  class="img-wrap has-object-fit v-modal-trigger" data-open="<?=$id;?>-modal-<?=$i;?>">
						<?=wp_get_attachment_image( $image['id'], 'full', false, [ 'class' => '' ] );?>
						<svg xmlns="http://www.w3.org/2000/svg" width="134" height="134" viewBox="0 0 134 134"><g data-name="Group 417"><g data-name="play-icon-bg" fill="#1e1e38" stroke="#707070"><circle cx="67" cy="67" r="67" stroke="none"/><circle cx="67" cy="67" r="66.5" fill="none"/></g><path data-name="play-icon-polygon" d="M87.453 62.664a5 5 0 0 1 0 8.671L55.491 89.7A5 5 0 0 1 48 85.361V48.639a5 5 0 0 1 7.491-4.339Z" fill="#4da5fc"/></g></svg>
					</div>
					<div id="<?=$id;?>-modal-<?=$i;?>" class="reveal large msv-reveal" data-reveal data-reset-on-close="true">
						<div class="grid-x align-right">
							<button class="close-button" data-close aria-label="Close modal" type="button">
								<svg xmlns="http://www.w3.org/2000/svg" width="38.13" height="38" viewBox="0 0 38.13 38"><path d="M19.065 23.4 4.465 38 0 33.535 14.5 19 0 4.465 4.465 0l14.6 14.6L33.665 0l4.465 4.465L23.63 19l14.5 14.535L33.665 38Z" fill="#4da5fc"/></svg>
							</button>
						</div>
						<div class="video-wrap responsive-embed widescreen">
							<?php if( $video_source == 'hosted' && !empty( $video_url ) ):
								$iframe = $video_url ?? null;
							
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
							endif;?>
							<?php if( $video_source == 'file' && !empty( $video_file ) ):
									
							?>
								<video controls poster="<?=esc_url($image['url']);?>" preload="auto">
									<source src="<?=esc_url($video_file);?>" type="video/mp4">
									Your browser does not support the video tag.
								</video>
							<?php endif;?>
						</div>
					</div>
				<?php endif;?>
			</div>
		<?php $i++; endforeach;?>
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
								$image = $slide['image'] ?? null;
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