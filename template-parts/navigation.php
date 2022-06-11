<div class="my-4 d-flex justify-content-between align-items-center">
    <?php next_posts_link( '
    <div class="d-flex align-items-center right-arrow">
            <p class="display-4 mb-4">
                <i class="fas fa-chevron-circle-right align-middle"></i>
            </p>
            <div class="mr-2">
                <p class="mb-1">  پست بعدی </p>
                <small> چگونه ویندوز نصب کنیم ؟! </small>
            </div>
        </div>
    ' ); ?>
    <?php next_post_link('%link','
    <div class="d-flex align-items-center right-arrow">
            <p class="display-4 mb-4">
                <i class="fas fa-chevron-circle-right align-middle"></i>
            </p>
            <div class="mr-2">
                <p class="mb-1">  پست بعدی </p>
                <small>%title</small>
            </div>
        </div>
    '); ?>
    <?php previous_post_link('%link','
        <div class="d-flex align-items-center right-arrow">
            <div class="ml-2 text-left">
                <p class="mb-1">  پست قبلی </p>
                <small>%title </small>
            </div>
            <p class="display-4 mb-4">
                <i class="fas fa-chevron-circle-left align-middle"></i>
            </p>
        </div>
    '); ?>

</div>