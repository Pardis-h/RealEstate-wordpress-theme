<!-- Start Slider -->
<?php
$args = array(
    'posts_per_page' =>15,
    'post_type' =>'advertising_home',
    'orderby' => 'meta_value_num',
    'order'=>'ASC',
    'meta_key' => 'price' //or whatever your meta_key is

);

$posts = get_posts($args);
if (count($posts)>2): ?>
    <!-- Start Best Value  -->
    <div class="best-value py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center feature text-white">
                    <h5> بهترین قیمت ها </h5>
                    <p> پیشنهادات ویژه تیم ما برای شما </p>
                </div>
            </div>
            <div class="slider1st">
                <div class="slider1">
            <?php foreach ($posts as $post):
                get_template_part('loop/frontpage','3-slide');
            endforeach;
                wp_reset_postdata();
            ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>




<!-- End Best Value  -->