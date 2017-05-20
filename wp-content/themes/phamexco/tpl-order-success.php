<?php
/*
      Template Name: Dat Hang Thanh Cong
*/
	get_header();
	get_template_part('views/top' , 'header');
      get_template_part('views/home' , 'header');
 ?>
<div class="container">
      <div class="row">
            <div class="col-md-12">
                  <div class="order_success">
                        <h2>QUÝ KHÁCH ĐÃ ĐẶT HÀNG THÀNH CÔNG</h2>
                        <img src="<?php echo get_template_directory_uri()."/images/order/checked.png" ?>" alt="">
                        <p>Cám ơn quý khách đã đặt hàng tại Phamexco.</p>
                        <p>Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất!</p>
                  </div>
            </div>
      </div>
</div>
<?php get_footer(); ?>
