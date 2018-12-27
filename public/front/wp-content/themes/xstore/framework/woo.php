<?php
// **********************************************************************// 
// ! Remove Default STYLES
// **********************************************************************//

add_filter( 'woocommerce_enqueue_styles', '__return_false' );
add_filter( 'pre_option_woocommerce_enable_lightbox', 'return_no'); // Remove woocommerce prettyphoto 

function return_no($option) {
	return 'no';
}

// **********************************************************************// 
// ! Template hooks
// **********************************************************************// 

add_action('wp', 'etheme_template_hooks', 60);
if(!function_exists('etheme_template_hooks')) {
	function etheme_template_hooks() {
		// add_action( 'woocommerce_before_shop_loop', 'woocommerce_pagination', 40 ); // add pagination above the products
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

		remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );

		// ! Change single product main gallery image size
		add_filter( 'woocommerce_gallery_image_size', function( $size ) {
			return 'woocommerce_single';
		} );


		if ( ! class_exists( 'SB_WooCommerce_Infinite_Scroll' ) ) {
			add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 5 );
		}

		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		add_action('woocommerce_before_shop_loop_item','woocommerce_show_product_loop_sale_flash', 10);
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

		/* Remove link open and close on product content */
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );


		// Change rating position on the single product page
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
		add_action('woocommerce_single_product_summary', 'etheme_product_share', 50);

		if(etheme_get_option('tabs_location') == 'after_image' && etheme_get_option('tabs_type') != 'disable' && etheme_get_option('single_layout') != 'large') {
			add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 61 );
			add_filter('et_option_tabs_type', function () { return "accordion"; });
			if(etheme_get_option('reviews_position') == 'outside') {
				add_action( 'woocommerce_single_product_summary', 'comments_template', 110 );
			}
		}

		if( etheme_get_option('single_layout') == 'fixed' || etheme_get_custom_field('single_layout') == 'fixed' ) {
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
		} else if( etheme_get_option('single_layout') == 'center' || etheme_get_custom_field('single_layout') == 'center' ) {
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
		} else if( etheme_get_option('single_layout') == 'wide' || etheme_get_custom_field('single_layout') == 'wide' || etheme_get_option('single_layout') == 'right' || etheme_get_custom_field('single_layout') == 'right' ) {
			if(is_singular('product')) remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
			remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );
			add_action( 'woocommerce_single_product_summary', 'wc_print_notices', 1 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 3 );
			add_action( 'woocommerce_single_product_summary', 'etheme_size_guide', 21 );
		} else if( etheme_get_option('single_layout') == 'booking' || etheme_get_custom_field('single_layout') == 'booking' ) {
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
			if(etheme_get_option('tabs_location') == 'after_image' && etheme_get_option('tabs_type') != 'disable') {
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 61 );
			}
			//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
			//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
		} else {
			// Add product categories after title
			add_action( 'woocommerce_single_product_summary', 'etheme_size_guide', 21 );
		}

		if ( etheme_get_custom_field('sale_counter') == 'single' || etheme_get_custom_field('sale_counter') == 'single_list' ) {
			add_action('woocommerce_single_product_summary', 'etheme_product_countdown', 29);
		}

		if(etheme_get_option('reviews_position') == 'outside') {
			add_filter( 'woocommerce_product_tabs', 'etheme_remove_reviews_from_tabs', 98 );
			add_action( 'woocommerce_after_single_product_summary', 'comments_template', 30 );
		}

		if( get_option('yith_wcwl_button_position') == 'shortcode' ) {
			add_action( 'woocommerce_after_add_to_cart_button', 'etheme_wishlist_btn', 30 );
		}

		if ( etheme_get_option('enable_brands') && etheme_get_option('brands_location') == 'content' ) {
			add_action('woocommerce_single_product_summary', 'etheme_single_product_brands', 11);
		}
		if ( etheme_get_option('enable_brands') && etheme_get_option('brands_location') == 'under_content' ) {
			add_action('woocommerce_product_meta_start', 'etheme_single_product_brands', 2);
		}

		remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );

		/* Increase avatar size for reviews on product page */

		add_filter( 'woocommerce_review_gravatar_size', function() {
			return 80;
		}, 30 );

		// ! Remove empty cart message
		remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );

		// Pagination shop
		add_filter('woocommerce_pagination_args', 'et_woocommerce_pagination');

		// 360 view plugin
		if( class_exists( 'SmartProductPlugin' ) ) {
			remove_filter('woocommerce_single_product_image_html', array('SmartProductPlugin', 'wooCommerceImage'), 999, 2 );
		}

	}
}

// because of btn-checkout class name
function woocommerce_widget_shopping_cart_proceed_to_checkout() {
	echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="button btn-checkout wc-forward">' . esc_html__( 'Checkout', 'xstore' ) . '</a>';
}

if ( ! function_exists('etheme_product_share') ) {
	function etheme_product_share () {
		if(etheme_get_option('share_icons')): 
		global $product; ?>
            <div class="product-share">
                <?php echo do_shortcode('[share title="'.__('Share: ', 'xstore').'" text="'.$product->get_title().'"]'); ?>
            </div>
    	<?php endif;
	}
}

