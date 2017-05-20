<section id="slider-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="slider-img">
					<?php  if($post->ID == 17){ ?>
					<img src="<?php echo get_field('banner_tham_khao', 'option') ?>" alt="Banner Phamexco">
					<?php  }elseif($post->ID == 19){ ?>
					<img src="<?php echo get_field('banner_khuyen_mai', 'option') ?>" alt="Banner Phamexco">
					<?php  }elseif($post->ID == 21){ ?>
					<img src="<?php echo get_field('banner_thanh_toan', 'option') ?>" alt="Banner Phamexco">
					<?php  }else{ ?>
					<img src="<?php echo get_field('main_banner', 'option') ?>" alt="Banner Phamexco">
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</section>