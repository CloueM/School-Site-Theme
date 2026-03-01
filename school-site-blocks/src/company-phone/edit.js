/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * Provides utilities to interact with block props and render block content.
 * - useBlockProps: Handles block wrapper attributes like className and styles.
 * - RichText: A component for rich text editing within blocks.
 * - InspectorControls: Allows adding custom controls to the block editor sidebar.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/
 */
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';

/**
 * Enables interaction with WordPress entities (e.g., posts, users) using the core data store.
 * - useEntityProp: Allows easy access to WordPress custom fields.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-core-data/#useentityprop
 */
import { useEntityProp } from '@wordpress/core-data';

/**
 * Provides pre-built UI components for creating block settings in the editor.
 * - PanelBody: Groups settings into collapsible panels.
 * - PanelRow: Lays out content or controls in rows within a panel.
 * - ToggleControl: A toggle switch control for boolean settings.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/components/panel/
 * @see https://developer.wordpress.org/block-editor/reference-guides/components/toggle-control/
 */
import { PanelBody, PanelRow, ToggleControl } from '@wordpress/components';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit( {attributes, setAttributes} ) {

	// Set the post ID of your Contact Page
	const postID = 113;

	// Fetch meta data as an object and the setMeta function
	const [meta, setMeta] = useEntityProp('postType', 'page', 'meta', postID);

	// Destructure all our meta data for ease of use
	const { company_phone } = meta;

	// Flexible helper for setting a single meta value w/o mutating state
	const updateMeta = ( key, value ) => {
		setMeta( { ...meta, [key]: value } );
	};

	const { svgIcon } = attributes;

	return (
		<>
			<div { ...useBlockProps() }>
				{ svgIcon &&
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" role="img" aria-label="Phone Icon">
						<path d="M6.62 10.79a15.053 15.053 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24 11.36 11.36 0 0 0 3.57.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C9.61 21 3 14.39 3 6a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2z"/>
					</svg>
				}
				<RichText
					placeholder={ __( 'Enter phone number here...', 'company-phone' ) }
					tagName="p"
					value={ company_phone }
					onChange={ ( nextValue ) => updateMeta("company_phone", nextValue) }
				/>
			</div>
			<InspectorControls>
				<PanelBody title={ __( 'Settings', 'company-phone' ) }>
					<PanelRow>
						<ToggleControl
							label={ __( 'Show SVG Icon', 'company-phone' ) }
							checked={ svgIcon }
							onChange={ ( value ) =>
								setAttributes( { svgIcon: value } )
							}
							help={ __( 'Display an SVG icon next to the phone number.', 'company-phone' ) }
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
		</>
	);
}
