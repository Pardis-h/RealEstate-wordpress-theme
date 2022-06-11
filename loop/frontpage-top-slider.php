<?php $options = get_option('new_theme_option'); ?>
<div class="carousel-item">
    <div class="overlay"></div>
    <?php the_post_thumbnail('full',array('class'=>'d-print-none d-block w-100')); ?>
    <div class="carousel-caption d-none d-md-block">
        <h4 class="mb-3"> قیمت : <?php my_the_field('price'); ?> تومان </h4>
        <p> <?php the_title() ?> </p>
        <h5> اتاق : <?php my_the_field('room_nu'); ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; حمام : <?php my_the_field('wc_nu'); ?> </h5>
        <?php if (isset($options['reserve_form_page_id']) && !empty($options['reserve_form_page_id'])) ?>
        <a href="<?php echo get_the_permalink($options['reserve_form_page_id']) ?>" class="btn px-5 py-3 mt-4"> رزور کن !</a>
    </div>
</div>