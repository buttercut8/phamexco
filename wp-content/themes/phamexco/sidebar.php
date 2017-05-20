<div class="col-xs-hidden col-sm-3 col-md-3 col-lg-3 sidebar-container col-xs-12">
	<div class="sidebar-left">
        <div class="sidebar-title sidebar-title1">
            <img src="<?php echo get_template_directory_uri() . '/images/traitim.png' ?>" alt="">
            <a href="https://phamexco.vn/danh-muc/cham-soc-suc-khoe/"><span>chăm sóc sức khỏe</span></a>
        </div>
				<?php if ( is_active_sidebar( 'sidebar-left1' ) ) : ?>
						<ul class="sidebar-menu">
								<?php dynamic_sidebar( 'sidebar-left1' ); ?>
						</ul>
				<?php endif; ?>
        <!-- <ul class="sidebar-menu">
            <?php
                if(get_post_type() == 'product' || get_page_template_slug() == 'tpl-all-products.php')
                    $categories = get_categories(['taxonomy' => 'product_cat', 'parent' => 7]);
                else
                    $categories = get_categories(['parent' => 21]);
            ?>
            <?php foreach($categories as $category): ?>
                <li>
                    <img src="<?php echo get_template_directory_uri() . '/images/icon.png' ?>" alt="<?php echo $category->name ?>">
                    <a href="<?php echo get_category_link($category->term_id) ?>">
                        <span><?php echo $category->name ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul> -->
        <div class="sidebar-title sidebar-title2">
            <img src="<?php echo get_template_directory_uri() . '/images/matnguoi.png' ?>" alt="">
             <a href="https://phamexco.vn/danh-muc/cham-soc-sac-dep/"> <span>chăm sóc sắc đẹp</span></a>
        </div>
				<?php if ( is_active_sidebar( 'sidebar-left2' ) ) : ?>
						<ul class="sidebar-menu">
								<?php dynamic_sidebar( 'sidebar-left2' ); ?>
						</ul>
				<?php endif; ?>
        <!-- <ul class="sidebar-menu">
            <?php
                if(get_post_type() == 'product' || get_page_template_slug() == 'tpl-all-products.php')
                    $categories = get_categories(['taxonomy' => 'product_cat', 'parent' => 13]);
                else
                    $categories = get_categories(['parent' => 27]);
            ?>

            <?php foreach($categories as $category): ?>
                <li>
                    <img src="<?php echo get_template_directory_uri() . '/images/icon.png' ?>" alt="<?php echo $category->name ?>">
                    <a href="<?php echo get_category_link($category->term_id) ?>">
                        <span><?php echo $category->name ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul> -->
	</div>
</div>
