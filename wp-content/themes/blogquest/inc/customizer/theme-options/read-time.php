<?php
$widgets_link = admin_url( 'widgets.php' );

/*Add footer theme option*/
$wp_customize->add_section(
    'read_time_options' ,
    array(
        'title' => __( 'Read Time Options', 'blogquest' ),
        'panel' => 'blogquest_option_panel',
    )
);
$wp_customize->add_setting(
    'blogquest_options[enable_read_time_option]',
    array(
        'default'           => $default_options['enable_read_time_option'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[enable_read_time_option]',
    array(
        'label'       => __( 'Enable Read Time Option', 'blogquest' ),
        'section'     => 'read_time_options',
        'type'        => 'checkbox',
    )
);

/*Display read time in*/
$wp_customize->add_setting(
    'blogquest_options[display_read_time_in]',
    array(
        'default'           => $default_options['display_read_time_in'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new BlogQuest_Checkbox_Multiple(
        $wp_customize,
        'blogquest_options[display_read_time_in]',
        array(
            'label' => __( 'Display Read Time', 'blogquest' ),
            'section' => 'read_time_options',
            'choices' => array(
                'home-page' => __('Homepage', 'blogquest'),
                'single-page' => __('Single Page', 'blogquest'),
                'archive-page' => __('Archive Page', 'blogquest'),
            )
        )
    )
);


$wp_customize->add_setting(
    'blogquest_options[words_per_minute]',
    array(
        'default' => $default_options['words_per_minute'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'blogquest_options[words_per_minute]',
    array(
        'label' => __('Words Per Minute', 'blogquest'),
        'description' => __('Number of Words per minut', 'blogquest'),
        'section' => 'read_time_options',
        'type' => 'number',
        'input_attrs' => array('min' => 1, 'max' => 300, 'style' => 'width: 150px;'),
    )
);
