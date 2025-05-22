<?php
$link = $args['link'] ?? null;
$bg_color = $args['bg-color'] ?? null;
$title_color = $args['title-color'] ?? null;
$chev_width = $args['chev-width'] ?? null;

$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';
?>
<a class="button chev-btn grid-x align-middle bg-<?=$bg_color;?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
	<span class="weight-semibold color-<?=$title_color;?>"><?php echo esc_html( $link_title ); ?></span>
	<svg xmlns="http://www.w3.org/2000/svg" width="<?=$chev_width;?>" viewBox="0 0 12 19.433"><path d="M2.283 0 0 2.283l7.417 7.433L0 17.15l2.283 2.283L12 9.716Z" fill="#4da5fc"/></svg>

</a>
