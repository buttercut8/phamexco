<?php
/*
      Template Name: Thanh Toan
*/
get_header();
get_template_part('views/top', 'header');
get_template_part('views/home', 'header');
get_template_part('views/slider' , 'header');
?>

<div class="container" id="checkout-page">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <?php echo do_shortcode('[woocommerce_checkout]'); ?>
            <div class="row">
                <div class="col-md-12 breadcrumb_order">
                    <li class="breadcrumb_order1">
                        <a href="<?php echo get_site_url() ?>">Trang chủ</a>
                    </li>
                     <li class="breadcrumb_order1">
                        <a href="<?php echo get_site_url() ?>">Sản phẩm</a>
                    </li>
                    <li class="breadcrumb_order1">
                        <a href="<?php echo get_site_url() . '/cart' ?>">Đặt hàng</a>
                    </li>
                    <li class="breadcrumb_order2">
                        <a href="<?php echo get_site_url() . '/checkout' ?>">Thanh toán</a>
                    </li>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="wrapper-order-info">
                <div class="info_order">
                    <p class="note"><strong>*</strong> Chưa bao gồm phí giao hàng - Giá bán đã bao gồm thuế VAT - Đơn vị tính: VND</p>
        <table class="table-bordered table-responsive">
                    <table class="table-bordered table-responsive">
                        <thead>
                        <tr>
                            <td>STT</td>
                            <td>Tên sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Đơn giá</td>
                            <td>Thành tiền</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                                $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (!$product_permalink) {
                                            echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key) . '&nbsp;';
                                        } else {
                                            echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_title()), $cart_item, $cart_item_key);
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($_product->is_sold_individually()) {
                                            $product_quantity = sprintf('1 <input type="text" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                        } else {
                                            echo $cart_item['quantity'];
                                        }
                                        echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            $i++;
                        }
                        ?>
                        <tr class="finish_table">
                            <td colspan="3" class="total_money"><strong style="display: inline-block;
    text-align: center;
    width: 100%;">Trị giá đơn hàng: </strong>
                            </td>
                            <td colspan="2" style="text-align: center;">
                                <span class="center-bg"><?php wc_cart_totals_order_total_html(); ?></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php
            $i = 1;
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
        ?>
                            <div class="info-order-mobile">
                                <div class="img-des">
                                    <a href="<?php echo $product_permalink ?>">
                                        <?php echo get_the_post_thumbnail($product_id) ?>
                                    </a>
                                </div>
                                <div class="pro-des">
                                    <a href="<?php echo $product_permalink ?>">
                                        <?php echo $_product->get_title() ?>
                                    </a>
                                    <p class="price">
                                        <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );?>
                                    </p>
                                    <div class="quan">
                                        <span><?php echo 'x ' . $cart_item['quantity'] ?></span>
                                    </div>
                                </div>
                            </div>
        <?php
                    endif;
                   $i++;
            endforeach ?>
                </div>
            </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-md-offset-3">
            <div class="contact_order">
                <h3>THÔNG TIN NGƯỜI ĐẶT HÀNG</h3>

                <div class="filed_order">
                    <img src="<?php echo get_template_directory_uri() . "/images/order/people.png" ?>"
                         class="icon_people">
                    <span class="icon_people">*</span>
                    <input type="text" placeholder="Họ và tên" class="form-control placeholder" id="susername"><span class="focus">Focus</span>
                </div>
                <div class="filed_order">
                    <img src="<?php echo get_template_directory_uri() . "/images/order/phone.png" ?>"
                         class="icon_phone">
                    <span class="icon_phone">*</span>
                    <input type="text" placeholder="Số điện thoại" class="form-control placeholder" id="phone_number"><span class="focus">Focus</span>
                </div>
                <div class="filed_order">
                    <img src="<?php echo get_template_directory_uri() . "/images/order/place.png" ?>"
                         class="icon_place">
                    <input type="text" placeholder="Địa chỉ" class="form-control" id="address">
                </div>
                <div class="filed_order">
                    <img src="<?php echo get_template_directory_uri() . "/images/order/write.png" ?>"
                         class="icon_address">
                    <textarea placeholder="Thông tin khác" class="form-control" id="more-info"></textarea>
                </div>
                <div class="filed_last">
                    <span>( <i>*</i> ) thông tin bắt buộc</span>
                    <input type="button" class="btn_order" value="GỬI ĐƠN HÀNG" form="checkout-order">
                </div>
            </div>
        </div>


    </div>
</div>
<script type="text/javascript">
    jQuery(function ($) {
        $(".woocommerce-info").hide();
    });
</script>
<?php get_footer(); ?>
