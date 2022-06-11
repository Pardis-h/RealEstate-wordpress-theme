<a href="<?php the_permalink(); ?>">
    <div class="card- border-0 p-2 shadow mb-2 custom-card-1 hover-card">
            <div class="card-img card-img-custom">
                <?php if (has_post_thumbnail()): ?>
                <div class="overlay4">
                    <a href="<?php the_permalink(); ?>" class="btn"> مشاهده بیشتر </a>
                </div>
                <?php endif; ?>
                <?php if (is_search()){
                    if (has_post_thumbnail()):
                        the_post_thumbnail('archive-picture',array('class'=>'img-fluid card-img-top rounded'));
                    else:
                        echo '<img src="'.get_template_directory_uri().'/assets/img/empty_image-300x200.png">';
                    endif;
                }else{
                    the_post_thumbnail('large',array('class'=>'img-fluid card-img-top rounded'));
                }
                 ?>

            </div>
        <div class="card-body p-2 px-1">
            <a href="<?php the_permalink(); ?>" class="text-dark"> <?php the_title() ?></a>
            <div class="my-2">
                <small class="text-justify d-block">
                    <?php the_excerpt(); ?>
                </small>
            </div>
        </div>
        <div class="card-footer bg-white d-flex justify-content-between align-items-center pb-0 px-1">
            <a href="<?php the_permalink(); ?>" class="btn btn-outline-danger"> <small> <i class="fas fa-chevron-right"></i> </small> ادامه مطلب </a>
            <div>
                <small class="text-muted ml-3"> <i class="fas fa-calendar ml-1"></i> <?php the_date() ?> </small>
                <small class="text-muted ml-3"> <i class="fas fa-user ml-1"></i> <?php the_author() ?> </small>
            </div>
        </div>
    </div>
</a>