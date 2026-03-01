<?php
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