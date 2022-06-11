<!-- Start Slider -->
<?php
$args = array(
    'posts_per_page' =>3,
    'post_type' =>'post',
);
$posts = get_posts($args);
if ($posts): ?>

    <div class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center feature mb-4">
                    <h5> بلاگ و مقالات </h5>
                    <p> اینجا پایگاه افزایش دانش شماست !! </p>
                </div>
            <?php foreach ($posts as $post):
                get_template_part('loop/frontpage','show-post');
            endforeach;
                wp_reset_postdata();
            ?>
            </div>
        </div>
    </div>
<?php endif; ?>


