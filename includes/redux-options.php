<?php
if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = 'new_theme_option';

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    'display_name'         => $theme->get( 'Name' ),
    'display_version'      => $theme->get( 'Version' ),
    'menu_title'           => esc_html__( 'Sample Options', 'redux-framework-demo' ),
    'customizer'           => true,
);

Redux::setArgs( $opt_name, $args );

Redux::setSection( $opt_name, array(
    'title'  =>'تنظیمات هدر قالب',
    'id'     => 'header',
    'desc'   =>'',
    'icon'   => 'el el-home',
) );
Redux::setSection( $opt_name, array(
    'title'  =>'تنظیمات فوتر قالب',
    'id'     => 'footer',
    'desc'   =>'',
    'icon'   => 'el el-home',
) );
Redux::setSection( $opt_name, array(
    'title'  =>'تنظیمات دیگر',
    'id'     => 'other',
    'desc'   =>'',
    'icon'   => 'el el-home',
) );

Redux::set_field( $opt_name, 'header', array(
    'id' => 'header_logo',
    'type'     => 'media',
    'url'      => false,
    'title' => __( 'لگوی وبسایت' , 'redux_docs_generator' ),
    'library_filter' => array(
        'jpg','png'
    )
) );

Redux::set_field( $opt_name, 'footer', array(
    'id' => 'contact_us',
    'type' => 'editor',
    'title' => __( 'اطلاعات تماس با ما' , 'redux_docs_generator' ),
    'desc' => __( 'این اطلاعات در فوتر وبسایت نمایش داده مییشود' , 'redux_docs_generator' )
) );

Redux::set_field( $opt_name, 'footer', array(
    'id' => 'instagram',
    'type' => 'text',
    'title' => __( 'آدرس اینستاگرام' , 'redux_docs_generator' ),
    'validate' => array(
        'url'
    )
) );

Redux::set_field( $opt_name, 'footer', array(
    'id' => 'footer_color',
    'type' => 'color',
    'title' => __( 'رنگ فوتر' , 'redux_docs_generator' )
) );

Redux::set_field( $opt_name, 'other', array(
    'id' => 'reserve_form_page_id',
    'type' => 'text',
    'title' => __( 'شماره صفحه فرم رزور' , 'redux_docs_generator' ),
    'description' => __( 'لطفا یک صفحه ایجاد کرده و شورت کد فرم تماس را در آن قرار داده و آی دی آن صفحه را اینجا وارد نمایید.' , 'redux_docs_generator' ),
    'validate' => array(
        'numeric'
    )
) );