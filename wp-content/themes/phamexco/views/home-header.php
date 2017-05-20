<section id="home-header">
    <div class="container">
        <div class="row">
            <div class="banner-header col-sm-12 col-md-12">
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="logo">
                        <?php if(get_field('logo' , 'option')) : ?>
                            <a href="<?php echo get_site_url() ?>">
                                <img src="<?php echo get_field('logo' , 'option') ?>" alt="Phamexco">
                                <script>
                                    if(jQuery(window).width() < 768){
                                        jQuery('.logo img').attr('src', '<?php echo get_template_directory_uri() . '/images/logo-mobile.png'?>')
                                    }
                                </script>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-xs-hidden col-sm-5 col-md-5 col-lg-5" style="display: none">
                    <div class="header-right">
                        <div class="col-icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>


                        <?php if(get_field('phone' , 'option')) : ?>
                            <span class="phone"><?php the_field('phone' , 'option') ?></span>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2" style="display: none">
                    <div class="all-category">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <span>Tất cả danh mục</span>
                    </div>
                </div>
                <div class="col-xs-hidden col-sm-3 col-md-3 col-lg-3">
                    <div class="service">
                        <div class="purchase-img">
                            <img class="special_img" src="<?php echo get_template_directory_uri().'/images/huychuong.png'?>" alt="">
                        </div>
                        <div class="purchase-content">
                            <span>mua hàng tại phamexco</span>
                            <p>Uy tín chất lượng</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-hidden col-sm-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="service">
                        <div class="purchase-img">
                            <img src="<?php echo get_template_directory_uri().'/images/tietkiem.png'?>" alt="">
                        </div>
                        <div class="purchase-content">
                            <span>tiết kiệm hơn</span>
                            <p>Giá rẻ nhất thị trường</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-hidden col-sm-3 col-md-3 col-lg-3">
                    <div class="service">
                        <div class="purchase-img">
                            <img src="<?php echo get_template_directory_uri().'/images/xetai.png'?>" alt="">
                        </div>
                        <div class="purchase-content">
                            <span>giao hàng toàn quốc</span>
                            <p>Thanh toán khi nhận hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2" id="cart-info" style="display: none">
                    <div class="cart">
                        <?php global $woocommerce; ?>
                        <a href="<?php echo $woocommerce->cart->get_cart_url() ?>">
                            <img src="<?php echo get_template_directory_uri() . '/images/giohang.png' ?>" alt="giỏ hàng">
                        </a>
                        <a href="<?php echo $woocommerce->cart->get_cart_url() ?>">Giỏ hàng</a>
					 	<span>
							<?php echo $woocommerce->cart->cart_contents_count; ?>
						</span>
                        <?php $listOrders = WC()->cart->get_cart() ?>
                        <?php if($listOrders) :  ?>
                            <ul class="list-order">
                                <?php foreach($listOrders as $cart_item_key => $cart_item) : ?>
                                    <li>
                                        <div class="clel">
                                            <a href="<?php echo WC()->cart->get_remove_url( $cart_item_key ) ?>">X</a>
                                        </div>
                                        <div class="img-pro">
                                            <a href="<?php echo get_permalink($cart_item->product_id) ?>">
                                                <?php echo get_the_post_thumbnail($cart_item['product_id']); ?>
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <a href="<?php echo get_permalink($cart_item->product_id) ?>">
                                                <?php echo $cart_item['data']->post->post_title ?>
                                            </a>
                                            <p>
                                                <?php echo $cart_item['quantity'] . ' x '  . number_format($cart_item['data']->price, 0, ',', '.') . 'đ' ?>
                                            </p>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                <li class="total-money">
                                    <p>
                                        <span class="total_span">Tổng Cộng: </span>
                                        <strong class="value-tien"><?php echo number_format(WC()->cart->total, 0, ',', '.') . 'đ'; ?></strong>
                                    </p>
                                </li>
                                <li class="btn-checkout">
                                    <a href="<?php echo get_site_url() . '/checkout' ?>">Thanh toán</a>
                                </li>
                            </ul>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="menu-header">
                <div class="col-xs-hidden col-sm-10 col-md-10 col-lg-10">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary'
                    ])
                    ?>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <div class="cart active">
                        <?php global $woocommerce; ?>
                        <img src="<?php echo get_template_directory_uri() . '/images/giohang.png' ?>" alt="giỏ hàng">
                        <a href="<?php echo $woocommerce->cart->get_cart_url() ?>">Giỏ hàng</a>
					 	<span>
							<?php echo $woocommerce->cart->cart_contents_count; ?>

						</span>
                        <?php $listOrders = WC()->cart->get_cart() ?>
                        <?php if($listOrders) :  ?>
                            <ul class="list-order">
                                <?php foreach($listOrders as $cart_item_key => $cart_item) : ?>
                                    <li>
                                        <div class="clel">
                                            <a href="<?php echo WC()->cart->get_remove_url( $cart_item_key ) ?>">X</a>
                                        </div>
                                        <div class="img-pro">
                                            <a href="<?php echo get_permalink($cart_item->product_id) ?>">
                                                <?php echo get_the_post_thumbnail($cart_item['product_id']); ?>
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <a href="<?php echo get_permalink($cart_item->product_id) ?>">
                                                <?php echo $cart_item['data']->post->post_title ?>
                                            </a>
                                            <p>
                                                <?php echo $cart_item['quantity'] . ' x '  . number_format($cart_item['data']->price, 0, ',', '.') . 'đ' ?>
                                            </p>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                <li class="total-money">
                                    <p>
                                        <span class="total_span">Tổng Cộng: </span>
                                        <strong class="value-tien"><?php echo number_format(WC()->cart->total, 0, ',', '.') . 'đ'; ?></strong>
                                    </p>
                                </li>
                                <li class="btn-checkout">
                                    <a href="<?php echo get_site_url() . '/checkout' ?>">Thanh toán</a>
                                </li>
                            </ul>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
