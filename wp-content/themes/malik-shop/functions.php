<?php

/**
 * Required: set 'ot_theme_mode' filter to true.
 */

add_filter('ot_theme_mode', '__return_true');

/**
 * Required: include OptionTree.
 */
require(trailingslashit(get_template_directory()) . 'functions/theme-options.php');
require(trailingslashit(get_template_directory()) . 'functions/customizer.php');
require(trailingslashit(get_template_directory()) . 'functions/meta-boxes.php');
require(trailingslashit(get_template_directory()) . 'functions/checkout-functions.php');

add_filter( 'woocommerce_default_address_fields', 'change_address', 50);

function change_address($address_fields) {
  $address_fields['address_1']['required'] = false;
  $address_fields['address_2']['required'] = false;
  return $address_fields;
};

add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_theme');
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_action('woocommerce_before_main_content', 'malik_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'malik_theme_wrapper_end', 10);
add_action('after_setup_theme', 'malik_setup_theme');
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0);
add_action('woocommerce_before_main_content', 'malik_breadcrumb', 20, 0);
add_filter('woocommerce_sale_flash', 'vs_change_sale_content', 10, 3);
add_action( 'widgets_init', 'register_malik_sidebar' );


function register_malik_sidebar () {
    register_sidebar(
		array(
			'id' => 'side_order',
			'name' => 'В разделе как оформить заказ',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-heading">',
			'after_title' => '</h4>'
		)
	);
}
 
function vs_change_sale_content($content, $post, $product){
 
   $content = '<span class="on__sale">'.__( 'Sale').'</span>';
 
   return $content;
}

if (!function_exists('malik_breadcrumb')) {

    /**
     * Output the WooCommerce Breadcrumb.
     *
     * @param array $args Arguments.
     */
    function malik_breadcrumb($args = array())
    {
        $args = wp_parse_args( 
            $args,
            apply_filters(
                'woocommerce_breadcrumb_defaults',
                array(
                    'delimiter'   => '&nbsp;&#47;&nbsp;',
                    'wrap_before' => '<div class="malik-breadcrumb">',
                    'wrap_after'  => '</div>',
                    'before'      => '',
                    'after'       => '',
                    'home'        => _x('Home', 'breadcrumb', 'woocommerce'),
                )
            )
        );

        $breadcrumbs = new WC_Breadcrumb();

        if (!empty($args['home'])) {
            $breadcrumbs->add_crumb($args['home'], apply_filters('woocommerce_breadcrumb_home_url', home_url()));
        }

        $args['breadcrumb'] = $breadcrumbs->generate();

        /**
         * WooCommerce Breadcrumb hook
         *
         * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
         */
        do_action('woocommerce_breadcrumb', $breadcrumbs, $args);

        wc_get_template('global/breadcrumb.php', $args);
    }
}


if (!function_exists('my_buttons')) {
    function my_buttons()
    { ?>
<script type="text/javascript">
QTags.addButton('cite', 'cite', '<cite>', '</cite>');
</script>
<?php }
    add_action('admin_print_footer_scripts', 'my_buttons');
}


function malik_setup_theme()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menu('top', 'Меню в шапке');
    register_nav_menu('lang', 'Выбор языка');
    register_nav_menu('bottom', 'Меню в подвале');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    include(get_template_directory() . '/inc/custom-post-type-overview.php');
}

// меняем стили списка товаров

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);

add_action( 'woocommerce_after_add_to_cart_button', 'malik_slogan', 10);

function malik_slogan() {
    ?>
<div class="subscr_slogan">
  <p>
    <?php esc_html_e('Watch a video review of our dresses and catch up on discounts on our social media ', 'malik_shop') ?>
    <a href="https://vk.com/malik___brand">VK</a>
  </p>
</div>
<?php 
}
add_action( 'woocommerce_after_add_to_cart_button', 'malik_additional_info', 20);

