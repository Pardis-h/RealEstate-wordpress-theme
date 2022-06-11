<?php  get_header(); ?>
<?php get_template_part('template-parts/search', 'product'); ?>
<?php  get_template_part('template-parts/frontpage','top-slider'); ?>



    <!-- Start Carousel  -->


    <main>
        <?php  get_template_part('template-parts/frontpage','special-offer'); ?>
        <?php  get_template_part('template-parts/frontpage','top-view'); ?>



        <!-- End Carousel  -->


        <!-- Start City  -->
        <?php  get_template_part('template-parts/frontpage','cities-pic'); ?>

        <!-- End City  -->

        <!-- Start Choose  -->
        <?php my_the_field('choice_reason'); ?>

        <!-- End Choose  -->

        <?php  get_template_part('template-parts/frontpage','comments'); ?>

        <?php  get_template_part('template-parts/frontpage','best-price'); ?>




        <!-- Start Blog  -->
        <?php  get_template_part('template-parts/frontpage','website-post'); ?>


        <?php  get_template_part('template-parts/register-offer'); ?>

    </main>

<?php   get_footer();