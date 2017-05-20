<?php
/*
      Template Name: Dat Hang
*/
get_header() ?>

<body id="order-page">

<div class="main">

    <?php
    get_template_part('views/top' , 'header');
    get_template_part('views/home' , 'header');
    get_template_part('views/slider' , 'header');
 ?>
    <div class="container all_order">
          <div class="row">
            <!-- <?php echo do_shortcode('[woocommerce_cart]'); ?> -->
            <div class="col-md-12 breadcrumb_order">
                  <li class="breadcrumb_order1">
                      <a href="<?php echo get_site_url() ?>">Trang chủ</a>
                  </li>
                   <li class="breadcrumb_order1">
                      <a href="<?php echo get_site_url() ?>">Sản phẩm</a>
                  </li>
                  <li class="breadcrumb_order2">
                      <a href="<?php echo get_site_url() . '/cart' ?>">Đặt hàng</a>
                  </li>
            </div>

    <?php
    if (wc_get_page_id( 'cart' ) == get_the_ID()):?>
    <form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <div class="col-md-12" id="wrapper-order-info">
        <div class="info_order">
            <p class="note"><strong>*</strong> Chưa bao gồm phí giao hàng - Giá bán đã bao gồm thuế VAT - Đơn vị tính: VND</p>
        <table class="table-bordered table-responsive">
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Hình ảnh</td>
                    <td>Tên sản phẩm</td>
                    <td>Số lượng</td>
                    <td>Đơn giá</td>
                    <td>Thành tiền</td>
                    <td>Thao tác</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <?php echo get_the_post_thumbnail($cart_item['product_id']); ?>
                            </td>
                            <td>
                                <?php
                                    if ( ! $product_permalink ) {
                                        echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
                                    } else {
                                        echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    if ( $_product->is_sold_individually() ) {
                                        $product_quantity = sprintf( '1 <input type="text" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                    } else {
                                        $product_quantity = woocommerce_quantity_input( array(
                                            'input_name'  => "cart[{$cart_item_key}][qty]",
                                            'input_value' => $cart_item['quantity'],
                                            'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                            'min_value'   => '0'
                                        ), $_product, false );
                                    }

                                   echo  apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                                ?>
                            </td>
                            <td>
                                <?php
                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

                                ?>
                            </td>
                            <td>
                                <?php
                                    echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );

                                ?>
                            </td>
                            <?php 	do_action( 'woocommerce_cart_contents' ); ?>
                            <td>
                                <?php
                                    echo "<span class='delete-product'>";
                                    echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                        '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">Xóa</a>',
                                        esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
                                        __( 'Remove this item', 'woocommerce' ),
                                        esc_attr( $product_id ),
                                        esc_attr( $_product->get_sku() )
                                    ), $cart_item_key );
                                    echo "</span>";
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    $i++;
                }
                ?>
                <tr class="finish_table">
                    <td colspan="5" class="total_money"><strong style="    display: inline-block;
    text-align: center;
    width: 100%;">Trị giá đơn hàng: </strong></td>
                    <td colspan="2" style="text-align: center;">
                        <span class="value" style="    text-align: center !important;"><?php wc_cart_totals_order_total_html(); ?></span>
                    </td>
                </tr>
            </tbody>
        </table>




        <div class="text-right">


				 <div class="btn-action edit_cart">
                <input type="submit" class="button btn_edit_order" name="update_cart" value="<?php esc_attr_e( 'Sửa', 'woocommerce' ); ?>" />
        </div>
        <script type="text/javascript">
          jQuery(function($){
            var quantity = $(".qty").length;
            if(quantity === 0){
              $(".edit_cart").hide();
            }
          });
        </script>
<?php do_action( 'woocommerce_cart_actions' ); ?>



            <div class="btn-action order-info">
                <a href="<?php echo get_site_url() ?>">Tiếp Tục Mua Hàng</a>
            </div>

            <div class="order-info btn-action">
                <a href="<?php echo get_site_url() . '/checkout' ?>">Điền Thông Tin Đặt Hàng</a>
            </div>


            <?php wp_nonce_field( 'woocommerce-cart' ); ?>



             <?php do_action( 'woocommerce_after_cart_contents' ); ?>

<?php do_action( 'woocommerce_after_cart_table' ); ?>


        </div>
    </div>
    </form>

    <?php endif; ?>
          </div>
    </div>
    </div>
</body>
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function($){
        $('.total-money p strong').html('<?php echo wc_cart_totals_order_total_html()?>');
    })
</script>
