<?php
$wp_customize->add_section(
   'topbar_options' ,
    array(
        'title' => __( 'Topbar Options', 'blogquest' ),
        'panel' => 'blogquest_option_panel',
    )
);

/*Enable Top Bar*/
$wp_customize->add_setting(
    'blogquest_options[enable_top_bar]',
    array(
        'default'           => $default_options['enable_top_bar'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_top_bar]',
    array(
        'label'    => __( 'Enable Top Bar', 'blogquest' ),
        'section'  => 'topbar_options',
        'type'     => 'checkbox',
    )
);

/*Hide Top Bar on Mobile*/
$wp_customize->add_setting(
    'blogquest_options[hide_topbar_on_mobile]',
    array(
        'default'           => $default_options['hide_topbar_on_mobile'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[hide_topbar_on_mobile]',
    array(
        'label'    => __( 'Hide Top Bar on Mobile', 'blogquest' ),
        'section'  => 'topbar_options',
        'type'     => 'checkbox',
        'active_callback'  => 'blogquest_is_top_bar_enabled'
    )
);

/*Enable Top Social Nav*/
$wp_customize->add_setting(
    'blogquest_options[enable_topbar_social_icons]',
    array(
        'default'           => $default_options['enable_topbar_social_icons'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_topbar_social_icons]',
    array(
        'label'    => __( 'Enable Top Bar Social Nav Menu', 'blogquest' ),
        'description' => sprintf( __( 'You can add/edit social nav menu from <a href="%s">here</a>.', 'blogquest' ), "javascript:wp.customize.control( 'nav_menu_locations[social-menu]' ).focus();" ),
        'section'  => 'topbar_options',
        'type'     => 'checkbox',
        'active_callback'  => 'blogquest_is_top_bar_enabled'
    )
);

/*Enable Top Nav*/
$wp_customize->add_setting(
    'blogquest_options[enable_topbar_nav]',
    array(
        'default'           => $default_options['enable_topbar_nav'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_topbar_nav]',
    array(
        'label'    => __( 'Enable Top Bar Nav Menu', 'blogquest' ),
        'description' => sprintf( __( 'You can add/edit top nav menu from <a href="%s">here</a>.', 'blogquest' ), "javascript:wp.customize.control( 'nav_menu_locations[top-menu]' ).focus();" ),
        'section'  => 'topbar_options',
        'type'     => 'checkbox',
        'active_callback'  => 'blogquest_is_top_bar_enabled'
    )
);

/*Enable Search*/
$wp_customize->add_setting(
    'blogquest_options[enable_search_on_header]',
    array(
        'default'           => $default_options['enable_search_on_header'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_search_on_header]',
    array(
        'label'    => __( 'Enable Search Icon', 'blogquest' ),
        'section'  => 'topbar_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogquest_section_seperator_header_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control(
        $wp_customize,
        'blogquest_section_seperator_header_3',
        array(
            'settings' => 'blogquest_section_seperator_header_3',
            'section' => 'topbar_options',
        )
    )
);

$wp_customize->add_setting(
    'blogquest_options[enable_random_post]',
    array(
        'default' => $default_options['enable_random_post'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_random_post]',
    array(
        'label' => esc_html__('Enable Random Post', 'blogquest'),
        'section' => 'topbar_options',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogquest_options[random_post_category]',
    array(
        'default'           => $default_options['random_post_category'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(new BlogQuest_Dropdown_Taxonomies_Control(
    $wp_customize, 
    'blogquest_options[random_post_category]',
        array(
            'label'           => esc_html__('Random Post Category', 'blogquest'),
            'section'         => 'topbar_options',
        )
    )
);


/*Top Bar background Color*/
$wp_customize->add_setting(
    'blogquest_options[top_bar_bg_color]',
    array(
        'default' => $default_options['top_bar_bg_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'blogquest_options[top_bar_bg_color]',
        array(
            'label' => __('Top Bar Background Color', 'blogquest'),
            'section' => 'topbar_options',
            'type' => 'color',
            'active_callback'  => 'blogquest_is_top_bar_enabled'
        )
    )
);

$wp_customize->add_setting(
    'blogquest_options[top_bar_text_color]',
    array(
        'default' => $default_options['top_bar_text_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'blogquest_options[top_bar_text_color]',
        array(
            'label' => __('Top Bar Text Color', 'blogquest'),
            'section' => 'topbar_options',
            'type' => 'color',
            'active_callback'  => 'blogquest_is_top_bar_enabled'
        )
    )
);

/* ========== Progressbar Section. ==========*/
$wp_customize->add_section(
    'progressbar_options',
    array(
        'title' => __( 'Progressbar Options', 'blogquest' ),
        'panel' => 'blogquest_option_panel',
    )
);
/*Show progressbar*/
$wp_customize->add_setting(
    'blogquest_options[show_progressbar]',
    array(
        'default'           => $default_options['show_progressbar'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[show_progressbar]',
    array(
        'label'   => __( 'Show Progressbar', 'blogquest' ),
        'section' => 'progressbar_options',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogquest_options[progressbar_position]',
    array(
        'default'           => $default_options['progressbar_position'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[progressbar_position]',
    array(
        'label'           => __( 'Progressbar Position', 'blogquest' ),
        'section'         => 'progressbar_options',
        'type'            => 'select',
        'choices'         => array(
            'top'    => __( 'Top', 'blogquest' ),
            'bottom' => __( 'Bottom of the browser window', 'blogquest' ),
        ),
        'active_callback' => 'blogquest_is_progressbar_enabled',
    )
);

$wp_customize->add_setting(
    'blogquest_options[progressbar_color]',
    array(
        'default'           => $default_options['progressbar_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'blogquest_options[progressbar_color]',
        array(
            'label'           => __( 'Progressbar Color', 'blogquest' ),
            'section'         => 'progressbar_options',
            'type'            => 'color',
            'active_callback' => 'blogquest_is_progressbar_enabled',
        )
    )
);