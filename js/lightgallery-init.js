/**
 * lightGallery Initialization
 * Targets the .school-lightgallery class added in the block editor.
 */
document.addEventListener('DOMContentLoaded', function() {

    const galleryContainer = document.querySelector('.school-lightgallery');
    
    if (galleryContainer) {

        lightGallery(galleryContainer, {
            selector: '.wp-block-image a', 
            speed: 500,
            download: false,
            counter: true
        });
    }
});