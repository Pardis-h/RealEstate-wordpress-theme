<?php
get_header();
get_template_part('template-parts/search', 'product');
?>
    <main class="mt-5">
        <div class="container">
            <div class="row">
                <?php get_template_part('template-parts/breadcrumb'); ?>
                <div class="col-12 col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
                <div class="col-12 col-lg-8 mt-3 mt-lg-0">

                    <?php if (have_posts()):while (have_posts()):the_post(); ?>
                        <?php get_template_part('loop/archive','post'); ?>
                    <?php  endwhile; endif; ?>
                    <?php get_template_part('template-parts/archive-pagination'); ?>

                </div>
            </div>
        </div>
    </main>
        <?php get_template_part('template-parts/register-offer'); ?>
<?php  get_footer();