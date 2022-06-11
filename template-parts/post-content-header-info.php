<div class="d-flex my-4">
    <small class="ml-4 text-muted"> <i class="fas fa-user align-middle"> </i> <?php the_author() ?></small>
    <small class="ml-4 text-muted"> <i class="fas fa-calendar align-middle"> </i> <?php the_date(); ?> </small>
    <?php if (function_exists('pvc_get_post_views')): ?>
    <small class="ml-4 text-muted"> <i class="align-middle fas fa-eye"> </i>  بازدید <?php echo pvc_get_post_views( get_the_ID()); ?></small>
    <?php endif; ?>
    <small class="ml-4 text-muted"> <i class="align-middle fas fa-comment"> </i> <?php new_theme_comment_count() ?> </small>
</div>