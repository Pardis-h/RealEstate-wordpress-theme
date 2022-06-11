<a href="<?php the_permalink(); ?>" class="col-12 col-lg-4 py-4 d-inline-block">
    <div class="card border-0 p-2 custom-card-1 shadow-sm">
        <div class="card-img card-img-custom d-flex">
            <div class="overlay2"></div>
            <?php                         the_post_thumbnail('archive-picture',array('class'=>'img-fluid card-img-top')); ?>
            <div class="overlay-img-card d-flex flex-column justify-content-between p-1">
                <div class="top">
                    <small class="p-1"> برای فروش </small>
                </div>
                <div class="d-flex justify-content-between align-items-center bottom">
                    <div>

                    </div>
                    <div>
                        <p class="mb-0"> <?php my_the_field('price'); ?> <i class="fas fa-dollar-sign"></i></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body py-2 px-1">
            <small class="text-danger mb-2 d-block">  <?php
                if (my_get_field('show_in_special_offer')) echo 'پیشنهاد ویژه';
                ?></small>
            <span href="#" class="d-block text-dark mb-2"><?php the_title() ?></span>
            <small class="text-muted mb-1 d-block"><i class="fas fa-map-marker align-middle"></i>
                <?php my_the_field('address'); ?>
            </small>
            <div>
                <small class="text-muted"> اتاق: 4 </small>
                <small class="mx-3 text-muted"> سرویس بهداشتی: 3 </small>
                <small class="text-muted"> متراژ: 200 متر مربع </small>
            </div>
        </div>
        <div class="card-footer bg-white d-flex justify-content-between align-items-center pb-0 px-1">
            <small class="text-muted"><i class="fas fa-user"></i> امیر دینی </small>
            <small class="text-muted"> 12 سال پیش </small>
        </div>
    </div>
</a>