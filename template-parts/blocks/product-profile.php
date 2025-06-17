<?php

/**
 * Product Profile Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'product-profile-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'product-profile';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$media_type = get_field('media_type') ?? null;
$image = get_field('image') ?? null;
$profiles = get_field('profiles') ?? null;

$media_slider_autoplay = get_field('media_slider_autoplay') ?? null;
$media_slider_transition_delay = get_field('media_slider_transition_delay') ?? null;
$media_slides = get_field('media_slides') ?? null;

$copy = get_field('copy') ?? null;
$button_links = get_field('button_links') ?? null;

?>

<section id="<?php echo esc_attr($id); ?>" class="module block <?php echo esc_attr($className); ?>">
    <div class="inner overflow-hidden">
        <div class="grid-x grid-padding-x">
            <?php if( $image || $profiles || $media_slides ):?>
                <div class="left cell small-12 tablet-6 large-7">
                    <div class="left-inner">
                        <?php if( $media_type == 'image' && $image ):?>
                            <div class="single-image">
                                <?=wp_get_attachment_image( $image['id'], 'full' );?>
                            </div>
                        <?php endif;?>
                        <?php if( $media_type == 'image-profiles' && $image ):?>
                            <div class="ip-image">
                                <?=wp_get_attachment_image( $image['id'], 'full' );?>
                            </div>
                        <?php endif;?>
                        <?php if( $media_type == 'image-profiles' && $profiles ):?>
                            <div class="ip-profiles grid-x grid-padding-x align-center">
                                <?php if( $profiles && in_array('round', $profiles) ):?>
                                    <div class="cell small-2 large-shrink">
                                        <img src="<?=get_template_directory_uri();?>/assets/images/profile-round-img.svg" alt="Image of a round profile">
                                    </div>
                                <?php endif;?>
                                <?php if( $profiles && in_array('square', $profiles) ):?>
                                    <div class="cell small-2 large-shrink">
                                        <img src="<?=get_template_directory_uri();?>/assets/images/profile-square-img.svg" alt="Image of a square profile">
                                    </div>
                                <?php endif;?>
                                <?php if( $profiles && in_array('rectangle', $profiles) ):?>
                                    <div class="cell small-2 large-shrink">
                                        <img src="<?=get_template_directory_uri();?>/assets/images/profile-rectangle-img.svg" alt="Image of a rectangle profile">
                                    </div>
                                <?php endif;?>
                                <?php if( $profiles && in_array('channel', $profiles) ):?>
                                    <div class="cell small-2 large-shrink">
                                        <img src="<?=get_template_directory_uri();?>/assets/images/profile-channel-img.svg" alt="Image of a channel profile">
                                    </div>
                                <?php endif;?>
                                <?php if( $profiles && in_array('angle', $profiles) ):?>
                                    <div class="cell small-2 large-shrink">
                                        <img src="<?=get_template_directory_uri();?>/assets/images/profile-angle-img.svg" alt="Image of an angle profile">
                                    </div>
                                <?php endif;?>
                                <?php if( $profiles && in_array('bar', $profiles) ):?>
                                    <div class="cell small-2 large-shrink">
                                        <img src="<?=get_template_directory_uri();?>/assets/images/profile-bar-img.svg" alt="Image of an bar profile">
                                    </div>
                                <?php endif;?>
                            </div>
                        <?php endif;?>
                        <?php if( $media_slides ) {
                            get_template_part('template-parts/part', 'media-slider',
                                array(
                                    'media_slider_autoplay' => $media_slider_autoplay,
                                    'media_slider_transition_delay' => $media_slider_transition_delay,
                                    'media_slides' => $media_slides,
                                    'id' => $id,
                                ),
                            );
                        }?>
                    </div>
                </div>
            <?php endif;?>
            <?php if( $copy || $button_links ):?>
                <div class="right cell small-12 tablet-6 large-5">
                    <?php if( $copy ):?>
                        <div class="copy-wrap entry-content">
                            <?=wp_kses_post($copy);?>
                        </div>
                    <?php endif;?>
                    <?php if( $button_links ):?>
                        <div class="btns-group grid-x">
                            <?php foreach($button_links as $link):
                                $link = $link['link'] ?? null;
                                if( $link  ):
                            ?>  
                                <div class="cell shrink">
                                    <?php get_template_part('template-parts/part', 'chev-btn',
                                        array(
                                            'link' =>  $link,
                                            'title-color' => 'white',
                                            'chev-width' => '9'
                                        ),
                                    );?>
                                </div>
                            <?php endif; endforeach;?>
                        </div>
                    <?php endif;?>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>