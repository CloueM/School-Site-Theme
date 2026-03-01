<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>

<div <?php echo get_block_wrapper_attributes(); ?>>

	<?php if ( $attributes[ 'svgIcon' ] ) : ?>

		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" role="img" aria-label="Phone Icon">

			<path d="M6.62 10.79a15.053 15.053 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24 11.36 11.36 0 0 0 3.57.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C9.61 21 3 14.39 3 6a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2z"/>

		</svg>

	<?php endif; ?>

	<p><a href="tel:<?php echo esc_attr( get_post_meta( 113, 'company_phone', true ) ); ?>"><?php echo wp_kses_post( get_post_meta( 113, 'company_phone', true ) ); ?></a></p>

</div>
