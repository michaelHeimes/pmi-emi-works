<?php
$fields = get_fields();

$slider_transition_delay = $fields['hero_slider_transition_delay'] ?? null;
$slides = $fields['hero_slides'] ?? null;
?>

<?php if( $slides ):?>
	<header class="entry-header page-banner hero-banner style-full-width-hero-slider position-relative">
		<?php if( !empty( $slides ) ):?>
			<div class="hero-slider" data-delay="<?= esc_attr( $slider_transition_delay );?>">
				<div class="swiper-wrapper">
					<?php if( !empty( $slides ) ): $i = 1; foreach($slides as $slide):
						$type = $slide['media_type'];
						$poster_url = '';
						$title = $slide['title'] ?? null;
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
										<video class="img-fill" width="1600" preload="none" height="900" muted loop playsinline preload="auto" poster="">
										<source src="<?= esc_url( $slide['video_file']['url'] );?>" type="video/mp4" />
										</video>
									</div>
								<?php endif;?>
							</div>
							<?php if( $title ):?>
								<div class="grid-container grid-x align-center">
									<div class="content relative grid-x align-center align-middle">
										<div class="grid-x grid-padding-x align-center">
											<div class="cell small-12 tablet-10 xlarge-8 xxlarge-7">
												<?php if( $title ):?>
													<div class="h1 text-center">
														<?=wp_kses_post($title);?>
													</div>
												<?php endif;?>
											</div>
										</div>
									</div>
								</div>
							<?php endif;?>
						</div>
					<?php $i++; endforeach; endif;?>
				</div>
				<div class="grid-container pagination-container">
					<div class="grid-x grid-padding-x align-center">
						<div class="cell small-12 large-10 xxlarge-8">
							<div class="grid-x grid-padding-x align-right">
								<div class="cell small-12 medium-4 medium-offset-8 relative">
									<div class="swiper-pagination"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif;?>
	</header><!-- .entry-header -->
<?php endif;?>