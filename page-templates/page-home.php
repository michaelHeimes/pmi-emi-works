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

$val_prop_background_image = $fields['val_prop_background_image'] ?? null;
$val_prop_left_text_top_line = $fields['val_prop_left_text_top_line'] ?? null;
$val_prop_left_text_bottom_line = $fields['val_prop_left_text_bottom_line'] ?? null;
$val_prop_right_text_top_line = $fields['val_prop_right_text_top_line'] ?? null;
$val_prop_right_text_bottom_line = $fields['val_prop_right_text_bottom_line'] ?? null;

$it_cta_cards_background_image = $fields['it_cta_cards_background_image'] ?? null;
$it_cta_cards_heading = $fields['it_cta_cards_heading'] ?? null;
$it_cta_cards_cards = $fields['it_cta_cards_cards'] ?? null;
$it_cta_cards_cta_link = $fields['it_cta_cards_cta_link'] ?? null;

$itc_heading = $fields['itc_heading'] ?? null;
$itc_cards = $fields['itc_cards'] ?? null;
$itc_button_link = $fields['itc_button_link'] ?? null;
?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php if( $slides ):?>
						<header class="entry-header page-banner hero-banner style-home-hero-slider position-relative">
							<?php if( !empty( $slides ) ):?>
								<div class="hero-slider" data-delay="<?= esc_attr( $slider_transition_delay );?>">
									<div class="swiper-wrapper">
										<?php if( !empty( $slides ) ): $i = 1; foreach($slides as $slide):
											$type = $slide['media_type'];
											$poster_url = '';
											$title_line_one = $slide['title_line_one'] ?? null;
											$title_line_two = $slide['title_line_two'] ?? null;
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
													<div class="content relative grid-x align-center align-bottom">
														<div class="cell small-12 large-10 xxlarge-8">
															<div class="grid-container">
																<div class="grid-x">
																	<div class="cell small-12 medium-8">
																		<?php if( $title_line_one || $title_line_two ):?>
																			<div class="h1">
																				<?php if( $title_line_one ):?>
																					<span><?=esc_html($title_line_one);?></span>
																				<?php endif;?>
																				<?php if( $title_line_two ):?>
																					<span class="uppercase"><?=esc_html($title_line_two);?></span>
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
				
					<section itemprop="text">
						<div class="intro-cta">
							<div class="grid-container">
								<div class="grid-x grid-padding-x align-center">
									<div class="entry-content cell small-12 large-10 xxlarge-8">
										<?php the_content(); ?>
									</div>
									<?php if($val_prop_background_image || $val_prop_left_text_top_line || $val_prop_left_text_bottom_line || $val_prop_right_text_top_line || $val_prop_right_text_bottom_line):?>
										<div class="value-proposition cell small-12">
											<div class="inner relative has-object-fit">
												<?php if($val_prop_background_image) {
													echo wp_get_attachment_image( $val_prop_background_image['id'], 'full', false, ['class' => 'img-fill'] );
												}?>
												<div class="grid-x grid-padding-x align-middle align-center relative">
													<?php if( $val_prop_left_text_top_line || $val_prop_left_text_bottom_line ):?>
														<div class="cell small-12 tablet-5">
															<h2 class="text-center">
																<?php if( $val_prop_left_text_top_line ):?>
																	<div class="color-link-blue">
																		<?=esc_html($val_prop_left_text_top_line);?>
																	</div>
																<?php endif;?>
																<?php if( $val_prop_left_text_bottom_line ):?>
																	<div class="color-text-light-gray">
																		<?=esc_html($val_prop_left_text_bottom_line);?>
																	</div>
																<?php endif;?>
															</h2>
														</div>
													<?php endif;?>
													<div class="svg-wrap cell small-12 tablet-2">
														<div class="grid-x align-center">
															<svg xmlns="http://www.w3.org/2000/svg" width="85.795" height="59.536" viewBox="0 0 85.795 59.536"><defs><filter id="a" x="0" y="0" width="43.649" height="59.536" filterUnits="userSpaceOnUse"><feOffset dy="3"/><feGaussianBlur stdDeviation="3" result="blur"/><feFlood flood-opacity=".4"/><feComposite operator="in" in2="blur"/><feComposite in="SourceGraphic"/></filter><filter id="b" x="20.23" y="0" width="43.649" height="59.536" filterUnits="userSpaceOnUse"><feOffset dy="3"/><feGaussianBlur stdDeviation="3" result="blur-2"/><feFlood flood-opacity=".4"/><feComposite operator="in" in2="blur-2"/><feComposite in="SourceGraphic"/></filter><filter id="c" x="42.147" y="0" width="43.649" height="59.536" filterUnits="userSpaceOnUse"><feOffset dy="3"/><feGaussianBlur stdDeviation="3" result="blur-3"/><feFlood flood-opacity=".4"/><feComposite operator="in" in2="blur-3"/><feComposite in="SourceGraphic"/></filter></defs><g data-name="three-chevs"><g filter="url(#a)" transform="translate(-.005 -.002)"><path data-name="ic_chevron_right_24px" d="M13.881 6 9 10.881l15.853 15.887L9 42.656l4.881 4.881 20.768-20.769Z" fill="#79b9f8"/></g><g filter="url(#b)" transform="translate(-.005 -.002)"><path data-name="ic_chevron_right_24px" d="m34.111 6-4.881 4.881 15.853 15.887L29.23 42.656l4.881 4.881 20.768-20.769Z" fill="#96c8f8"/></g><g filter="url(#c)" transform="translate(-.005 -.002)"><path data-name="ic_chevron_right_24px" d="m56.031 6-4.881 4.881 15.853 15.887L51.15 42.656l4.881 4.881 20.768-20.769Z" fill="#c8e3fd"/></g></g></svg>
														</div>
													</div>
													<?php if( $val_prop_right_text_top_line || $val_prop_right_text_bottom_line ):?>
														<div class="cell small-12 tablet-5">
															<h2 class="text-center">
																<?php if( $val_prop_right_text_top_line ):?>
																	<div class="color-link-blue">
																		<?=esc_html($val_prop_right_text_top_line);?>
																	</div>
																<?php endif;?>
																<?php if( $val_prop_right_text_bottom_line ):?>
																	<div class="color-text-light-gray">
																		<?=esc_html($val_prop_right_text_bottom_line);?>
																	</div>
																<?php endif;?>
															</h2>
														</div>
													<?php endif;?>
												</div>
											</div>
										</div>
									<?php endif;?>
								</div>
							</div>
						</div>
					</section> <!-- end article section -->
					
					<?php if( $it_cta_cards_background_image || $it_cta_cards_heading || $it_cta_cards_cards || $it_cta_cards_cta_link ):?>
						<section class="image-title-cta-cards relative has-object-fit entry-content">
							<?php if( $it_cta_cards_background_image ) {
								echo wp_get_attachment_image(  $it_cta_cards_background_image['id'], 'full', false, [ 'class' => 'img-fill' ] );
							};?>
							<div class="grid-container relative">
								<div class="grid-x grid-padding-x align-center">
									<div class="cell small-12 large-10">
										<?php if( $it_cta_cards_heading  ):?>
											<h2 class="text-center color-text-light-gray line-height-1"><?=wp_kses_post($it_cta_cards_heading);?></h2>
										<?php endif;?>
										<?php if( $it_cta_cards_cards ):?>
											<div class="cards grid-x grid-padding-x align-center">
												<?php foreach($it_cta_cards_cards as $card):
													$image = $card['image']	?? null;
													$link = $card['link'] ?? null;
												?>
													<div class="cell small-6 medium-4 tablet-3 large-3">
														<?php if( $link ): 
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';
														
															// Split title into words and wrap the last word
															$title_words = explode(' ', $link_title);
															if (count($title_words) > 1) {
																$last_word = array_pop($title_words);
																$title_html = implode(' ', $title_words) . ' <span class="inline-icon-wrap">' . esc_html($last_word) . '
																	<svg xmlns="http://www.w3.org/2000/svg" width="6.68" height="10.817" viewBox="0 0 6.68 10.817"><path d="M1.271 0 0 1.271l4.129 4.138L0 9.546l1.271 1.271L6.68 5.408Z" fill="#79b9f8"/></svg>
																</span>';
															} else {
																// Only one word: wrap entire thing
																$title_html = '<span class="inline-icon-wrap">' . esc_html($link_title) . '
																	<svg xmlns="http://www.w3.org/2000/svg" width="6.68" height="10.817" viewBox="0 0 6.68 10.817"><path d="M1.271 0 0 1.271l4.129 4.138L0 9.546l1.271 1.271L6.68 5.408Z" fill="#79b9f8"/></svg>
																</span>';
															}
														?>
															<a class="bg-navy grid-x flex-dir-column" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
																<?php if($image) :?>
																	<div class="img-wrap has-object-fit">
																		<?=wp_get_attachment_image( $image['id'], 'full', false, ['class' => 'img-fill'] );?>
																	</div>
																<?php endif; ?>
																<?php if($link_title): ?>
																	<div class="title color-link-blue font-header weight-semibold">
																		<?= $title_html; ?>
																	</div>
																<?php endif; ?>
															</a>
														<?php endif; ?>
													</div>
												<?php endforeach;?>
											</div>
										<?php endif;?>
										<?php if( $it_cta_cards_cta_link ):
											$link = $it_cta_cards_cta_link;
										?>
											<div class="cta-link text-center relative">
												<?php
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
											
													// Split title into words and wrap the last word
													$title_words = explode(' ', $link_title);
													if (count($title_words) > 1) {
														$last_word = array_pop($title_words);
														$title_html = implode(' ', $title_words) . ' <span class="inline-icon-wrap">' . esc_html($last_word) . '
															<svg xmlns="http://www.w3.org/2000/svg" width="8.645" height="14" viewBox="0 0 8.645 14"><path d="M1.645 0 0 1.645 5.343 7 0 12.355 1.645 14l7-7Z" fill="#fff"/></svg>
														</span>';
													} else {
														$title_html = '<span class="inline-icon-wrap">' . esc_html($link_title) . '
															<svg xmlns="http://www.w3.org/2000/svg" width="8.645" height="14" viewBox="0 0 8.645 14"><path d="M1.645 0 0 1.645 5.343 7 0 12.355 1.645 14l7-7Z" fill="#fff"/></svg>
														</span>';
													}
											
													// Output the actual link (this was missing)
													echo '<a href="' . esc_url($link_url) . '" target="' . esc_attr($link_target) . '" class="cta-link-text font-header weight-semibold color-text-light-gray">' . $title_html . '</a>';
												?>
											</div>
										<?php endif;?>
									</div>
								</div>
							</div>
						</section>
					<?php endif;?>
					
					<?php if( $itc_heading || $itc_cards ):?>
						<section class="icon-title-cards entry-content">
							<div class="grid-container">
								<div class="inner grid-x grid-padding-x align-center">
									<div class="cell small-12 large-10">
										<?php if( $itc_heading ):?>
											<h2 class="text-center line-height-1">
												<?=wp_kses_post($itc_heading);?>
											</h2>
										<?php endif;?>
										<?php if( $itc_cards ):?>
											<div class="it-cards grid-x grid-padding-x align-center small-up-1 medium-up-2 tablet-up-3 large-up-4">
												<?php foreach($itc_cards as $card):
													$icon = $card['icon'] ?? null;
													$title = $card['title'] ?? null;
												?>
													<div class="it-card cell">
														<div class="card-inner text-center h-100">
															<?php if( $icon ):?>
																<div class="icon-wrap">
																	<?php echo wp_get_attachment_image( $icon['id'], 'medium' );?>
																</div>
															<?php endif;?>
															<?php if( $title ):?>
																<div class="title font-header weight-semibold">
																	<?=wp_kses_post($title);?>
																</div>
															<?php endif;?>
														</div>
													</div>
												<?php endforeach;?>
											</div>
										<?php endif;?>
										<?php if( $itc_button_link ): ?>
											<div class="link-wrap text-center">
												<?php get_template_part('template-parts/part', 'chev-btn',
													array(
														'link' => $itc_button_link,
														'bg-color' => 'primary',
														'title-color' => 'white',
														'chev-width' => '9'
													),
												);?>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</section>
					<?php endif;?>
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();