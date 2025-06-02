<?php
// Register menus
register_nav_menus(
	array(
		'main-nav'		=> __( 'The Main Menu', 'trailhead' ),		// Main nav in header
		'offcanvas-nav'	=> __( 'The Off-Canvas Menu', 'trailhead' ),	// Off-Canvas nav
		'footer-links-left'	=> __( 'Footer Menu: Left', 'trailhead' ),		// Secondary nav in footer
		'footer-links-right'	=> __( 'Footer Menu: Right', 'trailhead' ),		// Secondary nav in footer
	)
);


// The Top Menu
function trailhead_top_nav() {
	wp_nav_menu(array(
		'container'			=> false,						// Remove nav container
		'menu_id'			=> '',					// Adding custom nav id
		'menu_class'		=> 'main-nav medium-horizontal menu',	// Adding custom nav class
		'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion tablet-dropdown" data-submenu-toggle="true" data-hover-delay="20" data-closing-time="20" data-alignment="left">%3$s</ul>',
		'theme_location'	=> 'main-nav',					// Where it's located in the theme
		'depth'				=> 5,							// Limit the depth of the nav
		'fallback_cb'		=> false,						// Fallback function (see below)
		'walker'			=> new Topbar_Menu_Walker(),
		'link_before'    => '<span>',
		'link_after'     => '</span>'	
	));
}

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"menu\">\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= '<li' . $class_names . '>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
			}
		}

		// Allow <br> tags by not escaping $item->title
		$title = $item->title;

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

// The Off Canvas Menu
function trailhead_off_canvas_nav() {
	wp_nav_menu(array(
		'container'			=> false,							// Remove nav container
		'menu_id'			=> 'offcanvas-nav',					// Adding custom nav id
		'menu_class'		=> 'vertical menu accordion-menu',	// Adding custom nav class
		'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
		'theme_location'	=> 'offcanvas-nav',					// Where it's located in the theme
		'depth'				=> 2,								// Limit the depth of the nav
		'fallback_cb'		=> false,							// Fallback function (see below)
		'walker'			=> new Off_Canvas_Menu_Walker()
	));
}

class Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical menu\">\n";
	}
}

// The Footer Menu: Left
function trailhead_footer_links_left() {
	wp_nav_menu(array(
		'container'			=> 'false',				// Remove nav container
		'menu_id'			=> 'footer-links-left',		// Adding custom nav id
		'menu_class'		=> 'menu vertical',				// Adding custom nav class
		'theme_location'	=> 'footer-links-left',		// Where it's located in the theme
		'depth'				=> 0,					// Limit the depth of the nav
		'fallback_cb'		=> ''					// Fallback function
	));
} /* End Footer Menu */

// The Footer Menu: Right
function trailhead_footer_links_right() {
	wp_nav_menu(array(
		'container'			=> 'false',				// Remove nav container
		'menu_id'			=> 'footer-links-right',		// Adding custom nav id
		'menu_class'		=> 'menu vertical',				// Adding custom nav class
		'theme_location'	=> 'footer-links-right',		// Where it's located in the theme
		'depth'				=> 0,					// Limit the depth of the nav
		'fallback_cb'		=> ''					// Fallback function
	));
} /* End Footer Menu */

// Header Fallback Menu
function trailhead_main_nav_fallback() {
	wp_page_menu( array(
		'show_home'		=> true,
		'menu_class'	=> '',		// Adding custom nav class
		'include'		=> '',
		'exclude'		=> '',
		'echo'			=> true,
		'link_before'	=> '',		// Before each link
		'link_after'	=> ''		// After each link
	));
}

// Footer Fallback Menu
function trailhead_footer_links_fallback() {
	/* You can put a default here if you like */
}

// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
	if ( $item->current == 1 || $item->current_item_ancestor == true ) {
		$classes[] = 'active';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );


// Add ACF Fields to Main Nav

	function my_wp_nav_menu_objects( $items, $args ) {
		
		// var_dump($args);
		
		if ( $args->theme_location == 'main-nav' || $args->theme_location == 'offcanvas-nav' ) {
		
			// loop
			foreach( $items as &$item ) {
				
				// vars
				$submenu_link_subtitle = get_field('submenu_link_subtitle', $item);
				// append icon
				if( $submenu_link_subtitle ) {
					
					$item->title = '<span class="title">' . $item->title . '</span><span class="subtitle">' . esc_html($submenu_link_subtitle) .'</span>';
					
				}
				
			}
			
						
			// return
			return $items;		
			
		} else {			
			// loop
			foreach( $items as &$item ) {}
			return $items;	
		}
		
	}
	
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);