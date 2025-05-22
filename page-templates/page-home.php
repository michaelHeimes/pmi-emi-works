<?php
/**
 * Template name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
$fields = get_fields();

$slider_transition_delay = $fields['hero_slider_transition_delay'] ?? null;
$slides = $fields['hero_slides'] ?? null;
?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php if( $slides ):?>
						<header class="entry-header page-banner hero-banner style-hero-slider position-relative bg-blue text-center">
							<?php if( !empty( $slides ) ):?>
								<div class="hero-slider" data-delay="<?= esc_attr( $slider_transition_delay );?>">
									<div class="swiper-wrapper">
										<?php if( !empty( $slides ) ): $i = 1; foreach($slides as $slide):
											$type = $slide['media_type'];
											$poster_url = '';
											$title_line_one = $slide['title_line_one'] ?? null;
											$title_line_two = $slide['title_line_one'] ?? null;
											$button_link = $slide['button_link'] ?? null;
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
												<?php if( $title_line_one || $title_line_two || $button_link ):?>
													<div class="content relative">
														<div class="grid-container">
															<div class="grid-x">
																<div class="cell small-12 medium-6">
																	<?php if( $title_line_one || $title_line_two ):?>
																		<div class="h1">
																			<?php if( $title_line_one ):?>
																				<span><?=esc_html($title_line_one);?></span>
																			<?php endif;?>
																			<?php if( $title_line_two ):?>
																				<span><?=esc_html($title_line_two);?></span>
																			<?php endif;?>
																		</div>
																	<?php endif;?>
																	<?php if( $button_link ): ?>
																		<div class="link-wrap">
																			<?php get_template_part('template-parts/part', 'chev-btn',
																				array(
																					'link' => $button_link,
																					'bg-color' => 'gray-75',
																					'title-color' => 'link-blue',
																					'chev-width' => '12'
																				),
																			);?>
																		</div>
																	<?php endif; ?>
																</div>
															</div>
														</div>
													</div>
												<?php endif;?>
											</div>
										<?php $i++; endforeach; endif;?>
									</div>
								</div>
							<?php endif;?>
						</header><!-- .entry-header -->
					<?php endif;?>
				
					<section class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</section> <!-- end article section -->
							
					<footer class="article-footer">
						 <?php wp_link_pages(); ?>
					</footer> <!-- end article footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();