<?php
if (!defined('ABSPATH')) {
    exit;
}
class BlogQuest_Mailchimp_Form extends BlogQuest_Widget_Base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_blogquest_mailchimp_form';
        $this->widget_description = __("Displays MailChimp form if you have any", 'blogquest');
        $this->widget_id = 'blogquest_mailchimp_form';
        $this->widget_name = __('BlogQuest: MailChimp Form', 'blogquest');
        $this->settings = array(
            'title' => array(
                'label' => esc_html__('Widget Title', 'blogquest'),
                'type' => 'text',
                'class' => 'widefat',
            ),
            'desc' => array(
                'type' => 'textarea',
                'label' => __('Description', 'blogquest'),
                'rows' => 10,
            ),
            'form_shortcode' => array(
                'type' => 'text',
                'label' => __('MailChimp Form Shortcode', 'blogquest'),
            ),
            'style' => array(
                'type' => 'select',
                'label' => __('Style', 'blogquest'),
                'options' => array(
                    'style_1' => __('Style 1', 'blogquest'),
                    'style_2' => __('Style 2', 'blogquest'),
                ),
                'std' => 'style_1',
            ),
            'msg' => array(
                'type' => 'message',
                'label' => __('Additonal Settings', 'blogquest'),
            ),
            'bg_color_option' => array(
                'type' => 'color',
                'label' => __('Background Color', 'blogquest'),
                'std' => '#000000',
            ),
            'height' => array(
                'type' => 'number',
                'step' => 20,
                'min' => 300,
                'max' => 700,
                'std' => 400,
                'label' => __('Height: Between 300px and 700px (Default 400px)', 'blogquest'),
            ),
            'text_color_option' => array(
                'type' => 'color',
                'label' => __('Text Color', 'blogquest'),
                'std' => '#ffffff',
            ),
            'text_align' => array(
                'type' => 'select',
                'label' => __('Text Alignment', 'blogquest'),
                'options' => array(
                    'left' => __('Left Align', 'blogquest'),
                    'center' => __('Center Align', 'blogquest'),
                    'right' => __('Right Align', 'blogquest'),
                ),
                'std' => 'left',
            ),
            'bg_image' => array(
                'type' => 'image',
                'label' => __('Background Image', 'blogquest'),
                'desc' => __('Don\'t upload any image if you do not want to show the background image.', 'blogquest'),
            ),
            'enable_fixed_bg' => array(
                'type' => 'checkbox',
                'label' => __('Enable Fixed Background Image', 'blogquest'),
                'std' => true,
            ),
            'bg_overlay_color' => array(
                'type' => 'color',
                'label' => __('Overlay Background Color', 'blogquest'),
                'std' => '#000000',
            ),
            'overlay_opacity' => array(
                'type' => 'number',
                'step' => 10,
                'min' => 0,
                'max' => 100,
                'std' => 50,
                'label' => __('Overlay Opacity (Default 50%)', 'blogquest'),
            ),
        );
        parent::__construct();
    }
    /**
     * Output widget.
     *
     * @param array $args
     * @param array $instance
     * @see WP_Widget
     *
     */
    public function widget($args, $instance)
    {
        ob_start();
        $class = '';
        $image_enabled = false;
        if ($instance['bg_image'] && 0 != $instance['bg_image']) {
            $image_enabled = true;
            $class = 'blogquest-cover-block ';
            if ($instance['enable_fixed_bg']) {
                $class .= 'blogquest-bg-image blogquest-bg-attachment-fixed ';
            }
        }
        $bg_color_option = "";
        if (isset($instance['bg_color_option'])) {
            $bg_color_option = $instance['bg_color_option'];
        }
        $class .= $instance['style'];
        $style_text = 'color:' . $instance['text_color_option'] . ';';
        $style_text .= 'background-color:' . $bg_color_option . ';';
        $style_text .= 'text-align:' . $instance['text_align'] . ';';
        $style_text .= 'min-height:' . $instance['height'] . 'px;';
        echo $args['before_widget'];
        do_action('blogquest_before_mailchimp');
        ?>
        <div class="blogquest-mailchimp-widget <?php echo esc_attr($class); ?>" style="<?php echo esc_attr($style_text); ?>">
            <?php
            if ($image_enabled) {
                $style = 'background-color:' . $instance['bg_overlay_color'] . ';';
                $style .= 'opacity:' . ($instance['overlay_opacity'] / 100) . ';';
                ?>
                <span aria-hidden="true" class="blogquest-block-overlay" style="<?php echo esc_attr($style); ?>"></span>
                <?php echo wp_get_attachment_image($instance['bg_image'], 'full'); ?>
                <?php
            }
            ?>
            <div class="blogquest-mailchimp-inner-wrapper blogquest-block-inner-wrapper">
                <div class="mailchimp-content-group_1">
                    <?php if ($instance['title']) : ?>
                        <h2 class="entry-title entry-title-large">
                            <?php echo esc_html($instance['title']); ?>
                        </h2>
                    <?php endif; ?>
                    <div class="entry-details">
                        <?php
                        if ($instance['desc']) {
                            echo wpautop(wp_kses_post($instance['desc']));
                        }
                        ?>
                    </div>
                </div>
                <div class="mailchimp-content-group_2">
                    <footer class="entry-footer">
                        <?php echo do_shortcode($instance['form_shortcode']); ?>
                    </footer>
                </div>
            </div>
        </div>
        <?php
        do_action('blogquest_after_mailchimp');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}