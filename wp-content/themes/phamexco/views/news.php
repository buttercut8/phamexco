<section id="news">
    <div class="product-content">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="introduce-product">
                <a href="https://phamexco.vn/gioi-thieu/"><span>Giới thiệu</span></a>
            </div>
            <div id="list-news" class="owl-carousel owl-theme">
                <?php
                    $posts = get_posts([
                        'numberposts' => 4,
                        'category' => 19
                    ]);

                    if($posts) :
                        foreach($posts as $post):
                            setup_postdata( $post ); ?>
                            <div class="item">
                                <?php the_post_thumbnail() ?>

                                <div class="introduce-product-content">
                                    <span><?php the_title() ?></span>
                                </div>

                            </div>
                <?php   endforeach;
                    endif;
                ?>
            </div>

        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pd-left">
            <div class="refer-product">
                <div class="refer-product-title">
                    <a href="https://phamexco.vn/thong-tin-tham-khao/"><span>Tham khảo</span></a>
                </div>
                <?php
                    $posts = get_posts([
                        'numberposts' => 1,
                        'category' => 20
                    ]);

                    if($posts) :
                        foreach($posts as $key => $post):
                            setup_postdata( $post );
                            if(!$key) : ?>
                                <div class="refer-product-img">
                                    <?php the_post_thumbnail() ?>
                                </div>
                                <div class="refer-product-content">
                                    <a href="<?php the_permalink() ?>">
                                        <span><?php the_title(); ?></span>
                                        <!-- <span><?php echo title(6) ?></span> -->
                                    </a>
                                    <p><?php echo strip_tags(excerpt(13)) ?></p>
                                </div>
                    <?php
                            endif;
                        endforeach;
                    endif; ?>

                <div class="refer-product-content2">
                    <ul>
                <?php
                    $posts = get_posts([
                        'numberposts' => 7,
                        'category' => 20
                    ]);

                    if($posts) :
                        foreach($posts as $key => $post):
                            setup_postdata( $post );
                            if($key) : ?>
                                <li class="refer-product-icon">
                                    <span class="icon-bg"></span>
                                    <a href="<?php the_permalink() ?>">
                                        <span><?php echo catchuoi(get_the_title(), 60); ?> </span>
                                    </a>
                                    <span>(<?php echo date('d-m-Y', strtotime($post->post_date)) ?>)</span>
                                </li>
                    <?php
                            endif;
                        endforeach;
                    endif
                    ?>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</section>
