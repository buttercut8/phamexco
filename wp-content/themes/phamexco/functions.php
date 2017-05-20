<?php
//function set up theme
if(!function_exists("setup_theme_phamexco"))
{
  function setup_theme_phamexco()
  {
      // add title-tag
      add_theme_support("title-tag");
      add_theme_support("automatic-feed-links");
      // add post format
      add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'status',
        'audio',
        'chat',
      ) );
      add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      ) );
      $default_background = array(
        "default-color" => "#6FB7FF"
      );
      add_theme_support("custom-background",$default_background);
      // Add menu
    }
}
add_action("init","setup_theme_phamexco");
function phamexco_body_classes( $classes ) {
if ( get_background_image() ) {
$classes[] = 'custom-background-image';
}
if ( is_multi_author() ) {
$classes[] = 'group-blog';
}
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
$classes[] = 'no-sidebar';
}
if ( ! is_singular() ) {
$classes[] = 'hfeed';
}
return $classes;
}
add_filter( 'body_class', 'phamexco_body_classes' );
function phamexco_widget_tag_cloud_args( $args ) {
$args['largest'] = 1;
$args['smallest'] = 1;
$args['unit'] = 'em';
return $args;
}
add_filter( 'widget_tag_cloud_args', 'phamexco_widget_tag_cloud_args' );






    function phamexco_widgets_init() {
    	register_sidebar( array(
    		'name'          => __( 'Sidebar Sức Khỏe', 'phamexco' ),
    		'id'            => 'sidebar-left1',
    		'description'   => __( 'Main sidebar that appears on the left.', 'phamexco' ),
    		'before_widget' => '<aside id="%1$s" class="sidebarSP widget %2$s">',
    		'after_widget'  => '</aside>',
    	) );
    	register_sidebar( array(
    		'name'          => __( 'Sidebar Sắc Đẹp', 'phamexco' ),
    		'id'            => 'sidebar-left2',
    		'description'   => __( 'Additional sidebar that appears on the left.', 'phamexco' ),
    		'before_widget' => '<aside id="%1$s" class="sidebarSP widget %2$s">',
    		'after_widget'  => '</aside>',
    	) );
    }
    add_action( 'widgets_init', 'phamexco_widgets_init' );



    add_action('wp_enqueue_scripts' , 'theme_css');
    function theme_css(){
        $cssUrl = get_template_directory_uri() . '/css';
        wp_register_style('theme_pt_bootstrap' , $cssUrl . '/bootstrap.min.css');
        wp_enqueue_style('theme_pt_bootstrap');
        wp_register_style('theme_pt_font' , $cssUrl . '/font-awesome.min.css');
        wp_enqueue_style('theme_pt_font');
        wp_register_style('theme_pt_carousel' , $cssUrl . '/owl-carousel.css');
        wp_enqueue_style('theme_pt_carousel');
        wp_register_style('theme_pt_style' , $cssUrl . '/style.css');
        wp_enqueue_style('theme_pt_style');
        wp_register_style('theme_pt_reponsive' , $cssUrl . '/reponsive.css');
         wp_enqueue_style('theme_pt_reponsive');
    }

    add_action('wp_enqueue_scripts', function(){
        $jsUrl = get_template_directory_uri() . '/js';
        wp_register_script('theme_pt_owlcarousel', $jsUrl . '/slider.js', '', false, true);
        wp_enqueue_script('theme_pt_owlcarousel');
        wp_register_script('theme_pt_global', $jsUrl . '/global.js', '', false, true);
        wp_enqueue_script('theme_pt_global');
    });

    register_nav_menus( array(
      'menu_sidebar1'   => __( 'Sản phẩm sidebar sức khỏe', 'phamexco' ),
      'menu_sidebar2'   => __( 'Sản phẩm sidebar sắc đẹp', 'phamexco' ),
    ) );


    if( function_exists('acf_add_options_page') ) {

        $option_page = acf_add_options_page(array(
            'page_title'    => 'Tùy chỉnh giao diện',
            'menu_title'    => 'Tùy chỉnh giao diện',
            'menu_slug'     => 'settings-theme'
        ));
    }
    add_theme_support( 'post-thumbnails' );

    add_action( 'woocommerce_single_product_summary', function(){
        global $product;
        echo '<h2>' . $product->get_attribute('trademark') . '</h2>';
    }, 5 );

    add_action( 'woocommerce_single_product_summary', function(){
        global $product;


        $trademark = get_field('trade_mark', $product->ID) ? '<li><span>Thương hiệu: </span>'. get_field('trade_mark', $product->ID) .'</li>' : '';
        $weight = get_field('weight', $product->ID) ? '<li><span>Trọng lượng: </span>'.get_field('weight', $product->ID).'</li>' : '';
        $packing = get_field('packing', $product->ID) ? '<li><span>Đóng gói: </span>'.get_field('packing', $product->ID).'</li>' : '';
        $expiry = get_field('expiry', $product->ID) ? '<li><span>Hạn sử dụng: </span>'.get_field('expiry', $product->ID).'</li>' : '';
        $madeIn = get_field('madeIn', $product->ID) ? '<li><span>Xuất xứ: </span>'.get_field('madeIn', $product->ID).'</li>' : '';
        if(!$trademark && !$weight && !$packing && !$expiry && !$madeIn){
            return;
        } else {
            echo '<ul class="product-info">' . $trademark . $weight . $packing . $expiry . $madeIn . '</ul>';
        }
    }, 9 );

    function kia_filter_billing_fields($fields){
        unset( $fields["billing_country"] );
        unset( $fields["billing_company"] );
        unset( $fields["billing_address_1"] );
        unset( $fields["billing_email"] );
        unset( $fields["billing_city"] );
        unset( $fields["billing_state"] );
        unset( $fields["billing_postcode"] );
        /*unset( $fields["billing_phone"] );*/
        unset($fields['billing_first_name']);
        return $fields;
    }
    add_filter( 'woocommerce_billing_fields', 'kia_filter_billing_fields' );

    add_action( 'template_redirect', 'wc_custom_redirect_after_purchase' );


    function wc_custom_redirect_after_purchase($order_id) {
        global $wp;
        $phoneFlag = false;
        $nameFlag = false;
        $phone = null;
        $name = null;
        $oderId = $wp->query_vars['order-received'];
        if ( is_checkout() && ! empty($oderId) ) {
            global $wpdb;
            $table = $wpdb->prefix . 'postmeta';
            $sql = 'SELECT * FROM `'. $table . '` WHERE post_id = '. $oderId;
            $customer = new WC_Customer( $oderId );
            $result = $wpdb->get_results($sql);
            foreach($result as $res) {
                if( $res->meta_key == '_billing_phone'){
                    $phone = $res->meta_value;
                }

                if( $res->meta_key == '_billing_last_name'){
                    $name = $res->meta_value;
                }
            }

            sendSms($phone, $name);

            $url = get_site_url() . '/thanh-toan-thanh-cong';
            wp_redirect($url);
            exit;
        }
    }

    function sendSms($phone, $username){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'http://sms.mobifoneplus.vn/api/login.jsp?excludeLayout=true&userName=Phamexco&password=Bottraxanh15');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $sid = curl_exec($ch);
        $sender = 'PHAMEXCO';
        $recipient = $phone;
        $content = "Cam on quy khach da dat hang tai PHAMEXCO. Bo phan ban hang se lien he voi quy khach de xac minh don hang. Xin tran trong cam on.";
        $content = str_replace(" ","%20", $content);

        curl_setopt($ch, CURLOPT_URL, 'http://sms.mobifoneplus.vn/api/send.jsp?excludeLayout=true&sid=' . $sid . '&sender=' . $sender . '&recipient=' . $recipient . '&content=' . $content . '&type=1');

        curl_exec($ch);

        curl_close($ch);
    }

    function excerpt($limit) {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).'...';
        } else {
            $excerpt = implode(" ",$excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
        return $excerpt;
    }

    function title($limit) {
        $title = explode(' ', get_the_title(), $limit);
        if (count($title)>=$limit) {
            array_pop($title);
            $title = implode(" ",$title).'...';
        } else {
            $title = implode(" ",$title);
        }
        $title = preg_replace('`[[^]]*]`','',$title);
        return $title;
    }

    add_action( 'after_setup_theme', 'register_my_menu' );
    function register_my_menu() {
        register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
    }

    function catchuoi($chuoi, $gioihan)
    {

    // nếu độ dài chuỗi nhỏ hơn hay bằng vị trí cắt
    // thì không thay đổi chuỗi ban đầu

    if (strlen($chuoi) <= $gioihan)
        {
        return $chuoi;
        }
      else
        {
        /*
        so sánh vị trí cắt
        với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
        nếu vị trí khoảng trắng lớn hơn
        thì cắt chuỗi tại vị trí khoảng trắng đó
        */
        if (strpos($chuoi, " ", $gioihan) > $gioihan)
            {
            $new_gioihan = strpos($chuoi, " ", $gioihan);
            $new_chuoi = substr($chuoi, 0, $new_gioihan) . "...";
            return $new_chuoi;
            }

        // trường hợp còn lại không ảnh hưởng tới kết quả

        $new_chuoi = substr($chuoi, 0, $gioihan) . "...";
        return $new_chuoi;
        }
    }

add_action( 'init', 'create_Orthers_taxonomies', 0 );
function create_Orthers_taxonomies() {
$labels = array(
  'name'              => _x( 'Các thuộc tính khác ', 'taxonomy general name', 'phamexco' ),
  'singular_name'     => _x( 'Item', 'taxonomy singular name', 'phamexco' ),
  'search_items'      => __( 'Tìm kiếm thuộc tính', 'phamexco' ),
  'all_items'         => __( 'All Item', 'phamexco' ),
  'parent_item'       => __( 'Parent Item', 'phamexco' ),
  'parent_item_colon' => __( 'Parent Item:', 'phamexco' ),
  'edit_item'         => __( 'Edit Item', 'phamexco' ),
  'update_item'       => __( 'Update Item', 'phamexco' ),
  'add_new_item'      => __( 'Thêm thuộc tính', 'phamexco' ),
  'new_item_name'     => __( 'New Item Name', 'phamexco' ),
  'menu_name'         => __( 'Khác', 'phamexco' ),
);
$args = array(
  'hierarchical'      => true,
  'labels'            => $labels,
  'show_ui'           => true,
  'show_admin_column' => true,
  'query_var'         => true,
  'rewrite'           => array( 'slug' => 'orthers' ),
);
register_taxonomy( 'orthers','product', $args );
}
add_action( 'init', 'create_Related_taxonomies', 0 );
function create_Related_taxonomies() {
$labels = array(
  'name'              => _x( 'Sản phẩm ', 'taxonomy general name', 'phamexco' ),
  'singular_name'     => _x( 'Sản phẩm', 'taxonomy singular name', 'phamexco' ),
  'search_items'      => __( 'Tìm kiếm sản phẩm', 'phamexco' ),
  'all_items'         => __( 'Tất cả sản phẩm', 'phamexco' ),
  'parent_item'       => __( 'Sản phẩm cha', 'phamexco' ),
  'parent_item_colon' => __( 'Sản phẩm cha:', 'phamexco' ),
  'edit_item'         => __( 'Edit Item', 'phamexco' ),
  'update_item'       => __( 'Update Item', 'phamexco' ),
  'add_new_item'      => __( 'Thêm sản phẩm', 'phamexco' ),
  'new_item_name'     => __( 'sản phẩm mới', 'phamexco' ),
  'menu_name'         => __( 'Sản phẩm liên quan', 'phamexco' ),
);
$args = array(
  'hierarchical'      => true,
  'labels'            => $labels,
  'show_ui'           => true,
  'show_admin_column' => true,
  'query_var'         => true,
  'rewrite'           => array( 'slug' => 'relatedProduct' ),
);
register_taxonomy( 'relatedProduct','product', $args );
}
