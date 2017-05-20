<?php
/**
 * template name: Liên Hệ
 */
get_header();
get_template_part('views/top' , 'header');
get_template_part('views/home' , 'header');
?>
    <section id="lien-he">
        <div class="container">
            <div class="row">
                <div class="title-thanh-cong">
                    <h2 style="color:#3eaa49; text-transform: uppercase;">Yêu cầu của quý khách đã được gửi đi </h2>
                </div>
                <div class="logo-thanh-cong">
                    <img src="<?php echo get_template_directory_uri() . '/images/thanh-cong.PNG' ?>" alt="">
                </div>
                <div class="test-thanh-cong">
                    <h4><strong>Chúng tôi sẽ trả lời trong thời gian sớm nhất!</strong></h4>
                </div>
            </div>
        </div>
    </section>
<?php get_footer() ?>
