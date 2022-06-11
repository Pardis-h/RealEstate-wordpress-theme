<?php
//Create the rating interface.
add_action( 'comment_form_logged_in_after', 'ci_comment_rating_rating_field' );
//add_action( 'comment_form_after_fields', 'ci_comment_rating_rating_field' );
function ci_comment_rating_rating_field () {
    ?>
    <div class="d-flex" id="comment-rates">
        <p style="font-weight: 300;"> امتیاز شما : </p>
        <div class="mr-2">
            <?php for ( $i = 5; $i >= 1; $i-- ) : ?>
                <input type="radio" style="color: #ccc;" id="rating-<?php echo esc_attr( $i ); ?>" name="rating" value="<?php echo esc_attr( $i ); ?>" /><label for="rating-<?php echo esc_attr( $i ); ?>"> <i class="fas fa-star align-middle"></i></label>
            <?php endfor; ?>
            <input type="radio" id="rating-0" class="star-cb-clear" name="rating" value="0" /><label for="rating-0" class="">0</label>
        </div>
    </div>
    <?php
}

//Save the rating submitted by the user.
add_action( 'comment_post', 'ci_comment_rating_save_comment_rating' );
function ci_comment_rating_save_comment_rating( $comment_id ) {
    if ( ( isset( $_POST['rating'] ) ) && ( '' !== $_POST['rating'] ) )
        $rating = intval( $_POST['rating'] );
    add_comment_meta( $comment_id, 'rating', $rating );
}

