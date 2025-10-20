<?php
/**
 * Template name: Why EMI Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
$fields = get_fields();

$slider_transition_delay = $fields['quote_slider_transition_delay'] ?? null;
$slides = $fields['quote_hero_slides'] ?? null;
?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php if( $slides ):?>
						<header class="entry-header page-banner hero-banner style-quote-slider position-relative">
							<?php if( !empty( $slides ) ):?>
								<div class="hero-slider" data-delay="<?= esc_attr( $slider_transition_delay );?>">
									<div class="swiper-wrapper">
										<?php if( !empty( $slides ) ): $i = 1; foreach($slides as $slide):
											$image = $slide['image'] ?? null;
											$blue_text = $slide['blue_text'] ?? null;
											$white_text = $slide['white_text'] ?? null;
											if($image):
										?>
											<div class="swiper-slide has-bg">
												<div class="bg">
													<?php if( !empty( $slide['image'] ) ) {
														echo '<div class="img-wrap has-object-fit">';
														echo wp_get_attachment_image(  $slide['image']['id'], 'full', false, [ 'class' => 'img-fill' ] );
														echo '</div>';
													}?>
													<div class="img-mask"></div>
												</div>
												<?php if( $blue_text || $white_text|| $button_link ):?>
													<div class="grid-container w-100">
														<div class="grid-x align-middle h-100">
															<div class="content relative grid-x align-center align-middle text-center">		
																<div class="inner grid-x grid-padding-x">
																	<?php if( $blue_text || $white_text):?>
																		<div class="cell shrink">
																			<img src="<?=get_template_directory_uri();?>/assets/images/quote-slider-mark-start-img.svg">
																		</div>
																		<div class="h1 cell auto grid-x flex-dir-column align-middle">
																			<?php if( $blue_text ):?>
																				<span class="blue-text"><?=wp_kses_post($blue_text);?></span>
																			<?php endif;?>
																			<?php if( $white_text):?>
																				<span><?=wp_kses_post($white_text);?></span>
																			<?php endif;?>
																		</div>
																		<div class="cell shrink grid-x align-bottom">
																			<img src="<?=get_template_directory_uri();?>/assets/images/quote-slider-mark-end-img.svg">
																		</div>
																	<?php endif;?>
																</div>
															</div>
														</div>
													</div>
												<?php endif;?>
											</div>
										<?php $i++; endif; endforeach; endif;?>
									</div>
									<div class="swiper-btn swiper-button-prev show-for-tablet"></div>
									<div class="swiper-btn swiper-button-next show-for-tablet"></div>
									<div class="grid-container pagination-container">
										<div class="grid-x grid-padding-x align-center">
											<div class="cell small-12 large-10 xxlarge-8">
												<div class="grid-x grid-padding-x align-right">
													<div class="cell small-12 xlarge-4 xlarge-offset-8 relative">
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
						
					<section itemprop="text">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell small-12 tablet-11 xlarge-10 xxlarge-9">
									<div class="entry-content main-content">
										<?php the_content();?>
									</div>
								</div>
							</div>
						</div>
					</section>
							
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>
	
<?php
get_footer();