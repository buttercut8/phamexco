<?php
/*
  Template Name: All Products
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
    <section id="products-by-category" class="allProducts">
        <div class="container">
            <div class="row">
                <?php echo get_template_part('views/sidebarProduct'); ?>
                <div class="col-xs-12 col-sm-9 col-md-9">
                     <div class="title-sp">
                        <div class="breadcrumb_order">
                            <li class="breadcrumb_order1">
                                <a href="https://phamexco.vn/tat-ca-cac-san-pham/">Tất Cả Sản Phẩm</a>
                            </li>
                        </div>
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
                                'paged' => $paged
                            )
                        );
                        foreach($posts as $post):
                            $product = wc_get_product($post->ID);
                            ?>
                            <div class="item col-xs-6 col-sm-4 col-md-4">
                                <div class="product-border">
                                    <?php if($product->get_sale_price()) : ?>
                                        <span>Giảm: <?php echo number_format($product->get_regular_price() - $product->get_sale_price(), 0, ',', '.') . ' đ' ?></span>
                                    <?php endif ?>
                                    <div class="porduct-img <?php if(!$product->get_sale_price()) echo 'no-sale' ?>">
                                        <a href="<?php echo get_permalink($post->ID) ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="<?php echo $post->post_title ?>">
                                        </a>
                                        <div class="product-hover">
                                            <div class="product-bg" <?php if(!$product->get_sale_price()) echo 'style="height: 275px;"'?>></div>
                                            <div class="product-look">
                                            <span>
                                                <a href="<?php echo get_permalink($post->ID) ?>">Xem chi tiết</a>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="pro-title"><?php echo $post->post_title ?></p>
                                    <?php if($product->get_sale_price()) : ?>
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
                                    $total = ceil((int)count(get_posts(['post_type' => 'product', 'numberposts' => -1])) / $posts_per_page);
                                    echo paginate_links( array(
                                        'base' => get_pagenum_link(1) . '%_%',
                                        'format' => 'page/%#%/',
                                        'current' => $paged,
                                        'total' => $total,
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
