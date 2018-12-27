<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$hover = etheme_get_option('product_img_hover');
$view = etheme_get_option('product_view');
$view_color = etheme_get_option('product_view_color');
$size = apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' );
$custom_template = etheme_get_option('custom_product_template');
$sale_counter = etheme_get_custom_field('sale_counter');


// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
    $woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( get_query_var('et_cat-cols') ) {
    $woocommerce_loop['columns'] = apply_filters('loop_shop_columns', get_query_var('et_cat-cols'));
}
elseif (empty( $woocommerce_loop['columns'] )) {
    $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

$view_mode = get_query_var('et_view-mode');
$show_counter = false;

if ( ! empty( $woocommerce_loop['show_counter'] ) )
    $show_counter = $woocommerce_loop['show_counter'];

if ( ! empty( $woocommerce_loop['hover'] ) )
    $hover = $woocommerce_loop['hover'];

if ( ! empty( $woocommerce_loop['product_view'] ) )
    $view = $woocommerce_loop['product_view'];

if ( ! empty( $woocommerce_loop['product_view_color'] ) )
    $view_color = $woocommerce_loop['product_view_color'];

if ( ! empty( $woocommerce_loop['size'] ) )
    $size = $woocommerce_loop['size'];

if ( ! empty( $woocommerce_loop['custom_template'] ) )
    $custom_template = $woocommerce_loop['custom_template'];

if ( in_array($sale_counter, array('list', 'single_list')) && $view_mode == 'list' ) 
    $show_counter = true;

// Use single product option 
$single = etheme_get_custom_field('single_thumbnail_hover');
if ( $single && $single != 'inherit' ) $hover = $single;

$product_view = etheme_get_custom_field('product_view_hover');
if ( $product_view && $product_view != 'inherit' ) $view = $product_view;

$product_view_color = etheme_get_custom_field('product_view_color');
if ( $product_view_color && $product_view_color != 'inherit' ) $view_color = $product_view_color;

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
    return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
    $classes[] = 'first';
    $classes[] = 'grid-sizer';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
    $classes[] = 'last';
}

if(!class_exists('YITH_WCWL')) {
    $classes[] = 'wishlist-disabled';
}

$classes[] = etheme_get_product_class( $woocommerce_loop['columns'] );

if ( ! empty( $woocommerce_loop['isotope'] ) && $woocommerce_loop['isotope'] || etheme_get_option( 'products_masonry' ) && is_shop() ) {
    $classes[] = 'et-isotope-item';
}

if ( !in_array($view, array('mask3', 'mask', 'mask2', 'info', 'default') ) ) {
    $view_color = 'dark';
}

// if ( in_array($view, array('mask3', 'mask2', 'info') ) ) {
//     $hover = 'disabled';
// }

if ( ! empty( $woocommerce_loop['loading_class']) ) {
    $classes[] = $woocommerce_loop['loading_class'];
}

if ( $view != 'custom' || !$custom_template ) {
    $classes[] = 'product-hover-' . $hover;
    $classes[] = 'product-view-' . $view;
    $classes[] = 'view-color-' . $view_color;
    if ( $hover == 'slider' ) $classes[] = 'arrows-hovered';
}

$product_settings = etheme_get_option('product_page_switchers');
$product_settings = $product_settings['enabled'];

if ( array_key_exists('product_page_addtocart', $product_settings) ) {
    $classes[] = 'et_cart-on';
}
else {
    $classes[] = 'et_cart-off';
}
if ( array_key_exists('hide_buttons_mobile', $product_settings) ) $classes[] = 'hide-hover-on-mobile';

$full_title = $product_title = unicode_chars(get_the_title());
$title_limit = etheme_get_option('product_title_limit');

if ( $title_limit && strlen($product_title) > $title_limit) {
    $split = preg_split('/(?<!^)(?!$)/u', $product_title);
    $product_title = ($title_limit != '' && $title_limit > 0 && (count($split) >= $title_limit)) ? '' : $product_title;
    if ( $product_title == '' ) {
        for ($i=0; $i < $title_limit; $i++) { 
            $product_title .= $split[$i];
        }
        $product_title .= '...';
    }
}

