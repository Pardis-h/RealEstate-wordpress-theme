<div class="card border-0 shadow">
    <div class="card-body">
        <?php get_template_part('template-parts/single-advertising-home-header-info'); ?>
        <div>
            <?php the_content(); ?>
            <hr>
            <br>
            <h5> جزیئات ملک : </h5>
            <div class="mt-4 row">
                <?php
                $building_details=my_get_field('building_details');

                ?>
                <?php foreach ($building_details as $bd): ?>
                    <div class="col-12 mb-3  col-sm-4">
                        <i class="fas fa-check align-middle text-danger ml-1"></i>
                        <small class="ml-4"><?php echo $bd ?></small>
                    </div>
                <?php endforeach; ?>
            </div>
            <hr>
            <br>
            <h5> جزیئات دیگر : </h5>
            <div class="mt-4 row">
                <?php
                $building_other_details=my_get_field('building_other_details');

                ?>
                <?php foreach ($building_other_details as $bod): ?>
                    <div class="col-12 mb-3  col-sm-4">
                        <i class="fas fa-check align-middle text-danger ml-1"></i>
                        <small class="ml-4"><?php echo $bod ?></small>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if (my_get_field('attached_file_doc')||my_get_field('attached_file_pdf')): ?>
            <hr>
            <br>
            <h5> پیوست های ملک : </h5>
            <div class="d-flex flex-column flex-lg-row justify-content-between mt-4">
                <?php if (my_get_field('attached_file_doc')): ?>
                <div class="d-flex justify-content-between align-items-center p-2 download">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/doc.png" class="img-fluid ml-2" alt="doc">
                    <a href="<?php my_the_field('attached_file_doc'); ?>" class="text-danger">
                        <i class="fas fa-download align-middle text-danger"></i>
                        دانلود فایل با فرمت docx. </a>
                </div>
                <?php endif; ?>
                <?php if (my_get_field('attached_file_pdf')): ?>
                <div class="d-flex justify-content-between align-items-center p-2 download">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/pdf.png" class="img-fluid ml-2" alt="doc">
                    <a href="<?php my_the_field('attached_file_pdf'); ?>" class="text-danger">
                        <i class="fas fa-download align-middle text-danger"></i>
                        دانلود فایل با فرمت PDF. </a>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="card shadow border-0 mt-3">
    <div class="card-body">
        <h5> ویژگی های ملک </h5>
        <div class="mt-4 row">
            <?php
            $other_spacification=my_get_field('other_spacification');
            ?>
            <?php foreach ($other_spacification as $key => $os):
                switch ($key){
                    case 'air_conditioner':
                        $key_title='کولر';
                        break;
                    case 'pool':
                        $key_title='استخر';
                        break;
                    case 'stadium':
                        $key_title='باشگاه';
                        break;
                }
                ?>
                <div class="col-12 mb-3  col-sm-4">
                    <small class="ml-4">
                    <i class="fas fa-check align-middle text-danger ml-1"></i>
                    <?php echo $key_title; ?>:
                    <?php echo $os===true ? 'دارد':'ندارد' ?>
                    </small>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="card border-0 shadow mt-3">
    <div class="card-header bg-transparent border-0 d-flex flex-column flex-lg-row justify-content-between align-items-center">
        <h5 class="mb-0"> موقعیت </h5>
        <small class="text-muted"> تهران ، پاسداران </small>
    </div>
    <div class="card-body">
        <?php my_the_field('location'); ?>
    </div>

</div>

<div class="card border-0 shadow-sm mt-3 mb-5">
    <div class="card-header bg-transparent border-0 d-flex flex-column flex-lg-row justify-content-between align-items-center">
        <h5 class="mb-0"> ویدئو ای از خانه </h5>
    </div>
    <div class="card-body">
        <div class="position-relative">
            <?php my_the_field('video'); ?>
        </div>
    </div>
</div>