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
                        <div class="sidebar-title sidebar-title1">
                            <img src="<?php echo get_template_directory_uri() . '/images/traitim.png' ?>" alt="heart">
                            <a href="https://phamexco.vn/category/cham-soc-suc-khoe/"><span>chăm sóc sức khỏe</span></a>
                        </div>
                        <?php if ( is_active_sidebar( 'sidebar-left1' ) ) : ?>
                            <ul class="sidebar-menu">
                                <?php dynamic_sidebar( 'sidebar-left1' ); ?>
                            </ul>
                        <?php endif; ?>
                        <div class="sidebar-title sidebar-title2">
                            <img src="<?php echo get_template_directory_uri() . '/images/matnguoi.png' ?>" alt="">
                            <a href="https://phamexco.vn/category/cham-soc-sac-dep/"><span>chăm sóc sắc đẹp</span></a>
                        </div>

                        <?php if ( is_active_sidebar( 'sidebar-left2' ) ) : ?>
                            <ul class="sidebar-menu">
                                <?php dynamic_sidebar( 'sidebar-left2' ); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                     <div class="title-sp">
                        <div class="breadcrumb_order">
                            <li class="breadcrumb_order1">
                                <a href="https://phamexco.vn/thong-tin-tham-khao/">Thông Tin Tham Khảo</a>
                            </li>
                        </div>

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
                                'posts_per_page' => 5,
                                'paged' => $paged,
                                'category__not_in' => array(38)
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
                                            <?php echo title(12) ?>
                                        </a>
                                    </h4>
                                    <?php if(count(get_the_category($post->ID)) > 1): ?>
                                     <span><?php echo get_the_category($post->ID)[1]->name ?></span>
                                   <?php else: ?>
                                     <span><?php echo get_the_category($post->ID)[0]->name ?></span>
                                   <?php endif ?>
                                    <span class="ct_sp2">- Ngày <?php echo date('d/m/Y', strtotime($post->post_date)) ?></span>
                                    <p><?php echo excerpt(27) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <div class="col-sm-12" id="pagination">
                            <div class="pagination">
                                <?php
                                $total = ceil((int)count(get_posts(['numberposts' => -1])) / $posts_per_page);
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
        </div>
    </section>

<?php get_footer() ?>
