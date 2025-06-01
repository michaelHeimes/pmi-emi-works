<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: https://jointswp.com/docs/off-canvas-menu/
 */
 $logo = get_field('header_logo', 'option');
 $pre_header_links = get_field('pre-header_links', 'options') ?? null;
 $global_social_links = get_field(' global_social_links', 'option') ?? null;
?>

<div class="top-bar-wrap grid-container fluid">

	<div class="top-bar fixed show-for-large">
	
		<div class="top-bar-left float-left">
			
			<div class="site-branding show-for-sr">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$trailhead_description = get_bloginfo( 'description', 'display' );
				if ( $trailhead_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $trailhead_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		
			<ul class="menu">
				<li class="logo"><a href="<?php echo home_url(); ?>">
					<?php 
					if( !empty( $logo ) ): ?>
						<?=wp_get_attachment_image( $logo['id'], 'full', false, [ 'class' => '' ] );?>
					<?php endif; ?>
				</a></li>
			</ul>
						
		</div>
		<div class="top-bar-right show-for-large">
			<div class="grid-x align-right">
				<div class="cell shrink">
				<li><a id="menu-toggle" data-toggle="off-canvas"><span></span><span></span><span></span></a></li>
				</div>
			</div>
		</div>
	</div>
	
	<div class="top-bar load relative">
	
		<div class="top-bar-left float-left">
			
			<div class="site-branding show-for-sr">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$trailhead_description = get_bloginfo( 'description', 'display' );
				if ( $trailhead_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $trailhead_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		
			<ul class="menu">
				<li class="logo"><a href="<?php echo home_url(); ?>">
					<?php 
					$image = get_field('header_logo', 'option');
					if( !empty( $image ) ): ?>
						<?=wp_get_attachment_image( $image['id'], 'full' );?>
					<?php endif; ?>
				</a></li>
			</ul>
						
		</div>
		<div class="top-bar-right">
			<div class="grid-x align-right">
				<div class="cell shrink">
					<?php if($pre_header_links || $global_social_links): ?>
						<div class="pre-header grid-x grid-padding-x align-right align-middle">
							<div class="cell shrink">
								<div class="inner">
									<div class="grid-x grid-padding-x align-right align-middle">
										<?php if($pre_header_links):?>
											<ul class="pre-header-links cell shrink grid-x grid-padding-x menu horizontal">
												<?php foreach($pre_header_links as $pre_header_link):
													$icon = $pre_header_link['icon'] ?? null;
													$link = $pre_header_link['link'] ?? null;
													$classes = $pre_header_link['classes'] ?? null;
													if ($link) :
														$link_url = $link['url'];
														$link_title = $link['title'];
														$link_target = $link['target'] ? $link['target'] : '_self';
												?>
													<li class="<?=esc_attr($classes);?>">
														<a class="font-header color-light-gray grid-x align-middle" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
															<?php if($icon) {
																echo wp_get_attachment_image( $icon['id'], 'full', false, [ 'class' => 'style-svg' ] );
															};?>
															<b><?php echo esc_html( $link_title ); ?></b>
														</a>
								
													</li>
												<?php endif; endforeach;?>
											</ul>
										<?php endif;?>
										
										<?php get_template_part('template-parts/part', 'social-links',
											array(
												'classes' => 'show-for-large',
											),
										);?>
										
										<ul class="menu cell shrink hide-for-large">
											<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
											<li><a class="menu-toggle top-row-toggle" data-toggle="off-canvas"><span></span><span></span><span></span></a></li>
										</ul>
										
									</div>
								</div>
							</div>
						</div>
					<?php endif;?>
						
					<div class="show-for-large">
						<?php trailhead_top_nav();?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>