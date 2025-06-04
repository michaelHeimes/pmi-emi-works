<?php
$hero_slider_heading_and_text = get_field('hero_slider_heading_and_text') ?? null;
$slider_transition_delay = get_field('hero_slider_transition_delay') ?? null;
$slides = get_field('hero_slides') ?? null;
?>

<?php if( $slides ):?>
	<header class="entry-header page-banner hero-banner style-default-hero-slider position-relative">
		<div class="grid-container">
			<?php if( !empty( $slides ) ):?>
				<div class="slider-wrapper has-bg">
					<div class="bg">
						<div class="hero-slider h-100" data-delay="<?= esc_attr( $slider_transition_delay );?>">
							<div class="swiper-wrapper">
								<?php if( !empty( $slides ) ): foreach($slides as $slide):
									$type = $slide['media_type'];
									$poster_url = '';
								?>
									<div class="swiper-slide has-bg">
										<div class="bg">
											<?php if( $type == 'image' && !empty( $slide['image'] ) ) {
												echo '<div class="img-wrap has-object-fit">';
												echo wp_get_attachment_image(  $slide['image']['id'], 'full', false, [ 'class' => 'img-fill' ] );
												echo '</div>';
											}?>
											<?php if( $type == 'video' && !empty( $slide['video_file'] ) ||  $type == 'video' && !empty( $slide['image'] ) ):
												$poster_url = $slide['image']['url'] ?? null;
											?>
												<div class="video-wrap has-object-fit">
													<video class="img-fill" width="1600" preload="none" height="900" muted loop playsinline preload="auto" poster="<?=esc_url($poster_url);?>">
													<source src="<?= esc_url( $slide['video_file']['url'] );?>" type="video/mp4" />
													</video>
												</div>
											<?php endif;?>
										</div>
									</div>
								<?php endforeach; endif;?>
							</div>
						</div>
					</div>
					<?php if( $hero_slider_heading_and_text ):?>
						<div class="grid-container">
							<div class="content relative grid-x align-center align-middle">
								<div class="cell small-11 large-10 color-white">
									<?=wp_kses_post( $hero_slider_heading_and_text );?>
								</div>
							</div>
						</div>
					<?php endif;?>
				</div>
			<?php endif;?>
		</div>
	</header><!-- .entry-header -->
<?php endif;?>