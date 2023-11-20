<?php
/*Add Home Page Options Panel.*/
$wp_customize->add_panel(
    'theme_home_option_panel',
    array(
        'title' => __( 'Front Page Options', 'blogquest' ),
        'description' => __( 'Contains all front page settings', 'blogquest'),
        'priority' => 50
    )
);
/**/
$wp_customize->add_section(
    'home_page_banner_option',
    array(
        'title'      => __( 'Main Banner Options', 'blogquest' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'blogquest_options[enable_banner_section]',
    array(
        'default'           => $default_options['enable_banner_section'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_banner_section]',
    array(
        'label'   => __( 'Enable Banner Section', 'blogquest' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogquest_options[banner_section_slider_layout]',
    array(
        'default'           => $default_options['banner_section_slider_layout'],
        'sanitize_callback' => 'blogquest_sanitize_radio',
    )
);
$wp_customize->add_control(
    new BlogQuest_Radio_Image_Control(
        $wp_customize,
        'blogquest_options[banner_section_slider_layout]',
        array(
            'label' => __( 'Banner Slider Layout', 'blogquest' ),
            'section' => 'home_page_banner_option',
            'choices' => blogquest_get_slider_layouts()
        )
    )
);


$wp_customize->add_setting(
    'blogquest_options[number_of_slider_post]',
    array(
        'default'           => $default_options['number_of_slider_post'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[number_of_slider_post]',
    array(
        'label'       => __( 'Post In Slider', 'blogquest' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            '3' => __( '3', 'blogquest' ),
            '4' => __( '4', 'blogquest' ),
            '5' => __( '5', 'blogquest' ),
            '6' => __( '6', 'blogquest' ),
        ),
    )
);


$wp_customize->add_setting(
    'blogquest_options[slider_post_content_alignment]',
    array(
        'default'           => $default_options['slider_post_content_alignment'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[slider_post_content_alignment]',
    array(
        'label'       => __( 'Content Horizontal Alignment', 'blogquest' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            'justify-content-right' => __( 'Align Right', 'blogquest' ),
            'justify-content-center' => __( 'Align Center', 'blogquest' ),
            'justify-content-left' => __( 'Align Left', 'blogquest' ),
        ),
    )
);

$wp_customize->add_setting(
    'blogquest_options[banner_section_cat]',
    array(
        'default'           => $default_options['banner_section_cat'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[banner_section_cat]',
    array(
        'label'   => __( 'Choose Banner Category', 'blogquest' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => blogquest_post_category_list(),
    )
);

$wp_customize->add_setting(
    'blogquest_options[enable_banner_post_description]',
    array(
        'default'           => $default_options['enable_banner_post_description'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_banner_post_description]',
    array(
        'label'   => __( 'Enable Post Description', 'blogquest' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogquest_options[enable_banner_cat_meta]',
    array(
        'default'           => $default_options['enable_banner_cat_meta'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_banner_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'blogquest' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogquest_options[enable_banner_author_meta]',
    array(
        'default'           => $default_options['enable_banner_author_meta'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_banner_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'blogquest' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogquest_options[enable_banner_date_meta]',
    array(
        'default'           => $default_options['enable_banner_date_meta'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_banner_date_meta]',
    array(
        'label'   => __( 'Enable Date On Banner', 'blogquest' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogquest_options[enable_banner_overlay]',
    array(
        'default'           => $default_options['enable_banner_overlay'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_banner_overlay]',
    array(
        'label'   => __( 'Enable Banner Overlay', 'blogquest' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);