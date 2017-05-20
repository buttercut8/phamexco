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
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header(); ?>

<body>
<div class="main">

    <?php
    get_template_part('views/top', 'header');
    get_template_part('views/home', 'header');
    get_template_part('views/banner', 'main');
    ?>

    <section id="products-by-category">
        <div class="container">
            <div class="row">

                <?php echo get_template_part('views/sidebarProduct'); ?>

                <div class="col-sm-9 col-md-9">
                    <div class="breadcrumb_order breadcrumb_order-category">
                        <li class="breadcrumb_order1">
                            <a href="<?php echo get_site_url() . '/thong-tin-tham-khao' ?>">Sản phẩm</a>
                        </li>
                         <?php
                            $category = get_queried_object();
                            $category_all = get_the_category();
                            $category_parent = get_category($category->category_parent);
                        ?>
                        <li class="breadcrumb_order2">
                            <a href="<?php echo get_site_url() . '/thong-tin-tham-khao' ?>"><?php echo $category->name; ?></a>
                        </li>
                    </div>
                    <div id="list-products">
                        <?php

                        $paged = 1; //hoặc 0
                        if (get_query_var('paged')) {
                            $paged = get_query_var('paged');
                        } elseif (get_query_var('page')) {
                            $paged = get_query_var('page');
                        }
                        $posts_per_page = get_option("posts_per_page");  //posts per page
                        $big = 999999999;

                        $catId = get_queried_object()->term_id;

                        $posts = get_posts(
                            array(
                                'post_type' => 'product',
                                'numberposts' => -1,
                                'posts_per_page' => $posts_per_page,
                                'paged' => $paged,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                                        'terms' => $catId
                                    )
                                )
                            )
                        );

                        foreach($posts as $post):
                            $product = wc_get_product($post->ID);
                            ?>
                            <div class="item col-sm-4 col-md-4">
                                <div class="product-border">

                                    <?php if($product->get_sale_price()) : ?>
                                        <span>Giảm: <?php echo number_format($product->get_regular_price() - $product->get_sale_price(), 0, ',', '.') . ' đ' ?></span>
                                    <?php endif ?>

                                    <div class="porduct-img <?php if(!$product->get_sale_price()) echo 'no-sale' ?>">
                                        <a href="<?php echo get_permalink($post->ID) ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="<?php echo $post->post_title ?>">
                                        </a>

                                        <div class="product-hover">
                                            <div class="product-bg"></div>
                                            <div class="product-look">
                                                <i class="icon-search" aria-hidden="true"></i>
                                                <span>
                                                    <a href="<?php echo get_permalink($post->ID) ?>">Xem chi tiết</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <p><?php echo $post->post_title ?></p>

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

                        <?php endforeach; ?>
                    </div>
                    <div class="col-sm-12" id="pagination">
                        <div class="pagination">
                            <?php
                            global $wp_query;
                            echo paginate_links( array(
                                'base' => get_pagenum_link(1) . '%_%',
                                'format' => 'page/%#%/',
                                'current' => $paged,
                                'total' => $wp_query->max_num_pages,
                                'prev_text'=>'',
                                'next_text'=>'',
                            ) );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
<?php get_footer(); ?>
