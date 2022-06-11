<?php
//if (!defined('ABSPATH')) die('no access');
(defined('ABSPATH')) || die('no access');

/**
 * Adds Foo_Widget widget.
 */
class my_theme_search_widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'my_theme_search_widget_id', // Base ID
            esc_html__('mytheme search widget','new-theme'), // Name
            array( 'description' => __( 'this is search form for my theme', 'new-theme' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $placeholder =  $instance['placeholder'];

        echo $before_widget;
        ?>
        <form class="search" action="<?php echo home_url(); ?>" method="get">
            <div class="form-group search2">
                <input type="text" class="form-control"  name="s" id="search" value="<?php the_search_query(); ?>" placeholder="<?php echo $placeholder ?>" />
                <input type="hidden" name="post_type" value="<?php echo get_post_type() ?>" id="post_type" />
                <button href="#" class="btn shadow"> <i class="fas fa-search align-middle"></i> </button>
            </div>
        </form>
        <?php
        echo $after_widget;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'placeholder' ] ) ) {
            $placeholder = $instance[ 'placeholder' ];
        }
        else {
            $placeholder = __( 'search ... ', 'text_domain' );
        }

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( '', 'title' );
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'placeholder' ); ?>"><?php _e( 'placeholder:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'placeholder' ); ?>" name="<?php echo $this->get_field_name( 'placeholder' ); ?>" type="text" value="<?php echo esc_attr( $placeholder ); ?>" />
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['placeholder'] = ( !empty( $new_instance['placeholder'] ) ) ? strip_tags( $new_instance['placeholder'] ) : 'search ...';

        return $instance;
    }

} // class Foo_Widget

// Register Foo_Widget widget
add_action( 'widgets_init', 'my_theme_search_widget_register_func' );

function my_theme_search_widget_register_func() {
    register_widget( 'my_theme_search_widget' );
}