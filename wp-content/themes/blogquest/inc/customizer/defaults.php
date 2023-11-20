<?php
/**
 * Default customizer values.
 *
 * @package BlogQuest
 */
if ( ! function_exists( 'blogquest_get_default_customizer_values' ) ) :
	/**
	 * Get default customizer values.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default customizer values.
	 */
	function blogquest_get_default_customizer_values() {

		$defaults = array();
        // header image section
        $defaults['enable_header_bg_overlay'] = false;
        $defaults['header_image_size'] = 'none';

		//Site title options
        $defaults['hide_title'] = false;
		$defaults['hide_tagline'] = false;
		$defaults['site_title_text_size'] = 54;
        $defaults['site_tagline_text_size'] = 18;

        // General options
		$defaults['show_lightbox_image'] = false;
        $defaults['enable_cursor_dot_outline'] = false;
        
        $defaults['site_layout_style'] = 'boxed-layout';
        $defaults['show_preloader'] = true;
        $defaults['preloader_style'] = 'theme-preloader-spinner-1';
        $defaults['show_progressbar']           = false;
        $defaults['progressbar_position']       = 'top';
        $defaults['progressbar_color']          = '#f7775e';
        
        // header full aboutpage
        $defaults['enable_about_section'] = false;
        $defaults['about_post_title'] = esc_html__('Behind the Blog', 'blogquest');
        $defaults['upload_about_image'] = '';

        // header full page add
        $defaults['ed_header_ad'] = false;
        $defaults['ed_header_type'] = 'welcome-banner-default';
        $defaults['advertisement_section_title'] = esc_html__('Welcome Advertisement Message', 'blogquest');

        // Top bar.
        $defaults['enable_top_bar']      = true;
        $defaults['hide_topbar_on_mobile'] = false;

        $defaults['enable_topbar_social_icons'] = true;
        $defaults['enable_topbar_nav']        = true;

        $defaults['top_bar_bg_color'] = '#000000';
        $defaults['top_bar_text_color'] = '#fff';

        // Header
        $defaults['header_bg_color'] = '#ffffff';
        $defaults['header_style'] = 'header_style_1';
        $defaults['enable_top_nav'] = true;

        $defaults['enable_random_post'] = true;
        $defaults['random_post_category'] = '';

        $defaults['enable_search_on_header'] = true;
        $defaults['header_search_btn_style'] = 'style_1';
        $defaults['enable_mini_cart_header'] = true;
        $defaults['enable_woo_my_account'] = true;
        $defaults['enable_sticky_menu'] = true;

        // Dark Mode.
        $defaults['enable_dark_mode']          = true;
        $defaults['enable_dark_mode_switcher'] = true;
        $defaults['dark_mode_accent_color']    = '#066ac6';
        $defaults['dark_mode_bg_color']        = '#1e1e1e';
        $defaults['dark_mode_text_color']        = '#ffffff';

        // shop page
        $defaults['enable_shop_section']          = true;
        $defaults['shop_post_title'] = __('Shop Now', 'blogquest');
        $defaults['shop_post_description'] = '';
        $defaults['shop_number_of_column'] = 4;
        $defaults['shop_number_of_product'] = 4;
        $defaults['shop_select_product_from'] = 'recent-products';
        $defaults['select_product_category'] = '';
        $defaults['shop_post_button_text'] = __('Shop Now', 'blogquest');

        // Front Page
		$defaults['front_page_enable_sidebar'] = false;
		$defaults['hide_front_page_sidebar_mobile'] = false;
		$defaults['front_page_layout'] = 'right-sidebar';

        // Front Page category
        $defaults['enable_category_section'] = false;
        $defaults['number_of_category'] = '3';
        $defaults['category_post_title'] = __('Category Section', 'blogquest');

        // front page banner sectiion
        $defaults['enable_banner_section'] = true;
        $defaults['enable_banner_overlay'] = false;
        $defaults['banner_section_slider_layout'] = 'site-banner-layout-carousal';
        $defaults['number_of_slider_post'] = '4';
        $defaults['slider_post_content_alignment'] = 'justify-content-center';
        $defaults['banner_section_cat'] = '';
        $defaults['enable_banner_cat_meta'] = true;
        $defaults['enable_banner_post_description'] = false;
        $defaults['enable_banner_author_meta'] = true;
        $defaults['enable_banner_date_meta'] = true;

        // archive options
        $defaults['global_sidebar_layout'] = 'right-sidebar';
        $defaults['hide_global_sidebar_mobile'] = false;
        $defaults['excerpt_length'] = 25;
        $defaults['enable_excerpt_read_more'] = true;
        $defaults['excerpt_read_more'] = __('Continue Reading', 'blogquest');


        // Single options
        $defaults['single_sidebar_layout'] = 'right-sidebar';
        $defaults['hide_single_sidebar_mobile'] = false;
        $defaults['single_post_meta'] = array('author', 'date', 'comment', 'category', 'tags');
        
        $defaults['show_author_info'] = true;
        $defaults['show_sticky_article_navigation'] = true;

        $defaults['show_related_posts'] = true;
        $defaults['related_posts_text'] = __('You May Also Like', 'blogquest');
        $defaults['no_of_related_posts'] = 3;
        $defaults['related_posts_orderby'] = 'date';
        $defaults['related_posts_order'] = 'desc';
        $defaults['author_posts_orderby'] = 'date';
        $defaults['author_posts_order'] = 'desc';

        $defaults['show_author_posts'] = true;
        $defaults['author_posts_text'] = __('More From Author', 'blogquest');
        $defaults['no_of_author_posts'] = 3;

        // Archive
        $defaults['archive_style'] = 'archive_style_1';
        $defaults['archive_post_meta_1'] = array('author', 'date', 'comment', 'category');
        $defaults['archive_post_meta_2'] = array('author', 'date', 'category');
        $defaults['archive_post_meta_3'] = array('author', 'date', 'category');
        $defaults['archive_post_meta_4'] = array('category');

        // pagination
        $defaults['pagination_type'] = 'default';

        // readtime option
        $defaults['enable_read_time_option'] = true;
        $defaults['display_read_time_in'] =array('home-page','single-page','archive-page');
        $defaults['words_per_minute'] = 200;

        // footer related post
        $defaults['enable_footer_recommended_post_section'] = true;
        $defaults['footer_recommended_post_title'] = esc_html__( 'You May Also Like:', 'blogquest' );
        $defaults['enable_category_meta'] = true;
        $defaults['enable_post_excerpt'] = false;
        $defaults['enable_date_meta'] = true;
        $defaults['enable_author_meta'] = true;
        $defaults['select_cat_for_footer_recommended_post'] = '';

        /*Footer*/
        $defaults['enable_copyright'] = true;
        $defaults['footer_bg_color'] = '#ffffff';
        $defaults['footer_column_layout'] = 'footer_layout_1';
        $defaults['enable_footer_sticky'] = false;
        $defaults['enable_footer_image_overlay'] = false;
        $defaults['copyright_text'] = esc_html__( 'Copyright &copy;', 'blogquest' );
        $defaults['copyright_date_format'] = 'Y';
        $defaults['enable_footer_credit'] = true;
        $defaults['enable_footer_nav'] = false;
        $defaults['enable_footer_social_nav'] = false;
        $defaults['enable_scroll_to_top'] = true;


		$defaults = apply_filters( 'blogquest_default_customizer_values', $defaults );
		return $defaults;
	}
endif;