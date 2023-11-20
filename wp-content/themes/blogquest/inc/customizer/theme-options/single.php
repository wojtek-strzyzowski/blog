<?php

$wp_customize->add_section(
    'single_options' ,
    array(
        'title' => __( 'Single Options', 'blogquest' ),
        'panel' => 'blogquest_option_panel',
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'blogquest_options[single_sidebar_layout]',
    array(
        'default'           => $default_options['single_sidebar_layout'],
        'sanitize_callback' => 'blogquest_sanitize_radio',
    )
);
$wp_customize->add_control(
    new BlogQuest_Radio_Image_Control(
        $wp_customize,
        'blogquest_options[single_sidebar_layout]',
        array(
            'label' => __( 'Single Sidebar Layout', 'blogquest' ),
            'section' => 'single_options',
            'choices' => blogquest_get_general_layouts()
        )
    )
);

// Hide Side Bar on Mobile
$wp_customize->add_setting(
    'blogquest_options[hide_single_sidebar_mobile]',
    array(
        'default'           => $default_options['hide_single_sidebar_mobile'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[hide_single_sidebar_mobile]',
    array(
        'label'       => __( 'Hide Single Sidebar on Mobile', 'blogquest' ),
        'section'     => 'single_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogquest_section_seperator_single_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control(
        $wp_customize,
        'blogquest_section_seperator_single_1',
        array(
            'settings' => 'blogquest_section_seperator_single_1',
            'section'       => 'single_options',
        )
    )
);

/* Post Meta */
$wp_customize->add_setting(
    'blogquest_options[single_post_meta]',
    array(
        'default'           => $default_options['single_post_meta'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new BlogQuest_Checkbox_Multiple(
        $wp_customize,
        'blogquest_options[single_post_meta]',
        array(
            'label' => __( 'Single Post Meta', 'blogquest' ),
            'description'   => __( 'Choose the post meta you want to be displayed on post detail page', 'blogquest' ),
            'section' => 'single_options',
            'choices' => array(
                'author' => __( 'Author', 'blogquest' ),
                'date' => __( 'Date', 'blogquest' ),
                'comment' => __( 'Comment', 'blogquest' ),
                'category' => __( 'Category', 'blogquest' ),
                'tags' => __( 'Tags', 'blogquest' ),
            )
        )
    )
);



$wp_customize->add_setting(
    'blogquest_section_seperator_single_5',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control( 
        $wp_customize,
        'blogquest_section_seperator_single_5',
        array(
            'settings' => 'blogquest_section_seperator_single_5',
            'section'       => 'single_options',
        )
    )
);


$wp_customize->add_setting(
    'blogquest_options[show_sticky_article_navigation]',
    array(
        'default'           => $default_options['show_sticky_article_navigation'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[show_sticky_article_navigation]',
    array(
        'label'    => __( 'Show Sticky Article Navigation', 'blogquest' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Show Author Info Box start
*-------------------------------*/
$wp_customize->add_setting(
    'blogquest_section_seperator_single_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control( 
        $wp_customize,
        'blogquest_section_seperator_single_2',
        array(
            'settings' => 'blogquest_section_seperator_single_2',
            'section'       => 'single_options',
        )
    )
);

$wp_customize->add_setting(
    'blogquest_options[show_author_info]',
    array(
        'default'           => $default_options['show_author_info'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[show_author_info]',
    array(
        'label'    => __( 'Show Author Info Box', 'blogquest' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogquest_section_seperator_single_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control(
        $wp_customize,
        'blogquest_section_seperator_single_3',
        array(
            'settings' => 'blogquest_section_seperator_single_3',
            'section'       => 'single_options',
        )
    )
);

/*Show Related Posts
*-------------------------------*/
$wp_customize->add_setting(
    'blogquest_options[show_related_posts]',
    array(
        'default'           => $default_options['show_related_posts'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[show_related_posts]',
    array(
        'label'    => __( 'Show Related Posts', 'blogquest' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Related Posts Text.*/
$wp_customize->add_setting(
    'blogquest_options[related_posts_text]',
    array(
        'default'           => $default_options['related_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogquest_options[related_posts_text]',
    array(
        'label'    => __( 'Related Posts Text', 'blogquest' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'blogquest_is_related_posts_enabled',
    )
);

/* Number of Related Posts */
$wp_customize->add_setting(
    'blogquest_options[no_of_related_posts]',
    array(
        'default'           => $default_options['no_of_related_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'blogquest_options[no_of_related_posts]',
    array(
        'label'       => __( 'Number of Related Posts', 'blogquest' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'blogquest_is_related_posts_enabled',
    )
);

/*Related Posts Orderby*/
$wp_customize->add_setting(
    'blogquest_options[related_posts_orderby]',
    array(
        'default'           => $default_options['related_posts_orderby'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[related_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'blogquest' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'blogquest'),
            'id' => __('ID', 'blogquest'),
            'title' => __('Title', 'blogquest'),
            'rand' => __('Random', 'blogquest'),
        ),
        'active_callback' => 'blogquest_is_related_posts_enabled',
    )
);

/*Related Posts Order*/
$wp_customize->add_setting(
    'blogquest_options[related_posts_order]',
    array(
        'default'           => $default_options['related_posts_order'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[related_posts_order]',
    array(
        'label'       => __( 'Order', 'blogquest' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'blogquest'),
            'desc' => __('DESC', 'blogquest'),
        ),
        'active_callback' => 'blogquest_is_related_posts_enabled',
    )
);

$wp_customize->add_setting(
    'blogquest_section_seperator_single_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new BlogQuest_Seperator_Control(
        $wp_customize,
        'blogquest_section_seperator_single_4',
        array(
            'settings' => 'blogquest_section_seperator_single_4',
            'section'       => 'single_options',
        )
    )
);
/*Show Author Posts
*-----------------------------------------*/
$wp_customize->add_setting(
    'blogquest_options[show_author_posts]',
    array(
        'default'           => $default_options['show_author_posts'],
        'sanitize_callback' => 'blogquest_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogquest_options[show_author_posts]',
    array(
        'label'    => __( 'Show Author Posts', 'blogquest' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Author Posts Text.*/
$wp_customize->add_setting(
    'blogquest_options[author_posts_text]',
    array(
        'default'           => $default_options['author_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogquest_options[author_posts_text]',
    array(
        'label'    => __( 'Author Posts Text', 'blogquest' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'blogquest_is_author_posts_enabled',
    )
);

/* Number of Author Posts */
$wp_customize->add_setting(
    'blogquest_options[no_of_author_posts]',
    array(
        'default'           => $default_options['no_of_author_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'blogquest_options[no_of_author_posts]',
    array(
        'label'       => __( 'Number of Author Posts', 'blogquest' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'blogquest_is_author_posts_enabled',
    )
);

/*Author Posts Orderby*/
$wp_customize->add_setting(
    'blogquest_options[author_posts_orderby]',
    array(
        'default'           => $default_options['author_posts_orderby'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[author_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'blogquest' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'blogquest'),
            'id' => __('ID', 'blogquest'),
            'title' => __('Title', 'blogquest'),
            'rand' => __('Random', 'blogquest'),
        ),
        'active_callback' => 'blogquest_is_author_posts_enabled',
    )
);

/*Author Posts Order*/
$wp_customize->add_setting(
    'blogquest_options[author_posts_order]',
    array(
        'default'           => $default_options['author_posts_order'],
        'sanitize_callback' => 'blogquest_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogquest_options[author_posts_order]',
    array(
        'label'       => __( 'Order', 'blogquest' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'blogquest'),
            'desc' => __('DESC', 'blogquest'),
        ),
        'active_callback' => 'blogquest_is_author_posts_enabled',
    )
);