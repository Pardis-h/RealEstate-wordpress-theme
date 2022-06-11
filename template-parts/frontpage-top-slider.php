<!-- Start Slider -->
<?php
$args = array(
    'posts_per_page' =>4,
    'post_type' =>'advertising_home',
);
$args['meta_query'] = array(
    array(
        'key'		=> 'show_in_home_slider',
        'value'		=> '1',
        'compare'	=> '='
    ),
);
$posts = get_posts($args);
if ($posts): ?>
<div id="carouselExCaption" class="carousel slide d-none d-md-block" data-ride="carousel">
<div class="carousel-inner">
            <?php foreach ($posts as $post):
                get_template_part('loop/frontpage','top-slider');
            endforeach;
                wp_reset_postdata();
            ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExCaption" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"> Pervious </span>
    </a>
    <a class="carousel-control-next" href="#carouselExCaption" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"> Pervious </span>
    </a>
</div>
<?php endif; ?>

<!-- End Slider -->