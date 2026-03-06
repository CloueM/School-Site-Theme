import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls, ColorPalette } from '@wordpress/block-editor';
import { PanelBody, PanelRow, ToggleControl, TextControl, __experimentalUnitControl as UnitControl } from '@wordpress/components';

export default function Edit( { attributes, setAttributes } ) {
	const { email, svgIcon, iconColor, maxWidth } = attributes;

	const wrapperStyle = maxWidth ? { maxWidth, wordBreak: 'break-word' } : {};

	return (
		<>
			<div { ...useBlockProps( { style: wrapperStyle } ) }>
				{ svgIcon &&
					<svg
						xmlns="http://www.w3.org/2000/svg"
						width="24" height="24"
						viewBox="0 0 24 24"
						role="img"
						aria-label="Email Icon"
						style={ { fill: iconColor || 'currentColor', flexShrink: 0 } }
					>
						<path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/>
					</svg>
				}
				<p>
					{ email
						? email
						: <em style={ { opacity: 0.5 } }>{ __( 'No email — open block settings →', 'company-email' ) }</em>
					}
				</p>
			</div>

			<InspectorControls>
				<PanelBody title={ __( 'Email Settings', 'company-email' ) } initialOpen={ true }>
					<TextControl
						label={ __( 'Email Address', 'company-email' ) }
						value={ email }
						onChange={ ( value ) => setAttributes( { email: value } ) }
						placeholder="info@school.com"
						type="email"
						help={ __( 'Renders as a clickable mailto: link.', 'company-email' ) }
					/>
					<UnitControl
						label={ __( 'Max Width', 'company-email' ) }
						value={ maxWidth }
						onChange={ ( value ) => setAttributes( { maxWidth: value || '' } ) }
						units={ [
							{ value: 'px', label: 'px' },
							{ value: 'rem', label: 'rem' },
							{ value: '%', label: '%' },
						] }
						help={ __( 'Limits block width; text wraps when reached.', 'company-email' ) }
					/>
				</PanelBody>

				<PanelBody title={ __( 'Icon', 'company-email' ) } initialOpen={ false }>
					<PanelRow>
						<ToggleControl
							label={ __( 'Show Icon', 'company-email' ) }
							checked={ svgIcon }
							onChange={ ( value ) => setAttributes( { svgIcon: value } ) }
						/>
					</PanelRow>
					{ svgIcon && (
						<>
							<p style={ { marginBottom: '8px', fontWeight: 600 } }>{ __( 'Icon Color', 'company-email' ) }</p>
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
