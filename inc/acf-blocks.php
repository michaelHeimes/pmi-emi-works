<?php

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    if( function_exists('acf_register_block_type') ) {
        
        acf_register_block_type(array(
            'name'              => 'accordion',
            'title'             => __('Block: Accordion'),
            'description'       => __('Block: Accordion'),
            'render_template'   => 'template-parts/blocks/accordion.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'keywords'          => array( 'custom', 'block', 'accordion', 'pmi' ),
            'mode' => 'edit',
        ));
        
        acf_register_block_type(array(
            'name'              => 'button-group',
            'title'             => __('Block: Button Group'),
            'description'       => __('Block: Button Group'),
            'render_template'   => 'template-parts/blocks/button-group.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'keywords'          => array( 'custom', 'block', 'button', 'buttons', 'group', 'pmi' ),
            'mode' => 'edit',
        ));
        
        acf_register_block_type(array(
            'name'              => 'media-slider',
            'title'             => __('Block: Media Slider'),
            'description'       => __('Block: Media Slider'),
            'render_template'   => 'template-parts/blocks/media-slider.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'keywords'          => array( 'custom', 'block', 'media', 'slider', 'pmi' ),
            'mode' => 'edit',
        ));
        
        acf_register_block_type(array(
            'name'              => 'product-profile',
            'title'             => __('Block: Product Profile'),
            'description'       => __('Block: Product Profile'),
            'render_template'   => 'template-parts/blocks/product-profile.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'keywords'          => array( 'custom', 'block', 'product', 'profile', 'pmi' ),
            'mode' => 'edit',
        ));
        
        acf_register_block_type(array(
            'name'              => 'video-block',
            'title'             => __('Video Block'),
            'description'       => __('Video Block'),
            'render_template'   => 'template-parts/blocks/video-block.php',
            'category'          => 'formatting',
            'keywords'          => array( 'custom', 'block', 'video', 'gallery', 'pmi' ),
            'mode' => 'edit',
        ));

        acf_register_block_type(array(
            'name'              => 'page-menu',
            'title'             => __('Page Menu Block'),
            'description'       => __('Page Menu Block'),
            'render_template'   => 'template-parts/blocks/page-menu.php',
            'category'          => 'formatting',
            'keywords'          => array( 'custom', 'block', 'page', 'menu', 'pmi' ),
            'mode' => 'edit',
        ));
        
    }
}