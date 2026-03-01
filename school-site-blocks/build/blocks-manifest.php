<?php
// This file is generated. Do not modify it manually.
return array(
	'company-address' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'mindset-blocks/company-address',
		'version' => '1.0.0',
		'title' => 'Company Address',
		'category' => 'text',
		'icon' => 'location',
		'description' => 'Output the company address with an optional icon.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'svgIcon' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'textdomain' => 'company-address',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'company-email' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'mindset-blocks/company-email',
		'version' => '1.0.0',
		'title' => 'Company Email',
		'category' => 'text',
		'icon' => 'email',
		'description' => 'Output the company email with an optional icon.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'svgIcon' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'textdomain' => 'company-email',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'copyright-date' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'mindset-blocks/copyright-date',
		'version' => '0.1.0',
		'title' => 'Copyright Date',
		'category' => 'text',
		'icon' => 'calendar',
		'description' => 'Custom blocks for the Mindset site.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'typography' => array(
				'fontSize' => true,
				'textAlign' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'attributes' => array(
			'startingYear' => array(
				'type' => 'number',
				'default' => 2020
			)
		),
		'textdomain' => 'mindset-blocks',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'service-posts' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'mindset-blocks/service-posts',
		'version' => '0.1.0',
		'title' => 'Service Posts',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Display all Service posts with in-page navigation.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'service-posts',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'testimonial-slider' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'mindset-blocks/testimonial-slider',
		'version' => '1.0.0',
		'title' => 'Testimonial Slider',
		'category' => 'widgets',
		'icon' => 'editor-quote',
		'description' => 'A slider of testimonials.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'multiple' => false
		),
		'attributes' => array(
			'navigation' => array(
				'type' => 'boolean',
				'default' => true
			),
			'pagination' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'textdomain' => 'testimonial-slider',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js',
		'render' => 'file:./render.php'
	)
);
