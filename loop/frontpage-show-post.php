<div class="col-12 col-lg-4">
    <div class="card border-0 p-2 custom-card-1 shadow-sm mb-2 mb-lg-0 hover-card">
        <div class="card-img card-img-custom">
            <div class="overlay4">
                <a href="<?php the_permalink(); ?>" class="btn"> مشاهده بیشتر </a>
            </div>
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/code.jpg" class="img-fluid card-img-top" alt="blog1">
        </div>
        <div class="card-body py-2 px-1">

        <small class="text-danger mb-2 d-block" style="font-family: yekan bakh light;"> موضوع :
            <?php $terms = get_the_terms( get_the_ID(), 'post_tag' );
            if (!empty($terms)){
                foreach ($terms as $term){
                    echo '#'.$term->name;
                }
            }

            ?></small>
            <a href="#" class="d-block text-dark mb-2" style="font-family: yekan bakh fat;font-size: 17px;"> <?php the_title() ?></a>
        </div>
        <div class="card-footer bg-white d-flex justify-content-between align-items-center pb-0 px-1">
            <small class="text-muted"><i class="fas fa-user"></i> <?php the_author() ?> </small>
            <small class="text-muted"> <?php if (function_exists('pvc_get_post_views')) echo pvc_get_post_views( get_the_ID()); ?> بازدید </small>
        </div>
    </div>
</div>