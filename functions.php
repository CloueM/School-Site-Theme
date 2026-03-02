<?php
require_once get_template_directory() . '/school-site-blocks/mindset-blocks.php';

function school_site_enqueue_assets() {
    if ( is_front_page() ) {
        wp_enqueue_style( 'lightgallery-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css', array(), '2.7.2' );
        wp_enqueue_script( 'lightgallery-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js', array(), '2.7.2', true );
        wp_enqueue_script(
            'school-gallery-init',
            get_template_directory_uri() . '/assets/js/lightgallery-init.js',
            array( 'lightgallery-js' ),
            '1.0.0',
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'school_site_enqueue_assets' );

// CPT & Taxonomies
require get_template_directory() . '/inc/post-types-taxonomies.php';

// 1. Add Custom Image Sizes
add_image_size( 'student-list-thumb', 400, 500, true ); 
add_image_size( 'student-single-hero', 800, 1000, true ); 

// 2. Add to Dropdown 
add_filter( 'image_size_names_choose', 'school_add_student_image_sizes' );
function school_add_student_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'student-list-thumb'  => __( 'Student List Size (4:5)' ),
        'student-single-hero' => __( 'Student Single Size (4:5)' ),
    ) );
}

// 3a. Sorting & Future Proofing for Student Archive
add_action( 'pre_get_posts', 'school_sort_students_alphabetically' );
function school_sort_students_alphabetically( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'fwd-student' ) ) {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
        $query->set( 'posts_per_page', 99 ); 
    }
}

// 3b. Sorting & Pagination for Student Category Taxonomy
add_action( 'pre_get_posts', 'school_sort_student_category_taxonomy' );
function school_sort_student_category_taxonomy( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_tax( 'student-category' ) ) {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
        $query->set( 'posts_per_page', 10 ); 
    }
}

// 4. Change "Add title" Placeholder to "Add student name"
add_filter( 'enter_title_here', 'school_change_student_title_placeholder', 10, 2 );
function school_change_student_title_placeholder( $title, $post ) {
    if ( $post->post_type === 'fwd-student' ) {
        $title = 'Add student name';
    }
    return $title;
}

// 5. Force Featured Image to use student-list-thumb in taxonomy archives
function school_force_featured_image_size_in_taxonomy( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    if ( is_tax( 'student-category' ) && $size !== 'student-list-thumb' ) {
        $html = get_the_post_thumbnail( $post_id, 'student-list-thumb', $attr );
    }
    return $html;
}
add_filter( 'post_thumbnail_html', 'school_force_featured_image_size_in_taxonomy', 10, 5 );