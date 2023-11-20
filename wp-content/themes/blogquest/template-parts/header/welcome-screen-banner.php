<?php
/**
 * Displays header add
 *
 * @package BlogQuest
 */
$ed_header_type = blogquest_get_option( 'ed_header_type' );
$upload_add_image = blogquest_get_option( 'upload_add_image' );
$ed_header_link = blogquest_get_option( 'ed_header_link' );
$advertisement_section_title = blogquest_get_option( 'advertisement_section_title' );
?>
<div class="welcome-screen-banner">
    <div class="<?php echo esc_attr($ed_header_type); ?>">
        <?php if ($ed_header_type != 'welcome-banner-full-viewport') { ?>
            <header class="welcome-screen-header">
                <div class="welcome-screen-title">
                    <?php echo esc_html($advertisement_section_title); ?>
                </div>
                <div class="welcome-screen-actions">
                    <span class="welcome-screen-countdown"></span>
                    <button type="button" class="welcome-screen-skip">
                        <?php echo esc_html__('Skip This', 'blogquest') ?>
                    </button>
                </div>
            </header>
        <?php } ?>

        <?php if ($upload_add_image) { ?>
            <?php 
            $image_id = attachment_url_to_postid($upload_add_image);
            $image_alt_text  = get_post_meta($image_id, '_wp_attachment_image_alt', true); ?>
            <a href="<?php echo esc_url($ed_header_link); ?>" class="welcome-screen-image" target="_blank">
                <img src="<?php echo esc_url($upload_add_image); ?>" alt="<?php echo esc_attr($image_alt_text); ?>" title="<?php echo esc_attr($image_alt_text); ?>"/>
            </a>
        <?php } ?>

        <?php if ($ed_header_type == 'welcome-banner-full-viewport') { ?>
            <div class="welcome-screen-actions">
                <button type="button" class="welcome-screen-cursor welcome-screen-skip">
                    <div class='mouse-wrapper'>
                        <div class="mouse-icon"></div>
                        <div class="mouse-arrow"></div>
                    </div>
                </button>
            </div>
        <?php } ?>
    </div>
</div>