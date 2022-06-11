<div id="sidebar-primary" class="sidebar d-print-none">
    <?php if (is_archive()){
        dynamic_sidebar( 'mytheme_advertising_home_archive_sidebar' );
    }else{
        ?>
        <div class="card border-0 shadow mb-3">
            <div class="card-header border-0 bg-transparent">
                <p> فروشنده : </p>
                <div class="d-flex flex-column flex-lg-row text-center text-lg-right align-items-center">

                    <img src="<?php echo get_avatar_url(get_the_author_meta('email')) ?>" class="img-fluid" alt="foroshande" style="width: 8em;border-radius: 10px;">
                    <div class="mr-lg-2">
                        <small class="d-block text-muted"><?php the_author_meta('display_name'); ?> </small>
                        <small class="d-block text-muted"> <?php the_author_meta('email'); ?> </small>
                        <a href="<?php
                        global $authordata;
                        echo get_author_posts_url($authordata->ID) ?>" class="text-danger"><small> مشاهده تمام خانه های من </small> </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="search" id="send_message_to_seller" >
                    <?php wp_nonce_field('send_seller_message') ?>
                    <input type="hidden" name="author_email" value="<?php the_author_meta('email') ?>">
                    <div class="form-group">
                        <input type="text" name="comment_name" class="form-control" placeholder="نام و نام خانوادگی">
                    </div>
                    <div class="form-group">
                        <input type="number" name="mobile_number" class="form-control" placeholder="شماره موبایل">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="ایمیل">
                    </div>
                    <div class="form-group">
                        <textarea name="message" cols="30" rows="10" class="form-control" placeholder="پیام شما . . . " style="resize: none;"></textarea>
                    </div>
                    <input type="submit" class="btn btn-block" value="ارسال پیام" name="cff">
                </form>
            </div>
        </div>
        <div class="card border-0 shadow">
            <div class="card-header bg-transparent border-0 pb-1">
                <h6> جستجوی پیشرفته </h6>
            </div>
            <div class="card-body">
                <form class="search" action="<?php echo home_url(); ?>" method="get">
                    <input type="hidden" name="post_type" value="advertising_home">
                    <div class="form-group">
                        <input type="text" name="s" class="form-control" placeholder="کلمه کلیدی">
                    </div>
                    <div class="form-group op-font">
                        <select class="custom-select" name="type" style="font-weight: 300 !important;">
                            <option selected value="false"> نوع ملک </option>
                            <option value="آپارتمان">  آپارتمان </option>
                            <option value="ویلایی"> ویلایی  </option>
                            <option value="تجاری"> تجاری </option>
                        </select>
                    </div>
                    <div class="form-group op-font">
                        <select class="custom-select" name="price-range" style="font-weight: 300 !important;">
                            <option selected value="false"> میزان قیمت </option>
                            <option value="250-750"> از 250 میلیون تا 750 میلیون </option>
                            <option value="750-1000"> از 750 میلیون تا 1 میلیارد  </option>
                            <option value="1000-">  بیش از 1 میلیارد </option>
                        </select>
                    </div>
                    <div class="form-group op-font">
                        <select class="custom-select" name="room_nu" style="font-weight: 300 !important;">
                            <option selected value="false"> تعداد اتاق خواب  </option>
                            <option value="1">  1 اتاق خواب </option>
                            <option value="2"> 2 اتاق خواب  </option>
                            <option value="3"> 3 اتاق خواب </option>
                        </select>
                    </div>
                    <div class="form-group op-font">
                        <select class="custom-select" style="font-weight: 300 !important;">
                            <option selected value="false"> تعداد سرویس بهداشتی  </option>
                            <option>  1 سرویس بهداشتی </option>
                            <option> 2 سرویس بهداشتی  </option>
                            <option> بیش از 3 سرویس بهداشتی </option>
                        </select>
                    </div>
                    <div class="form-group op-font">
                        <select class="custom-select" style="font-weight: 300 !important;">
                            <option selected value="false"> پارکینگ  </option>
                            <option value="1">  دارد </option>
                            <option value="0"> ندارد  </option>
                        </select>
                    </div>
                    <div class="form-group op-font">
                        <select class="custom-select" style="font-weight: 300 !important;">
                            <option selected> سال ساخت  </option>
                            <option>  1370 </option>
                            <option>  1371 </option>
                            <option>  1372 </option>
                            <option>  1373 </option>
                            <option>  1374 </option>
                            <option>  1375 </option>
                            <option>  1376 </option>
                            <option>  1377 </option>
                            <option>  1378 </option>
                            <option>  1379 </option>
                            <option>  1380 </option>
                            <option>  1381 </option>
                            <option>  ... </option>
                            <option>  1399 </option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-lg-6">
                            <input type="text" class="form-control" placeholder="از منطقه">
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <input type="text" class="form-control" placeholder="از منطقه">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-block" name="submit" value="جستجو">
                </form>
            </div>
        </div>
    <?php
        dynamic_sidebar( 'mytheme_advertising_home_sidebar' );
    }
    ?>
</div>