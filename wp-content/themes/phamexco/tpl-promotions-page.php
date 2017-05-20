<?php
/**
 * template name: Chương trình khuyến mãi
 */

get_header();
?>
<div class="promotionsDetail">

<?php
get_template_part('views/top' , 'header');
get_template_part('views/home' , 'header');
get_template_part('views/banner' , 'main');
?>
<section id="products-by-category" class="promotions">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-md-12 col-lg-12">
                 <div class="col-md-12 col-xs-12 title-sp">
                        <div class="breadcrumb_order">
                            <li class="breadcrumb_order1">
                                <a href="https://phamexco.vn/san-pham-noi-bat/">Chương Trình Khuyến Mãi</a>
                            </li>
                        </div>

                    </div>
                <div class="content-product">
                    <?php
                    $list = array(
                        'post_type' => 'post',
                        'category_name' => 'chuong-trinh-khuyen-mai'
                    );
                    $query = new WP_Query($list);
                    if($query->have_posts()):
                        while($query->have_posts()) : $query->the_post();
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
                                    <?php  $category = get_the_category() ?>
                                    <span><?php echo $category[0]->name ?></span>
                                    <span>- Ngày <?php the_date() ?></span>
                                    <p><?php the_excerpt() ?></p>
                                </div>
                            </div>
                        <?php endwhile; endif ?>

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

</div>

<?php get_footer() ?>
