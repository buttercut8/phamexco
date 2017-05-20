<div class="slider-product1">
    <div class="col-lg-12">
        <div class="product-title">
            <a href="https://phamexco.vn/san-pham-noi-bat/"><span>Sản phẩm nổi bật</span></a>
        </div>

    </div>
    <div id="list-of-products" class="owl-carousel owl-theme">
        <?php
            $query = new WP_Query([
               'post_type' => 'product',
                'numberposts' => 8,
                'posts_per_page' => 8,
                'meta_query'  =>  [
                    [
                        'key' => '_featured',
                        'value' => 'yes'
                    ]
                ]
            ]);
            while($query->have_posts()) : $query->the_post();
                $product = wc_get_product($post->ID);
        ?>
                <div class="item">
                    <div class="product-border">
                        <?php if($product->get_sale_price()) : ?>
                            <span>Giảm: <?php echo number_format($product->get_regular_price() - $product->get_sale_price(), 0, ',', '.') . ' đ'?></span>
                        <?php endif ?>
                        <div class="porduct-img <?php if(!$product->get_sale_price()) echo 'no-sale' ?>">
                            <a href="<?php the_permalink() ?>">
                                <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="<?php echo $post->post_title ?>">
                            </a>
                            <div class="product-hover">
                                <div class="product-bg"></div>
                                <div class="product-look">
                                    <i class="icon-search" aria-hidden="true"></i>
                                    <span>
                                        <a href="<?php the_permalink() ?>">Xem chi tiết</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p class="pro-title"><?php the_title() ?></p>
                        <div class="product-price">
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
                </div>

        <?php endwhile; ?>
    </div>
</div>