function malik_additional_info() {
    global $product, $post
   ?>
<div class="general_information">
  <div class="sect">
    <p class="titile_sect"><?php esc_html_e('Decription', 'malik_shop') ?> <span class='closed'> <svg
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z" />
        </svg> </p>
    <div class="sect_text">
      <pre>
<?php echo get_post_meta($post->ID, 'product_description', true); ?> 
            </pre>
    </div>
  </div>
  <div class="sect">
    <p class="titile_sect"><?php esc_html_e('Composition and care', 'malik_shop') ?> <span class='closed'> <svg
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z" />
        </svg></span> </p>
    <div class="sect_text">
      <pre>
<?php echo get_post_meta($post->ID, 'product_care', true); ?> 
            </pre>
    </div>

  </div>
  <div class="sect">
    <p class="titile_sect"><?php esc_html_e("Products's measurements", 'malik_shop') ?> <span class='closed'> <svg
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z" />
        </svg></p>
    <div class="sect_text">
      <pre>
<?php echo get_post_meta($post->ID, 'product_measurements', true); ?>
            </pre>
    </div>

  </div>
  <div class="sect">
    <p class="titile_sect"><?php esc_html_e("Model's measurements", 'malik_shop') ?> <span class='closed'> <svg
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z" />
        </svg></p>
    <div class="sect_text">
      <pre>
<?php echo get_post_meta($post->ID, 'model_measurements', true); ?>
            </pre>
    </div>
  </div>
  <div class="sect">
    <p class="titile_sect"><?php esc_html_e("Shipping and payment", 'malik_shop') ?> <span class='closed'> <svg
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z" />
        </svg></p>
    <div class="sect_text">
      <pre>
<?php echo get_post_meta($post->ID, 'shipping', true); ?>
            </pre>
    </div>
  </div>
</div>

<?php 
}
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save', 10 );


function woo_add_custom_general_fields() {
    global $product, $post;
  
  echo '<div class="options_group">';
  
  woocommerce_wp_textarea_input( 
	array( 
		'id'          => 'product_description', 
		'label'       => __( 'DESCRIPTION', 'woocommerce' ), 
		'placeholder' => '', 
		'description' => __( 'Описание продукта', 'woocommerce' ) 
	)
);
  
  echo '</div>';
    echo '<div class="options_group">';
  woocommerce_wp_textarea_input( 
	array( 
		'id'          => 'product_care', 
		'label'       => __( 'COMPOSITION AND CARE', 'woocommerce' ), 
		'placeholder' => '', 
		'description' => __( 'Рекомендации по уходу', 'woocommerce' ) 
	)
);
    
  echo '</div>';
    echo '<div class="options_group">';
  woocommerce_wp_textarea_input( 
	array( 
		'id'          => 'product_measurements',
		'label'       => __( "PRODUCT'S MEASUREMENTS", 'woocommerce' ), 
		'placeholder' => '', 
		'description' => __( 'Размеры', 'woocommerce' ) 
	)
);
  
  echo '</div>';
  echo '<div class="options_group">';
  woocommerce_wp_textarea_input( 
    array( 
        'id'          => 'model_measurements',  
        'label'       => __( "MODEL'S MEASUREMENTS", 'woocommerce' ), 
        'placeholder' => '', 
        'description' => __( 'Размеры модели', 'woocommerce' ) 
    )
  );
  
  echo '</div>';
    echo '<div class="options_group">';
  woocommerce_wp_textarea_input( 
	array( 
		'id'          => 'shipping', 
		'label'       => __( "SHIPPING AND PAYMENT", 'woocommerce' ), 
		'placeholder' => '', 
		'description' => __( 'Доставка', 'woocommerce' ) 
	)
);
  
  echo '</div>';
    
}
function woo_add_custom_general_fields_save( $post_id ){
 
$woocommerce_textarea = $_POST['product_description'];
	if( !empty( $woocommerce_textarea ) )
    update_post_meta( $post_id, 'product_description', esc_html( $woocommerce_textarea ) );
    else
    update_post_meta( $post_id, 'product_description', '' );

$woocommerce_textarea = $_POST['product_care'];
	if( !empty( $woocommerce_textarea ) )
		update_post_meta( $post_id, 'product_care', esc_html( $woocommerce_textarea ) );
        else
    update_post_meta( $post_id, 'product_care', '' );

$woocommerce_textarea = $_POST['product_measurements'];
	if( !empty( $woocommerce_textarea ) )
		update_post_meta( $post_id, 'product_measurements', esc_html( $woocommerce_textarea ) );
        else
    update_post_meta( $post_id, 'product_measurements', '' );

$woocommerce_textarea = $_POST['model_measurements'];
	if( !empty( $woocommerce_textarea ) )
		update_post_meta( $post_id, 'model_measurements', esc_html( $woocommerce_textarea ) );
        else
    update_post_meta( $post_id, 'model_measurements', '' );

$woocommerce_textarea = $_POST['shipping'];
	if( !empty( $woocommerce_textarea ) )
		update_post_meta( $post_id, 'shipping', esc_html( $woocommerce_textarea ) );
        else
    update_post_meta( $post_id, 'shipping', '' );
}