if( ! function_exists( 'etheme_single_product_brands' ) ) :
	function etheme_single_product_brands() {
		global $post;
		$terms = wp_get_post_terms( $post->ID, 'brand' );
		$brand = etheme_get_option('brand_title');
		if ( count( $terms ) < 1 ) return;
		$_i = 0;
		?>
			<span class="product_brand">
			<?php if ( $brand ) esc_html_e('Brand: ', 'xstore'); ?>
				<?php foreach( $terms as $brand ) : $_i++;?>
					<?php 
						$thumbnail_id 	= absint( get_woocommerce_term_meta( $brand->term_id, 'thumbnail_id', true ) ); ?>
						<a href="<?php echo get_term_link( $brand ); ?>">
							<?php if ($thumbnail_id ) {
				                echo wp_get_attachment_image( $thumbnail_id, 'full' );
							} else { ?>
				            	<?php echo esc_html( $brand->name ); ?>
			            	<?php } ?>
						</a>
					<?php if ( count( $terms ) > $_i ) echo ", "; ?>
				<?php endforeach; ?>
			</span>
		<?php
	}
endif;

// Woocommerce pagination 

if ( ! function_exists('et_woocommerce_pagination')) {
	function et_woocommerce_pagination () {
	   	$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
	   	$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
  		$format  = isset( $format ) ? $format : '';
	  	$base = esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', wp_specialchars_decode( get_pagenum_link( 999999999 ) ) ) ) );

	  	$et_per_page = ( isset( $_REQUEST['et_per_page'] ) ) ? $_REQUEST['et_per_page'] : etheme_get_option( 'products_per_page' );
	  	$selected_val = (isset($_POST['et_per_page'])) ? $_POST['et_per_page'] : $et_per_page;

	  	return array(
		   'base'         => $base,
		   'format'       => $format,
		   'add_args'     => array( 'et_per_page' => $selected_val ),
		   'current'      => max( 1, $current ),
		   'total'        => $total,
		   'prev_text'    => '<i class="et-icon et-left-arrow"></i>',
		   'next_text'    => '<i class="et-icon et-right-arrow"></i>',
		   'type'         => 'list',
		   'end_size'     => 1,
		   'mid_size'     => 1,
	  	);
	}
}

if( ! function_exists('etheme_additional_information')) {
	function etheme_additional_information() {
		global $product;
		?>
	        <div class="product-attributes"><?php do_action( 'woocommerce_product_additional_information', $product ); ?></div>
		<?php
	}
}

if( ! function_exists( 'etheme_get_single_product_class' ) ) {
	function etheme_get_single_product_class( $layout ) {
        $classes = array();
        $classes['layout'] = $layout;
        $classes['class']  = 'tabs-' . etheme_get_option( 'tabs_location' );
        $classes['class'] .= ' single-product-' . $layout;
        $classes['class'] .= ' reviews-position-' . etheme_get_option( 'reviews_position' );

        if( etheme_get_option( 'ajax_addtocart' ) ) $classes['class'] .= ' ajax-cart-enable';
        if( etheme_get_option( 'single_product_hide_sidebar' ) ) $classes['class'] .= ' sidebar-mobile-hide';
        if( etheme_get_option( 'product_name_signle' ) ) $classes['class'] .= ' hide-product-name';

        if ( $layout != 'large' ) {
            if( etheme_get_option( 'fixed_images' ) && $layout != 'fixed' ) {
                $classes['class'] .= ' product-fixed-images';
            } else if( etheme_get_option( 'fixed_content' ) || $layout == 'fixed' ) {
                $classes['class'] .= ' product-fixed-content';
            }
        }

        switch ( $layout ) {
            case 'small':
                $classes['image_class'] = 'col-lg-4 col-md-5 col-sm-12';
                $classes['infor_class'] = 'col-lg-8 col-md-7 col-sm-12';
                break;
            case 'large':
                $classes['image_class'] = 'col-sm-12';
                $classes['infor_class'] = 'col-lg-6 col-md-6 col-sm-12';
                break;
            case 'xsmall':
                $classes['image_class'] = 'col-lg-9 col-md-8 col-sm-12';
                $classes['infor_class'] = 'col-lg-3 col-md-4 col-sm-12';
                break;
            case 'fixed':
                $classes['image_class'] = 'col-sm-6'; 
                $classes['infor_class'] = 'col-lg-3 col-md-3 col-sm-12';
                break;
            case 'center':
                $classes['image_class'] = 'col-lg-4 col-md-4 col-sm-12';
                $classes['infor_class'] = 'col-lg-4 col-md-4 col-sm-12';
                break;
            default:
                $classes['image_class'] = 'col-lg-6 col-md-6 col-sm-12';
                $classes['infor_class'] = 'col-lg-6 col-md-6 col-sm-12';
                break;
        }
        return $classes;
	}
}

if(! function_exists('etheme_360_view_block')) {
	function etheme_360_view_block() {
		global $post;
		$post_id = $post->ID;

		if ( ! class_exists( 'SmartProductPlugin' ) ) return;

		$smart_product = get_post_meta( $post_id, "smart_product_meta", true );

		// Check if id set
		if ( ! isset( $smart_product['id'] ) || $smart_product['id'] == "" ) return '';

		// Create slider instance
		$slider = new ThreeSixtySlider( $smart_product );
		
		ob_start();
		?>
			<a href="#product-360-popup" class="open-360-popup"><?php esc_html_e('Open 360 view', 'xstore'); ?></a>

			<div id="product-360-popup" class="product-360-popup mfp-hide">
			<?php echo $slider->show(); ?>
			</div>
		<?php
	}
}

// **********************************************************************//
// ! After products widget area
// **********************************************************************//

