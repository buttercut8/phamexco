<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
    return;
}
//
// if ( ! $related = $product->get_related( $posts_per_page ) ) {
//     return;
// }

$term = get_field('relatedAllProduct');
$arrSlug = array();
foreach ($term as $value) {
  $arrSlug[] = $value->slug;
}
$args = apply_filters( 'woocommerce_related_products_args', array(
    'post_type'            => 'product',
    'ignore_sticky_posts'  => 1,
    'no_found_rows'        => 1,
    'posts_per_page'       => -1,
    "tax_query"            => array(
          array(
              'taxonomy' => 'relatedProduct',
              'field'    => 'slug',
              'terms'    => $arrSlug,
          ),
    ),
    // 'posts_per_page'       => $posts_per_page,
    // 'orderby'              => $orderby,
    // 'post__in'             => $related,
    // 'post__not_in'         => array( $product->id ),
) );

$products     = new WP_Query( $args );
// $woocommerce_loop['name']    = 'related';
// $woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', $columns );

if ( $products->have_posts() ) : ?>

    <div class="related products slider-product1">

        <h2><?php _e( 'Related Products', 'woocommerce' ); ?></h2>
        <div id="list-of-products" class="owl-carousel owl-theme" style="padding-left: 0;">

            <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                <?php
                    $product = wc_get_product(get_the_ID());
                 ?>
                <div class="item">
                    <div class="product-border">
                        <span>Giảm: <?php echo number_format($product->get_regular_price() - $product->get_sale_price(), 0, ',', '.') . ' đ'?></span>

                        <div class="porduct-img <?php if(!$product->get_sale_price()) echo 'no-sale' ?>" >
                            <a href="<?php the_permalink() ?>">
                                <?php the_post_thumbnail() ?>
                            </a>
                            <div class="product-hover">
                                <div class="product-bg"></div>
                                <div class="product-look">
                                    <!-- <i class="icon-search" aria-hidden="true"></i> -->
										<span>
											<a href="<?php the_permalink() ?>">Xem chi tiết</a>
										</span>
                                </div>
                            </div>
                        </div>
                        <p><?php the_title() ?></p>
                        <?php if($product->get_sale_price()) :  ?>
                            <p>
                                <strong><?php echo number_format($product->get_sale_price(), 0, ',', '.') . 'đ' ?></strong>
                            </p>
                            <p class="old-price"><?php echo number_format($product->get_regular_price(), 0, ',', '.') . 'đ' ?></p>
                        <?php else : ?>
                            <p>
                                <strong><?php echo number_format($product->get_regular_price(), 0, ',', '.') . 'đ' ?></strong>
                            </p>
                        <?php endif ?>
                    </div>
                </div>

            <?php endwhile; // end of the loop. ?>
        </div>
    </div>

<?php endif;

wp_reset_postdata();
