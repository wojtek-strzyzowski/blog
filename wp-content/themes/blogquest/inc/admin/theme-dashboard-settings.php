<?php
/**
 * Theme activation.
 * @package BlogQuest
 * Theme Dashboard [Free VS Pro]
 */
function blogquest_free_vs_pro_html() {
	ob_start();
	?>
	<div class="theme-admin-title"><?php esc_html_e( 'Differences between BlogQuest and BlogQuest Pro', 'blogquest' ); ?></div>
	<div class="theme-admin-description"><?php esc_html_e( 'Here are some of the differences between BlogQuest and BlogQuest Pro:', 'blogquest' ); ?></div>

	<table class="freemium-comparison-table">
		<thead>
			<tr>
				<th><?php esc_html_e( 'Feature', 'blogquest' ); ?></th>
				<th><?php esc_html_e( 'BlogQuest', 'blogquest' ); ?></th>
				<th><?php esc_html_e( 'BlogQuest Pro', 'blogquest' ); ?></th>
			</tr>
		</thead>
		<tbody>
            <tr>
                <td><?php esc_html_e( 'Responsive Design', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Multiple Blog Layouts', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Live editing in Customizer', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'One Click Demo Import', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>

            <tr>
                <td><?php esc_html_e( 'Access to all Google Fonts', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Access to Color Options', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
			<tr>
				<td><?php esc_html_e( 'Preloader Option', 'blogquest' ); ?></td>
				<td><span class="theme-dashboard-badge">2</span></td>
				<td><span class="theme-dashboard-badge">5</span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Multiple Header Options', 'blogquest' ); ?></td>
				<td><span class="theme-dashboard-badge">3 Layouts</span></td>
				<td><span class="theme-dashboard-badge">5 Layouts</span></td>
			</tr>
            <tr>
                <td><?php esc_html_e( 'Logo and Title Customization', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Header Image', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Custom Widgets', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Frontpage Banner', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge">2 Layouts</span></td>
                <td><span class="theme-dashboard-badge">3 Layouts</span></td>
            </tr>
			<tr>
				<td><?php esc_html_e( 'Hide Theme Credit Link', 'blogquest' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Extra Widget Area', 'blogquest' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Instagram Module', 'blogquest' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Twitter Module', 'blogquest' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Table of Contents', 'blogquest' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Share Buttons', 'blogquest' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Maintenance mode', 'blogquest' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Hooks system', 'blogquest' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
            <tr>
                <td><?php esc_html_e( 'Translations Ready', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'SEO Optimized', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'RTL Compatibility', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'WooCommerce Compatibility', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Breadcrumbs Module', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Gutenberg Compatibility', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Footer Widgets Section', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Display Related Posts', 'blogquest' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
			<tr>
				<td><?php esc_html_e( 'Support', 'blogquest' ); ?></td>
				<td><span class="theme-dashboard-badge">Normal Support</span></td>
				<td><span class="theme-dashboard-badge">Dedicated Priority Support</span></td>
			</tr>
		</tbody>
	</table>

	<div class="theme-admin-separator"></div>

	<h4>
		<a href="https://www.themeinwp.com/theme/blogquest-pro/#compare-all-features" target="_blank">
			<?php esc_html_e( 'How BlogQuest and BlogQuest Pro are different from each other - here\'s the complete list.', 'blogquest' ); ?>
		</a>
	</h4>

	<div class="theme-admin-separator"></div>

    <div class="theme-admin-button-wrap">
		<a href="https://www.themeinwp.com/theme/blogquest-pro/" class="button theme-admin-button admin-button-primaryx">
			<?php esc_html_e( 'Get BlogQuest Pro Today', 'blogquest' ); ?>
		</a>
    </div>
	<?php
	return ob_get_clean();
}

/**
 * Theme Dashboard Settings
 *
 * @param array $settings The settings.
 */
function blogquest_dashboard_settings( $settings ) {

	// Starter.

	// Hero.
	$settings['hero_title']       = esc_html__( 'Welcome to BlogQuest', 'blogquest' );
	$settings['hero_themes_desc'] = esc_html__( 'Your installation of BlogQuest is complete and ready for use. We\'ve prepared a unique onboarding process through our Getting started page. It helps you get started and configure your upcoming website with ease. Let\'s make it shine!', 'blogquest' );
	$settings['hero_desc']        = esc_html__( 'BlogQuest is now installed and ready to go. To help you with the next step, we\'ve gathered together on this page all the resources you might need. We hope you enjoy using BlogQuest.', 'blogquest' );
	$settings['hero_image']       = get_template_directory_uri() . '/inc/admin/dashboard/images/welcome-banner.png';

	// Tabs.
	$settings['tabs'] = array(
		array(
			'name'    => esc_html__( 'Theme Features', 'blogquest' ),
			'type'    => 'features',
			'visible' => array( 'free', 'pro' ),
			'data' => array(
                array(
                    'name' => esc_html__('Add Background Image', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=background_image'),
                ),
                array(
                    'name' => esc_html__('Add Widgets', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[panel]=widgets'),
                ),
                array(
                    'name' => esc_html__('Change Site Title or Logo', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=title_tagline'),
                ),
                array(
                    'name' => esc_html__('Topbar Options', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=topbar_options'),
                ),
                array(
                    'name' => esc_html__('Header Options', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=header_options'),
                ),
                array(
                    'name' => esc_html__('Progressbar Options', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=progressbar_options'),
                ),
                array(
                    'name' => esc_html__('Color Options', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=colors'),
                ),
                array(
                    'name' => esc_html__('Archive Options', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=archive_options'),
                ),
                array(
                    'name' => esc_html__('Single Options', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=single_options'),
                ),
                array(
                    'name' => esc_html__('Pagination Options', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=pagination_options'),
                ),
                array(
                    'name' => esc_html__('Footer Options', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=footer_options'),
                ),
                array(
                    'name' => esc_html__('Read Time Options', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=read_time_options'),
                ),
                array(
                    'name' => esc_html__('Dark/Light Mode Options', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=dark_mode_options'),
                ),
                array(
                    'name' => esc_html__('Preloader Options', 'blogquest'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=preloader_options'),
                ),
            ),
		),
		array(
			'name'    => esc_html__( 'Free vs PRO', 'blogquest' ),
			'type'    => 'html',
			'visible' => array( 'free' ),
			'data'    => blogquest_free_vs_pro_html(),
		),
		array(
			'name'    => esc_html__( 'Performance optimization tools', 'blogquest' ),
			'type'    => 'performance',
			'visible' => array( 'free', 'pro' ),
		),
	);
	
	$settings['tabs'][0]['data'] = array_merge( $settings['tabs'][0]['data'], array(
		array(
			'name'          => esc_html__( 'Typography Option', 'blogquest' ),
			'type'          => 'pro',
			'customize_uri' => '/wp-admin/customize.php?autofocus[section]=typography_options',
		),
        array(
            'name'          => esc_html__( 'Remove Footer credits', 'blogquest' ),
            'type'          => 'pro',
            'customize_uri' => admin_url( '/customize.php?autofocus[section]=footer_options' ),
        ),
		array(
			'name'          => esc_html__( 'Extra Widget Area', 'blogquest' ),
			'type'          => 'pro',
            'customize_uri' => admin_url('/customize.php?autofocus[panel]=widgets'),
		),
		array(
			'name'          => esc_html__( 'Google Maps', 'blogquest' ),
			'type'          => 'pro',
			'customize_uri' => '/wp-admin/customize.php?autofocus[section]=blogquest_pro_maps',
		),
        array(
            'name'          => esc_html__( 'Instagram Module', 'blogquest' ),
            'type'          => 'pro',
            'customize_uri' => '/wp-admin/options-general.php?page=premiumkits_connect',
            'text'			=> __( 'Display the Instagram feed in your website', 'blogquest' ) . '<div><a target="_blank" href="https://docs.themeinwp.com/docs/premiumkits/social-integrations/instagram-integration/">' . __( 'Documentation article', 'blogquest' ) . '</a></div>',
        ),
        array(
            'name'          => esc_html__( 'Twitter Module', 'blogquest' ),
            'type'          => 'pro',
            'customize_uri' => '/wp-admin/options-general.php?page=premiumkits_connect&tab=twitter',
            'text'			=> __( 'Display the Twitter feed in your website', 'blogquest' ) . '<div><a target="_blank" href="https://docs.themeinwp.com/docs/premiumkits/social-integrations/twitter-integration/">' . __( 'Documentation article', 'blogquest' ) . '</a></div>',
        ),
        array(
            'name'          => esc_html__( 'Table of Contents', 'blogquest' ),
            'type'          => 'pro',
            'customize_uri' => '/wp-admin/options-general.php?page=premiumkits_table_of_contents',
            'text'			=> __( 'Display table of contents automatically on single post based on the headings tags.', 'blogquest' ) . '<div><a target="_blank" href="https://docs.themeinwp.com/docs/premiumkits/content-presentation/table-of-contents/">' . __( 'Documentation article', 'blogquest' ) . '</a></div>',
        ),
        array(
            'name'          => esc_html__( 'Share Buttons', 'blogquest' ),
            'type'          => 'pro',
            'customize_uri' => '/wp-admin/options-general.php?page=premiumkits_share_buttons',
            'text'			=> __( 'Allow visitors to share your content via email and social media.', 'blogquest' ) . '<div><a target="_blank" href="https://docs.themeinwp.com/docs/premiumkits/social-integrations/share-buttons/">' . __( 'Documentation article', 'blogquest' ) . '</a></div>',
        ),
        array(
            'name'          => esc_html__( 'Maintenance mode', 'blogquest' ),
            'type'          => 'pro',
            'customize_uri' => '/wp-admin/options-general.php?page=premiumkits_coming_soon',
            'text'			=> __( 'Display a user-friendly coming soon notice to visitors ', 'blogquest' ) . '<div><a target="_blank" href="https://docs.themeinwp.com/docs/premiumkits/utilities/coming-soon/">' . __( 'Documentation article', 'blogquest' ) . '</a></div>',
        ),
	) );

	// Documentation.
	$settings['documentation_link'] = 'https://docs.themeinwp.com/docs/blogquest/';

	// Promo.
	$settings['promo_title']  = esc_html__( 'Upgrade to Pro', 'blogquest' );
	$settings['promo_desc']   = esc_html__( 'Take BlogQuest to a whole other level by upgrading to the Pro version.', 'blogquest' );
	$settings['promo_button'] = esc_html__( 'Discover BlogQuest Pro', 'blogquest' );
	$settings['promo_link']   = 'https://themeinwp.com/theme/blogquest-pro';

	// Review.
	$settings['review_link']       = 'https://wordpress.org/support/theme/blogquest/reviews/';
	$settings['suggest_idea_link'] = 'https://www.themeinwp.com/contact-us/';

	// Support.
	$settings['support_link']     = 'https://wordpress.org/support/theme/blogquest/';
	$settings['support_pro_link'] = 'https://www.themeinwp.com/support/';

	// Community.
	$settings['community_link'] = 'https://www.facebook.com/themeinwp/';

	$theme = wp_get_theme();
	// Changelog.
	$settings['changelog_version'] = $theme->version;
	$settings['changelog_link']    = 'https://themeinwp.com/changelog/blogquest/';

	return $settings;
}
add_filter( 'thd_register_settings', 'blogquest_dashboard_settings' );