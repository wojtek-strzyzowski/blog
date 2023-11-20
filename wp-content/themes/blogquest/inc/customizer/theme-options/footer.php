<?php
$widgets_link = admin_url( 'widgets.php' );

/*Add footer theme option*/
$wp_customize->add_section(
    'footer_options' ,
    array(
        'title' => __( 'Footer Options', 'blogquest' ),
        'panel' => 'blogquest_option_panel',
    )
);

/* Footer Background Color*/
$wp_customize->add_setting(
    'blogquest_options[footer_bg_color]',
    array(
        'default' => $default_options['footer_bg_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'blogquest_options[footer_bg_color]',
        array(
            'label' => __('Footer Background Color', 'blogquest'),
            'section' => 'footer_options',
            'type' => 'color',
        )
    )
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'blogquest_options[enable_footer_sticky]',
    array(
        'default'           => $default_options['enable_footer_sticky'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_footer_sticky]',
    array(
        'label'    => __( 'Enable Sticky Footer', 'blogquest' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogquest_options[upload_footer_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'blogquest_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'blogquest_options[upload_footer_image]',
        array(
            'label'           => __( 'Upload Footer Image', 'blogquest' ),
            'section'         => 'footer_options',
            'active_callback' => 'blogquest_is_footer_sticky',
        )
    )
);

$wp_customize->add_setting(
    'blogquest_options[enable_footer_image_overlay]',
    array(
        'default'           => $default_options['enable_footer_image_overlay'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_footer_image_overlay]',
    array(
        'label'    => __( 'Enable Background Overlay', 'blogquest' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);
$wp_customize->add_setting(
    'blogquest_section_seperator_footer_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control(
        $wp_customize,
        'blogquest_section_seperator_footer_1',
        array(
            'settings' => 'blogquest_section_seperator_footer_1',
            'section' => 'footer_options',
        )
    )
);

/*Option to choose footer column layout*/
$wp_customize->add_setting(
    'blogquest_options[footer_column_layout]',
    array(
        'default'           => $default_options['footer_column_layout'],
        'sanitize_callback' => 'blogquest_sanitize_radio',
    )
);

$wp_customize->add_control(
    new BlogQuest_Radio_Image_Control(
        $wp_customize,
        'blogquest_options[footer_column_layout]',
        array(
            'label'       => __( 'Footer Column Layout', 'blogquest' ),
            'description' => sprintf( __( 'Footer widgetareas used will vary based on the footer column layout chosen. Head over to  <a href="%s" target="_blank">widgets</a> to see which footer widgetareas are used if you change the layout.', 'blogquest' ), $widgets_link ),
            'section'     => 'footer_options',
            'choices' => blogquest_get_footer_layouts()
        )
    )
);

$wp_customize->add_setting(
    'blogquest_section_seperator_footer_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control(
        $wp_customize,
        'blogquest_section_seperator_footer_2',
        array(
            'settings' => 'blogquest_section_seperator_footer_2',
            'section' => 'footer_options',
        )
    )
);
/**/

/*Copyright Text.*/
$wp_customize->add_setting(
    'blogquest_options[copyright_text]',
    array(
        'default'           => $default_options['copyright_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogquest_options[copyright_text]',
    array(
        'label'    => __( 'Copyright Text', 'blogquest' ),
        'section'  => 'footer_options',
        'type'     => 'text',
    )
);

/*Todays Date Format*/
$wp_customize->add_setting(
    'blogquest_options[copyright_date_format]',
    array(
        'default'           => $default_options['copyright_date_format'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogquest_options[copyright_date_format]',
    array(
        'label'    => __( 'Todays Date Format', 'blogquest' ),
        'description' => sprintf( wp_kses( __( '<a href="%s" target="_blank">Date and Time Formatting Documentation</a>.', 'blogquest' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://wordpress.org/support/article/formatting-date-and-time' ) ),
        'section'  => 'footer_options',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'blogquest_section_seperator_footer_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control(
        $wp_customize,
        'blogquest_section_seperator_footer_3',
        array(
            'settings' => 'blogquest_section_seperator_footer_3',
            'section' => 'footer_options',
        )
    )
);
/*Enable Footer Nav*/
$wp_customize->add_setting(
    'blogquest_options[enable_footer_nav]',
    array(
        'default'           => $default_options['enable_footer_nav'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_footer_nav]',
    array(
        'label'    => __( 'Show Footer Nav Menu', 'blogquest' ),
        'description' => sprintf( __( 'You can add/edit footer nav menu from <a href="%s">here</a>.', 'blogquest' ), "javascript:wp.customize.control( 'nav_menu_locations[footer-menu]' ).focus();" ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

/*Enable Footer Social Nav*/
$wp_customize->add_setting(
    'blogquest_options[enable_footer_social_nav]',
    array(
        'default'           => $default_options['enable_footer_social_nav'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_footer_social_nav]',
    array(
        'label'    => __( 'Show Social Nav Menu in Footer', 'blogquest' ),
        'description' => sprintf( __( 'You can add/edit social nav menu from <a href="%s">here</a>.', 'blogquest' ), "javascript:wp.customize.control( 'nav_menu_locations[social-menu]' ).focus();" ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

/*Enable scroll to top*/
$wp_customize->add_setting(
    'blogquest_options[enable_scroll_to_top]',
    array(
        'default'           => $default_options['enable_scroll_to_top'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_scroll_to_top]',
    array(
        'label'    => __( 'Show Scroll to top', 'blogquest' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogquest_section_seperator_footer_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control(
        $wp_customize,
        'blogquest_section_seperator_footer_4',
        array(
            'settings' => 'blogquest_section_seperator_footer_4',
            'section' => 'footer_options',
        )
    )
);

$wp_customize->add_setting(
    'blogquest_premium_notice',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new BlogQuest_Premium_Notice_Control( 
        $wp_customize,
        'blogquest_premium_notice',
        array(
            'label'      => esc_html__( 'Footer Option', 'blogquest' ),
            'settings' => 'blogquest_premium_notice',
            'section'       => 'footer_options',
        )
    )
);