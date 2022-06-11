<?php  get_header(); ?>
<?php get_template_part('template-parts/search','product'); ?>
    <!-- Start Image -->
<?php

the_post_thumbnail('full',array('class'=>'img-fluid d-print-none'));
?>
    <!-- End Image -->
    <main class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 bg-transparent">
                        <div class="card-body px-0 d-flex flex-column flex-lg-row justify-content-center justify-content-between text-center align-items-center text-lg-right">
                            <div>
                                <h5 class="mt-2" style="font-size: 21px; font-weight: 900;"><?php the_title() ?></h5>
                                <small> <?php my_the_field('address') ?> </small>
                            </div>
                            <div class="d-flex align-items-center ico-printer d-print-none">
                                <h5 class="mb-0 ml-2" style="font-size: 21px; font-weight: 900;"> <?php my_the_field('price'); ?>تومان  </h5>
                                <a href="#" class="btn btn-info mr-2 pt-like-it" data-id="<?php the_ID(); ?>" data-nonce="<?php echo wp_create_nonce( 'pt_like_it_nonce' ); ?>"> <i class="align-middle fas fa-heart"></i> </a>
                                <a href="#" class="btn btn-info mr-2" data-toggle="modal" data-target="#home-share-btn"> <i class="align-middle fas fa-share-alt"></i> </a>
                                <a href="javascript:window.print()" class="btn btn-info mr-2"> <i class="align-middle fas fa-print"></i> </a>
                            </div>
                            <div class="modal fade mt-100" id="home-share-btn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content col-12">
                                        <div class="modal-header">
                                            <h5 class="modal-title">به اشتراک گذاری</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="icon-container2 d-flex">
                                                <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_permalink()); ?>" class="smd"><div class=""> <i class="img-thumbnail fab  fa-twitter fa-2x" style="color: #00acee ;background-color: #c7e8f5 ;"></i>
                                                    <p>twitter</p>
                                                </div>
                                                </a>
                                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" class="smd"> <div class="smd"> <i class="img-thumbnail fab fa-facebook-messenger fa-2x" style="color: #3b5998;background-color: #eceff5;"></i>
                                                    <p>Facebook</p>
                                                </div>
                                                </a>
                                                <a target="_blank" href="https://telegram.me/share/url?url=<?php echo urlencode(get_permalink()); ?>&text=<?php the_title() ?>" class="smd"> <div class=""> <i class="img-thumbnail fab fa-telegram fa-2x" style="color: #4c6ef5;background-color: aliceblue"></i>
                                                    <p>Telegram</p>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-8 mt-3 mt-lg-0">

                    <?php if (have_posts()):while (have_posts()):the_post(); ?>
                        <?php get_template_part('loop/single','advertising-home'); ?>
                    <?php  endwhile; endif; ?>
                    <?php get_template_part('template-parts/comment'); ?>
                </div>
                </div>
                <div class="col-12 col-lg-4">
                    <?php get_sidebar('advertising_home'); ?>
                </div>
            </div>
        </div>
    </main>
        <?php get_template_part('template-parts/register-offer'); ?>
<?php  get_footer();