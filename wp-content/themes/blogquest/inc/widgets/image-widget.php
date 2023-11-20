<?php
if (!defined('ABSPATH')) {
    exit;
}
class BlogQuest_Image_Widget extends BlogQuest_Widget_Base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_blogquest_image_widget';
        $this->widget_description = __("Adds image section", 'blogquest');
        $this->widget_id = 'blogquest_image_widget';
        $this->widget_name = __('BlogQuest: Image Widget', 'blogquest');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Widget Title', 'blogquest'),
            ),
            'title_text' => array(
                'type' => 'text',
                'label' => __('Widget Description', 'blogquest'),
            ),
            'bg_image' => array(
                'type' => 'image',
                'label' => __('Background Image', 'blogquest'),
            ),
            'btn_text' => array(
                'type' => 'text',
                'label' => __('Button Text', 'blogquest'),
            ),
            'btn_link' => array(
                'type' => 'url',
                'label' => __('Link to url', 'blogquest'),
                'desc' => __('Enter a proper url with http: OR https:', 'blogquest'),
            ),
            'link_target' => array(
                'type' => 'checkbox',
                'label' => __('Open Link in new Tab', 'blogquest'),
                'std' => true,
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
        $class = '';
        ob_start();
        echo $args['before_widget'];
        $class .= $instance['style'];
        do_action('blogquest_before_image');
        ?>
        <div class="blogquest-image-widget <?php echo esc_attr($class); ?>">
            <div class="widget-image-wrapper">
            <?php echo wp_get_attachment_image($instance['bg_image'], 'full'); ?>
            </div>
            <div class="widget-desc-wrapper">
            <?php if ($instance['title']) : ?>
                <h2 class="entry-title">
                    <?php echo esc_html($instance['title']); ?>
                </h2>
            <?php endif; ?>
            <?php if ($instance['title_text']) : ?>
                <div class="entry-details">
                    <?php echo esc_html($instance['title_text']); ?>
                </div>
            <?php endif; ?>
            <?php if ($instance['btn_text']) : ?>
                <a href="<?php echo ($instance['btn_link']) ? esc_url($instance['btn_link']) : ''; ?>" target="<?php echo ($instance['link_target']) ? "_blank" : '_self'; ?>" class="theme-widget-button">
                    <?php echo esc_html(($instance['btn_text'])); ?>
                </a>
            <?php endif; ?>
            </div>
        </div>
        <?php
        do_action('blogquest_after_image');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}