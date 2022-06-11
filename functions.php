<?php
defined('ABSPATH') || die('no access');

add_theme_support('post-thumbnails');
add_image_size('archive-picture',300,200,true);
add_image_size('home-city-pic-big',730,440,true);
add_image_size('home-city-pic-small',350,440,true);

require_once get_template_directory().'/includes/TGM-Plugin-Activation-2.6.1/new-theme-need-plugins.php';
require_once get_template_directory().'/includes/default-items.php';
require_once get_template_directory().'/includes/search_widget.php';
require_once get_template_directory().'/includes/category_widget.php';
require_once get_template_directory().'/includes/register_sidebar.php';
require_once get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php';
require_once get_template_directory() . '/includes/advertising_post_type.php';
require_once get_template_directory() . '/includes/building_post_meta.php';
require_once get_template_directory() . '/includes/redux-options.php';
require_once get_template_directory() . '/includes/comment-rate.php';


function new_theme_comment_count(){
    $comment_count=get_comment_count();
    if (isset($comment_count['approved'])){
        echo $comment_count['approved'];
    }else{
        echo 0;
    }
    esc_html_e('comment','new-theme');
}


load_textdomain('new-theme',get_template_directory().'/languages/'.determine_locale().'.mo');

function new_theme_enqueue_style(){
/*    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/bootstrap.min.css">*/
/*    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/bootstrap-rtl.css">*/
/*    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/hover-min.css">*/
/*    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/slick.css">*/
/*    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/slick-theme.css">*/
/*    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/style.css">*/
/*    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/all.min.css">*/
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.min.css', false,'4.3.1' );
    wp_enqueue_style( 'bootstrap-rtl-style', get_template_directory_uri().'/assets/css/bootstrap-rtl.css', false,'4.3.1' );
    wp_enqueue_style( 'hover-style', get_template_directory_uri().'/assets/css/hover-min.css', false,'2.3.2' );
    wp_enqueue_style( 'slick-style', get_template_directory_uri().'/assets/css/slick.css', false,'1.0' );
    wp_enqueue_style( 'slick-theme-style', get_template_directory_uri().'/assets/css/slick-theme.css', false,'1.0' );
    wp_enqueue_style( 'new-theme-style', get_template_directory_uri().'/assets/css/style.css', false,'1.1' );
    wp_enqueue_style( 'fontAwesome-style', get_template_directory_uri().'/assets/css/all.min.css', false,'5.11.2' );

    wp_enqueue_script('popper-js',get_template_directory_uri().'/assets/js/popper.min.js',['jquery'],'1',true);
    wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/assets/js/bootstrap.min.js',['popper-js'],'4.3.1',true);
    wp_enqueue_script('slick-js',get_template_directory_uri().'/assets/js/slick.min.js',[],'1',true);
    wp_enqueue_script('font-Awesome-js',get_template_directory_uri().'/assets/js/all.min.js',[],'5.11.2',true);
    wp_enqueue_script('new-theme-js',get_template_directory_uri().'/assets/js/myscripts.js',['jquery','bootstrap-js','slick-js'],'2',true);

    wp_localize_script( 'new-theme-js', 'new_theme_localize', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}
add_action('wp_enqueue_scripts','new_theme_enqueue_style');

//customize my theme comment list
function mytheme_comment($comment, $args, $depth) {
    ?>
    <div <?php comment_class( 'd-flex flex-column flex-lg-row align-items-center mb-4 review '.(empty( $args['has_children'] ) ? '' : 'parent') ); ?> id="comment-<?php comment_ID() ?>">
    <?php
        if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, $args['avatar_size'],'','',['class'=>'img-fluid ml-2'] );
        }
    ?>
    <div>
        <div class="d-flex align-items-center author-title">
            <p class="mb-0"> <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?></p>
    <div class="mr-2" id="commenter-rate">
            <?php
            if ( $rating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
                for ($i = 1; $i <= $rating; $i++) {
                    echo ' <i class="fas fa-star align-middle dashicons-star-filled"></i> ';
                }
            }
            ?>
            </div>
            <div class="reply mr-2"><?php
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'add_below' => 'comment',
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth']
                        )
                    )
                ); ?></div>
    </div>
