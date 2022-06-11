<?php
//if (!defined('ABSPATH')) die('no access');
(defined('ABSPATH')) || die('no access');

/**
 * Adds Foo_Widget widget.
 */
class my_theme_category_widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'my_theme_category_widget_id', // Base ID
            esc_html__('mytheme category widget','new-theme'), // Name
            array( 'description' => __( 'this is category widget for my theme', 'new-theme' ), ) // Args
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


        echo $before_widget;

        echo $before_title;
        echo $title;
        echo $after_title;

        $categories = get_categories( array(
            'orderby' => 'name',
            'parent'  => 0
        ) );
        echo '<div class="category-p">';
        foreach ( $categories as $category ) {
            ?>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>" class="text-dark"><i class="fas fa-chevron-left ml-1 align-middle"></i>
                    <?php echo esc_html( $category->name ) ?>  </a>
                <small> <?php echo esc_html( $category->count )  ?> مطلب </small>
            </div>
            <?php
        }
        echo '</div>';
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
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'category list ', 'new-theme' );
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
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

        return $instance;
    }

} // class Foo_Widget

// Register Foo_Widget widget
add_action( 'widgets_init', 'my_theme_category_widget_register_func' );

function my_theme_category_widget_register_func() {
    register_widget( 'my_theme_category_widget' );
}