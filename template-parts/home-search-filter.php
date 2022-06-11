<?php
// args
$args = array(
    'posts_per_page' => -1,
    'post_type' => $_GET['post_type'],
);
$args['meta_query'] = array(
    'relation' => 'AND',
//    array(
//        'key'		=> 'location',
//        'value'		=> 'Melbourne',
//        'compare'	=> '='
//    ),
//    array(
//        'key'		=> 'price',
//        'value'		=> 100,
//        'type'		=> 'NUMERIC',
//        'compare'	=> '>'
//    )
);
if (isset($_GET['price-range']) && !empty($_GET['price-range'])  && $_GET['price-range']!=='false') {
    $price = explode('-', $_GET['price-range']);
    array('20', '100');
    if (isset($price[0]) && !empty($price[0]) && $_GET['price-range'] !== 'false') {
        $args['meta_query'][] = [
            'key' => 'price',
            'value' => (int) $price[0],
            'type' => 'NUMERIC',
            'compare' => '>'
        ];
    }
    if (isset($price[1]) && !empty($price[1]) && $_GET['price-range'] !== 'false') {
        $args['meta_query'][] = [
            'key' => 'price',
            'value' => (int) $price[1],
            'type' => 'NUMERIC',
            'compare' => '<'
        ];
    }
}
if (isset($_GET['room_nu']) && !empty($_GET['room_nu']) && $_GET['room_nu']!=='false') {
    $args['meta_query'][] = [
        'key' => 'room_nu',
        'value' => (int) $_GET['room_nu'],
        'compare' => '='
    ];
}
if (isset($_GET['type']) && !empty($_GET['type']) && $_GET['type']!=='false') {
//    $args['category_name'] =$_GET['type'];
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'building_category',
            'field' => 'slug',
            'terms' => $_GET['type'],
        )
    );
}
//exit();
?>
<main class="mt-5">
    <div class="container">
        <div class="row">

            <?php
            // query
            $posts = get_posts($args);
            if ($posts): ?>
                <div class="col-12 mt-3 mt-lg-0">
                    <div class="row">
                        <?php foreach ($posts as $post):
?>
                        <div class="col-12 col-sm-4">
                            <?php
                            setup_postdata($post);
                            get_template_part('loop/archive-post');
                            ?>
                        </div>
                        <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
                </div>
            </div>
            <?php else: ?>
            هیچ موردی یافت نشد
            <?php endif; ?>
        </div>
    </div>
</main>
