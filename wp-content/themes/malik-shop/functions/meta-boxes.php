<?php

/**
 * Initialize the custom Meta Boxes.
 *
 * @package OptionTree
 */

add_action('admin_init', 'custom_meta_boxes');

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @since 2.0
 */
function custom_meta_boxes()
{

	/**
	 * Create a custom meta boxes array that we pass to
	 * the OptionTree Meta Box API Class.
	 * 
	 * 
	 */

	$malik_overview_metabox = array(
		'id'        => 'malik_overview_metabox',
		'title'     => 'Настройка полей',
		'desc'      => '',
		'pages'     => array('malik_item_overview'),
		'context'   => 'normal',
		'priority'  => 'high',
		'fields'    => array(
			array(
				'label' => 'Галерея',
				'id'    => 'Galery_section',
				'type'  => 'tab',
			),
			array(
				'label' => ' Показывать галерею',
				'id'    => 'overview_show_gallery',
				'type'  => 'on-off',
				'desc'  => '',
			),
			array(
				'id'           => 'slider_overview',
				'label'        => 'Настройка слайдера',
				'desc'         => '',
				'std'          => '',
				'type'         => 'list-item',
				'section'      => 'Galery_section',
				'condition'    => 'overview_show_gallery:is(on)',
				'operator'     => 'and',
				'settings'     =>
				array(
					array(
						'id'           => 'slider_overview_header',
						'label'        => ' Напишите заголовок',
						'desc'         => '',
						'type'         => 'text',
						'section'      => 'Galery_section',
						'taxonomy'     => 'items_cat',
					),
					array(
						'id'           => 'slider_overview_upload',
						'label'        => ' ',
						'desc'         => '',
						'std'          => '',
						'type'         => 'upload',
						'section'      => 'Galery_section',
						'taxonomy'     => 'items_cat',
						'min_max_step' => '',
					),
				),
			),
		),
	);
	$malik_sale_notice = array(
	    'id'        => 'malik_sale_notice',
		'title'     => 'Объявление о распродаже',
		'desc'      => '',
		'post_types' => 'products',
		'context'   => 'normal',
		'priority'  => 'high',
		'fields'    => array(
	        array(
    	        'id'        => 'enable_notice',
                'name'      => 'Показывать объявление?',
                'type'      => 'switch',
                'style'     => 'rounded',
                'on_label'  => 'Да',
                'off_label' => 'Нет',),
            array(
                'name'        => 'Текст объявления',
                'id'          => 'notice_text',
                'type'        => 'text',
                'placeholder' => 'Введите текст объявления здесь',
                )
		    )
		
	    );
	$my_meta_box = array(
		'id'       => 'demo_meta_box',
		'title'    => __('Demo Meta Box', 'theme-text-domain'),
		'desc'     => '',
		'pages'    => array('post'),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'label' => __('Conditions', 'theme-text-domain'),
				'id'    => 'demo_conditions',
				'type'  => 'tab',
			),
			array(
				'id'           => 'demo_list_item',
				'label'        => __('List Item', 'theme-text-domain'),
				'desc'         => __('The List Item option type allows for a great deal of customization. You can add settings to the List Item and those settings will be displayed to the user when they add a new List Item. Typical use is for creating sliding content or blocks of code for custom layouts.', 'theme-text-domain'),
				'std'          => '',
				'type'         => 'list-item',
				'section'      => 'option_types',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
				'settings'     => array(
					array(
						'id'           => 'demo_list_item_content',
						'label'        => __('Content', 'theme-text-domain'),
						'desc'         => '',
						'std'          => '',
						'type'         => 'textarea-simple',
						'rows'         => '10',
						'post_type'    => '',
						'taxonomy'     => '',
						'min_max_step' => '',
						'class'        => '',
						'condition'    => '',
						'operator'     => 'and',
					),
				),
			),
			array(
				'label' => __('Show Gallery', 'theme-text-domain'),
				'id'    => 'demo_show_gallery',
				'type'  => 'on-off',
				'desc'  => sprintf(__('Shows the Gallery when set to %s.', 'theme-text-domain'), '<code>on</code>'),
				'std'   => 'off',
			),
			array(
				'label'     => '',
				'id'        => 'demo_textblock',
				'type'      => 'textblock',
				'desc'      => __('Congratulations, you created a gallery!', 'theme-text-domain'),
				'operator'  => 'and',
				'condition' => 'demo_show_gallery:is(on),demo_gallery:not()',
			),
			array(
				'label'     => __('Gallery', 'theme-text-domain'),
				'id'        => 'demo_gallery',
				'type'      => 'gallery',
				'desc'      => sprintf(__('This is a Gallery option type. It displays when %s.', 'theme-text-domain'), '<code>demo_show_gallery:is(on)</code>'),
				'condition' => 'demo_show_gallery:is(on)',
			),
			array(
				'label' => __('More Options', 'theme-text-domain'),
				'id'    => 'demo_more_options',
				'type'  => 'tab',
			),
			array(
				'label' => __('Text', 'theme-text-domain'),
				'id'    => 'demo_text',
				'type'  => 'text',
				'desc'  => __('This is a demo Text field.', 'theme-text-domain'),
			),
			array(
				'label' => __('Textarea', 'theme-text-domain'),
				'id'    => 'demo_textarea',
				'type'  => 'textarea',
				'desc'  => __('This is a demo Textarea field.', 'theme-text-domain'),
			),
		),
	);

	/**
	 * Register our meta boxes using the
	 * ot_register_meta_box() function.
	 */
	if (function_exists('ot_register_meta_box')) {
		ot_register_meta_box($my_meta_box);
		ot_register_meta_box($malik_overview_metabox);
	}
}