<footer id="footer-home">
	<a href="tel:<?php echo get_field('call_phone' , 'option') ?>" class="phone_call"></a>
	<div class="container">
		<div class="row">
			<div class="ft_margin col-sm-4 col-md-4 col-lg-4">
				<div class="footer-logo">
					<?php if(get_field('logo' , 'option')) : ?>
						<img src="<?php echo get_field('logo' , 'option') ?>" alt="Phamexco logo">
					<?php endif ?>
				</div>
				<div class="Company_name column-link-1">
					<?php if(get_field('Company_name' , 'option')) : ?>
						<span><?php echo get_field('Company_name' , 'option') ?></span>
					<?php endif ?>
					</br>
					<img src="<?php echo get_template_directory_uri() . '/images/background5.png' ?>" alt="icon gach">
					<p>Giấy Đăng Ký Kinh Doanh số 0313150500 do Sở Kế Hoạch và Đầu Tư Tp. Hồ Chí Minh cấp ngày 07/03/2015. MST: 0313150500</p>
					<p>GCN đủ điều kiện VSATTP số 52 /2017/ NNPTNT - HCM</p>
				</div>

				<div class="logo-bussiness-footer">
					<div class="logo-bussiness1">
						<a href="  http://www.online.gov.vn/CustomWebsiteDisplay.aspx?DocId=24873" target="_blank">
							<img src="<?php echo get_template_directory_uri() . '/images/logo-bussiness.png' ?>" alt="Phamexco Bussiness">
						</a>
					</div>
				</div>
			</div>
			<div class="hidden-xs col-sm-4 col-md-4 col-lg-4" style="margin-top: 60px;">
				<div class="Company_name column-link">
					<span>thông tin cần biết</span>
					</br>
					<img src="<?php echo get_template_directory_uri() . '/images/background5.png' ?>" alt="icon gach 2">

					<?php if( have_rows('link_column', 'option') ): ?>
						<ul class="slides">
							<?php while( have_rows('link_column', 'option') ): the_row(); ?>
								<li class="slide">
									<a href="<?php the_sub_field('link', 'option') ?>"><?php the_sub_field('title', 'option'); ?></a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>


				</div>
				<div class="logo-bussiness-footer3">
					<script language="JavaScript" type="text/javascript">
					TrustLogo("https://phamexco.vn/wp-content/themes/phamexco/images/comodo.png", "SC5", "none");
					</script>
					<div class="logo-bussiness02">
						<a href="https://ssl.comodo.com/ev-ssl-certificates.php" target="_blank" id="comodoTL">
							<!-- <img src="<?php echo get_template_directory_uri() . '/images/comodo.png' ?>" alt="Phamexco Bussiness"> -->
						</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4 com-info" style="margin-top: 60px;">
				<div class="Company_name">
					<span class="col-xs-hidden contact-info">THÔNG TIN LIÊN HỆ</span>
					<span style="display:none" class="company-name">CÔNG TY TNHH PHAMEX</span>
					<img src="<?php echo get_template_directory_uri() . '/images/background5.png' ?>" alt="icon gach 3">
					<ul>
						<?php if(get_field('addresses' , 'option')) : ?>
							<li><?php echo get_field('addresses' , 'option') ?></li>
						<?php endif ?>
						<li>Tel:
							<?php if(get_field('call_phone' , 'option')) :  ?>
								<span><?php echo get_field('call_phone' , 'option') ?></span>
							<?php endif ?>

							<?php if(get_field('email' , 'option')) : ?>
						<li>Email: <a href="mailto:<?php echo get_field('email' , 'option') ?>" style="color:blue"><?php echo get_field('email' , 'option') ?></a></li>
					<?php endif ?>

						<?php if(get_field('website' , 'option')) : ?>
							<li>Website: <a href="http://phamexco.com/" style="color:blue" target="_blank"><?php echo get_field('website' , 'option') ?> </a></li>
						<?php endif ?>
						</li>

					</ul>
					<div class="logo-bussiness-footer4">
						<div class="logo-bussiness01">
							<?php if(get_field('link_logo_footer_3' , 'option')) : ?>
							<a href="<?php echo get_field('link_logo_footer_3' , 'option') ?>" target="_blank">
								<?php if(get_field('logo_footer_3' , 'option')) : ?>
								<img src="<?php echo get_field('logo_footer_3' , 'option') ?>" alt="Phamexco Bussiness">
								<?php endif ?>
							</a>
							<?php endif ?>
						</div>
					</div>
					<div class="logo-bussiness-footer2">
						<div class="logo-bussiness01">
							<a href="  http://www.online.gov.vn/CustomWebsiteDisplay.aspx?DocId=24873" target="_blank">
								<img src="<?php echo get_template_directory_uri() . '/images/logo-bussiness.png' ?>" alt="Phamexco Bussiness">
							</a>
						</div>
						<div class="logo-bussiness02">
							<a href="  http://www.online.gov.vn/CustomWebsiteDisplay.aspx?DocId=24873" target="_blank">
								<img src="<?php echo get_template_directory_uri() . '/images/comodo.png' ?>" alt="Phamexco Bussiness">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="loadding">
		<div class="img-loadding">
			<img src="<?php echo get_template_directory_uri() . '/images/loadding.gif' ?>" alt="loadding">
		</div>
		<div class="logo-phamexco">
			<img src="<?php echo get_template_directory_uri() . '/images/logo.png' ?>" alt="Logo">
		</div>
	</div>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1591144190912095";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<?php wp_footer(); ?>
</footer>
</div>

</body>
</html>
