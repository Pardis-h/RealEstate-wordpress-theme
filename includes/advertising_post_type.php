<?php
function advertising_post_type_function() {
    $labels = array(
        'name' => __("building advertise", 'realEstate'),
        'singular_name' => __("building advertise", 'realEstate'),
        'menu_name' => __("building advertises", 'realEstate'),
        'name_admin_bar' => __("building advertise", 'realEstate'),
        'add_new' => __("add new", 'realEstate'),
        'add_new_item' => __("add new", 'realEstate'),
        'new_item' => __("new", 'realEstate'),
        'edit_item' => __("edit", 'realEstate'),
        'view_item' => __("view", 'realEstate'),
        'all_items' => __("all building", 'realEstate'),
        'search_items' => __("search", 'realEstate'),
        'parent_item_colon' => __("Parent", 'realEstate'),
        'not_found' => __("No  found", 'realEstate'),
        'not_found_in_trash' => __("No  found in Trash", 'realEstate')
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
        'name' => _x('category', 'realEstate'),
        'singular_name' => _x('category', 'realEstate'),
        'search_items' => __('Search', 'realEstate'),
        'popular_items' => __('Popular categories', 'realEstate'),
        'all_items' => __('All categories', 'realEstate'),
        'parent_item' => __('Parent category', 'realEstate'),
        'parent_item_colon' => __('Parent category:', 'realEstate'),
        'edit_item' => __('Edit category', 'realEstate'),
        'update_item' => __('Update category', 'realEstate'),
        'add_new_item' => __('Add New category', 'realEstate'),
        'new_item_name' => __('New category Name', 'realEstate'),
        'separate_items_with_commas' => __('Separate categories with commas', 'realEstate'),
        'add_or_remove_items' => __('Add or remove categories', 'realEstate'),
        'choose_from_most_used' => __('Choose from the most used categories', 'realEstate'),
        'not_found' => __('No s found.', 'realEstate'),
        'menu_name' => __('categories', 'realEstate'),
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

if (get_option('realEstate-add-role-v','0')!=='5'){
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
    update_option('realEstate-add-role-v','5');
}
