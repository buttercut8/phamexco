<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

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
	<section id="product-detail" class="productDetail">
        <div class="container">
            <div class="row">
                <div class="col-xs-hidden col-sm-3 col-md-3 col-lg-3 sidebar-container">
                    <div class="sidebar-left">
                        <div class="sidebar-title">
                            <img src="<?php echo get_template_directory_uri() . '/images/traitim.png' ?>" alt="heart">
                            <a href="https://phamexco.vn/danh-muc/cham-soc-suc-khoe/"><span>chăm sóc sức khỏe</span></a>
                        </div>
                        <ul class="sidebar-menu">

                            <?php
                            // $categories = get_categories(['parent' => 21]);
														  $categories = get_categories(['taxonomy' => 'product_cat', 'parent' => 7]);
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
                            <a href="https://phamexco.vn/danh-muc/cham-soc-sac-dep/"> <span>chăm sóc sắc đẹp</span></a>
                        </div>
                        <ul class="sidebar-menu">
                            <?php
														$categories = get_categories(['taxonomy' => 'product_cat', 'parent' => 13]);
                            // $categories = get_categories(['parent' => 27]);
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
                <div class="col-lg-9">
                    <div class="col-lg-12 col-xs-12 col-sm-8 col-md-7">
                        <div class="breadcrumb_order products">
                            <li class="breadcrumb_order1">
                                <a href="https://phamexco.vn/tat-ca-cac-san-pham/">Sản Phẩm</a>
                            </li>
                            <li class="breadcrumb_order2">
                                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            </li>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-7">
                        <?php do_action( 'woocommerce_before_main_content' ); ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php wc_get_template_part( 'content', 'single-product' ); ?>
                        <?php endwhile;?>
                        <?php do_action( 'woocommerce_after_main_content' ); ?>
                    </div>
                    <div class="col-xs-hidden col-xs-12 col-sm-offset-3 col-sm-8 col-md-offset-0 col-md-5 sidebar-container" id="sidebar-rig">
                        <div class="sidebar-right">
                            <div class="summary entry-summary">
                                <?php
                                /**
                                 * woocommerce_single_product_summary hook.
                                 *
                                 * @hooked woocommerce_template_single_title - 5
                                 * @hooked woocommerce_template_single_rating - 10
                                 * @hooked woocommerce_template_single_price - 10
                                 * @hooked woocommerce_template_single_excerpt - 20
                                 * @hooked woocommerce_template_single_add_to_cart - 30
                                 * @hooked woocommerce_template_single_meta - 40
                                 * @hooked woocommerce_template_single_sharing - 50
                                 */
                                do_action( 'woocommerce_single_product_summary' );
                                ?>

                            </div><!-- .summary -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="related-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php do_action('woocommerce_related_products') ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