if( ! function_exists( 'etheme_after_products_widgets' ) ) {
	function etheme_after_products_widgets() {
		echo '<div class="after-products-widgets">';
		dynamic_sidebar('shop-after-products');
		echo '</div>';
	}
}


// **********************************************************************//
// ! Product sale countdown
// **********************************************************************//

if(!function_exists('etheme_product_countdown')) {
	function etheme_product_countdown($type = 'type2') {
		$date = get_post_meta( get_the_ID(), '_sale_price_dates_to', true );
		$date_from = get_post_meta( get_the_ID(), '_sale_price_dates_from', true );
		$time_start = get_post_meta( get_the_ID(), '_sale_price_time_start', true );
		$time_start = explode(':', $time_start);
		$time_end = get_post_meta( get_the_ID(), '_sale_price_time_end', true );
		$time_end = explode(':', $time_end);
		if( ! $date ) return false;
		echo etheme_countdown_shortcode( array(
			'year' => date( 'Y', $date ),
			'month' => date( 'M', $date ),
			'day' => date( 'd', $date ),
			'hour' => (isset($time_end[0]) && $time_end[0] > 0) ? $time_end[0] : '00',
            'minute' => isset($time_end[1]) ? $time_end[1] : '00',

            'start_year' => date('Y', $date_from),
            'start_month' => date('M', $date_from),
            'start_day' => date('d', $date_from),
            'start_hour' => (isset($time_start[0]) && $time_start[0] > 0) ? $time_start[0] : '00',
            'start_minute' => isset($time_start[1]) ? $time_start[1] : '00',
            'type' => (isset($type) && !empty($type)) ? $type : 'type2',
			'scheme' => 'dark',
			'class' => 'product-sale-counter'
		) );
	}
}



// **********************************************************************//
// ! Wishlist
// **********************************************************************//

if(!function_exists('etheme_wishlist_btn')) {
	function etheme_wishlist_btn($args = array()) {
		if(!class_exists('YITH_WCWL_Shortcode')) return;

		// $args['type'] = etheme_get_option('single_wishlist_type');
		// $args['position'] = etheme_get_option('single_wishlist_position');
		// $args['type'] = ( $args['type'] ) ? $args['type'] : 'icon-text';
		// $args['position'] = ( $args['position'] ) ? $args['position'] : 'under';

		if ( !is_array($args) ) $args = array();

		$args['type'] = (isset($args['type'])) ? $args['type'] : 'icon-text';
		$args['position'] = (isset($args['position'])) ? $args['position'] : 'under';
		$args['class'] = (isset($args['class'])) ? $args['class'] : '';

		$out = '<div class="et-wishlist-holder type-' . $args['type'] . ' position-' . $args['position'] . ' '.$args['class'].'">';
		$out .= do_shortcode( '[yith_wcwl_add_to_wishlist]' );
		$out .= '</div>';

		return $out;
	}
}

// Allow HTML in term (category, tag) descriptions
foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
}

foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
}

if(!function_exists('etheme_remove_reviews_from_tabs')) {
	function etheme_remove_reviews_from_tabs($tabs ) {
		unset( $tabs['reviews'] ); 			// Remove the reviews tab
		return $tabs;

	}
}


if( ! function_exists( 'etheme_compare_css' ) ) {
	add_action( 'wp_print_styles', 'etheme_compare_css', 200 );
	function etheme_compare_css() {
		if( ! class_exists( 'YITH_Woocompare' ) ) return;
		if ( ( ! defined('DOING_AJAX') || ! DOING_AJAX ) && ( ! isset( $_REQUEST['action'] ) || $_REQUEST['action'] != 'yith-woocompare-view-table' ) ) return;
		wp_enqueue_style( 'parent-style' );
	}
}

// **********************************************************************// 
// ! Catalog setup
// **********************************************************************// 

add_action( 'after_setup_theme', 'etheme_catalog_setup', 50 );

if(!function_exists('etheme_catalog_setup')) {
	function etheme_catalog_setup() {
		if(is_admin()) return;
		$just_catalog = etheme_get_option('just_catalog');

		if($just_catalog) {
			#remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
			//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
			remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
			//remove_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
			remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
			remove_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );

			add_filter( 'woocommerce_loop_add_to_cart_link', function($sprintf, $product, $args) {
				return sprintf( '<a rel="nofollow" href="%s" class="button show-product">%s</a>',
					esc_url(  $product->get_permalink() ),
					__('Show details', 'xstore')
				);
			}, 50, 3 );

		}
		// **********************************************************************// 
		// ! Set number of products per page
		// **********************************************************************// 
		$products_per_page = isset( $_REQUEST['et_per_page'] ) ? $_REQUEST['et_per_page'] : etheme_get_option( 'products_per_page' );
		add_filter( 'loop_shop_per_page', function() use($products_per_page) { return $products_per_page; }, 50 );
	}
}

// **********************************************************************// 
// ! Define image sizes
// **********************************************************************//
if(!function_exists('etheme_woocommerce_image_dimensions')) {
	function etheme_woocommerce_image_dimensions() {
		global $pagenow;

		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}

		$catalog = array(
			'width' 	=> '555',	// px
			'height'	=> '760',	// px
			'crop'		=> 0 		// true
		);

		$single = array(
			'width' 	=> '720',	// px
			'height'	=> '961',	// px
			'crop'		=> 0 		// true
		);

		$thumbnail = array(
			'width' 	=> '205',	// px
			'height'	=> '272',	// px
			'crop'		=> 0 		// false
		);

		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
		update_option( 'shop_single_image_size', $single ); 		// Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
	}
}

