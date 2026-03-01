<?php
/**
 * Registers the block(s) metadata from the `blocks-manifest.php` and registers the block type(s)
 * based on the registered block metadata. Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
 */
function mindset_blocks_mindset_blocks_block_init() {
	wp_register_block_types_from_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
}
add_action( 'init', 'mindset_blocks_mindset_blocks_block_init' );

/**
* Registers the custom fields for some blocks.
*
* @see https://developer.wordpress.org/reference/functions/register_post_meta/
*/
function mindset_register_custom_fields() {
	register_post_meta(
		'page',
		'company_email',
		array(
			'type'         => 'string',
			'show_in_rest' => true,
			'single'       => true
		)
	);
	register_post_meta(
		'page',
		'company_address',
		array(
			'type'         => 'string',
			'show_in_rest' => true,
			'single'       => true
		)
	);
	register_post_meta(
		'page',
		'company_phone',
		array(
			'type'         => 'string',
			'show_in_rest' => true,
			'single'       => true
		)
	);
}
add_action( 'init', 'mindset_register_custom_fields' );

/**
 * Register render callbacks for custom blocks.
 *
 * @param array  $args The block type registration args.
 * @param string $name The block name.
 * @return array Modified args.
 */
function mindset_blocks_render_callbacks( $args, $name ) {
	if ( 'mindset-blocks/service-posts' === $name ) {
		$args['render_callback'] = 'fwd_render_service_posts';
	}
	return $args;
}
add_filter( 'register_block_type_args', 'mindset_blocks_render_callbacks', 10, 2 );

/**
 * Render function for the Service Posts block.
 *
 * @param array $attributes Block attributes.
 * @return string Block output.
 */
function fwd_render_service_posts( $attributes ) {
	ob_start();
	?>
	<div <?php echo get_block_wrapper_attributes(); ?>>
		<?php
		// Navigation links (titles only)
		$nav_args = array(
			'post_type'      => 'fwd-service',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
		);
		$nav_query = new WP_Query( $nav_args );
		
		if ( $nav_query->have_posts() ) :
			?>
			<nav class="services-nav">
				<?php while ( $nav_query->have_posts() ) : $nav_query->the_post(); ?>
					<a href="#service-<?php the_ID(); ?>"><?php the_title(); ?></a>
				<?php endwhile; ?>
			</nav>
			<?php
			wp_reset_postdata();
		endif;
		
		// Service posts content
		$content_args = array(
			'post_type'      => 'fwd-service',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
		);
		$content_query = new WP_Query( $content_args );
		
		if ( $content_query->have_posts() ) :
			?>
			<div class="service-posts-container">
				<?php while ( $content_query->have_posts() ) : $content_query->the_post(); ?>
					<article id="service-<?php the_ID(); ?>" class="service-post">
						<h2><?php the_title(); ?></h2>
						<div class="service-content">
							<?php the_content(); ?>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<?php
			wp_reset_postdata();
		else :
			?>
			<p><?php esc_html_e( 'No services found.', 'mindset-theme' ); ?></p>
			<?php
		endif;
		?>
	</div>
	<?php
	return ob_get_clean();
}
