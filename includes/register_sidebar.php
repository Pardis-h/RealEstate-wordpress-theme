<?php

//sidebar section
add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'mytheme_sidebar',
            'name'          => __( 'Primary Sidebar' ),
            'before_widget' => '<div  id="%1$s"  class="card border-0 shadow mb-3 widget %2$s"> <div class="card-body">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<p class="mb-4"> <strong>',
            'after_title'   => '</strong> </p>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */

    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'mytheme_archive_sidebar',
            'name'          => __( 'archive Sidebar' ),
            'before_widget' => '<div  id="%1$s"  class="card border-0 shadow mb-3 widget %2$s"> <div class="card-body">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<p class="mb-4"> <strong>',
            'after_title'   => '</strong> </p>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */

    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'mytheme_advertising_home_archive_sidebar',
            'name'          => __( 'archive advertising home Sidebar' ),
            'before_widget' => '<div  id="%1$s"  class="card border-0 shadow mb-3 widget %2$s"> <div class="card-body">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<p class="mb-4"> <strong>',
            'after_title'   => '</strong> </p>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */

    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'mytheme_advertising_home_sidebar',
            'name'          => __( 'advertising home Sidebar' ),
            'before_widget' => '<div  id="%1$s"  class="card border-0 shadow mb-3 widget %2$s"> <div class="card-body">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<p class="mb-4"> <strong>',
            'after_title'   => '</strong> </p>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}