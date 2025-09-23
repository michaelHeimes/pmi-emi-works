<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trailhead
 */
 $office = get_field('office', 'option') ?? null;
 $mailing_address = get_field('mailing_address', 'option') ?? null;
 $contact_support = get_field('contact_support', 'option') ?? null;
 $logo = get_field('footer_logo', 'option');
 $logo_caption = get_field('logo_caption', 'option');
 $copyright_text = get_field('footer_copyright_text', 'option') ?? null;
 $subfooter_links = get_field('footer_subfooter_links', 'option') ?? null;
?>
				<?php get_template_part('template-parts/section', 'footer-cta');?>

				<footer id="colophon" class="site-footer text-center medium-text-left">
					<div class="footer-info">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell small-12 xlarge-10">
									<div class="grid-x grid-padding-x">
										<div class="footer-col cell small-12 tablet-4">
											<?php 
											if( $logo ||  $logo_caption ) :?>
												<div class="logo-caption-wrap">
													<?php if( $logo ) :?>
														<div class="logo">
															<?=wp_get_attachment_image( $logo['id'], 'full' );?>
														</div>
													<?php endif;?>
													<?php if( $logo_caption ) :?>
														<p class="m-0 logo-caption color-white  weight-semibold">
															<?=wp_kses_post($logo_caption);?>
														</p>
													<?php endif;?>
												</div>
											<?php endif;?>
											<?php
												$title = $office['title'] ?? null;	
												$address = $office['address'] ?? null;
												$map_link = $office['map_link'] ?? null;
												if( $title || $address || $map_link ):
											?>
												<div class="address-row">
													<?php if( $title ):?>
														<h3 class="color-white weight-semibold"><?=wp_kses_post($title);?></h3>
													<?php endif;?>
													<?php if( $address ):?>
														<div class="address color-light-blue">
															<?=wp_kses_post($address);?>
															<?php if($map_link):
																$link_url = $map_link['url'];
																$link_title = $map_link['title'];
																$link_target = $map_link['target'] ? $map_link['target'] : '_self';	
															?>
																- <a class="color-link-blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
			
															<?php endif;?>
														</div>
													<?php endif;?>
												</div>
											<?php endif;?>
											<?php
												$title =  $mailing_address['title'] ?? null;	
												$address =  $mailing_address['address'] ?? null;
												if( $title || $address ):
											?>
												<div class="address-row mailing-address">
													<?php if( $title ):?>
														<h3 class="color-white"><?=wp_kses_post($title);?></h3>
													<?php endif;?>
													<?php if( $address ):?>
														<div class="address color-light-blue">
															<?=wp_kses_post($address);?>
														</div>
													<?php endif;?>
												</div>
											<?php endif;?>
											<?php
												$title = $contact_support['title'] ?? null;	
												$labels_links =  $contact_support['labels_links'] ?? null;
												if( $title || $labels_links ):
											?>
												<div class="address-row contact-support">
													<?php if( $title ):?>
														<h3 class="color-white"><?=wp_kses_post($title);?></h3>
													<?php endif;?>
													<?php if( $labels_links ):?>
														<div class="labels-links color-light-blue">
															<?php foreach($labels_links as $ll_link):
																$label = $ll_link['label'] ?? null;
																$link = $ll_link['link'] ?? null;
															?>
																<div>
																	<?php if($label):?>
																		<?=esc_html($label);?>
																	<?php endif;?>
																	<?php if($link):
																		$link_url = $link['url'];
																		$link_title = $link['title'];
																		$link_target = $link['target'] ? $link['target'] : '_self';
																	?>
																		<a class="color-light-blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		
																	<?php endif;?>
																</div>
															<?php endforeach;?>
														</div>
													<?php endif;?>
												</div>
											<?php endif;?>
											<div class="menu social">
											<?php get_template_part('template-parts/part', 'social-links');?>
											</div>
										</div>
										<div class="footer-col cell small-12 medium-6 tablet-4">
											<?php trailhead_footer_links_left();?>
										</div>
										<div class="footer-col cell small-12 medium-6 tablet-4">
											<?php trailhead_footer_links_right();?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="site-info text-center tablet-text-left">
						<div class="grid-container fluid">
							<div class="grid-x grid-padding-x">
								<div class="cell small-12 tablet-auto">
									<p class="color-light-blue">
										&copy;<?= date("Y");?>
										<?php if( !empty( $copyright_text ) ){
											echo $copyright_text;	
										};?>
										<?php if( !empty($subfooter_links) ):
											$i = 1; foreach($subfooter_links as $subfooter_link):	
											$link = $subfooter_link['link'] ?? null;
												if( $link ): 
										?>
											<span>
												<span>|</span>
												<?php 
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
													?>
													<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
											</span>
										<?php endif; $i++; endforeach; endif;?>
									</p>
								</div>
								<div class="cell small-12 tablet-shrink">
									<p class="color-light-blue">
										Website by:
										<a class="uppercase" href="https://gopipedream.com/" target="_blank">
											Pipedream
										</a>
									</p>
								</div>
							</div>
						</div>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
					
			</div><!-- #page -->
			
		</div>  <!-- end .off-canvas-content -->
							
	</div> <!-- end .off-canvas-wrapper -->
						
<?php wp_footer(); ?>

<?php if( !empty( get_field('before_closing_body_tag', 'option') ) ) {
		echo get_field('before_closing_body_tag', 'option');
}?>
</body>
</html>
