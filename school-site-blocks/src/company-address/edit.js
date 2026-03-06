import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls, ColorPalette } from '@wordpress/block-editor';
import { PanelBody, PanelRow, ToggleControl, TextControl, __experimentalUnitControl as UnitControl } from '@wordpress/components';

export default function Edit( { attributes, setAttributes } ) {
	const { address, city, state, zipCode, country, svgIcon, iconColor, maxWidth } = attributes;

	// Build comma-separated single-line preview
	const parts = [ address, city, state, zipCode, country ].filter( Boolean );
	const preview = parts.join( ', ' );

	const wrapperStyle = maxWidth ? { maxWidth, wordBreak: 'break-word' } : {};

	return (
		<>
			<address { ...useBlockProps( { style: wrapperStyle } ) }>
				{ svgIcon &&
					<svg
						xmlns="http://www.w3.org/2000/svg"
						width="24" height="24"
						viewBox="0 0 24 24"
						role="img"
						aria-label="Location Icon"
						style={ { fill: iconColor || 'currentColor', flexShrink: 0 } }
					>
						<path d="M12 0c-3.148 0-6 2.553-6 5.702 0 3.148 2.602 6.907 6 12.298 3.398-5.391 6-9.15 6-12.298 0-3.149-2.851-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm4 14.5c0 .828-1.79 1.5-4 1.5s-4-.672-4-1.5 1.79-1.5 4-1.5 4 .672 4 1.5z"/>
					</svg>
				}
				<p>
					{ preview
						? preview
						: <em style={ { opacity: 0.5 } }>{ __( 'No address — open block settings →', 'company-address' ) }</em>
					}
				</p>
			</address>

			<InspectorControls>
				<PanelBody title={ __( 'Address Settings', 'company-address' ) } initialOpen={ true }>
					<TextControl
						label={ __( 'Street Address', 'company-address' ) }
						value={ address }
						onChange={ ( value ) => setAttributes( { address: value } ) }
						placeholder="123 Main St"
					/>
					<TextControl
						label={ __( 'City', 'company-address' ) }
						value={ city }
						onChange={ ( value ) => setAttributes( { city: value } ) }
						placeholder="Vancouver"
					/>
					<TextControl
						label={ __( 'Province / State', 'company-address' ) }
						value={ state }
						onChange={ ( value ) => setAttributes( { state: value } ) }
						placeholder="BC"
					/>
					<TextControl
						label={ __( 'Postal / Zip Code', 'company-address' ) }
						value={ zipCode }
						onChange={ ( value ) => setAttributes( { zipCode: value } ) }
						placeholder="V5K 0A1"
					/>
					<TextControl
						label={ __( 'Country', 'company-address' ) }
						value={ country }
						onChange={ ( value ) => setAttributes( { country: value } ) }
						placeholder="Canada"
					/>
					{ preview && (
						<p style={ { fontSize: '12px', color: '#757575', marginTop: '4px' } }>
							{ __( 'Preview: ', 'company-address' ) }{ preview }
						</p>
					) }
					<UnitControl
						label={ __( 'Max Width', 'company-address' ) }
						value={ maxWidth }
						onChange={ ( value ) => setAttributes( { maxWidth: value || '' } ) }
						units={ [
							{ value: 'px', label: 'px' },
							{ value: 'rem', label: 'rem' },
							{ value: '%', label: '%' },
						] }
						help={ __( 'Limits block width; text wraps when reached.', 'company-address' ) }
					/>
				</PanelBody>

				<PanelBody title={ __( 'Icon', 'company-address' ) } initialOpen={ false }>
					<PanelRow>
						<ToggleControl
							label={ __( 'Show Icon', 'company-address' ) }
							checked={ svgIcon }
							onChange={ ( value ) => setAttributes( { svgIcon: value } ) }
						/>
					</PanelRow>
					{ svgIcon && (
						<>
							<p style={ { marginBottom: '8px', fontWeight: 600 } }>{ __( 'Icon Color', 'company-address' ) }</p>
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