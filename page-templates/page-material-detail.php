<?php
/**
 * Template name: Material Detail
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();

$fields = get_fields();

$media_slider_autoplay = $fields['media_slider_autoplay'] ?? null;
$media_slider_transition_delay = $fields['media_slider_transition_delay'] ?? null;
$media_slides = $fields['media_slides'] ?? null;
$intro_copy = $fields['intro_copy'] ?? null;

$related_machines_title = $fields['related_machines_title'] ?? null;
$related_machines = $fields['related_machines'] ?? null;
if( $related_machines ) {
	$related_machines_count = count($related_machines);
}

$see_all_machines_link = get_field('see_all_machines_link', 'option') ?? null;

?>
	<?php get_template_part('template-parts/section', 'full-width-hero-slider');?>
	
	<div class="content main-content relative">
		<div class="inner-content relative">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<section itemprop="text">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-center">
								
								<?php if( $media_slides || $intro_copy ) :?>
									<div class="intro cell small-12 xlarge-11 xxlarge-11">
										<div class="grid-x grid-padding-x medium-flex-dir-row-reverse">
											<?php if( $intro_copy ) :?>
												<div class="copy-wrap cell small-12 medium-5 entry-content">
													<?=wp_kses_post( $intro_copy );?>
												</div>
											<?php endif;?>
											<?php if($media_slides) :?>
												<div class="slider-wrap cell small-12 medium-7 xxlarge-6">
													<?php get_template_part('template-parts/part', 'media-slider',
														array(
															'media_slider_autoplay' => $media_slider_autoplay,
															'media_slider_transition_delay' => $media_slider_transition_delay,
															'media_slides' => $media_slides,
														),
													);?>
												</div>
											<?php endif;?>
										</div>
									</div>
								<?php endif;?>
								
								<div class="entry-content cell small-12 large-10 xxlarge-8">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</section> <!-- end article section -->
					
					<?php if( $related_machines_title || $related_machines ):?>
						<section class="related-machines">
							<div class="grid-container">
								<div class="grid-x grid-padding-x align-center">
									<div class="cell small-12 xlarge-11 xxlarge-11">
										<div class="inner">
											<div class="chev-svg-wrap text-center">
												<svg xmlns="http://www.w3.org/2000/svg" width="59.536" height="79.795" viewBox="0 0 59.536 79.795"><g data-name="Group 420"><path data-name="ic_chevron_right_24px" d="M50.536 4.881 45.655 0 29.768 15.853 13.88 0 8.999 4.881l20.769 20.768Z" fill="#0032a0"/><path data-name="ic_chevron_right_24px" d="m50.536 25.111-4.881-4.881-15.887 15.853L13.88 20.23l-4.881 4.881 20.769 20.768Z" fill="#4da5fc"/><path data-name="ic_chevron_right_24px" d="m50.54 47.031-4.881-4.881-15.887 15.853L13.884 42.15l-4.881 4.881 20.769 20.768Z" fill="#82bcf5"/></g></svg>
											</div>
											<?php if( $related_machines_title ):?>
												<h2 class="text-center">
													<?=wp_kses_post($related_machines_title);?>
												</h2>
											<?php endif;?>
											<?php if( $related_machines ):
												$wrapper_class = ' three-or-more';
												if( $related_machines_count <=2 ) {
													$wrapper_class = ' two-or-less';
												}
											?>
												<div class="grid-x grid-padding-x align-center cards<?=$wrapper_class;?>">
													<?php foreach($related_machines as $related_machine):
														$image = $related_machine['image'] ?? null;	
														$name = $related_machine['name'] ?? null;	
														$description = $related_machine['description'] ?? null;	
														$link = $related_machine['link'] ?? null;	
													?>
														<article id="post-<?php the_ID(); ?>" <?php post_class('cell'); ?>>
															<div class="card-inner text-left">
																<div class="grid-x grid-padding-x">
																	<?php if( $image ):?>
																		<div class="cell img-cell">
																			<div class="img-wrap">
																				<div class="img-br">
																					<?=wp_get_attachment_image( $image['id'], 'large', false, ['class' => ''] );?>
																				</div>
																			</div>
																		</div>
																	<?php endif;?>
																	<?php if( $name ):?>
																		<div class="text-cell cell auto">
																			<div class="text-wrap grid-x flex-dir-column align-justify">
																				<div>
																					<?php if( $name || $description || $link ):?>
																						<h3 class="h5 weight-semibold">
																							<?=esc_html( $name );?>
																						</h3>
																					<?php endif;?>
																					<?php if( $description ):?>
																						<p>
																							<?=esc_html( $description );?>
																						</p>
																					<?php endif;?>
																				</div>
																				<?php if( $link ):?>
																					<div class="link-wrap text-right">
																						<?php get_template_part('template-parts/part', 'chev-btn',
																							array(
																								'link' =>  $link,
																								'title-color' => 'white',
																								'chev-width' => '9'
																							),
																						);?>
																					</div>
																				<?php endif;?>
																			</div>
																		</div>
																	<?php endif;?>
																</div>
															</div>
														</article>
													<?php endforeach;?>
												</div>
											<?php endif;?>
										</div>
										<?php if( $see_all_machines_link ):?>
											<div class="see-all-link text-center">
												<?php get_template_part('template-parts/part', 'chev-btn',
													array(
														'link' => $see_all_machines_link,
														'classes' => 'no-btn font-22',
														'title-color' => 'primary',
														'chev-width' => '9'
													),
												);?>
											</div>
										<?php endif;?>
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