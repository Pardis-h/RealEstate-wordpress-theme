<div class="card border-0 shadow">
    <div class="card-body">
        <h5><?php the_title() ?></h5>
        <?php get_template_part('template-parts/post-content-header-info'); ?>
        <div>
            <?php the_post_thumbnail('large',array('class'=>'img-fluid rounded mb-3')); ?>
            <?php the_content(); ?>
        </div>
    </div>
    <div class="card-footer bg-transparent">
        <?php get_template_part('template-parts/post-content-share-link'); ?>
    </div>
</div>