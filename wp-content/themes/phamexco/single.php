<?php
get_header();
get_template_part('views/top' , 'header');
get_template_part('views/home' , 'header');
get_template_part('views/banner' , 'main');
$catId = get_term_by('name', get_the_category($post->ID)[0]->name, 'product_cat')->term_id;
?>
    <section id="sidebar-content">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-8">
                    <div class="breadcrumb_order">
                        <li class="breadcrumb_order1">
                            <a href="<?php echo get_site_url() . '/thong-tin-tham-khao' ?>">Tham khảo</a>
                        </li>
                        <li class="breadcrumb_order2">
                            <a href=""><?php echo get_the_category($post->ID)[0]->name ?></a>
                        </li>
                        <ul class="social">
                            <li>
                              <a href="mailto:?subject=<?php the_title(); ?>&body=<?php strip_tags(the_excerpt()) ?>">
                                  <img src="<?php the_field('mail_icon', 'option') ?>" alt="Email phamexco">
                              </a>
                            </li>
                            <li class="facebook_single">
                                    <a href="<?php the_field('link_facebook', 'option') ?>" class="share_button">
                                        <img src="<?php the_field('facebook_icon', 'option') ?>" alt="Email phamexco">
                                    </a>
                                    <?php   $url_img = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
                                    <input type="hidden" class="link_fb" value="<?php the_permalink()?>">
                                    <input type="hidden" class="img_fb" value="<?php echo $url_img ?>">
                                    <div class="description_fb hide">
                                        <?php strip_tags(the_excerpt()) ?>
                                    </div>
                                    <input type="hidden" class="name_fb" value="<?php the_title() ?>">
                            </li>
                            <li>
                                <div class="g-plus" data-action="share" data-height="24"></div>
                            </li>
                        </ul>
                    </div>

                    <div class="post-content">
                        <h1><?php echo $post->post_title ?></h1>
                        <span> Ngày <?php echo date('d/m/y', strtotime($post->post_date)) ?></span>
                        <div class="content">
                            <?php echo $post->post_content ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-hidden related-products col-xs-12 col-md-4 sidebar-container event_scroll">
                    <div class="sidebar-title sidebar-pd">
                        <img src="https://phamexco.vn/wp-content/themes/phamexco/images/package.png" alt="">
                        <a href=""><span>Sản phẩm liên quan</span></a>
                    </div>
                    <div class="sidebar-right">
                        <?php
                        $term = get_field('relatedProduct');
                        if($term == null){
                          $posts = get_posts(
                              array(
                                  'post_type' => 'product',
                                  'numberposts' => -1,
                                  "tax_query" =>array(
                                      array(
                                          'taxonomy' => 'product_cat',
                                          'field'    => 'slug',
                                          'terms'    => 'san-pham-lien-quan',
                                      ),
                                  ),
                              )
                          );
                        }else{
                          $arrSlug = array();
                          foreach ($term as $value) {
                            $arrSlug[] = $value->slug;
                          }
                          $posts = get_posts(
                              array(
                                  'post_type' => 'product',
                                  'numberposts' => -1,
                                  "tax_query" =>array(
                                      array(
                                          'taxonomy' => 'relatedProduct',
                                          'field'    => 'slug',
                                          'terms'    => $arrSlug,
                                      ),
                                  ),
                              )
                          );
                        }
                        foreach($posts as $post) :
                            $product = wc_get_product($post->ID); ?>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="product hover-ds">
                                    <div class="hover-ct">

                                    </div>
                                    <div class="product-look hover-none">
                                        <i class="icon-search" aria-hidden="true"></i>
                                            <span>
                                                <a href="<?php the_permalink() ?>">Xem chi tiết</a>
                                            </span>
                                    </div>
                                    <div class="img-pro">
                                        <a href="<?php the_permalink() ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="<?php echo $post->post_title ?>">
                                        </a>
                                    </div>
                                    <div class="pro-description">
                                        <h2>
                                            <a href="<?php the_permalink() ?>"><?php echo $post->post_title ?></a>
                                        </h2>
                                        <strong><?php echo number_format($product->get_sale_price(), 0, ',', '.') . 'đ' ?></strong>
                                        <p><?php echo number_format($product->get_regular_price(), 0, ',', '.') . 'đ' ?></p>
                                        <span class="sale">Giảm: <?php echo number_format($product->get_regular_price() - $product->get_sale_price(), 0, ',', '.') . ' đ'?></span>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer() ?>
