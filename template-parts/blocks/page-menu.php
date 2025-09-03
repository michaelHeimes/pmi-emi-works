<?php
//$title = get_field('page_menu_title');
if ( have_rows('page_menu') ){
	echo '<div class="page-menu-block">';
	//echo '<h4 class="page-menu-block-title">' . $title . ' <i class="fa fa-chevron-up fa-chevron-down"></i></h4>';
	echo '<div class="page-menu-block-links">';
	echo '<div class="page-menu-block-inner grid-x grid-padding-x align-center">';
	while ( have_rows('page_menu') ) { the_row(); 
		$link = get_sub_field('page_menu_link');
		if ($link['url'] == $_SERVER['REQUEST_URI'] || $link['url'] == home_url($_SERVER['REQUEST_URI'])) {
			echo '<div class="cell shrink"><a class="current-page button small bg-primary color-white" href="' . $link['url'] . '">' . $link['title'] . '</a></div>';
		}
		else {
			echo '<div class="cell shrink"><a class="button small outline-primary" href="' . $link['url'] . '">' . $link['title'] . '</a></div>';
		}
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
	
}

?>
