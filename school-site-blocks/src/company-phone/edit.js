import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls, ColorPalette } from '@wordpress/block-editor';
import { PanelBody, PanelRow, ToggleControl, TextControl, __experimentalUnitControl as UnitControl } from '@wordpress/components';

export default function Edit( { attributes, setAttributes } ) {
	const { phone, svgIcon, iconColor, maxWidth } = attributes;

	// Auto-format phone preview: strip non-digits then apply +1 (XXX) XXX-XXXX
	function formatPhone( raw ) {
		if ( ! raw ) return '';
		const digits = raw.replace( /\D/g, '' );
		if ( digits.length === 11 && digits[0] === '1' ) {
			return `+1 (${ digits.slice(1,4) }) ${ digits.slice(4,7) }-${ digits.slice(7,11) }`;
		}
		if ( digits.length === 10 ) {
			return `+1 (${ digits.slice(0,3) }) ${ digits.slice(3,6) }-${ digits.slice(6,10) }`;
		}
		return raw;
	}

	const wrapperStyle = maxWidth ? { maxWidth, wordBreak: 'break-word' } : {};
	const formattedPhone = formatPhone( phone );

	return (
		<>
			<div { ...useBlockProps( { style: wrapperStyle } ) }>
				{ svgIcon &&
					<svg
						xmlns="http://www.w3.org/2000/svg"
						width="24" height="24"
						viewBox="0 0 24 24"
						role="img"
						aria-label="Phone Icon"
						style={ { fill: iconColor || 'currentColor', flexShrink: 0 } }
					>
						<path d="M6.62 10.79a15.053 15.053 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24 11.36 11.36 0 0 0 3.57.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C9.61 21 3 14.39 3 6a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2z"/>
					</svg>
				}
				<p>
					{ formattedPhone
						? formattedPhone
						: <em style={ { opacity: 0.5 } }>{ __( 'No phone — open block settings →', 'company-phone' ) }</em>
					}
				</p>
			</div>

			<InspectorControls>
				<PanelBody title={ __( 'Phone Settings', 'company-phone' ) } initialOpen={ true }>
					<TextControl
						label={ __( 'Phone Number', 'company-phone' ) }
						value={ phone }
						onChange={ ( value ) => setAttributes( { phone: value } ) }
						placeholder="16045550100"
						type="tel"
						help={ __( 'Enter 10 or 11 digits — auto-formatted as +1 (XXX) XXX-XXXX.', 'company-phone' ) }
					/>
					{ phone && (
						<p style={ { fontSize: '12px', color: '#757575', marginTop: '-8px' } }>
							{ __( 'Preview: ', 'company-phone' ) }{ formattedPhone }
						</p>
					) }
					<UnitControl
						label={ __( 'Max Width', 'company-phone' ) }
						value={ maxWidth }
						onChange={ ( value ) => setAttributes( { maxWidth: value || '' } ) }
						units={ [
							{ value: 'px', label: 'px' },
							{ value: 'rem', label: 'rem' },
							{ value: '%', label: '%' },
						] }
						help={ __( 'Limits block width; text wraps when reached.', 'company-phone' ) }
					/>
				</PanelBody>

				<PanelBody title={ __( 'Icon', 'company-phone' ) } initialOpen={ false }>
					<PanelRow>
						<ToggleControl
							label={ __( 'Show Icon', 'company-phone' ) }
							checked={ svgIcon }
							onChange={ ( value ) => setAttributes( { svgIcon: value } ) }
						/>
					</PanelRow>
					{ svgIcon && (
						<>
							<p style={ { marginBottom: '8px', fontWeight: 600 } }>{ __( 'Icon Color', 'company-phone' ) }</p>
							<ColorPalette
								value={ iconColor }
								onChange={ ( value ) => setAttributes( { iconColor: value || '' } ) }
							/>
						</>
					) }
				</PanelBody>
			</InspectorControls>
		</>
	);
}