add_action( 'after_switch_theme', 'etheme_woocommerce_image_dimensions', 1 );

// **********************************************************************// 
// ! AJAX Quick View
// **********************************************************************//

add_action('wp_ajax_etheme_product_quick_view', 'etheme_product_quick_view');
add_action('wp_ajax_nopriv_etheme_product_quick_view', 'etheme_product_quick_view');
if(!function_exists('etheme_product_quick_view')) {
	function etheme_product_quick_view() {
		if(empty($_POST['prodid'])) {
			echo 'Error: Absent product id';
			die();
		}

		$args = array(
			'p' => (int) $_POST['prodid'],
			'post_type' => 'product'
		);

		if( class_exists('SmartProductPlugin') )
			remove_filter('woocommerce_single_product_image_html', array('SmartProductPlugin', 'wooCommerceImage'), 999, 2 );


		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) : $the_query->the_post();
				wc_get_template('product-quick-view.php');
			endwhile;
			wp_reset_query();
			wp_reset_postdata();
		} else {
			echo 'No posts were found!';
		}
		die();
	}
}

if(!function_exists('etheme_size_guide')) {
	function etheme_size_guide() {

		$global_guide = etheme_get_option( 'size_guide_img' );
		$local_guide = etheme_get_custom_field( 'size_guide_img' );

		if ( $local_guide ) {
			$image = $local_guide;
		} elseif( isset( $global_guide['url'] ) ) {
			$image = $global_guide['url'];
		} else {
			$image = '';
		}

		if ( ! empty( $image ) ) : ?>
			<div class="size-guide">
				<a href="<?php echo esc_url( $image ); ?>" rel="lightbox"><?php esc_html_e( 'Sizing guide', 'xstore' ); ?></a>
			</div>
		<?php endif;
	}
}

if( ! function_exists( 'etheme_product_cats' ) ) {
	function etheme_product_cats($single = false) {
		global $post, $product;
		$cat  = etheme_get_custom_field( 'primary_category' );
		$html = '';
        if( ! empty( $cat ) && $cat != 'auto' ) {
            $primary = get_term_by( 'slug', $cat, 'product_cat' );
            if( ! is_wp_error( $primary ) ) {
                $term_link = get_term_link( $primary );
                if( ! is_wp_error( $term_link ) ) {
                	if ( $single ) {
                		$html .= '<span class="posted_in">'.esc_html__('Category: ', 'xstore') . '<a href="' . esc_url( $term_link ) . '">' . $primary->name . '</a></span>';
                	}
                	else {
                    	$html .= '<a href="' . esc_url( $term_link ) . '">' . $primary->name . '</a>';	
                	}
                }
            }
        } else {
        	if ( $single ) {
            	$html .= wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'xstore' ) . ' ', '</span>' );
        	}
        	else {
        		$html .= wc_get_product_category_list( $product->get_id(), ', ' );
        	}
        }
        if ( $html ) {
            echo '<div class="products-page-cats">' . $html . '</div>';
        }
    }
}

// **********************************************************************// 
// ! Get list of all product brands
// **********************************************************************// 
if( ! function_exists( 'etheme_product_brands' ) ) :
	function etheme_product_brands() {
		global $post;
		$terms = wp_get_post_terms( $post->ID, 'brand' );
		if ( count( $terms ) < 1 ) return;
		$_i = 0;

		?>
			<div class="products-page-brands">
				<?php foreach( $terms as $brand ) : $_i++;?>
					<a href="<?php echo get_term_link( $brand ); ?>" id="test-slyle-less" class="view-products"><?php echo esc_html( $brand->name ); ?></a>
					<?php if ( count( $terms ) > $_i ) echo ", "; ?>
				<?php endforeach; ?>
			</div>
		<?php
	}
endif;

// **********************************************************************// 
// ! Get list of all product images
// **********************************************************************// 

if(!function_exists('etheme_get_image_list')) {
	function etheme_get_image_list($size = 'shop_catalog' ) {
		global $post, $product, $woocommerce;
		$images_string = '';

		$attachment_ids = $product->get_gallery_image_ids();

		$_i = 0;
		if(count($attachment_ids) > 0) {
			$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size );
			$images_string .= $image[0];
			foreach($attachment_ids as $id) {
				$_i++;
				$image = wp_get_attachment_image_src($id, $size);
				if($image == '') continue;
				if($_i == 1)
					$images_string .= ',';


				$images_string .= $image[0];

				if($_i != count($attachment_ids))
					$images_string .= ',';
			}

		}
		return $images_string;
	}
}


// **********************************************************************// 
// ! Display second image in the gallery
// **********************************************************************// 

if(!function_exists('etheme_get_second_image')) {
	function etheme_get_second_image($size = 'shop_catalog' ) {
		global $product, $woocommerce_loop;
		$attachment_ids = $product->get_gallery_image_ids();

		$image = '';

		if ( ! empty( $attachment_ids[0] ) ) {
			$image = wp_get_attachment_image( $attachment_ids[0], $size );
		}

		if ( $image != '' ) {
			echo '<div class="image-swap">' . $image  . '</div>';
		}

		
	}
}


