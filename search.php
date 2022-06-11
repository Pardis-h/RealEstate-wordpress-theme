<?php
get_header();
if (!isset($_GET['post_type'])):
?>
    <main class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <span class="">نتایج جستجو برای:</span>
                    <strong> <?php echo get_search_query() ?> </strong>
                    <!-- /.class -->
                </div>
                <!-- /.col-12 -->
                <div class="col-12 mt-3 mt-lg-0">
                    <div class="row">
                    <?php if (have_posts()):while (have_posts()):the_post(); ?>
                        <div class="col-12 col-sm-4">
                        <?php get_template_part('loop/archive','post'); ?>
                        </div>
                    <!-- /.col-12 col-sm-4 -->
                    <?php  endwhile; endif; ?>
                    </div>
                    <!-- /.row -->
                </div>
                <?php get_template_part('template-parts/pagination'); ?>
            </div>
        </div>
    </main>
<?php   else:
    get_template_part('template-parts/search', 'product');
    get_template_part('template-parts/home-search-filter');
    endif;

get_template_part('template-parts/register-offer'); ?>
<?php  get_footer();