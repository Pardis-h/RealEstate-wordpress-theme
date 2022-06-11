<?php
function advertising_post_type_function() {
    $labels = array(
        'name' => __("building advertise", 'new-theme'),
        'singular_name' => __("building advertise", 'new-theme'),
        'menu_name' => __("building advertises", 'new-theme'),
        'name_admin_bar' => __("building advertise", 'new-theme'),
        'add_new' => __("add new", 'new-theme'),
        'add_new_item' => __("add new", 'new-theme'),
        'new_item' => __("new", 'new-theme'),
        'edit_item' => __("edit", 'new-theme'),
        'view_item' => __("view", 'new-theme'),
        'all_items' => __("all building", 'new-theme'),
        'search_items' => __("search", 'new-theme'),
        'parent_item_colon' => __("Parent", 'new-theme'),
        'not_found' => __("No  found", 'new-theme'),
        'not_found_in_trash' => __("No  found in Trash", 'new-theme')
    );

    $args = array(
        'labels' => $labels,
        'description' => ' ',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'home'),
        'capability_type'=>'advertising_home',
        'capability' =>array(
            'publish_posts'=>'publish_advertising_homes',
            'edit_posts'=>'edit_advertising_homes',
            'edit_others_posts'=>'edit_other_posts_advertising_homes',
            'delete_others_posts'=>'delete_other_posts_advertising_homes',
            'read_private_posts'=>'read_private_advertising_homes',
            'edit_post'=>'edit_advertising_home',
            'delete_post'=>'delete_advertising_home',
            'read_post'=>'read_advertising_home',
        ),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-welcome-widgets-menus',
        'exclude_from_search' => false,
        'taxonomies' => array('building_category'),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );

    register_post_type('advertising_home',$args);


    $tax_args_labels = array(
        'name' => _x('category', 'new-theme'),
        'singular_name' => _x('category', 'new-theme'),
        'search_items' => __('Search', 'new-theme'),
        'popular_items' => __('Popular categories', 'new-theme'),
        'all_items' => __('All categories', 'new-theme'),
        'parent_item' => __('Parent category', 'new-theme'),
        'parent_item_colon' => __('Parent category:', 'new-theme'),
        'edit_item' => __('Edit category', 'new-theme'),
        'update_item' => __('Update category', 'new-theme'),
        'add_new_item' => __('Add New category', 'new-theme'),
        'new_item_name' => __('New category Name', 'new-theme'),
        'separate_items_with_commas' => __('Separate categories with commas', 'new-theme'),
        'add_or_remove_items' => __('Add or remove categories', 'new-theme'),
        'choose_from_most_used' => __('Choose from the most used categories', 'new-theme'),
        'not_found' => __('No s found.', 'new-theme'),
        'menu_name' => __('categories', 'new-theme'),
    );
    $tax_args = array(
        'hierarchical' => true,
        'labels' => $tax_args_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
//        'rewrite' => array('slug' => 'building_category'),
    );
    register_taxonomy('building_category','advertising_home',$tax_args);
}
add_action('init', 'advertising_post_type_function');

if (get_option('new-theme-add-role-v','0')!=='5'){
    add_role('adviser','مشاور',array(
       'read'=>true,
        'edit_advertising_home'=>true,
        'read_advertising_home'=>true,
        'edit_advertising_homes'=>true,
        'delete_advertising_home'=>true,
        'delete_others_posts'=>false
    ));
    add_role('top_adviser',' مشاور ارشد',array(
       'read'=>true,
        'edit_advertising_home'=>true,
        'read_advertising_home'=>true,
        'delete_advertising_home'=>true,
        'publish_posts'=>true,
        'edit_posts'=>true,
        'edit_others_posts'=>true,
        'read_private_posts'=>true,
    ));
    update_option('new-theme-add-role-v','5');
}