// **********************************************************************//
// ! Out image html for swiper lazy
// **********************************************************************//
if ( ! function_exists( 'etheme_lazy_swiper_image' ) ) :

	function etheme_lazy_swiper_image( $id, $size = 'shop_catalog', $type, $echo = true ){
		if ( ! $id || ! $type ) return;

		$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

		if ( $type == 'main' ) {
			$id = get_post_thumbnail_id($id);
		} else {
			$product = wc_get_product( $id );
			$attachment_ids = $product->get_gallery_image_ids();
			if ( ! $attachment_ids ) return;
			$id = $attachment_ids[0];
		}

		list( $src, $width, $height ) = wp_get_attachment_image_src( $id, $image_size );

		// ! Fix for old products with parent product image
		if ( ! $src && $type == 'main' ){
			global $product;
			if ( $product ) {
				$parent_id = $product->get_parent_id();
				$id = get_post_thumbnail_id( $parent_id );
				list( $src, $width, $height ) = wp_get_attachment_image_src( $id, $image_size );
			}
		}

	    if ( ! $src ) $src = wc_placeholder_img_src();

	    $image_meta = wp_get_attachment_metadata( $id );
		$attr = array(
			'alt'  => trim( strip_tags( get_post_meta( $id, '_wp_attachment_image_alt', true ) ) ),
			'class' => 'swiper-lazy wp-post-image',
			'data-src' => $src,
			'data-o_src' => $src
		);

		// lazy loading 
	    // if ( is_array( $image_meta ) ) {
	    //     $size_array = array( absint( $width ), absint( $height ) );
	    //     $srcset = wp_calculate_image_srcset( $size_array, $src, $image_meta, $id );
	    //     $sizes = wp_calculate_image_sizes( $size_array, $src, $image_meta, $id );

	    //     if ( $srcset && $sizes ) {
	    //         $attr['data-srcset'] = $srcset;
	    //         $attr['sizes'] = $sizes;
	    //     }
	    // }

		$out = '<img';
			foreach ( $attr as $key => $value ) {
				if ( $value ) $out .= " $key=" . '"' . $value . '"';
			}
		$out .= ' />';

		if ( $echo ) {
			echo wp_specialchars_decode( $out );
		} else {
			return $out;
		}
	}
endif;

// **********************************************************************//
// ! Get product availability
// **********************************************************************//

if( ! function_exists('etheme_product_availability') ) {
	function etheme_product_availability() {
		if( ! etheme_get_option( 'out_of_icon' ) ) return;
		global $product;
		// Availability
		$availability      = $product->get_availability();
		$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';

		echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
	}
}

