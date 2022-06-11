<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    $args = array(
        'title_reply_before' => '<div class="card-header bg-transparent pb-0"> <h6 class="mb-3 d-block">',
        'title_reply_after' => '<div class="card-body reviwe2">',

        'fields' => apply_filters('comment_form_default_fields', array(
            'author' => sprintf('<div class="form-group"><input type="text" class="form-control"  name="author"  placeholder="%s" value="%s"></div>',
                esc_html__('your name', 'new-theme'), esc_attr($commenter['comment_author'])),
            'email' => sprintf('<div class="form-group"><input type="email"  name="email"  class="form-control" placeholder="%s" value="%s"></div>',
                esc_html__('your email', 'new-theme'), esc_attr($commenter['comment_author_email'])),
            'url' => sprintf('<div class="form-group"><input type="url" class="form-control" name="url" placeholder="%s" value="%s"></div>',
                esc_html__('your website url', 'new-theme'), esc_attr($commenter['comment_author_url'])),
            'cookies'=>''
        )),
        'comment_field' => '<div class="form-group"> <textarea cols="30" name="comment"   rows="10" style="resize: none;" class="form-control" placeholder="'.esc_html__('your comment ...','new-theme').'"></textarea> </div>',
        'comment_notes_before'=>'',
        'submit_field'         => '%1$s %2$s',
        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn px-5 hvr-push" value="%4$s" />',
    );
    add_filter('comment_form_fields',function ($comment_form){
        $comment=array_shift($comment_form);
        $comment_form=$comment_form+array('comment'=>$comment);
        return $comment_form;
    });
    ?>
    <div class="card border-0 shadow mb-4">
        <?php comment_form($args); ?>
        </div>
    </div>
    <div class="card border-0 shadow">
    <?php if (have_comments()) : ?>
        <div class="card-body">
            <?php
            wp_list_comments(array(
                    'type'=>'comment',
                'callback'=>'mytheme_comment',
                'avatar_size'=>80
            )); //https://developer.wordpress.org/reference/functions/wp_list_comments/
            ?>
        </div><!-- .comment-list -->
        <?php
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
            ?>
        <div class="row">
            <div class="col-12 mt-5 mb-5 d-flex justify-content-center">
                <ul class="nav paging pr-0">
                    <li class="nav-item mr-1">
                            <?php previous_comments_link('<i class="align-middle fas fa-arrow-right"></i>'); ?>
                    </li>
                    <li class="nav-item mr-1">
                            <?php next_comments_link('<i class="align-middle fas fa-arrow-left"></i>'); ?>
                    </li>
                </ul>
            </div>
        </div>
        <?php endif; // Check for comment navigation ?>
        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'twentythirteen'); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>
    </div>

