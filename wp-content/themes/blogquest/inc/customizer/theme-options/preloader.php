<?php
/*site layout Options*/
$wp_customize->add_section(
    'site_layout_options' ,
    array(
        'title' => __( 'Site Layout Options', 'blogquest' ),
        'panel' => 'blogquest_option_panel',
    )
);

$wp_customize->add_setting(
    'blogquest_options[site_layout_style]',
    array(
        'default'           => $default_options['site_layout_style'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[site_layout_style]',
    array(
        'label'       => __( 'Site Layout Style', 'blogquest' ),
        'section'     => 'site_layout_options',
        'type'        => 'select',
        'choices'     => array(
            'fullwidth-layout' => __( 'Full Width Layout', 'blogquest' ),
            'boxed-layout' => __( 'Boxed Layout', 'blogquest' ),
        ),

    )
);

/*Preloader Options*/
$wp_customize->add_section(
    'preloader_options' ,
    array(
        'title' => __( 'Preloader Options', 'blogquest' ),
        'panel' => 'blogquest_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'blogquest_options[show_preloader]',
    array(
        'default'           => $default_options['show_preloader'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[show_preloader]',
    array(
        'label'    => __( 'Show Preloader', 'blogquest' ),
        'section'  => 'preloader_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogquest_options[preloader_style]',
    array(
        'default'           => $default_options['preloader_style'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[preloader_style]',
    array(
        'label'       => __( 'Preloader Style', 'blogquest' ),
        'section'     => 'preloader_options',
        'type'        => 'select',
        'choices'     => array(
            'theme-preloader-spinner-1' => __( 'Style 1', 'blogquest' ),
            'theme-preloader-spinner-2' => __( 'Style 2', 'blogquest' ),
        ),
        'active_callback' => 'blogquest_is_show_preloader',

    )
);
