<div class="col-xs-hidden col-sm-3 col-md-3 col-lg-3 sidebar-container col-xs-12">
	<div class="sidebar-left">
        <div class="sidebar-title">
            <img src="<?php echo get_template_directory_uri() . '/images/traitim.png' ?>" alt="heart">
            <a href="https://phamexco.vn/danh-muc/cham-soc-suc-khoe/"><span>chăm sóc sức khỏe</span></a>
        </div>
        <ul class="sidebar-menu">
            <?php
                if(get_post_type() == 'product' || get_page_template_slug() == 'tpl-all-products.php' || get_page_template_slug() == 'tlp-product-new.php')
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
        </ul>
        <div class="sidebar-title">
            <img src="<?php echo get_template_directory_uri() . '/images/matnguoi.png' ?>" alt="people">
             <a href="https://phamexco.vn/danh-muc/cham-soc-sac-dep/"> <span>chăm sóc sắc đẹp</span></a>
        </div>
        <ul class="sidebar-menu">
            <?php
                if(get_post_type() == 'product' || get_page_template_slug() == 'tpl-all-products.php' || get_page_template_slug() == 'tlp-product-new.php')
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
        </ul>
	</div>
</div>
