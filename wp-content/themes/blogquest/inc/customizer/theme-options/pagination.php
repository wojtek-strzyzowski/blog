<?php
$wp_customize->add_section(
    'pagination_options' ,
    array(
        'title' => __( 'Pagination Options', 'blogquest' ),
        'panel' => 'blogquest_option_panel',
    )
);

/* Pagination Type*/
$wp_customize->add_setting(
    'blogquest_options[pagination_type]',
    array(
        'default'           => $default_options['pagination_type'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[pagination_type]',
    array(
        'label'       => __( 'Pagination Type', 'blogquest' ),
        'section'     => 'pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'default' => __( 'Default (Older / Newer Post)', 'blogquest' ),
            'numeric' => __( 'Numeric', 'blogquest' ),
            'ajax_load_on_click' => __( 'Load more post on click', 'blogquest' ),
            'ajax_load_on_scroll' => __( 'Load more posts on scroll', 'blogquest' ),
        ),
    )
);
