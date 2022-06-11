<div class="infos">
    <a href="#" class="btn btn-light btn-sm hvr-float-shadow"> آپارتمانی </a>
    <a href="#" class="btn btn-light btn-sm hvr-float-shadow"> اتاق : <?php echo get_post_meta(get_the_ID(),'room_no',true) ?> </a>
    <a href="#" class="btn btn-light btn-sm hvr-float-shadow"> سرویس بهداشتی : 3 </a>
    <?php
    $parking='ندارد';
    if (get_post_meta(get_the_ID(),'parking',true)==='on')$parking='دارد';
    ?>
    <a href="#" class="btn btn-light btn-sm hvr-float-shadow"> پارکینگ : <?php echo $parking ?> </a>
</div>
<h5 class="my-4"> توضیحات : </h5>