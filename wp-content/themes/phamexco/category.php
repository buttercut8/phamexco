<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header() ?>

    <body>

<div class="main">

<?php
get_template_part('views/top' , 'header');
get_template_part('views/home' , 'header');
get_template_part('views/banner' , 'main');
?>
    <section id="products-by-category">
        <div class="container">
            <div class="row">
                <div class="col-xs-hidden col-sm-3 col-md-3 col-lg-3 sidebar-container">
                    <div class="sidebar-left">
                        <div class="sidebar-title">
                            <img src="<?php echo get_template_directory_uri() . '/images/traitim.png' ?>" alt="">
                            <a href="https://phamexco.vn/category/cham-soc-suc-khoe/"><span>chăm sóc sức khỏe</span></a>
                        </div>

                        <ul class="sidebar-menu">

                            <?php
                            if(get_post_type() == 'product' || get_page_template_slug() == 'tpl-all-products.php')
                                $categories = get_categories(['taxonomy' => 'product_cat', 'parent' => 7]);
                            else
                                $categories = get_categories(['parent' => 21]);
                            ?>

                            <?php foreach($categories as $category): ?>
                                <li>
                                    <img src="<?php echo get_template_directory_uri() . '/images/icon.png' ?>" alt="<?php echo $category->name ?>">
                                    <a href="<?php echo get_category_link($category->term_id) ?>">
                                        <span><?php echo $category->name ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <div class="sidebar-title">
                            <img src="<?php echo get_template_directory_uri() . '/images/matnguoi.png' ?>" alt="">
                            <a href="https://phamexco.vn/category/cham-soc-sac-dep/"><span>chăm sóc sắc đẹp</span></a>
                        </div>
                        <ul class="sidebar-menu">
                            <?php
                            if(get_post_type() == 'product' || get_page_template_slug() == 'tpl-all-products.php')
                                $categories = get_categories(['taxonomy' => 'product_cat', 'parent' => 13]);
                            else
                                $categories = get_categories(['parent' => 27]);
                            ?>

                            <?php foreach($categories as $category): ?>
                                <li>
                                    <img src="<?php echo get_template_directory_uri() . '/images/icon.png' ?>" alt="<?php echo $category->name ?>">
                                    <a href="<?php echo get_category_link($category->term_id) ?>">
                                        <span><?php echo $category->name ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                    <div class="breadcrumb_order breadcrumb_order-category">
                        <li class="breadcrumb_order1">
                            <a href="<?php echo get_site_url() . '/thong-tin-tham-khao' ?>">Tham khảo</a>
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
                    <div class="content-product">
                        <?php
                        $catId = get_queried_object_id();

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
                                'numberposts' => -1,
                                'posts_per_page' => 3,
                                'paged' => $paged,
                                'category' => $catId
                            )
                        );

                        foreach($posts as $post):
                            setup_postdata($post);
                            ?>
                            <div class="tmp">
                                <div class="content-img">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_post_thumbnail() ?>
                                    </a>
                                </div>
                                <div class="content">
                                    <h4>
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_title() ?>
                                        </a>
                                    </h4>
                                    <span><?php echo get_cat_name($catId) ?></span>
                                    <span>- Ngày <?php echo date('d/m/Y', strtotime($post->post_date)) ?></span>
                                    <p><?php the_excerpt() ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

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
        </div>
    </section>

<?php get_footer() ?>
