<?php
/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function add_meta_box_function()
{
    $screens = array('advertising_home');
    foreach ($screens as $screen) {
        add_meta_box(
            'meta_box_id',
            'مشخصات خانه',
            'w3g_meta_box_callback',
            $screen,
            'side',//location of meta box: 'normal', 'side', and 'advanced'
            'high', //'high', 'low', 'default'
            '' //secent parameter for calback function. array,Default value: null, array( 'foo' => $var1, 'bar' => $var2 )
        );
    }
}

//add_action('add_meta_boxes', 'add_meta_box_function'); //disable for using acf

/**
 * Prints the box content.
 *
 * @param  WP_Post  $post  The object for the current post/page.
 *
 *function w3g_meta_box_callback( $post , $secend_parameters )
 */
function w3g_meta_box_callback($post)
{

    // Add a nonce field so we can check for it later.
    wp_nonce_field('building_nonce', 'building_nonce');

    /*
     * Use get_post_meta() to retrieve an existing value
     * from the database and use the value for the form.
     */
    $room_no = get_post_meta($post->ID, 'room_no', true);
    $geographical_location = get_post_meta($post->ID, 'geographical_location', true);
    $parking = get_post_meta($post->ID, 'parking', true);
    $building_map = get_post_meta($post->ID, 'building_map', true);
    $video = get_post_meta($post->ID, 'video', true);
    $pictures = get_post_meta($post->ID, 'pictures', true);


    ?>
    <p>
        <label for="">
            تعداد اتاق
            <input type="number" name="room_no" value="<?php echo esc_attr($room_no); ?>">
        </label>
    </p>
    <p>
        <label for="">
            موقعیت
            <input type="text" name="geographical_location" value="<?php echo esc_attr($geographical_location); ?>">
        </label>
    </p>
    <p>
        <label>
           پارکینگ
            <input type="checkbox" name="parking" <?php checked($parking,'on') ?>>
        </label>
    </p>
    <p>
        <label for="">
           نقشه ساختمان
            <?php  echo  misha_image_uploader_field('building_map',$building_map) ?>
        </label>
    </p>

    <p>
        <label for="">
          ویدیو
            <input type="file" name="video" value="<?php echo esc_attr($video); ?>">
        </label>
    </p>
    <p>
        <label for="">
          تصاویر
            <input type="file" name="pictures" value="<?php echo esc_attr($pictures); ?>">
        </label>
    </p>

    <script>
        <!--
        jQuery(function($){
            /*
             * Select/Upload image(s) event
             */
            $('body').on('click', '.misha_upload_image_button', function(e){
                e.preventDefault();

                var button = $(this),
                    custom_uploader = wp.media({
                        title: 'Insert image',
                        library : {
                            // uncomment the next line if you want to attach image to the current post
                            // uploadedTo : wp.media.view.settings.post.id, 
                            type : 'image'
                        },
                        button: {
                            text: 'Use this image' // button label text
                        },
                        multiple: false // for multiple image selection set to true
                    }).on('select', function() { // it also has "open" and "close" events 
                        var attachment = custom_uploader.state().get('selection').first().toJSON();
                        $(button).removeClass('button').html('<img class="true_pre_image" src="' + attachment.url + '" style="max-width:95%;display:block;" />').next().val(attachment.id).next().show();
                        /* if you sen multiple to true, here is some code for getting the image IDs
                        var attachments = frame.state().get('selection'),
                            attachment_ids = new Array(),
                            i = 0;
                        attachments.each(function(attachment) {
                             attachment_ids[i] = attachment['id'];
                            console.log( attachment );
                            i++;
                        });
                        */
                    })
                        .open();
            });

            /*
             * Remove image event
             */
            $('body').on('click', '.misha_remove_image_button', function(){
                $(this).hide().prev().val('').prev().addClass('button').html('Upload image');
                return false;
            });

        });
        //-->
    </script>
<?php
    //echo $secend_parameters['args']['bar'];
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param  int  $post_id  The ID of the post being saved.
 */
function save_meta_box_data_function($post_id)
{

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */
    // Check if our nonce is set.
    if (!isset($_POST['building_nonce'])) {
        return;
    }

    // Verify that the nonce is valid.
    if (!wp_verify_nonce($_POST['building_nonce'], 'building_nonce')) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }


    //check if post type is correct
    if (!isset($_POST['post_type']) || $_POST['post_type'] !== 'advertising_home') {
        return;
    }
    // Check the user's permissions.
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

//برای ذخیره کردن تعداد اتاق
    if (!isset($_POST['room_no']) && empty($_POST['room_no'])) {
        $my_data=0;
    }else{
        $my_data = sanitize_text_field($_POST['room_no']);
    }
    update_post_meta($post_id, 'room_no', $my_data);

//موقعیت جغرافیایی
    if (isset($_POST['geographical_location']) && !empty($_POST['geographical_location'])) {
        $geographical_location = esc_sql( stripslashes($_POST['geographical_location']));
        update_post_meta($post_id, 'geographical_location', $geographical_location);
    }

//parking
    if (isset($_POST['parking']) && !empty($_POST['parking']) && $_POST['parking']==='on') {
        update_post_meta($post_id, 'parking', 'on');
    }else{
        delete_post_meta($post_id,'parking');
    }

//building_map
    if (isset($_POST['building_map']) && !empty($_POST['building_map'])) {
        update_post_meta($post_id, 'building_map', sanitize_text_field($_POST['building_map']));
    }else{
        delete_post_meta($post_id,'building_map');
    }


}

add_action('save_post', 'save_meta_box_data_function');


function misha_include_myuploadscript() {
    /*
     * I recommend to add additional conditions just to not to load the scipts on each page
     * like:
     * if ( !in_array('post-new.php','post.php') ) return;
     */
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
}

add_action( 'admin_enqueue_scripts', 'misha_include_myuploadscript' );


function misha_image_uploader_field( $name, $value = '') {
    $image = ' button">Upload image';
    $image_size = 'full'; // it would be better to use thumbnail size here (150x150 or so)
    $display = 'none'; // display state ot the "Remove image" button

    if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {

        // $image_attributes[0] - image URL
        // $image_attributes[1] - image width
        // $image_attributes[2] - image height

        $image = '"><img src="' . $image_attributes[0] . '" style="max-width:95%;display:block;" />';
        $display = 'inline-block';

    }

    return '
	<div>
		<a href="#" class="misha_upload_image_button' . $image . '</a>
		<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . esc_attr( $value ) . '" />
		<a href="#" class="misha_remove_image_button" style="display:inline-block;display:' . $display . '">Remove image</a>
	</div>';
}