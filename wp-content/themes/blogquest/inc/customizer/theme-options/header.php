<?php
$wp_customize->add_setting(
    'blogquest_options[enable_header_bg_overlay]',
    array(
        'default'           => $default_options['enable_header_bg_overlay'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_header_bg_overlay]',
    array(
        'label'    => __( 'Enable Image Overlay', 'blogquest' ),
        'section'  => 'header_image',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogquest_options[header_image_size]',
    array(
        'default'           => $default_options['header_image_size'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[header_image_size]',
    array(
        'label'       => __( 'Select Header Size', 'blogquest' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'blogquest' ),

        'section'     => 'header_image',
        'type'        => 'select',
        'choices'     => array(
            'none' => __( 'Default', 'blogquest' ),
            'small' => __( 'Small', 'blogquest' ),
            'medium' => __( 'Medium', 'blogquest' ),
            'large' => __( 'Large', 'blogquest' ),
        ),
    )
);
/*Header Options*/
$wp_customize->add_section(
    'header_options' ,
    array(
        'title' => __( 'Header Options', 'blogquest' ),
        'panel' => 'blogquest_option_panel',
    )
);

$wp_customize->add_setting(
    'blogquest_section_seperator_header_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control(
        $wp_customize,
        'blogquest_section_seperator_header_1',
        array(
            'settings' => 'blogquest_section_seperator_header_1',
            'section' => 'header_options',
        )
    )
);

/* Header Style */
$wp_customize->add_setting(
    'blogquest_options[header_style]',
    array(
        'default'           => $default_options['header_style'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[header_style]',
    array(
        'label'       => __( 'Header Style', 'blogquest' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'blogquest' ),

        'section'     => 'header_options',
        'type'        => 'select',
        'choices'     => array(
            'header_style_1' => __( 'Header Style 1', 'blogquest' ),
            'header_style_2' => __( 'Header Style 2', 'blogquest' ),
            'header_style_3' => __( 'Header Style 3', 'blogquest' ),
        ),
    )
);

$wp_customize->add_setting(
    'blogquest_section_seperator_header_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control(
        $wp_customize,
        'blogquest_section_seperator_header_2',
        array(
            'settings' => 'blogquest_section_seperator_header_2',
            'section' => 'header_options',
        )
    )
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'blogquest_options[enable_sticky_menu]',
    array(
        'default'           => $default_options['enable_sticky_menu'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_sticky_menu]',
    array(
        'label'    => __( 'Enable Sticky Menu', 'blogquest' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogquest_section_seperator_header_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control(
        $wp_customize,
        'blogquest_section_seperator_header_4',
        array(
            'settings' => 'blogquest_section_seperator_header_4',
            'section' => 'header_options',
        )
    )
);

if(class_exists( 'WooCommerce' )){
    
    /*Enable Mini Cart Icon on header*/
    $wp_customize->add_setting(
        'blogquest_options[enable_mini_cart_header]',   
        array(
            'default'           => $default_options['enable_mini_cart_header'],
            'sanitize_callback' => 'blogquest_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'blogquest_options[enable_mini_cart_header]',
        array(
            'label'    => __( 'Enable Mini Cart Icon', 'blogquest' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );

    /*Enable Myaccount Link*/
    $wp_customize->add_setting(
        'blogquest_options[enable_woo_my_account]',   
        array(
            'default'           => $default_options['enable_woo_my_account'],
            'sanitize_callback' => 'blogquest_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'blogquest_options[enable_woo_my_account]',
        array(
            'label'    => __( 'Enable My Account Icon', 'blogquest' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );
}