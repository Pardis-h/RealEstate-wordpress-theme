<div class="col-12 col-lg-4 py-4">
        <div class="card border-0 text-center bg-transparent text-dark commnet-card2 commnet-card3">
            <div class="card-body">
                <img src="<?php echo get_avatar_url(get_the_author_meta('email')) ?>" class="img-fluid d-block mx-auto mb-2 shadow-lg" >
                <p class="mb-1"> <?php comment_author(); ?> </p>
                <small class="d-block">
                    <?php comment_text(); ?>
                </small>
            </div>
        </div>
</div>