// **********************************************************************// 
// ! Grid/List switcher
// **********************************************************************// 
add_action( 'woocommerce_before_shop_loop', 'etheme_grid_list_switcher', 35 );
if( ! function_exists( 'etheme_grid_list_switcher' ) ) {
	function etheme_grid_list_switcher() {

		$current_url = ( ( array_key_exists('HTTPS', $_SERVER ) && $_SERVER['HTTPS'] ) ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

		$view_mode = etheme_get_option('view_mode');

		$product_view = etheme_get_option('product_view');
		$custom_template = etheme_get_option('custom_product_template');

		if( $view_mode == 'grid' || $view_mode == 'list' || ( $product_view == 'custom' && $custom_template != '' ) ) return;

		$url_grid = add_query_arg( 'view_mode', 'grid', remove_query_arg( 'view_mode', $current_url ) );
		$url_list = add_query_arg( 'view_mode', 'list', remove_query_arg( 'view_mode', $current_url ) );

		$current = get_query_var('et_view-mode');
		?>
		<div class="view-switcher hidden-tablet hidden-phone">
			<label><?php esc_html_e('View as:', 'xstore'); ?></label>
			<?php if($view_mode == 'grid_list'): ?>
				<div class="switch-grid <?php if( $current == 'grid' ) echo 'switcher-active'; ?>">
					<a href="<?php echo esc_url( $url_grid ); ?>"><?php esc_html_e('Grid', 'xstore'); ?></a>
				</div>
				<div class="switch-list <?php if( $current == 'list' ) echo 'switcher-active'; ?>">
					<a href="<?php echo esc_url( $url_list ); ?>"><?php esc_html_e('List', 'xstore'); ?></a>
				</div>
			<?php elseif($view_mode == 'list_grid'): ?>
				<div class="switch-list <?php if( $current == 'list' ) echo 'switcher-active'; ?>">
					<a href="<?php echo esc_url( $url_list ); ?>"><?php esc_html_e('List', 'xstore'); ?></a>
				</div>
				<div class="switch-grid <?php if( $current == 'grid' ) echo 'switcher-active'; ?>">
					<a href="<?php echo esc_url( $url_grid ); ?>"><?php esc_html_e('Grid', 'xstore'); ?></a>
				</div>
			<?php endif ;?>
		</div>
		<?php
	}
}


// **********************************************************************// 
// ! View mode
// **********************************************************************// 

// ! Get view mode
if( ! function_exists( 'etheme_get_view_mode' ) ) {
	function etheme_get_view_mode() {
		$current = 'grid';
		if ( class_exists( 'WC_Session_Handler' ) && ! is_admin() ) {
			$s = WC()->session;

			if ( $s == null ) return $current;

			$s = $s->__get( 'view_mode', 0 );
			$mode = etheme_get_option( 'view_mode' );

			if ( isset( $_REQUEST['view_mode'] ) ) {
				$current = ( $_REQUEST['view_mode'] );
			} elseif ( isset( $s ) && ! empty( $s ) ) {
				$current = ( $s );
			} elseif ( $mode == 'list_grid' || $mode == 'list' ) {
				$current = 'list';
			}
		}
		return $current;
	}
}

// ! Set view mode
if( ! function_exists( 'etheme_view_mode_action' ) ) {
	add_action( 'init', 'etheme_view_mode_action', 100 );
	function etheme_view_mode_action() {
		if ( isset( $_REQUEST['view_mode'] ) && class_exists( 'WC_Session_Handler' ) ) {
			$s = WC()->session;
			if ( $s != null ) $s->set( 'view_mode', ( $_REQUEST['view_mode'] ) );
		}
	}
}

// **********************************************************************// 
// ! Filters button
// **********************************************************************// 

add_action('woocommerce_before_shop_loop', 'etheme_filters_btn', 11);
if(!function_exists('etheme_filters_btn')) {
	function etheme_filters_btn() {
		if( is_active_sidebar( 'shop-filters-sidebar' ) ) {
			?>
			<div class="open-filters-btn"><a href="#" class="<?php echo (etheme_get_option('filter_opened')) ? ' active' : ''; ?>"><i class="et-icon et-controls"></i><?php esc_html_e('Filters', 'xstore'); ?></a></div>
			<?php
		}
	}
}

// **********************************************************************// 
// ! Productes per page dropdown
// **********************************************************************// 
add_action( 'woocommerce_before_shop_loop', 'etheme_products_per_page_select', 37 );
if( ! function_exists( 'etheme_products_per_page_select' ) ) {
	function etheme_products_per_page_select() {
		global $wp_query;

		$action = $cat = $out = $et_ppp = $per_page = $class = '';

		if ( is_active_sidebar( 'shop-filters-sidebar' ) ) {
			$class .= ' et-hidden-phone';
		}
		$cat 	  = $wp_query->get_queried_object();
		$et_ppp   = etheme_get_option('et_ppp_options');
		$et_ppp   = ( ! empty( $et_ppp ) ) ? explode( ',', $et_ppp ) : array( 12, 24, 36, -1 );
		$action   = ( isset( $cat->term_id ) ) ? get_term_link( $cat->term_id ) : esc_url_raw( get_pagenum_link() );
		$per_page = ( isset( $_REQUEST['et_per_page'] ) ) ? $_REQUEST['et_per_page'] : etheme_get_option( 'products_per_page' );

		$out .= '<span>' . esc_html__( 'Show', 'xstore' ) . '</span>';
		$out .= '<form method="post" action="' . esc_url( $action ) . '">';
			$out .= '<select name="et_per_page" onchange="this.form.submit()" class="et-per-page-select">';
				foreach( $et_ppp as $key => $value ){
					$out .= sprintf(
						'<option value="%s" %s>%s</option>',
						esc_attr( $value ),
						selected( $value, $per_page, false ),
						( $value == -1 ) ? esc_html__( 'All', 'xstore' ) : $value
					);
				}
				foreach ( $_GET as $key => $val ){
					if ( 'et_per_page' === $key || 'submit' === $key ) continue;
					if ( is_array( $val ) ) {
						foreach( $val as $inner_val ) {
							$out .= '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $inner_val ) . '" />';
						}
					} else {
						$out .= '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) .'" />';
					}
				}
			$out .= '</select>';
		$out .= '</form>';
		echo '<div class="products-per-page '.$class.'">' . $out . '</div>';
	}
}

// **********************************************************************// 
// ! Category thumbnail
// **********************************************************************// 
if( ! function_exists( 'etheme_category_header' ) ){
	function etheme_category_header() {
		global $wp_query;
		$cat = $wp_query->get_queried_object();

		if( ! property_exists( $cat, 'term_id' ) && !is_search() && etheme_get_option( 'product_bage_banner' ) != '' ){
			echo '<div class="category-description">';
			echo do_shortcode( etheme_get_option( 'product_bage_banner' ) );
			echo '</div>';
		} else {;
			return;
		}
	}
}

// **********************************************************************// 
// ! Second product category description
// **********************************************************************// 
if( ! function_exists( 'etheme_second_cat_desc' ) ){
	function etheme_second_cat_desc() {
		global $wp_query;
		$cat = $wp_query->get_queried_object();

		if( property_exists( $cat, 'term_id' ) && ! is_search() ){
			$desc = get_term_meta( $cat->term_id, '_et_second_description', true );
		} else {
			return;
		}

		if ( ! empty( $desc ) ) {
			echo '<div class="term-description et_second-description">' . do_shortcode( $desc ) . '</div>';
		}
		return;
	}
}

// **********************************************************************// 
// ! Wishlist Widget
// **********************************************************************// 

if(!function_exists('etheme_wishlist_widget')) {
	function etheme_wishlist_widget() {
		if( class_exists( 'YITH_WCWL' ) ):
			$args  = array();

			if ( defined( 'YITH_WCWL_PREMIUM' ) && is_user_logged_in() ) {
				$args['wishlist_id'] = 'all';
			} else {
				$args['is_default'] = true;
			}


			$products = YITH_WCWL()->get_products( $args );

			$limit = etheme_get_option('mini-cart-items-count');
			$limit = is_numeric($limit) ? $limit : 3;

			$icon_label = etheme_get_option('cart_icon_label');
			$class = ' ico-label-' . $icon_label;

			if ( ! defined( 'YITH_WCWL_PREMIUM' ) ) {
				$products = array_reverse($products);
			}

			// $wl_count = YITH_WCWL()->count_products();
			$wl_count = count( $products );
			?>
			<div class="et-wishlist-widget <?php echo esc_attr( $class ); ?> <?php echo 'popup-count-'.$wl_count; ?>">
				<a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>"><i class="et-icon et-heart icon-like_outline"></i>
				<span class="wishlist-count wl-count-number-<?php echo (int) $wl_count; echo ( !etheme_get_option('favicon_label_zero')) ? ' label-hidden' : ''; ?>"><?php echo (int) $wl_count; ?></span>
				</a>
				<div class="wishlist-dropdown product_list_widget">

					<?php if ( ! empty($products) ) : ?>

						<ul class="cart-widget-products">
							<?php
							$i = 0;
							foreach( $products as $item ) {
								$i++;
								if( $i > $limit) break;

								if ( function_exists( 'yit_wpml_object_id' ) ) {
									$item['prod_id'] = yit_wpml_object_id ( $item['prod_id'], 'product', true );
								}

								if( function_exists( 'wc_get_product' ) ) {
									$_product = wc_get_product( $item['prod_id'] );
								}
								else{
									$_product = get_product( $item['prod_id'] );
								}

								if( ! $_product ) continue;

								$product_name  = $_product->get_title();
								$thumbnail     = $_product->get_image();
								?>
								<li class="">
									<?php if ( ! $_product->is_visible() ) : ?>
										<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . '&nbsp;'; ?>
									<?php else : ?>
										<a href="<?php echo esc_url( $_product->get_permalink() ); ?>" class="product-mini-image">
											<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . '&nbsp;'; ?>
										</a>
									<?php endif; ?>

									<div class="product-item-right">

										<h4 class="product-title"><a href="<?php echo esc_url( $_product->get_permalink() ); ?>"><?php echo wp_specialchars_decode( $product_name); ?></a></h4>

										<div class="descr-box">
											<?php echo WC()->cart->get_product_price( $_product ); ?>
										</div>

									</div>
								</li>
								<?php
							}
							?>
						</ul>

						<p class="buttons">
							<a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" class="button btn-view-wishlist"><?php _e( 'View Wishlist', 'xstore' ); ?></a>
						</p>

					<?php else : ?>

						<p class="empty"><?php esc_html_e( 'No products in the wishlist.', 'xstore' ); ?></p>

					<?php endif; ?>

				</div><!-- end product list -->
			</div>
			<?php
		endif;
	}
}


if(!function_exists('etheme_support_multilingual_ajax')) {
	add_filter('wcml_multi_currency_is_ajax', 'etheme_support_multilingual_ajax');
	function etheme_support_multilingual_ajax($functions) {
		$functions[] = 'etheme_wishlist_fragments';
		return $functions;
	}
}

if( ! function_exists('etheme_wishlist_fragments') ) {
	add_action( 'wp_ajax_etheme_wishlist_fragments', 'etheme_wishlist_fragments');
	add_action( 'wp_ajax_nopriv_etheme_wishlist_fragments', 'etheme_wishlist_fragments');

	function etheme_wishlist_fragments() {
		if(! function_exists('wc_setcookie') || ! function_exists('YITH_WCWL') ) return;
		$products = YITH_WCWL()->get_products( array(
			#'wishlist_id' => 'all',
			'is_default' => true
		) );

		// Get mini cart
		ob_start();

		etheme_wishlist_widget();

		$wishlist = ob_get_clean();

		// Fragments and mini cart are returned
		$data = array(
			'wishlist' => $wishlist,
			'wishlist_hash' =>  md5( json_encode( $products ) )
		);

		wp_send_json( $data );
	}
}

// **********************************************************************// 
// ! Is zoom plugin activated
// **********************************************************************// 
if( ! function_exists('etheme_is_zoom_activated') ) {
	function etheme_is_zoom_activated() {
		return class_exists( 'YITH_WCMG_Frontend' );
	}
}

// **********************************************************************// 
// ! Top Cart Widget
// **********************************************************************// 

if(!function_exists('etheme_top_cart')) {
	function etheme_top_cart($load_cart = false) {
		global $woocommerce;

		$icon_design = etheme_get_option('shopping_cart_icon');
		$icon_label = etheme_get_option('cart_icon_label');

		$class = 'ico-design-' . $icon_design;
		$class .= ' ico-label-' . $icon_label;

		?>
		<div class="shopping-container <?php echo esc_attr( $class ); echo ( !etheme_get_option('favicon_label_zero')) ? ' label-hidden' : ''; ?>">
			<div class="shopping-cart-widget" id='basket'>
				<a href="<?php echo wc_get_cart_url(); ?>" class="cart-summ">
						<span class="cart-bag">
							<i class='ico-sum'></i>
							<?php etheme_cart_number(); ?>
						</span>
					<?php if ( etheme_get_option('shopping_cart_total') ) etheme_cart_total(); ?>
				</a>
			</div>
			<?php etheme_cart_items_count(); ?>
			<div class="cart-popup-container">
				<div class="cart-popup clearfix">
					<div class="widget woocommerce widget_shopping_cart">
						<?php
						if($load_cart) {
							woocommerce_mini_cart();
						} else {
							echo '<div class="widget_shopping_cart_content"></div>';
						}
						?>
					</div>
				</div>
				<div class="cart-popup-banner"><?php echo etheme_get_option('cart_popup_banner'); ?></div>
			</div>
		</div>
		<?php
	}
}

if(!function_exists('etheme_cart_total')) {
	function etheme_cart_total() {
		global $woocommerce;
		?>
		<span class="shop-text"><span class="cart-items"><?php esc_html_e('Cart', 'xstore') ?>:</span> <span class="total"><?php echo wp_specialchars_decode($woocommerce->cart->get_cart_subtotal()); ?></span></span>
		<?php
	}
}

// to hide popup if empty
if(!function_exists('etheme_cart_items_count')) {
	function etheme_cart_items_count() {
		global $woocommerce;
		?>
		<span class="popup-count popup-count-<?php echo esc_attr( $woocommerce->cart->cart_contents_count ); ?>"></span>
		<?php
	}
}


if(!function_exists('etheme_cart_number')) {
	function etheme_cart_number() {
		global $woocommerce; 
		?>
			<span class="badge-number number-value-<?php echo esc_attr( $woocommerce->cart->cart_contents_count ); ?>" data-items-count="<?php echo esc_attr( $woocommerce->cart->cart_contents_count ); ?>"><?php echo esc_html( $woocommerce->cart->cart_contents_count ); ?></span>
		<?php
	}
}

if(!function_exists('etheme_cart_items')) {
	function etheme_cart_items ($limit = 3) {
		?>
		<?php if ( ! WC()->cart->is_empty() ) : ?>

			<ul class="cart-widget-products">
				<?php
				$i = 0;
				$cart = array_reverse( WC()->cart->get_cart() );
				do_action( 'woocommerce_before_mini_cart_contents' );
				foreach ( $cart as $cart_item_key => $cart_item ) {
					
					if( $i >= $limit ) continue;
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$i++;
						$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
						$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
						$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
						<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="et-icon et-delete"></i></a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'xstore' ),
									esc_attr( $product_id ),
									esc_attr( $cart_item_key ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
							<?php if ( ! $_product->is_visible() ) : ?>
								<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . ''; ?>
							<?php else : ?>
								<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>" class="product-mini-image">
									<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . ''; ?>
								</a>
							<?php endif; ?>
							<div class="product-item-right">
								<h4 class="product-title">
									<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
										<?php echo wp_specialchars_decode( $product_name ); ?>
									</a>
								</h4>

								<div class="descr-box">
									<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								</div>
							</div>

						</li>
						<?php
					}
				}
				do_action( 'woocommerce_mini_cart_contents' );
				?>
			</ul>

		<?php else : ?>

			<p class="woocommerce-mini-cart__empty-message empty"><?php esc_html_e( 'No products in the cart.', 'xstore' ); ?></p>

		<?php endif; ?>


		<?php if ( ! WC()->cart->is_empty() ) : ?>

			<div class="cart-popup-footer">
				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn-view-cart wc-forward"><?php esc_html_e( 'Shopping cart ', 'xstore' ); ?>(<?php echo WC()->cart->cart_contents_count; ?>)</a>
				<div class="cart-widget-subtotal woocommerce-mini-cart__total total">
					<span class="small-h"><?php echo esc_html__('Subtotal:', 'xstore'); ?></span>
					<span class="big-coast">
						<?php echo WC()->cart->get_cart_subtotal(); ?>
					</span>
				</div>
			</div>

			<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

			<p class="buttons">
				<?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?>
			</p>

		<?php endif; ?>

		<?php
	}
}



