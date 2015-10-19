<?php
/**
 * function wpaop_custom_meta_boxes()
 * adds custom meta boxes to the post edit screens
 */
function wpaop_custom_meta_boxes( $meta_boxes ) {
		
	/* get the home page id */
	$home_page_id = get_option( 'page_on_front' );
	
	/**
	 * metabox array
	 * for the home page
	 */
	$meta_boxes[] = array(
		'title' 	=> 'Header',
		'pages'		=> array(
			'page',
		),
		'show_on'	=> array(
			'id' => array( $home_page_id )
		),
		'context'	=> 'normal',
		'priority'	=> 'high',
		'fields'	=> array(
			array( 
				'id'		=> 'header_image', 
				'desc'		=> 'Add an image for the header section.',
				'size'		=> 'height=200&width=600&crop=1',
				'type'		=> 'image',
			),
			array(
				'id'		=> 'header_contact_email', 
				'name'		=> 'Header Contact Email',
				'type'		=> 'text',
				'cols'		=> 4
			),
			array(
				'id'		=> 'header_contact_tel', 
				'name'		=> 'Header Contact Telephone',
				'type'		=> 'text',
				'cols'		=> 4
			),
			array(
				'id'		=> 'header_content_title', 
				'name'		=> 'Header Content Title',
				'type'		=> 'text',
				'cols'		=> 4
			),
			array(
				'id'		=> 'header_content_text', 
				'name'		=> 'Header Content Text',
				'type'		=> 'wysiwyg',
				'options'	=> array(
					'textarea_rows'		=> 8
				)	
			),
			array(
		        'id'   					=> 'header_content_bullets', 
				'type' 					=> 'group',
				'repeatable'			=> true,
				'repeatable_max'		=> 3,
				'sortable'				=> true,
				'string-repeat-field'	=> 'Add Bullets Section',
				'string-delete-field'	=> 'Remove Bullets Section',
				'fields' => array(
					array(
						'id'   					=> 'bullet', 
						'type' 					=> 'text',
						'repeatable'			=> true,
						'repeatable_max'		=> 3,
						'sortable'				=> true,
						'string-repeat-field'	=> 'Add Bullet',
						'string-delete-field'	=> 'Remove Bullet',
					),
				)
			)
		)
	);
	
	$meta_boxes[] = array(
		'title' 	=> 'Services Section',
		'pages'		=> array(
			'page',
		),
		'show_on'	=> array(
			'id' => array( $home_page_id )
		),
		'context'	=> 'normal',
		'priority'	=> 'high',
		'fields'	=> array(
			array(
				'id'		=> 'services_title', 
				'name'		=> 'Header Content Title',
				'type'		=> 'text'
			),
			array(
				'id'		=> 'services_text', 
				'name'		=> 'Header Content Text',
				'type'		=> 'wysiwyg',
				'options'	=> array(
					'textarea_rows'		=> 8
				)
			),
			array(
				'id'   					=> 'section_parts', 
				'type' 					=> 'group',
				'repeatable'			=> true,
				'repeatable_max'		=> 3,
				'sortable'				=> true,
				'string-repeat-field'	=> 'Add Section Part',
				'string-delete-field'	=> 'Remove Section Part',
				'fields' => array(
					array(
						'id'		=> 'title', 
						'name'		=> 'Title',
						'type'		=> 'text'
					),
					array(
						'id'		=> 'text', 
						'name'		=> 'Text',
						'type'		=> 'wysiwyg',
						'options'	=> array(
							'textarea_rows'		=> 5
						)
					),
				)
			)
		)
	);
	
	$meta_boxes[] = array(
		'title' 	=> 'Contact Section',
		'pages'		=> array(
			'page',
		),
		'show_on'	=> array(
			'id' => array( $home_page_id )
		),
		'context'	=> 'normal',
		'priority'	=> 'high',
		'fields'	=> array(
			array(
				'id'		=> 'contact_title', 
				'name'		=> 'Header Content Title',
				'type'		=> 'text'
			),
			array(
				'id'		=> 'contact_text', 
				'name'		=> 'Header Content Text',
				'type'		=> 'wysiwyg',
				'options'	=> array(
					'textarea_rows'		=> 8
				)
			),
		)
	);
	
	$meta_boxes[] = array(
		'title' 	=> 'Footer Info',
		'pages'		=> array(
			'page',
		),
		'show_on'	=> array(
			'id' => array( $home_page_id )
		),
		'context'	=> 'side',
		'priority'	=> 'default',
		'fields'	=> array(
			array(
				'id'		=> 'footer_text', 
				'name'		=> 'Footer Text',
				'type'		=> 'wysiwyg',
				'options'	=> array(
					'textarea_rows'		=> 8,
					'media_buttons'		=> false
				)
			),
		)
	);
	
	/* return the modified meta boxes array */
	return $meta_boxes;
	
}

add_filter( 'cmb_meta_boxes', 'wpaop_custom_meta_boxes' );