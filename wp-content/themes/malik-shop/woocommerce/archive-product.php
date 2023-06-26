<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('page');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<header class="woocommerce-products-header">
	<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
		<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action('woocommerce_archive_description');
	?>
</header>
<?php
$title = woocommerce_page_title(false);
if($title === "Скидки") {
    ?>
<!--    <div class= 'container'>-->
<!--        <div class='message'>-->
<!--            <p class = 'mb-2'>Сегодня  в MALIK brand стартует <strong>ЧЕРНАЯ ПЯТНИЦА</strong> c 7 по 20 ноября.</p>-->
<!--            <p class = 'mb-2'>Скидки на осенние модели при заказе</p>-->
<!--            <p class="text-success fs-3 mt-1 mb-1">1 платья - 11%</p>-->
<!--            <p class="text-success fs-3 mt-1 mb-1">2 платьев - 16%</p>-->
<!--            <p class="text-success fs-3 mt-1 mb-1">3 платьев - 22%</p>-->
<!--            <p class=" fs-3 mt-1 mb-1">Скидки на все  <span class = 'text-danger fw-bold'>летние модели 25%</span></p>-->
<!--            <p class = 'mb-1'>Сделай себе подарок. Не откладывай возможность порадовать себя и своих близких прекрасным выбором. -->
<!--Коллекции лимитированные - тают на глазах.    </p>-->
<!--            <p class = 'mb-1'>* Цены на платья указаны без учета скидок. Скидка будет применяться при оформлении заказа.</p>-->
<!--        </div>-->
<!--    </div>-->
<?php
};
if (woocommerce_product_loop()) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action('woocommerce_before_shop_loop');
	

	woocommerce_product_loop_start();
	
	if (wc_get_loop_prop('total')) {
		while (have_posts()) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action('woocommerce_shop_loop');

			wc_get_template_part('content', 'product');
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action('woocommerce_after_shop_loop');
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action('woocommerce_no_products_found');
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

get_footer('page');