add_filter( 'woocommerce_quantity_input_classes', 'malik_quantity_input_classed', 10, 2 );
function malik_quantity_input_classed( $array, $product ){

	return $array[]='malik_quantity';
}
add_action('woocommerce_shop_loop_subcategory_title', 'malik_subcategory_title', 10);
function malik_subcategory_title($category)
{     ?>
<div class="entry__text">
  <h1 class="entry__title">
    <?php
            echo esc_html($category->name);
            ?>
  </h1>
</div>
<?php
}
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 10);
add_action('woocommerce_after_shop_loop_item', 'malik_loop_add_to_cart', 10);

function malik_loop_add_to_cart()
{
    global $product;

    if ($product) {
        $defaults = array(
            'quantity'   => 1,
            'class'      => implode(
                ' ',
                array_filter(
                    array(
                        'btn',
                        'btn--primary',
                        'h-full-width',
                        'product_type_' . $product->get_type(),
                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                        $product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                    )
                )
            ),
            'attributes' => array(
                'data-product_id'  => $product->get_id(),
                'data-product_sku' => $product->get_sku(),
                'aria-label'       => $product->add_to_cart_description(),
                'rel'              => 'nofollow',
            ),
        );

        $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($defaults), $product);

        if (isset($args['attributes']['aria-label'])) {
            $args['attributes']['aria-label'] = wp_strip_all_tags($args['attributes']['aria-label']);
        }

        wc_get_template('loop/add-to-cart.php', $args);
    }
}

// Оставляет пользователя на той же странице, если тот ввел неверный пароль
// 
// add_action('wp_login_failed', 'malik_login_fail');
// function malik_login_fail($username)
// {
//     $referrer = $_SERVER['HTTP_REFERER'];  // откуда пришел запрос

//     // Если есть referrer и это не страница wp-login.php
//     if (!empty($referrer) && !strstr($referrer, 'wp-login') && !strstr($referrer, 'wp-admin')) {
//         wp_redirect(add_query_arg('login', 'failed', $referrer));  // редиркетим и добавим параметр запроса ?login=failed
//         exit;
//     }
// }

// // меняем редирект при выходе из системы

// add_action('wp_logout','auto_redirect_after_logout');

// function auto_redirect_after_logout(){
//   wp_safe_redirect( home_url() );
//   exit;
// }


