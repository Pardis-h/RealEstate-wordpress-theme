<!-- Start Footer  -->
<?php  $options=get_option('new_theme_option'); ?>
<footer class="d-print-none">
    <div class="footer-top py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 text-center text-lg-right mb-3">
                    <h6 class="text-white mb-4"> درباره همیار </h6>
                    <p class="text-muted">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                    </p>
                </div>
                <div class="col-12 col-lg-3 text-center text-lg-right mb-3">
                    <h6 class="text-white mb-4"> لینک های مرتبط </h6>
                    <ul class="nav pr-0 flex-column">
                        <li class="nav-item"> <a href="#" class="nav-link text-muted pt-0 pr-0"> درباره ما </a> </li>
                        <li class="nav-item"> <a href="#" class="nav-link text-muted pt-0 pr-0"> تماس با ما </a> </li>
                        <li class="nav-item"> <a href="#" class="nav-link text-muted pt-0 pr-0"> راهنمای مشتریان </a> </li>
                        <li class="nav-item"> <a href="#" class="nav-link text-muted pt-0 pr-0"> قوانین ما </a> </li>
                        <li class="nav-item"> <a href="#" class="nav-link text-muted pt-0 pr-0"> پشتیبانی </a> </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3 text-center text-lg-right mb-3">
                    <h6 class="text-white mb-4"> ارتباط با ما </h6>
                    <p class="d-block text-muted mb-2"><?php if (isset($options['contact_us'])) echo nl2br($options['contact_us']) ?></p>
                </div>
                <div class="col-12 col-lg-3 text-center text-lg-right mb-3">
                    <h6 class="text-white mb-4"> به ما بپیوندید </h6>
                    <div class="follow">
                        <a href="<?php if (isset($options['instagram'])) echo ($options['instagram']) ?>" class="ml-3 text-muted"> <i class="fab fa-instagram align-middle"></i> </a>
                        <a href="#" class="ml-3 text-muted"> <i class="align-middle fab fa-facebook"></i> </a>
                        <a href="#" class="ml-3 text-muted"> <i class="align-middle fab fa-twitter"></i> </a>
                        <a href="#" class="ml-3 text-muted"> <i class="align-middle fab fa-telegram"></i> </a>
                    </div>
                    <h6 class="text-white my-4"> اشتراک گذاری </h6>
                    <div class="follow2 d-flex justify-content-center justify-content-lg-between">

                        <form method="post" action="<?php echo home_url() ?>/?na=s" onsubmit="return newsletter_check(this)">
                            <input type="hidden" name="nlang" value="">
                            <input type="hidden" name="nr" value="widget">
                            <input type="hidden" name="nl[]" value="0">
                           <input  type="email" name="ne"  class="form-control rounded-pill py-3 border-0 d-inline-block" placeholder="ایمیل خود را وارد کنید . . . ">
                                <button class="btn"> <i class="fas fa-chevron-left align-middle"></i> </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3">
        <div class="container">

            <div class="row d-flex flex-column flex-lg-row justify-content-between align-items-center">
                <?php
                if (has_nav_menu('footer')):
                    wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container_class'=>'',
                    'menu_class'=>'nav pr-0 flex-column flex-lg-row text-center',
                    'menu_id' =>'footer_menu'
                ));
                endif;
                ?>
                <p class="mb-0 text-muted mt-2 mt-lg-0">Copyright 2020 - Hamyar Co&copy;</p>
            </div>
        </div>
    </div>

</footer>
<style>
    <?php if (isset($options['footer_color']) && !empty($options['footer_color'])): ?>
    .footer-top{
        background-color: <?php echo $options['footer_color'] ?>;
    }
    <?php endif; ?>
</style>

<!-- End Footer  -->
<?php   wp_footer(); ?>
</body>


</html>
