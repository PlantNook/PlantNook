<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.7.0
 *
 * @var $image_size
 * @var $post_class
 * @var $post_inner_class
 * @var $placeholder_enable
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if (!isset($post_class)) {
    $post_class = G5Plus_Lustria()->woocommerce()->get_product_class();
}
if (!isset($post_inner_class)) {
    $post_inner_class = G5Plus_Lustria()->woocommerce()->get_product_inner_class();
}

?>
<article <?php wc_product_cat_class( $post_class, $category ); ?>>
    <div class="<?php echo esc_attr($post_inner_class); ?>">
        <?php
        /**
         * woocommerce_before_subcategory hook.
         *
         * @hooked woocommerce_template_loop_category_link_open - 10
         */
        do_action( 'woocommerce_before_subcategory', $category );

        /**
         * woocommerce_before_subcategory_title hook.
         *
         * @hooked woocommerce_subcategory_thumbnail - 10
         */
        do_action( 'woocommerce_before_subcategory_title', $category );

        /**
         * woocommerce_shop_loop_subcategory_title hook.
         *
         * @hooked woocommerce_template_loop_category_title - 10
         */
        do_action( 'woocommerce_shop_loop_subcategory_title', $category );

        /**
         * woocommerce_after_subcategory_title hook.
         */
        do_action( 'woocommerce_after_subcategory_title', $category );

        /**
         * woocommerce_after_subcategory hook.
         *
         * @hooked woocommerce_template_loop_category_link_close - 10
         */
        do_action( 'woocommerce_after_subcategory', $category ); ?>
    </div>
</article>
