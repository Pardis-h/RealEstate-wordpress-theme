<?php   $cities=my_get_field('cities_pic');
if (!isset($cities['city1']) || !isset($cities['city2'])) return;
$term1=get_term_by('id',  $cities['city1']['taxonomy'], 'building_category');
$term2=get_term_by('id',  $cities['city2']['taxonomy'], 'building_category');

?>
<div class="images my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 d-flex align-items-stretch">
                <a href="<?php echo get_term_link($term1->slug, 'building_category') ?>" class="mb-3">
                    <div class="city-images">
                        <img src="<?php echo $cities['city1']['pic'] ?>" class="img-fluid" alt="city1">
                        <div class="overlay3"></div>
                        <div class="overlaytext">
                        <p class="mb-0"> استان <?php echo $cities['city1']['city_name'] ?> </p>
                            <small>
                                موارد موجود :
                                <?php echo $term1->count ?>
                                مورد </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-lg-4 d-flex align-items-stretch">
            <a href="<?php echo get_term_link($term2->slug, 'building_category') ?>" class="mb-3">
                    <div class="city-images city-images2">
                        <img src="<?php echo $cities['city2']['pic'] ?>" class="img-fluid" alt="city2">
                        <div class="overlay3"></div>
                        <div class="overlaytext">
                            <p class="mb-0">  استان <?php echo $cities['city2']['city_name'] ?></p>
                            <small> موارد موجود : <?php echo $term2->count ?> مورد </small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
