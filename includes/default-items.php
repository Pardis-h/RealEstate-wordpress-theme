<?php
if (isset($_GET['activated']) && is_admin()){
    contact_us_page();


}
function contact_us_page(){
    $new_page_title = 'تماس با ما';
    $new_page_content = 'لطفا از بخش تنظیمات قالب شرت کد یک فرم را برای نمایش در این بخش وارد نمایید.';
    $new_page_template = 'contact-us.php'; //ex. template-custom.php. Leave blank if you don't want a custom page template.

    //don't change the code bellow, unless you know what you're doing

    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
        'post_type' => 'page',
        'post_title' => $new_page_title,
        'post_content' => $new_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
    );
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
        }
    }
}
