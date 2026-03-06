<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$email      = ! empty( $attributes['email'] )      ? $attributes['email']      : '';
$svg_icon   = ! empty( $attributes['svgIcon'] )    ? $attributes['svgIcon']    : false;
$icon_color = ! empty( $attributes['iconColor'] )  ? $attributes['iconColor']  : '';
$max_width  = ! empty( $attributes['maxWidth'] )   ? $attributes['maxWidth']   : '';

$wrapper_style = $max_width ? 'max-width:' . esc_attr( $max_width ) . ';word-break:break-word;' : '';
?>

<div <?php echo get_block_wrapper_attributes( $wrapper_style ? [ 'style' => $wrapper_style ] : [] ); ?>>

	<?php if ( $svg_icon ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" role="img" aria-label="Email Icon"
			style="fill:<?php echo $icon_color ? esc_attr( $icon_color ) : 'currentColor'; ?>;flex-shrink:0;">
			<path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/>
		</svg>
	<?php endif; ?>

	<?php if ( $email ) : ?>
		<p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
	<?php endif; ?>

</div>
