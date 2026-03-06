<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$phone      = ! empty( $attributes['phone'] )      ? $attributes['phone']      : '';
$svg_icon   = ! empty( $attributes['svgIcon'] )    ? $attributes['svgIcon']    : false;
$icon_color = ! empty( $attributes['iconColor'] )  ? $attributes['iconColor']  : '';
$max_width  = ! empty( $attributes['maxWidth'] )   ? $attributes['maxWidth']   : '';

/**
 * Auto-format a phone number to +1 (XXX) XXX-XXXX.
 * Strips all non-digit characters, then formats 10 or 11-digit numbers.
 */
function school_format_phone( $raw ) {
	$digits = preg_replace( '/\D/', '', $raw );
	$len    = strlen( $digits );

	if ( $len === 11 && $digits[0] === '1' ) {
		return '+1 (' . substr( $digits, 1, 3 ) . ') ' . substr( $digits, 4, 3 ) . '-' . substr( $digits, 7, 4 );
	}
	if ( $len === 10 ) {
		return '+1 (' . substr( $digits, 0, 3 ) . ') ' . substr( $digits, 3, 3 ) . '-' . substr( $digits, 6, 4 );
	}

	return $raw; // Return as-is if not standard format
}

$formatted_phone = $phone ? school_format_phone( $phone ) : '';
// tel: href uses digits only for reliability
$tel_href = $phone ? preg_replace( '/\D/', '', $phone ) : '';
if ( $tel_href && strlen( $tel_href ) === 10 ) {
	$tel_href = '1' . $tel_href;
}

$wrapper_style = $max_width ? 'max-width:' . esc_attr( $max_width ) . ';word-break:break-word;' : '';
?>

<div <?php echo get_block_wrapper_attributes( $wrapper_style ? [ 'style' => $wrapper_style ] : [] ); ?>>

	<?php if ( $svg_icon ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" role="img" aria-label="Phone Icon"
			style="fill:<?php echo $icon_color ? esc_attr( $icon_color ) : 'currentColor'; ?>;flex-shrink:0;">
			<path d="M6.62 10.79a15.053 15.053 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24 11.36 11.36 0 0 0 3.57.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C9.61 21 3 14.39 3 6a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2z"/>
		</svg>
	<?php endif; ?>

	<?php if ( $formatted_phone ) : ?>
		<p><a href="tel:+<?php echo esc_attr( $tel_href ); ?>"><?php echo esc_html( $formatted_phone ); ?></a></p>
	<?php endif; ?>

</div>
