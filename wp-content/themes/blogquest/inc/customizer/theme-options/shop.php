<?php
$wp_customize->add_section(
    'home_page_shop_option',
    array(
        'title'      => __( 'Shop  Section Options', 'blogquest' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'blogquest_options[enable_shop_section]',
    array(
        'default'           => $default_options['enable_shop_section'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_shop_section]',
    array(
        'label'   => __( 'Enable Shop Section', 'blogquest' ),
        'section' => 'home_page_shop_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogquest_options[shop_post_title]',
    array(
        'default'           => $default_options['shop_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogquest_options[shop_post_title]',
    array(
        'label'    => __( 'Shop Post Title', 'blogquest' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'blogquest_options[shop_post_description]',
    array(
        'default'           => $default_options['shop_post_description'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogquest_options[shop_post_description]',
    array(
        'label'    => __( 'Shop Post Description', 'blogquest' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'textarea',
    )
);

$wp_customize->add_setting(
    'blogquest_options[shop_select_product_from]',
    array(
        'default'           => $default_options['shop_select_product_from'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[shop_select_product_from]',
    array(
        'label'       => __( 'Select Product From', 'blogquest' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            'custom'            => __('Custom Select', 'blogquest'),
            'recent-products'   => __('Recent Products', 'blogquest'),
            'popular-products'  => __('Popular Products', 'blogquest'),
            'sale-products'     => __('Sale Products', 'blogquest'),
        )
    )
);


$wp_customize->add_setting(
    'blogquest_options[select_product_category]',
    array(
        'default'           => $default_options['select_product_category'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[select_product_category]',
    array(
        'label'   => __( 'Select Product Category', 'blogquest' ),
        'section' => 'home_page_shop_option',
        'type'        => 'select',
        'choices'     => blogquest_woocommerce_product_cat(),
        'active_callback' => 'blogquest_shop_select_product_from'
    )
);

$wp_customize->add_setting(
    'blogquest_options[shop_number_of_column]',
    array(
        'default'           => $default_options['shop_number_of_column'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[shop_number_of_column]',
    array(
        'label'       => __( 'Select Number Of Column', 'blogquest' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'blogquest'),
            '3'  => __('3', 'blogquest'),
            '4'  => __('4', 'blogquest'),
        )
    )
);

$wp_customize->add_setting(
    'blogquest_options[shop_number_of_product]',
    array(
        'default'           => $default_options['shop_number_of_product'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[shop_number_of_product]',
    array(
        'label'       => __( 'Select Number Of Product', 'blogquest' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'blogquest'),
            '3'  => __('3', 'blogquest'),
            '4'  => __('4', 'blogquest'),
            '5'  => __('5', 'blogquest'),
            '6'  => __('6', 'blogquest'),
            '7'  => __('7', 'blogquest'),
            '8'  => __('8', 'blogquest'),
            '9'  => __('9', 'blogquest'),
            '10'  => __('10', 'blogquest'),
            '11'  => __('11', 'blogquest'),
            '12'  => __('12', 'blogquest'),
        )
    )
);

$wp_customize->add_setting(
    'blogquest_options[shop_post_button_text]',
    array(
        'default'           => $default_options['shop_post_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogquest_options[shop_post_button_text]',
    array(
        'label'    => __( 'Shop section Button Text', 'blogquest' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);
$wp_customize->add_setting(
    'blogquest_options[shop_post_button_url]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'blogquest_options[shop_post_button_url]',
    array(
        'label'           => __( 'Button Link', 'blogquest' ),
        'section'         => 'home_page_shop_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the image to have a link', 'blogquest' ),
    )
);