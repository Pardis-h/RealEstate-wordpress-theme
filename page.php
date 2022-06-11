<?php  get_header(); ?>
<?php get_template_part('template-parts/search','product'); ?>
    <main class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3 mt-lg-0">

                    <?php if (have_posts()):while (have_posts()):the_post(); ?>
                        <?php get_template_part('loop/single','page'); ?>
                    <?php  endwhile; endif; ?>
                </div>
            </div>
        </div>
    </main>
        <?php get_template_part('template-parts/register-offer'); ?>
<?php  get_footer();