<?php
/**
 * Title: Staff by Department
 * Slug: school-site-theme/staff-by-department
 * Categories: hidden
 * Inserter: false
 */

// Get all department terms that have staff, sorted alphabetically
$departments = get_terms( [
    'taxonomy'   => 'fwd-staff-department',
    'hide_empty' => true,
    'orderby'    => 'name',
    'order'      => 'ASC',
] );

// Fallback: if no departments exist, show all staff in one ungrouped section
if ( is_wp_error( $departments ) || empty( $departments ) ) {
    $departments = [ null ];
}

?>
<div class="staff-archive-wrapper">

<?php foreach ( $departments as $department ) :

    $query_args = [
        'post_type'      => 'fwd-staff',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'post_status'    => 'publish',
    ];

    if ( $department ) {
        $query_args['tax_query'] = [ [
            'taxonomy' => 'fwd-staff-department',
            'field'    => 'slug',
            'terms'    => $department->slug,
        ] ];
    }

    $staff_query = new WP_Query( $query_args );

    if ( ! $staff_query->have_posts() ) :
        continue;
    endif;
    ?>

    <section class="staff-department-section">

        <?php if ( $department ) : ?>
            <h2><?php echo esc_html( $department->name ); ?></h2>
            <hr />
        <?php endif; ?>

        <div class="staff-grid">

            <?php while ( $staff_query->have_posts() ) : $staff_query->the_post(); ?>

                <div class="staff-card">

                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'medium' ); ?>
                    <?php endif; ?>

                    <div class="staff-info">
                        <div class="staff-content">
                            <?php the_content(); ?>
                        </div>
                    </div>

                </div>

            <?php endwhile; wp_reset_postdata(); ?>

        </div>

    </section>

<?php endforeach; ?>

</div>
<?php