if(!function_exists('etheme_get_fragments')) {
	add_filter('woocommerce_add_to_cart_fragments', 'etheme_get_fragments', 30);
	function etheme_get_fragments($array = array()) {
		ob_start();
		etheme_cart_total();
		$cart_total = ob_get_clean();

		ob_start();
		etheme_cart_number();
		$cart_number = ob_get_clean();

		ob_start();
		etheme_cart_items_count();
		$cart_count = ob_get_clean();

		$array['span.shop-text'] = $cart_total;
		$array['span.badge-number'] = $cart_number;
		$array['span.popup-count'] = $cart_count;

		return $array;
	}
}

// **********************************************************************// 
// ! Product brand label
// **********************************************************************//
if(!function_exists('etheme_product_brand_image')) {
    function etheme_product_brand_image() {
        global $post;
        $terms = wp_get_post_terms( $post->ID, 'brand' );

        if(! is_wp_error( $terms ) && count($terms)>0 && etheme_get_option('show_brand') ) {
            ?>
            <div class="sidebar-widget product-brands">
                <h4 class="widget-title"><span><?php esc_html_e('Product brand', 'xstore') ?></span></h4>
                <?php
                foreach($terms as $brand) {
                    $thumbnail_id 	= absint( get_woocommerce_term_meta( $brand->term_id, 'thumbnail_id', true ) );
                    ?>
                    <a href="<?php echo get_term_link($brand); ?>">
                        <?php if ( etheme_get_option('show_brand_title') ) : ?>
                            <div class="view-products-title colorGrey"><?php echo esc_html( $brand->name );?></div>
                        <?php endif;
                        if ($thumbnail_id && etheme_get_option('show_brand_image') ) :
                            echo wp_get_attachment_image( $thumbnail_id, 'full' );
                        endif; ?>
                    </a>
                    <?php if ( etheme_get_option('show_brand_desc') ) : ?>
                        <div class="short-description text-center colorGrey"><p><?php echo wp_specialchars_decode( $brand->description );?></p></div>
                    <?php endif; ?>
                    <a href="<?php echo get_term_link($brand); ?>" id="test-slyle-less" class="view-products"><?php esc_html_e('View all products', 'xstore'); ?></a>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    }
}

// **********************************************************************// 
// ! Cart&Checkout separator
// **********************************************************************//
if ( ! function_exists( 'etheme_get_cart_sep' ) ) {
	function etheme_get_cart_sep(){
		$sep = '<i class="et-icon et-right-arrow"></i>';
		$sep = "/";
		return $sep;
	}
}