<?php
    if ( $comment->comment_approved == '0' ) { ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php
    } ?>
    <small class="text-muted d-block" style="font-weight: 300;">
        <?php echo get_comment_date(); ?>
    </small>
    <small><?php comment_text(); ?></small>
    </div>
    </div>
<?php
}


register_nav_menus( array(
    'header'   => __( 'header Menu', 'new-theme' ),
    'header_mobile'=>__('header mobile','new-theme'),
    'footer' => __( 'footer Menu', 'new-theme' )
) );


function my_the_field($parm){
    if (function_exists('the_field'))
        the_field($parm);
    else
        echo 'please install ACF plugin';
}

function my_get_field($parm){
    if (function_exists('get_field'))
        return get_field($parm);
    return 'please install ACF plugin';
}


add_action( 'wp_ajax_nopriv_pt_like_it', 'pt_like_it' );
add_action( 'wp_ajax_pt_like_it', 'pt_like_it' );
function pt_like_it() {

    if ( ! wp_verify_nonce( $_POST['nonce'], 'pt_like_it_nonce' ) || ! isset( $_POST['nonce'] ) ) {
        exit( "you are robot" );
    }

    $likes = get_post_meta( (int)$_POST['post_id'], '_pt_likes', true );
    $likes = ( empty( $likes ) ) ? 0 : $likes;
    $new_likes = $likes + 1;

    update_post_meta((int) $_POST['post_id'], '_pt_likes', $new_likes );

    echo $new_likes;
    die();
}

add_action( 'wp_ajax_nopriv_seller_email_message', 'seller_email_message' );
add_action( 'wp_ajax_seller_email_message', 'seller_email_message' );
function seller_email_message() {
    if ( ! wp_verify_nonce( $_POST['nonce'], 'send_seller_message' ) || ! isset( $_POST['nonce'] ) ) {
        exit( "you are robot" );
    }
    $to=$_POST['author_email'];
    $subject='ایمیل از طرف بازدیدکنندگان خانه';
    $message=sprintf('یک درخواست از طرف فردی به نام %s و با شماره تماس %s و با آدرس ایمیل %s با متن زیر برای شما ارسال شده است
    <br> %s',
        $_POST['comment_name'],$_POST['mobile_number'],$_POST['email'],sanitize_textarea_field($_POST['message']));
    if ((empty($_POST['comment_name']) && empty($_POST['mobile_number']) && empty($_POST['email']) ) || empty($_POST['message']) ){
        wp_send_json_success('اطلاعات ارسالی شما دارای نقص میباشد.');
    }
    wp_mail($to,$subject,$message);
    wp_send_json_success('پیام شما با موفقیت ارسال گردید');
}

add_filter('previous_comments_link_attributes',function ($attr){
    $attr.=' class="btn rounded-circle bg-white" ';
    return $attr;
});
add_filter('next_comments_link_attributes',function ($attr){
    $attr.=' class="btn rounded-circle bg-white" ';
    return $attr;
});


function wpbeginner_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /**	Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /**	Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="row">
    <div class="col-12 mt-5 d-flex justify-content-center">
        <ul class="nav paging pr-0">' . "\n";

    /**	Previous Post Link */
    if ( get_previous_posts_link() )
        echo ' <li class="nav-item mr-1">
                <a href="'. previous_posts( false ).'" class="btn rounded-circle bg-white">
                    <i class="align-middle fas fa-arrow-right"></i>
                </a>
            </li>';

    /**	Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? '  class="active nav-item mr-1"' : '  class="nav-item mr-1 "';

        printf( '<li%s><a href="%s" class="btn rounded-circle bg-white">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /**	Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active nav-item mr-1"' : '  class="nav-item mr-1 " ';
        printf( '<li%s><a href="%s"  class="btn rounded-circle bg-white">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /**	Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active nav-item mr-1"' : '  class="nav-item mr-1 " ';
        printf( '<li%s><a href="%s"  class="btn rounded-circle bg-white">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /**	Next Post Link */
    if ( get_next_posts_link() )
        echo '<li class="nav-item mr-1">
                <a href="'.next_posts( $max, false ) .'" class="btn rounded-circle bg-white">
                    <i class="align-middle fas fa-arrow-left"></i>
                </a>
            </li>';
    echo '</ul>
    </div>
</div>' . "\n";

}
