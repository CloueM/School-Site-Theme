<?php

// Register CPT

function school_register_custom_post_types() {

    $labels = array(
        'name'                     => _x( 'Students', 'post type general name', 'school-site-theme' ),
        'singular_name'            => _x( 'Student', 'post type singular name', 'school-site-theme' ),
        'add_new'                  => _x( 'Add New', 'student', 'school-site-theme' ),
        'add_new_item'             => __( 'Add New Student', 'school-site-theme' ),
        'edit_item'                => __( 'Edit Student', 'school-site-theme' ),
        'new_item'                 => __( 'New Student', 'school-site-theme' ),
        'view_item'                => __( 'View Student', 'school-site-theme' ),
        'view_items'               => __( 'View Students', 'school-site-theme' ),
        'search_items'             => __( 'Search Students', 'school-site-theme' ),
        'not_found'                => __( 'No students found.', 'school-site-theme' ),
        'not_found_in_trash'       => __( 'No students found in Trash.', 'school-site-theme' ),
        'parent_item_colon'        => __( 'Parent Students:', 'school-site-theme' ),
        'all_items'                => __( 'All Students', 'school-site-theme' ),
        'archives'                 => __( 'Student Archives', 'school-site-theme' ),
        'attributes'               => __( 'Student Attributes', 'school-site-theme' ),
        'insert_into_item'         => __( 'Insert into student', 'school-site-theme' ),
        'uploaded_to_this_item'    => __( 'Uploaded to this student', 'school-site-theme' ),
        'featured_image'           => __( 'Student featured image', 'school-site-theme' ),
        'set_featured_image'       => __( 'Set student featured image', 'school-site-theme' ),
        'remove_featured_image'    => __( 'Remove student featured image', 'school-site-theme' ),
        'use_featured_image'       => __( 'Use as featured image', 'school-site-theme' ),
        'menu_name'                => _x( 'Students', 'admin menu', 'school-site-theme' ),
        'filter_items_list'        => __( 'Filter students list', 'school-site-theme' ),
        'items_list_navigation'    => __( 'Students list navigation', 'school-site-theme' ),
        'items_list'               => __( 'Students list', 'school-site-theme' ),
        'item_published'           => __( 'Student published.', 'school-site-theme' ),
        'item_published_privately' => __( 'Student published privately.', 'school-site-theme' ),
        'item_reverted_to_draft'   => __( 'Student reverted to draft.', 'school-site-theme' ),
        'item_trashed'             => __( 'Student trashed.', 'school-site-theme' ),
        'item_scheduled'           => __( 'Student scheduled.', 'school-site-theme' ),
        'item_updated'             => __( 'Student updated.', 'school-site-theme' ),
        'item_link'                => __( 'Student link.', 'school-site-theme' ),
        'item_link_description'    => __( 'A link to a student.', 'school-site-theme' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'students' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );

    /* Register Post Type */
    register_post_type( 'fwd-student', $args );
}

add_action( 'init', 'school_register_custom_post_types' );



// Register taxonomy

function school_register_taxonomies() {

//   Student Category

$labels = array(
        'name'                  => _x( 'Student Categories', 'taxonomy general name', 'school-site-theme' ),
        'singular_name'         => _x( 'Student Category', 'taxonomy singular name', 'school-site-theme' ),
        'search_items'          => __( 'Search Student Categories', 'school-site-theme' ),
        'all_items'             => __( 'All Student Category', 'school-site-theme' ),
        'parent_item'           => __( 'Parent Student Category', 'school-site-theme' ),
        'parent_item_colon'     => __( 'Parent Student Category:', 'school-site-theme' ),
        'edit_item'             => __( 'Edit Student Category', 'school-site-theme' ),
        'view_item'             => __( 'View Student Category', 'school-site-theme' ),
        'update_item'           => __( 'Update Student Category', 'school-site-theme' ),
        'add_new_item'          => __( 'Add New Student Category', 'school-site-theme' ),
        'new_item_name'         => __( 'New Student Category Name', 'school-site-theme' ),
        'template_name'         => __( 'Student Category Archives', 'school-site-theme' ),
        'menu_name'             => __( 'Student Category', 'school-site-theme' ),
        'not_found'             => __( 'No student categories found.', 'school-site-theme' ),
        'no_terms'              => __( 'No student categories', 'school-site-theme' ),
        'items_list_navigation' => __( 'Student Categories list navigation', 'school-site-theme' ),
        'items_list'            => __( 'Student Categories list', 'school-site-theme' ),
        'item_link'             => __( 'Student Category Link', 'school-site-theme' ),
        'item_link_description' => __( 'A link to a student category.', 'school-site-theme' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'student-categories' ),
    );

    register_taxonomy( 'fwd-student-category', array( 'fwd-student' ), $args );


//  Featured taxonomy to display students

$labels = array(
        'name'                  => _x( 'Featured', 'taxonomy general name', 'school-site-theme' ),
        'singular_name'         => _x( 'Featured', 'taxonomy singular name', 'school-site-theme' ),
        'search_items'          => __( 'Search Featured', 'school-site-theme' ),
        'all_items'             => __( 'All Featured', 'school-site-theme' ),
        'parent_item'           => __( 'Parent Featured', 'school-site-theme' ),
        'parent_item_colon'     => __( 'Parent Featured:', 'school-site-theme' ),
        'edit_item'             => __( 'Edit Featured', 'school-site-theme' ),
        'view_item'             => __( 'View Featured', 'school-site-theme' ),
        'update_item'           => __( 'Update Featured', 'school-site-theme' ),
        'add_new_item'          => __( 'Add New Featured', 'school-site-theme' ),
        'new_item_name'         => __( 'New Student Featured', 'school-site-theme' ),
        'menu_name'             => __( 'Featured', 'school-site-theme' ),
        'template_name'         => __( 'Featured Archives', 'school-site-theme' ),
        'not_found'             => __( 'No featured found.', 'school-site-theme' ),
        'no_terms'              => __( 'No featured', 'school-site-theme' ),
        'items_list_navigation' => __( 'Featured list navigation', 'school-site-theme' ),
        'items_list'            => __( 'Featured list', 'school-site-theme' ),
        'item_link'             => __( 'Featured Link', 'school-site-theme' ),
        'item_link_description' => __( 'A link to a featured.', 'school-site-theme' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'featured' ),
    );

    register_taxonomy( 'fwd-student-featured', array( 'fwd-student' ), $args );

}

add_action( 'init', 'school_register_taxonomies' );

// flush function
function school_rewrite_flush() {
    school_register_custom_post_types();
    school_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'school_rewrite_flush' );