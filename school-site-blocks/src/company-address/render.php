<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$address    = ! empty( $attributes['address'] )    ? $attributes['address']    : '';
$city       = ! empty( $attributes['city'] )       ? $attributes['city']       : '';
$state      = ! empty( $attributes['state'] )      ? $attributes['state']      : '';
$zip        = ! empty( $attributes['zipCode'] )    ? $attributes['zipCode']    : '';
$country    = ! empty( $attributes['country'] )    ? $attributes['country']    : '';
$svg_icon   = ! empty( $attributes['svgIcon'] )    ? $attributes['svgIcon']    : false;
$icon_color = ! empty( $attributes['iconColor'] )  ? $attributes['iconColor']  : '';
$max_width  = ! empty( $attributes['maxWidth'] )   ? $attributes['maxWidth']   : '';

// Build comma-separated single line: "123 Main St, Vancouver, BC, V5K 0A1, Canada"
$parts     = array_filter( [ $address, $city, $state, $zip, $country ] );
$formatted = implode( ', ', $parts );

$wrapper_style = $max_width ? 'max-width:' . esc_attr( $max_width ) . ';word-break:break-word;' : '';
?>

<address <?php echo get_block_wrapper_attributes( $wrapper_style ? [ 'style' => $wrapper_style ] : [] ); ?>>

	<?php if ( $svg_icon ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" role="img" aria-label="Location Icon"
			style="fill:<?php echo $icon_color ? esc_attr( $icon_color ) : 'currentColor'; ?>;flex-shrink:0;">
			<path d="M12 0c-3.148 0-6 2.553-6 5.702 0 3.148 2.602 6.907 6 12.298 3.398-5.391 6-9.15 6-12.298 0-3.149-2.851-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm4 14.5c0 .828-1.79 1.5-4 1.5s-4-.672-4-1.5 1.79-1.5 4-1.5 4 .672 4 1.5z"/>
		</svg>
	<?php endif; ?>

	<?php if ( $formatted ) : ?>
		<p><?php echo esc_html( $formatted ); ?></p>
	<?php endif; ?>

</address>