?>
<div <?php wc_product_class( $classes ); ?>>
     <div class="content-product <?php if ($view == 'custom' && $custom_template != '') echo 'custom-template clearfix et-product-template-'.$custom_template; ?>">
        <?php etheme_loader(); ?>

        <?php if ( $view == 'custom' && $custom_template != '' ) {
            $items = '';
            $args = array( 'include' => $custom_template,'post_type' => 'vc_grid_item', 'posts_per_page' => 1);
            $myposts = get_posts( $args );
            $block = $myposts[0];

            $templates = new ET_product_templates();

            $content = $block->post_content;
            $templates->setTemplateById($custom_template);
            // $templates->setTemplateById($content, $custom_template);
            $shortcodes = $templates->shortcodes();
            $templates->mapShortcodes();
            WPBMap::addAllMappedShortcodes();

            $attr = ' width="' . $templates->gridAttribute( 'element_width', 12 ) . '"'
            . ' is_end="' . ( 'true' === $templates->isEnd() ? 'true' : '' ) . '"';
            $content = preg_replace( '/(\[(\[?)vc_gitem\b)/', '$1' . $attr, $content );
           if ( 1 === ( $woocommerce_loop['loop'] - 1 ) ) { echo $templates->addShortcodesCustomCss($custom_template); }
            echo $templates->renderItem( get_post( (int) $product->get_ID() ), $content);
        }
        else {?>

        <?php
        /**
         * woocommerce_before_shop_loop_item hook.
         *
         * @hooked woocommerce_template_loop_product_link_open - 10
         */
        if ( $view_mode != 'list' && $view != 'booking' ) {
            remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
            do_action( 'woocommerce_before_shop_loop_item' );
            add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
        }

        ?>

        <div class="product-image-wrapper hover-effect-<?php echo esc_attr( $hover ); ?>">

            <?php if ( $view == 'default' ) echo etheme_wishlist_btn(); ?>

            <?php if ( $view != 'booking' ) etheme_product_availability(); ?>
            <?php if ( $hover == 'slider' ) echo '<div class="images-slider-wrapper">'; ?>
            <a class="product-content-image" href="<?php the_permalink(); ?>" data-images="<?php echo etheme_get_image_list( $size ); ?>">
                <?php  if ( $view_mode == 'list' || $view == 'booking' ) {
                  do_action( 'woocommerce_before_shop_loop_item' );
                } ?>
                <?php if ( $view == 'booking' ) etheme_product_availability(); ?>
                <?php if( $hover == 'swap' ) etheme_get_second_image( $size ); ?>
                <?php // echo woocommerce_get_product_thumbnail( $size ); ?>
                <?php 
                /**
                 * woocommerce_before_shop_loop_item_title hook.
                 *
                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                 */
                do_action( 'woocommerce_before_shop_loop_item_title' );
                ?>
            </a>
            <?php if ( $hover == 'slider' ) echo '</div>'; ?>

            <?php if ( $view == 'booking' && $view_mode != 'list' && array_key_exists('product_page_productname', $product_settings) ): ?>
                <p class="product-title">
                    <a href="<?php the_permalink(); ?>"><?php echo wp_specialchars_decode($product_title); ?></a>
                </p>
            <?php endif ?>

            <?php if ($view == 'info'): ?>
                <div class="product-mask">

                    <?php if (array_key_exists('product_page_productname', $product_settings)): ?>
                        <p class="product-title">
                            <a href="<?php the_permalink(); ?>"><?php echo wp_specialchars_decode($product_title); ?></a>
                        </p>
                    <?php endif ?>

                    <?php
                        /**
                         * woocommerce_after_shop_loop_item_title hook
                         *
                         * @hooked woocommerce_template_loop_rating - 5
                         * @hooked woocommerce_template_loop_price - 10
                         */
                        if (array_key_exists('product_page_price', $product_settings)) {
                            do_action( 'woocommerce_after_shop_loop_item_title' );
                        }
                    ?>
                </div>
            <?php endif ?>

            <?php if ( $view == 'booking' && $view_mode != 'list' ): ?>
                <?php if ( array_key_exists('product_page_price', $product_settings) ) do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
                <div class="product-excerpt">
                    <?php echo do_shortcode(get_the_excerpt()); ?>
                </div>
                <div class="product-excerpt">
                    <?php do_action( 'woocommerce_product_additional_information', $product ); ?>
                </div>
                <?php
                    if (array_key_exists('product_page_addtocart', $product_settings) && $view != 'booking' ) {
                        do_action( 'woocommerce_after_shop_loop_item' );
                    }
                ?>
            <?php endif ?>

            <?php if ($view == 'mask' || $view == 'mask2' || $view == 'mask3' || $view == 'default' || $view == 'info'): ?>
                <footer class="footer-product">
                    <?php if ( $view == 'mask3' ): ?>
                        <?php echo etheme_wishlist_btn(); ?>
                    <?php else: ?>
                        <?php if (etheme_get_option('quick_view')): ?>
                            <span class="show-quickly" data-prodid="<?php echo esc_attr($post->ID);?>"><?php esc_html_e('Quick View', 'xstore') ?></span>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($view != 'default') {
                        //if (array_key_exists('product_page_addtocart', $product_settings)) {
                            do_action( 'woocommerce_after_shop_loop_item' );
                        //}
                    }?>
                    <?php if ( $view == 'mask3' ): ?>
                        <?php if (etheme_get_option('quick_view')): ?>
                            <span class="show-quickly" data-prodid="<?php echo esc_attr($post->ID);?>"><?php esc_html_e('Quick View', 'xstore') ?></span>
                         <?php endif ?>
                    <?php elseif ($view != 'default'): ?>
                        <?php echo etheme_wishlist_btn(); ?>
                    <?php endif; ?>
                </footer>
            <?php endif ?>
        </div>

        

        <?php if ( ( $view != 'info' && $view != 'booking' || $view_mode == 'list' ) ): ?>
            <div class="<?php if ( $view != 'light' ) : ?>text-center <?php endif; ?>product-details">


                <?php do_action( 'et_before_shop_loop_title' ); ?>

                <?php if ( $view == 'light' ) : ?>
                    <div class="light-right-side">
                        <?php if (etheme_get_option('quick_view')): ?>
                            <span class="show-quickly" data-prodid="<?php echo esc_attr($post->ID);?>"><?php esc_html_e('Quick View', 'xstore') ?></span>
                        <?php endif; ?>

                        <?php echo etheme_wishlist_btn(); ?>
                    </div><!-- .light-right-side -->
                <?php endif; ?>

                <?php if ( $view == 'light' ) echo '<div class="light-left-side">'; ?>

                <?php if (array_key_exists('product_page_cats', $product_settings)): ?>
                    <?php etheme_product_cats(); ?>
                <?php endif ?>

                <?php if (array_key_exists('product_page_productname', $product_settings)): ?>
                    <p class="product-title">
                        <a href="<?php the_permalink(); ?>"><?php echo wp_specialchars_decode($product_title); ?></a>
                    </p>
                <?php endif ?>

                <?php if ( etheme_get_option( 'enable_brands' ) && etheme_get_option( 'product_page_brands' ) ) : ?>
                    <?php etheme_product_brands(); ?>
                <?php endif ?>

                <?php
                /**
                 * woocommerce_after_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */

                if ( array_key_exists('product_page_price', $product_settings) ) :
                    if ( $view != 'light' ) : ?>
                    <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
                    <?php do_action( 'et_after_shop_loop_title' ); ?>
                    <?php else : ?>
                        <?php 
                        woocommerce_template_loop_rating();
                        ?>
                        <?php do_action( 'et_after_shop_loop_title' ); ?>
                        <?php if ( $view_mode != 'list'  ): ?>
                            <div class="switcher-wrapper">
                                <div class="price-switcher">
                                    <div class="price-switch">
                                        <?php woocommerce_template_loop_price(); ?>
                                    </div>
                                    <div class="button-switch">
                                        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ( $view_mode == 'list' ): ?>
                    <div class="product-excerpt">
                        <?php echo do_shortcode(get_the_excerpt()); ?>
                    </div>
                <?php endif ?>

                <?php if ( $view == 'light' && $view_mode == 'list' ) : ?>
                    <div class="switcher-wrapper">
                        <div class="price-switcher">
                            <div class="price-switch">
                                <?php woocommerce_template_loop_price(); ?>
                            </div>
                            <div class="button-switch">
                                <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if( $show_counter ) etheme_product_countdown(); ?>

                <?php

                    if ( array_key_exists('product_page_addtocart', $product_settings) && ! in_array( $view, array( 'mask', 'mask3', 'light' ) ) ) {
                        do_action( 'woocommerce_after_shop_loop_item' );
                    }
                ?>

                <?php if ( $view == 'light' ) echo '</div><!-- .light-left-side -->'; ?>

            </div>
        <?php endif ?>
        <?php } // end if not custom template ?>
    </div><!-- .content-product -->
</div>