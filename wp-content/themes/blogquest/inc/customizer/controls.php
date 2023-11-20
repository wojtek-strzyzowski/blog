<?php
/**
 * Custom Customizer Controls.
 *
 * @package BlogQuest
 */

/**
 * Customize Control for Taxonomy Select.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class BlogQuest_Dropdown_Taxonomies_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'dropdown-taxonomies';

    /**
     * Dropdown Arguments.
     *
     * @access protected
     * @var array
     */
    protected $dropdown_args = array();

	/**
	 * Taxonomy.
	 *
	 * @access public
	 * @var string
	 */
	public $taxonomy = '';

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
	 * @param string               $id      Control ID.
	 * @param array                $args    Optional. Arguments to override class property defaults.
	 */
	public function __construct( $manager, $id, $args = array() ) {

		$our_taxonomy = 'category';
		if ( isset( $args['taxonomy'] ) ) {
			$taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
			if ( true === $taxonomy_exist ) {
				$our_taxonomy = esc_attr( $args['taxonomy'] );
			}
		}
		$args['taxonomy'] = $our_taxonomy;
		$this->taxonomy = esc_attr( $our_taxonomy );

		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Render content.
	 *
	 * @since 1.0.0
	 */
	public function render_content() {

    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => $this->taxonomy,
    );
	?>
    <label>
        <?php
        if ( ! empty( $this->label ) ) :
            ?><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
        endif;

        if ( ! empty( $this->description ) ) :
            ?><span class="description customize-control-description"><?php echo $this->description; ?></span><?php
        endif;

        $dropdown_args = wp_parse_args( $this->dropdown_args, array(
            'taxonomy'          => $tax_args['taxonomy'],
            'show_option_none'  => __( '&mdash; Select &mdash;', 'blogquest' ),
            'selected'          => $this->value(),
            'show_option_all'   => '',
            'orderby'           => 'id',
            'order'             => 'ASC',
            'show_count'        => 1,
            'hide_empty'        => 1,
            'child_of'          => 0,
            'exclude'           => '',
            'hierarchical'      => 1,
            'depth'             => 0,
            'tab_index'         => 0,
            'hide_if_empty'     => false,
            'option_none_value' => 0,
            'value_field'       => 'term_id',
        ) );

        $dropdown_args['echo'] = false;

        $dropdown = wp_dropdown_categories( $dropdown_args );
        $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
        echo $dropdown;
        ?>
    </label>
    <?php
	}
}

/**
 * Customize Control for Radio Image.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class BlogQuest_Radio_Image_Control extends WP_Customize_Control {

    /**
     * Control type.
     *
     * @access public
     * @var string
     */
    public $type = 'radio-image';

    /**
     * Render content.
     *
     * @since 1.0.0
     */
    public function render_content() {
        if ( empty( $this->choices ) ) {
            return;
        }

        $name = '_customize-radio-' . $this->id; ?>

        <span class="customize-control-title">
			<?php echo esc_attr( $this->label ); ?>
		</span>

        <?php if ( ! empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo wp_kses_post($this->description) ; ?></span>
        <?php endif; ?>

        <div id="input_<?php echo esc_attr( $this->id ); ?>" class="radio-image">
            <?php foreach ( $this->choices as $value => $option ) : ?>
                <input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id . $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                <label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
                    <img src="<?php echo esc_html( $option['url'] ); ?>" alt="<?php echo esc_attr( $option['label'] ); ?>" title="<?php echo esc_attr( $option['label'] ); ?>">
                </label>
            <?php endforeach; ?>
        </div>
        <?php
    }
}

class BlogQuest_Checkbox_Multiple extends WP_Customize_Control {

    /**
     * Control type.
     *
     * @access public
     * @var string
     */
    public $type = 'checkbox-multiple';

	/**
	 * Displays the control content.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function render_content() {

		if ( empty( $this->choices ) )
			return; ?>

		<?php if ( !empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>

		<?php if ( !empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif; ?>

		<?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

		<ul>
			<?php foreach ( $this->choices as $value => $label ) : ?>

				<li>
					<label>
						<input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> />
						<?php echo esc_html( $label ); ?>
					</label>
				</li>

			<?php endforeach; ?>
		</ul>

		<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
	<?php }
}

if ( class_exists( 'WP_Customize_Control' ) ) {
    
    // Repeator Info
    class BlogQuest_Seperator_Control extends WP_Customize_Control {

        public $type = 'sectionseperator';
    
        public function render_content() {
           
            $name = '_customize-notice-' . $this->id; ?>
            
            <span class="customize-control-seperator">
                <hr>
            </span>
            
        <?php }
    }
    
}


if ( class_exists( 'WP_Customize_Control' ) ) {
    
    // Repeator Info
    class BlogQuest_Premium_Notice_Control extends WP_Customize_Control {

        public $type = 'premiuminfonotice';
    
        public function render_content() {
           
            $name = '_customize-notice-' . $this->id; ?>
            
            <span class="customize-control-title">
                <div class="theme-assist-info">
                    <span class="dashicons dashicons-thumbs-up theme-assist-icon"></span>
                    <span class="theme-assist-label"><?php echo esc_html__('More ','blogquest'). esc_html( $this->label ). esc_html__(' Available on Premium Version.', 'blogquest' ); ?></span>
                </div>
            </span>
            
        <?php }
    }
    
}