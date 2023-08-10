<?php
$section  = 'typography-config';
$priority = 1;
$prefix   = 'general_';
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_note' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="desc"><strong class="insight-label insight-label-info">' . esc_html__( 'IMPORTANT NOTE: ', 'arangi' ) . '</strong>' . esc_html__( 'This section contains general typography options. Additional typography options for specific areas can be found within other sections. Example: For breadcrumb typography options go to the breadcrumb section.', 'arangi' ) . '</div>',
) );
/*--------------------------------------------------------------
# Link color
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
	'type'        => 'typography',
	'settings'    => 'font_family_default',
	'label'       => esc_html__( 'Font Family Default', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => 'Domine',
	),
	'output'      => array(
		array(
			'element' => 'body,
                    .account-popup .login-password .forgot-pass,
                    .account-popup .checkcontainer,
                    .search-box .ui-autocomplete li .search-content .search-info .price,
                    .contact-delivery ul.list-info-contact li,
                    .woocommerce div.entry-summary form.cart .variations .label span.wcva_selected_attribute,
                    .woocommerce-checkout-review-order-table .cart_item .product-name .product-info .woocommerce-Price-amount,
                    .woocommerce-checkout-review-order-table tfoot tr,
                    span.label-product.on-sale.percentage,
                    .box-icon.icon-gradient .elementor-icon-box-description,
                    .date_from_to,
                    .apr-product.product-list.list-1 .product-image span.label-product,
                    .apr-product.product-list.list-1 .woocommerce ul.products li.type-product .price,
                    .page-404 .page-title,
                    .page-404 p,
                    .woocommerce .box-cart-total table.shop_table tbody th,
                    .woocommerce .box-cart-total table.shop_table tbody td,
                    .custom-date,
                    .quote_section blockquote .quote_link,
                    .tm-posts-widget .post-widget-info .post-widget-categories a,
                    .blog-slide .blog_info .info a,
                    .wp-img-box .wp-image,
                    .wpulike .count-box,
                    .comment-content .comment-text .name-author,
                    .blog-grid.grid-style2 .blog_info .info a,
                    .blog-masonry .blog_info .info a,
                    .page-numbers:not(.prev),
                    .page-numbers:not(.next),
                    .woocommerce-checkout-review-order-table tfoot tr th,
                    .woocommerce-checkout-review-order-table tfoot tr td',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'typography',
	'settings'    => 'font_family_heading',
	'label'       => esc_html__( 'Font Family Heading', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => 'Raleway',
	),
	'output'      => array(
		array(
			'element' => 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6,th,
                    .btn,
                    .scroll-to-top,
                    .breadcrumb li:before,
                    .page-numbers.prev,
                    .page-numbers.next,
                    .pagination-content.type-button li a,
                    .box-link,
                    .woocommerce div.entry-summary form.cart .variations .label,
                    .woocommerce div.entry-summary form.cart button[type="submit"],
                    .woocommerce-checkout-review-order-table .cart_item .product-name .product-info,
                    .woocommerce-checkout-review-order-table .cart_item .product-name .product-info .product-title,
                    span.label-item,
                    .label-product,
                    .woocommerce .woocommerce-ordering label,
                    .product-action .action-item .add-cart-btn a,
                    .woocommerce div.entry-summary form.cart button[type=submit],
                    .box-deal figcaption.widget-image-caption .box-dl,
                    .page-coming-soon .coming-soon .cm-info,
                    .page-coming-soon .coming-subcribe .mc4wp-form-fields input[type=email],
                    .woocommerce table.shop_table th,
                    #add_payment_method .wc-proceed-to-checkout a.checkout-button,
                    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, 
                    .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button,
                    .woocommerce #respond input#submit, .woocommerce a.button, 
                    .woocommerce button.button, .woocommerce input.button,
                    .shop_table thead tr th,
                    .shop_table.cart tbody  td.actions > button,
                    .shop_table.cart .product-cart-content .product-name,
                    .woocommerce-account .woocommerce-MyAccount-navigation,
                    .woocommerce .checkout h3,
                    .woocommerce .checkout h4,
                    .woocommerce-order-details h2,
                    .woocommerce-customer-details h2,
                    .woocommerce-account .woocommerce-MyAccount-content form.edit-account fieldset legend,
                    .post-name a,
                    .blog-grid.grid-style2 .read-more a,
                    .blog_info .info a,
                    .link_section .link-icon,
                    .quote_section blockquote .author_info,
                    .btn-viewmore a,
                    .load_more_button a,
                    .tm-posts-widget .post-widget-info .post-widget-title,
                    .author-post span,
                    .widget-title,
                    .footer-newsletter.newsletter-style1 .mc4wp-form-fields input[type=submit],
                    .newsletter-style2 .mc4wp-form-fields input[type=submit],
                    .languges-flags,
                    .header-01 .header-search-category .search-field,
                    .header-01 .header-search-category .search-field::placeholder,
                    .text-items ,
                    .cart-header a.button,
                    .header-icon .account-header .content-filter,
                    .header-01 .col-bottom-left .box-label,
                    .account-popup .nav-tabs .nav-item a,
                    .account-popup .woocommerce-form .form-row label,
                    .search-box .search-form .search-input,
                    .search-box .search-form .search-input::placeholder,
                    .search-box .search-no-results p,
                    .search-box .ui-autocomplete,
                    .woo-list-category,
                    .active-sidebar .widget.widget_product_categories ul.product-categories li,
                    .active-sidebar .widget.yith-woocompare-widget .products-list li,
                    .widget.brand li a,
                    .mega-menu, .blog_info .info.info-comment, 
                    .menu-mobile .mega-menu',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_link' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Link', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'link_color',
	'label'       => esc_html__( 'Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of all links.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#333',
	'output'      => array(
		array(
			'element'  => 'body a',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => $prefix . 'link_color_hover',
	'label'       => esc_html__( 'Hover Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of all links when hover.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => 'body a:hover,body a:focus',
			'property' => 'color',
		),
	),
) );
/*--------------------------------------------------------------
# Body Typography
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_body' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Body Typography', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'typography',
	'settings'    => $prefix . 'body',
	'label'       => esc_html__( 'Font family', 'arangi' ),
	'description' => esc_html__( 'These settings control the typography for all body text.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => Arangi::PRIMARY_FONT,
		'variant'        => 'regular',
		'line-height'    => '24px',
		'letter-spacing' => '0',
	),
	'choices'     => array(
		'variant' => array(
			'100',
			'100italic',
			'200',
			'200italic',
			'300',
			'300italic',
			'regular',
			'italic',
			'500',
			'500italic',
			'600',
			'600italic',
			'700',
			'700italic',
			'800',
			'800italic',
			'900',
			'900italic',
		),
	),
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'body_color',
	'label'       => esc_html__( 'Body Text Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of body text.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#6d6b6c',
	'output'      => array(
		array(
			'element'  => 'body',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'      => 'slider',
	'settings'  => 'body_font_size',
	'label'     => esc_html__( 'Font size', 'arangi' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 14,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => 'body',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
) );
/*--------------------------------------------------------------
# Heading typography
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_heading' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Heading Typography', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'typography',
	'settings'    => $prefix . 'heading',
	'label'       => esc_html__( 'Font family', 'arangi' ),
	'description' => esc_html__( 'These settings control the typography for all heading text.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => ' 700',
		'line-height'    => 'normal',
		'letter-spacing' => '0',
	),
	'choices'     => array(
		'variant' => array(
			'100',
			'100italic',
			'200',
			'200italic',
			'300',
			'300italic',
			'regular',
			'italic',
			'500',
			'500italic',
			'600',
			'600italic',
			'700',
			'700italic',
			'800',
			'800italic',
			'900',
			'900italic',
		),
	),
	'output'      => array(
		array(
			'element' => 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6,th',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'heading_color',
	'label'       => esc_html__( 'Heading Color', 'arangi' ),
	'description' => esc_html__( 'Controls the color of heading.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Arangi::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6,th',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'slider',
	'settings'    => 'h1_font_size',
	'label'       => esc_html__( 'Font size', 'arangi' ),
	'description' => esc_html__( 'H1', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 35,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h1,.h1',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'slider',
	'settings'    => 'h2_font_size',
	'description' => esc_html__( 'H2', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 30,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h2,.h2',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'slider',
	'settings'    => 'h3_font_size',
	'description' => esc_html__( 'H3', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 25,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h3,.h3',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'slider',
	'settings'    => 'h4_font_size',
	'description' => esc_html__( 'H4', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 14,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h4,.h4',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'slider',
	'settings'    => 'h5_font_size',
	'description' => esc_html__( 'H5', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 13,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h5,.h5',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'slider',
	'settings'    => 'h6_font_size',
	'description' => esc_html__( 'H6', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 12,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h6,.h6',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
) );
/*--------------------------------------------------------------
# Button Color
--------------------------------------------------------------*/
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_button' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Button', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'button_background_color',
	'label'       => esc_html__( 'Background Color', 'arangi' ),
	'description' => esc_html__( 'Controls the background color of all buttons.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => 'button, button.btn.btn-primary,.btn.btn-border',
			'property' => 'background-color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'button_border_color',
	'label'       => esc_html__( 'Border Color', 'arangi' ),
	'description' => esc_html__( 'Controls the border color of buttons has border.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => 'button.btn.btn-primary,button,.btn.btn-border',
			'property' => 'border-color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'button_text_color',
	'label'       => esc_html__( 'Text Color', 'arangi' ),
	'description' => esc_html__( 'Controls the text color of all buttons.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => 'button.btn.btn-primary,button, .btn.btn-border',
			'property' => 'color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_hover_color' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Hover Colors', 'arangi' ) . '</div>',
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'button_background_hover',
	'label'       => esc_html__( 'Background Color', 'arangi' ),
	'description' => esc_html__( 'Controls the background color when hover of all buttons.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => 'button.btn.btn-primary.btn-hover, button.btn.btn-primary:active, button.btn.btn-primary:focus, button.btn.btn-primary:hover,
			button:hover, button:focus, button:active, .btn.btn-border:hover, .btn.btn-border:focus, .btn.btn-border:active',
			'property' => 'background-color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'button_hover_border_color',
	'label'       => esc_html__( 'Border Color', 'arangi' ),
	'description' => esc_html__( 'Controls the border color when hover of buttons has border.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => 'button.btn.btn-primary.btn-hover, button.btn.btn-primary:active, button.btn.btn-primary:focus, button.btn.btn-primary:hover,
			button:hover, button:focus, button:active,
			.btn.btn-border:hover, .btn.btn-border:focus, .btn.btn-border:active',
			'property' => 'border-color',
		),
	),
) );
arrowpress_customizer() ->add_field(   array(
	'type'        => 'color',
	'settings'    => 'button_hover_text_color',
	'label'       => esc_html__( 'Text Color', 'arangi' ),
	'description' => esc_html__( 'Controls the text color when hover of all buttons.', 'arangi' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => 'button.btn.btn-primary.btn-hover, button.btn.btn-primary:active, button.btn.btn-primary:focus, .btn.btn-primary:hover,
			button:hover, button:focus, button:active,
			.btn.btn-border:hover, .btn.btn-border:focus, .btn.btn-border:active',
			'property' => 'color',
		),
	),
) );