add_action('woocommerce_shop_loop_item_title', 'malik_loop_product_title', 10);
if (!function_exists('malik_loop_product_title')) {
    function malik_loop_product_title()
    {
        global $product;

        $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);
        echo '<h3 class="entry__title ' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '"><a href="' . esc_url($link) . '" class="thumb-link woocommerce-LoopProduct-link woocommerce-loop-product__link">' . get_the_title() . '</a></h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}
add_action('woocommerce_before_shop_loop_item', 'malik_loop_product_link');

function malik_loop_product_link()
{
    global $product;

    $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

    echo '<a href="' . esc_url($link) . '" class="thumb-link woocommerce-LoopProduct-link woocommerce-loop-product__link">';
}

// меняем классы меню футера

add_filter('wp_nav_menu_items', 'change_nav_menu_items', 10, 2);

function change_nav_menu_items($items, $args)
{
    $class = 'navItem_style';

    if ('bottom' == $args->theme_location) {
        $footer_nav_items = str_replace($class, '', $items);
        return $footer_nav_items;
    } else return $items;
}



function malik_widget_init()
{
    register_sidebar(array(
        'name'          => 'Область виджетов',
        'id'            => 'sidebar-1',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
}

function malik_theme_wrapper_start()
{
    echo '<section id = "main">';
}

function malik_theme_wrapper_end()
{
    echo '</section>';
}

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wc_generator');
add_action('get_header', 'my_filter_head');
add_filter('nav_menu_css_class', 'add_my_class_to_nav_menu', 10, 2);
add_filter('nav_menu_submenu_css_class', 'delete_sub_class', 10, 3);
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');
add_filter('excerpt_length', function () {
    return 30;
});

function header_add_to_cart_fragment($fragments)
{
    global $woocommerce;
    ob_start();
?>
<span class="basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
<?php
    $fragments['.basket-btn__counter'] = ob_get_clean();
    return $fragments;
}

function malik_theme_support()
{
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('woocommerce', array(
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 1,
            'max_rows'        => 10,
            'default_columns' => 4,
            'min_columns'     => 1,
            'max_columns'     => 3,
        )
    ));
}

// Register custom metaboxes

add_filter('rwmb_meta_boxes', 'prefix_register_meta_boxes');
require(trailingslashit(get_template_directory()) . 'custom-meta-boxes.php');

// end register custom metaboxes


// Custom comments


function malik_comment($comment, $args, $depth)
{
    if ('div' === $args['style']) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }

    $classes = ' ' . comment_class(empty($args['has_children']) ? '' : 'parent', null, null, false);
?>

<<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
  <?php if ('div' != $args['style']) { ?>
  <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php } ?>
    <div class="comment__avatar">
      <?php echo get_avatar($comment); ?>
    </div>
    <div class="comment__info">
      <div class="comment__author"><?php echo $comment->comment_author; ?></div>
      <div class="comment__meta">
        <div class="comment__time"><?php echo get_comment_date("j M Y") ?></div>
        <div class="comment__reply">
          <?php
                        comment_reply_link(
                            array_merge(
                                $args,
                                array(
                                    'add_below' => $add_below,
                                    'depth'     => $depth,
                                    'max_depth' => $args['max_depth']
                                )
                            )
                        ); ?>
        </div>
      </div>
    </div>

    <?php if ($comment->comment_approved == '0') { ?>
    <em class="comment-awaiting-moderation">
      <?php _e('Your comment is awaiting moderation.'); ?>
    </em><br />
    <?php } ?>

    <?php comment_text(); ?>

    <?php if ('div' != $args['style']) { ?>
  </div>
  <?php }
        }
        // reply comments
        function enqueue_comment_reply()
        {
            if (is_singular())
                wp_enqueue_script('comment-reply');
        }
        add_action('wp_enqueue_scripts', 'enqueue_comment_reply');
        add_filter('comment_form_fields', 'kama_reorder_comment_fields');
        function kama_reorder_comment_fields($fields)
        {
            // die(print_r( $fields )); // посмотрим какие поля есть

            $new_fields = array(); // сюда соберем поля в новом порядке

            $myorder = array('author', 'email', 'url', 'comment'); // нужный порядок

            foreach ($myorder as $key) {
                $new_fields[$key] = $fields[$key];
                unset($fields[$key]);
            }

            // если остались еще какие-то поля добавим их в конец
            if ($fields)
                foreach ($fields as $key => $val)
                    $new_fields[$key] = $val;

            return $new_fields;
        }

        // end reply comments


        add_action('after_setup_theme', 'malik_theme_support');
        function malik_cat__title($category)
        {
        ?>
  <h2 class="main_title">
    <?php
            echo esc_html($category->name);
            ?>
  </h2>
  <?php
        }
        function delete_sub_class($classes, $args, $depth)
        {
            if ($depth === 0) {
                $classes[] = 'navItem_style2';
            }
            $classes[] = 'my_subm';


            return $classes;
        }


        function add_my_class_to_nav_menu($classes, $item)
        {
            $classes[] = 'navItem_style';

            return $classes;
        }

        function my_filter_head()
        {
            remove_action('wp_head', '_admin_bar_bump_cb');
        }

       add_action( "woocommerce_thankyou", "xlwcty_thank_you_script", 20 );

if ( ! function_exists( 'xlwcty_thank_you_script' ) ) {
	function xlwcty_thank_you_script( $order_id ) {
		if ( $order_id > 0 ) {
			$order = wc_get_order( $order_id );
			if ( $order instanceof WC_Order ) {
				$order_id               = $order->get_id(); // order id
				$order_key              = $order->get_order_key(); // order key
				$order_total            = $order->get_total(); // order total
				$order_currency         = $order->get_currency(); // order currency
				$order_payment_method   = $order->get_payment_method(); // order payment method
				$order_shipping_country = $order->get_shipping_country(); // order shipping country
				$order_billing_country  = $order->get_billing_country(); // order billing country
				$order_status           = $order->get_status(); // order status
				/**
				 * full list methods and property that can be accessed from $order object
				 * https://docs.woocommerce.com/wc-apidocs/class-WC_Order.html
				 */
				?>
  <script type="text/javascript">
  console.log('purchazed!')
  _tmr.push({
    type: 'reachGoal',
    id: 3305747,
    goal: 'purchase'
  });
  </script>
  <?php
			}
		}
	}
}

        function style_theme()
        {
            wp_enqueue_script( 'wp-api' );
            wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
            wp_enqueue_style('woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.min.css');
            wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css');
            wp_enqueue_style('other-style', get_template_directory_uri() . '/assets/css/styles.css');
            wp_enqueue_style('slider', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
            wp_enqueue_style('slider-template', get_template_directory_uri() . '/assets/css/owl.theme.default.css');
            wp_enqueue_style('scrolbar', get_template_directory_uri() . '/assets/css/perfect-scrollbar.min.css');
            wp_enqueue_style('backgroundvideo', get_template_directory_uri() . '/assets/css/jquery.background-video.css');
        }
        // Add this to your functions.php
        add_action( 'wp_head', function () { ?>
  <script>
  jQuery(document).ready(function() {
    setTimeout(function() {
      jQuery('#billing_city_field').insertBefore('#billing_address_1_field');
    }, 60);
  });
  </script>
  <?php } );
        add_action('after_setup_theme', function () {
            load_theme_textdomain('malik_shop', get_template_directory() . '/languages');
        });
        function scripts_theme()
        {

            wp_enqueue_script('plugins', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), null, true);
            // wp_enqueue_script('ajax-login-script', get_template_directory_uri() . '/assets/js/ajax_form.js', array('jquery'), null, true);
           
            wp_enqueue_script(
                'slider',
                get_template_directory_uri() . '/assets/js/owl.carousel.min.js',
                array('jquery'),
                null,
                true
            );
            wp_enqueue_script('mainjs', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
            wp_enqueue_script('tags', get_template_directory_uri() . '/assets/js/tags.js',array('jquery'), null, true);
            wp_enqueue_script(
                'scrollbar',
                get_template_directory_uri() . '/assets/js/perfect-scrollbar.min.js',
                array('jquery'),
                null,
                true
            );
        }

    ?>