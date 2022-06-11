<!-- Start Slider -->
<?php
$comments = get_comments();
if ($comments): ?>
<!-- Start Commnets  -->
<div class="comments bg-dark py-5 border-bottom">
    <div class="container">
        <div class="slider2">
            <?php foreach ($comments as $comment):
                get_template_part('loop/frontpage','comments');
            endforeach;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<?php endif; ?>
