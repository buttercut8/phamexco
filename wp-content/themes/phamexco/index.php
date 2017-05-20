<?php get_header(); ?>
<body <?php body_class(); ?>>

	<div class="main">
	<?php
		get_template_part('views/top' , 'header');
		get_template_part('views/home' , 'header');
	 ?>
	 <section id="slider-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="slider-img">
					<img src="<?php echo get_field('banner_trang_chu', 'option') ?>" alt="Banner Phamexco">
				</div>
			</div>
		</div>
	</div>
</section>
	<section id="slider-product">
		<div class="container">
			<div class="row">
				<?php get_template_part('views/slider' , 'product1'); ?>
				<?php get_template_part('views/news') ?>
			</div>
		</div>
	</section>
</div>
<?php get_footer() ?>
