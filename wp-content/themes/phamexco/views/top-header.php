<section id="top-header">
	<div class="container">
		<div class="row">
			<div class="col-xs-5">
				<div class="header-left">
					<?php if(get_field('work_time' , 'option')) : ?>
						<span><?php echo get_field('work_time' , 'option') ?></span>
					<?php endif ?>
				</div>
			</div>
			<div class="col-xs-7">
				<div class="header-right hd_static">
					<?php if(get_field('icon' , 'option')) : ?>
						<img src="<?php echo get_field('icon' , 'option') ?>" alt="icon phone">
					<?php endif ?>

					<?php if(get_field('phone' , 'option')) : ?>
						<span class="phone phone-top-header" id="phone"><?php the_field('phone' , 'option') ?></span>
					<?php endif ?>

				</div>
			</div>
		</div>
	</div>
</section>