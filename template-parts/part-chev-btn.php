<?php
$link = $args['link'] ?? null;
$bg_color = $args['bg-color'] ?? null;
$title_color = $args['title-color'] ?? null;
$chev_width = $args['chev-width'] ?? null;
$classes = $args['classes'] ?? null;

if( $link ):

$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';

// Split title into words and wrap last word with SVG
$title_words = explode(' ', $link_title);
if (count($title_words) > 1) {
	$last_word = array_pop($title_words);
	$title_html = implode(' ', $title_words) . ' <span class="inline-icon-wrap">' . esc_html($last_word) . '
		<svg xmlns="http://www.w3.org/2000/svg" width="' . esc_attr($chev_width) . '" viewBox="0 0 12 19.433"><path d="M2.283 0 0 2.283l7.417 7.433L0 17.15l2.283 2.283L12 9.716Z" fill="#4da5fc"/></svg>
	</span>';
} else {
	$title_html = '<span class="inline-icon-wrap">' . esc_html($link_title) . '
		<svg xmlns="http://www.w3.org/2000/svg" width="' . esc_attr($chev_width) . '" viewBox="0 0 12 19.433"><path d="M2.283 0 0 2.283l7.417 7.433L0 17.15l2.283 2.283L12 9.716Z" fill="#4da5fc"/></svg>
	</span>';
}
?>

<a class="button chev-btn grid-x align-middle bg-<?=$bg_color;?> color-<?=$title_color;?> <?=$classes;?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
	<span class="weight-semibold"><?php echo $title_html; ?></span>
</a>

<?php endif;?>
