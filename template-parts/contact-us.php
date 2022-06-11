<?php
/**
 * Template Name: contact us
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php  get_header(); ?>

<!-- Start Image -->
<img src="img/banner-heade-us.jpg" class="img-fluid" alt="image-asli">
<!-- End Image -->


<main class="mt-5">

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex align-items-stretch mb-3 mb-lg-3">
                <div class="card border-0 shadow right-side-content">
                    <div class="card-body">
                        <p class="mb-1">
                            <strong> <i class="fas fa-info align-middle"></i>  تماس با ما </strong>
                        </p>
                        <small> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. </small>

                        <div class="mt-4">
                            <p class="mb-1">
                                <strong> <i class="fas fa-map-marker align-middle"></i> آدرس </strong>
                            </p>
                            <small> تهران، پاسداران، بوستان دوم، خیابان گیلان غربی، بن بست مریم، پلاک ۲، طبقه اول، واحد ۱ </small>
                        </div>
                        <div class="mt-4">
                            <p class="mb-1">
                                <strong> <i class="fas fa-map-marker align-middle"></i> تلفن </strong>
                            </p>
                            <small> ۰۲۱۷۴۵۵۳۰۰۰ </small>
                        </div>
                        <div class="mt-4">
                            <p class="mb-1">
                                <strong> <i class="fas fa-map-marker align-middle"></i> اینستاگرام </strong>
                            </p>
                            <small class="d-block"> amirdini.it@ </small>

                            <small class="d-block"> hamyar.co@ </small>
                        </div>
                        <div class="mt-4">
                            <p class="mb-1">
                                <strong> <i class="fas fa-map-marker align-middle"></i> ایمیل  </strong>
                            </p>
                            <small class="d-block"> info.dsa1@yahoo.com </small>
                        </div>
                        <div class="mt-4">
                            <p class="mb-1">
                                <strong> <i class="fas fa-map-marker align-middle"></i> به ما بپیوندید  </strong>
                            </p>
                            <a href="#" class="btn text-muted ml-2 bg-light"> <i class="fab fa-instagram align-middle"></i> </a>
                            <a href="#" class="btn text-muted ml-2 bg-light"> <i class="fab fa-facebook align-middle"></i> </a>
                            <a href="#" class="btn text-muted ml-2 bg-light"> <i class="fab fa-telegram align-middle"></i> </a>
                            <a href="#" class="btn text-muted ml-2 bg-light"> <i class="fab fa-twitter align-middle"></i> </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 d-flex align-items-stretch">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <p class="mb-3" style="font-size: 18px;font-weight: 700;"> نظرات خود را همین حالا با ما در میان بگذارید </p>
                        <small> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. </small>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php echo do_shortcode(get_the_content()); ?>
            <?php endwhile;  endif; ?>
                    </div></div></div>
        </div>
    </div>
</main>
<?php get_footer();