<?php
$section  = 'advanced';
$priority = 1;
$prefix   = 'advanced_';

arrowpress_customizer()->add_field(array(
	'type'     => 'radio-buttonset',
	'settings' => 'setting_animation',
	'label'    => esc_html__('Show/Hide animation.', 'arangi'),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '0',
	'choices'  => array(
		'0' => esc_html__('No', 'arangi'),
		'1' => esc_html__('Yes', 'arangi'),
	),
));
arrowpress_customizer()->add_field(array(
	'type'     => 'select',
	'settings' => 'blog_css_animation',
	'label'    => esc_html__('Blog', 'arangi'),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => 'fadeInDown',
	'choices'  => Arangi_Helper::get_animation_list(),
	'required'  => array(
		array(
			'setting'  => 'setting_animation',
			'operator' => '==',
			'value'    => 1,
		),
	),
));
arrowpress_customizer()->add_field(array(
	'type'     => 'select',
	'settings' => 'product_css_animation',
	'label'    => esc_html__('Product', 'arangi'),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => 'fadeInDown',
	'choices'  => Arangi_Helper::get_animation_list(),
	'required'  => array(
		array(
			'setting'  => 'setting_animation',
			'operator' => '==',
			'value'    => 1,
		),
	),
));
arrowpress_customizer()->add_field(array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority++,
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '<div class="big_title">' . esc_html__('Go to top', 'arangi') . '</div>',
));
arrowpress_customizer()->add_field(array(
	'type'        => 'toggle',
	'settings'    => 'scroll_top_enable',
	'label'       => esc_html__('Go To Top Button', 'arangi'),
	'description' => esc_html__('Turn on to show go to top button.', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 1,
));
arrowpress_customizer()->add_field(array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority++,
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '<div class="big_title">' . esc_html__('Style', 'arangi') . '</div>',
));
arrowpress_customizer()->add_field(array(
	'type'        => 'toggle',
	'settings'    => 'custom_css_enable',
	'label'       => esc_html__('Custom CSS', 'arangi'),
	'description' => esc_html__('Turn on to enable custom css.', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 1,
));
arrowpress_customizer()->add_field(array(
	'type'      => 'code',
	'settings'  => 'custom_css',
	'section'   => $section,
	'priority'  => $priority++,
	'default'   => 'body{background-color:#fff;}',
	'choices'   => array(
		'language' => 'css',
		'theme'    => 'monokai',
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#arangi-style-inline-css',
			'function' => 'html',
		),
	),
));
arrowpress_customizer()->add_field(array(
	'type'        => 'toggle',
	'settings'    => 'custom_js_enable',
	'label'       => esc_html__('Custom Javascript', 'arangi'),
	'description' => esc_html__('Turn on to enable custom javascript', 'arangi'),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 0,
));
arrowpress_customizer()->add_field(array(
	'type'     => 'code',
	'settings' => 'custom_js',
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '
    (function ($) {
        "use strict";
    })(jQuery);',
	'choices'  => array(
		'language' => 'javascript',
		'theme'    => 'monokai',
	),
));
