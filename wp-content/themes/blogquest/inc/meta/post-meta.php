<?php
/**
* Sidebar Metabox.
*
* @package BlogQuest
*/
if( !function_exists( 'blogquest_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function blogquest_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists('blogquest_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function blogquest_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists( 'blogquest_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function blogquest_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;


if( !function_exists( 'blogquest_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function blogquest_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

add_action( 'add_meta_boxes', 'blogquest_metabox' );

if( ! function_exists( 'blogquest_metabox' ) ):


    function  blogquest_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'blogquest' ),
            'blogquest_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'blogquest' ),
            'blogquest_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$blogquest_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'blogquest' ),
    'layout-2' => esc_html__( 'Banner Layout', 'blogquest' ),
);

$blogquest_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'blogquest' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'blogquest' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'blogquest' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'blogquest' ),
                ),
);

$blogquest_post_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'blogquest' ),
    'layout-2' => esc_html__( 'Banner Layout', 'blogquest' ),
);

$blogquest_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'blogquest' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'blogquest' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'blogquest_post_metafield_callback' ) ):
    
    function blogquest_post_metafield_callback() {
        global $post, $blogquest_post_sidebar_fields, $blogquest_post_layout_options,  $blogquest_page_layout_options, $blogquest_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'blogquest_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-appearance"  class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'blogquest'); ?>

                        </a>
                    </li>

                    <?php if ($post_type != 'page') { ?>
                        <li>
                            <a id="metabox-navbar-general" href="javascript:void(0)">

                                <?php esc_html_e('General Settings', 'blogquest'); ?>

                            </a>
                        </li>
                    <?php } ?>


                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'blogquest'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','blogquest'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $blogquest_post_sidebar = esc_html( get_post_meta( $post->ID, 'blogquest_post_sidebar_option', true ) ); 
                            if( $blogquest_post_sidebar == '' ){ $blogquest_post_sidebar = 'global-sidebar'; }

                            foreach ( $blogquest_post_sidebar_fields as $blogquest_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="blogquest_post_sidebar_option" value="<?php echo esc_attr( $blogquest_post_sidebar_field['value'] ); ?>" <?php if( $blogquest_post_sidebar_field['value'] == $blogquest_post_sidebar ){ echo "checked='checked'";} if( empty( $blogquest_post_sidebar ) && $blogquest_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $blogquest_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Banner Layout','blogquest'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $blogquest_page_layout = esc_html( get_post_meta( $post->ID, 'blogquest_page_layout', true ) ); 
                                if( $blogquest_page_layout == '' ){ $blogquest_page_layout = 'layout-1'; }

                                foreach ( $blogquest_page_layout_options as $key => $blogquest_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="blogquest_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $blogquest_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $blogquest_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','blogquest'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $blogquest_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'blogquest_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="blogquest-header-overlay" name="blogquest_ed_header_overlay" value="1" <?php if( $blogquest_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="blogquest-header-overlay"><?php esc_html_e( 'Enable Header Overlay','blogquest' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Title Layout','blogquest'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $blogquest_post_layout = esc_html( get_post_meta( $post->ID, 'blogquest_post_layout', true ) ); 

                                foreach ( $blogquest_post_layout_options as $key => $blogquest_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="blogquest_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $blogquest_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $blogquest_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','blogquest'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $blogquest_header_overlay = esc_html( get_post_meta( $post->ID, 'blogquest_header_overlay', true ) ); 
                                if( $blogquest_header_overlay == '' ){ $blogquest_header_overlay = 'global-layout'; }

                                foreach ( $blogquest_header_overlay_options as $key => $blogquest_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="blogquest_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $blogquest_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $blogquest_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>


                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $blogquest_ed_post_views = esc_html( get_post_meta( $post->ID, 'blogquest_ed_post_views', true ) );
                    $blogquest_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'blogquest_ed_post_read_time', true ) );
                    $blogquest_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'blogquest_ed_post_like_dislike', true ) );
                    $blogquest_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'blogquest_ed_post_author_box', true ) );
                    $blogquest_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'blogquest_ed_post_social_share', true ) );
                    $blogquest_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'blogquest_ed_post_reaction', true ) );
                    $blogquest_ed_post_rating = esc_html( get_post_meta( $post->ID, 'blogquest_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','blogquest'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogquest-ed-post-views" name="blogquest_ed_post_views" value="1" <?php if( $blogquest_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="blogquest-ed-post-views"><?php esc_html_e( 'Disable Post Views','blogquest' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogquest-ed-post-read-time" name="blogquest_ed_post_read_time" value="1" <?php if( $blogquest_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="blogquest-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','blogquest' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogquest-ed-post-like-dislike" name="blogquest_ed_post_like_dislike" value="1" <?php if( $blogquest_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="blogquest-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','blogquest' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogquest-ed-post-author-box" name="blogquest_ed_post_author_box" value="1" <?php if( $blogquest_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="blogquest-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','blogquest' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogquest-ed-post-social-share" name="blogquest_ed_post_social_share" value="1" <?php if( $blogquest_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="blogquest-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','blogquest' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogquest-ed-post-reaction" name="blogquest_ed_post_reaction" value="1" <?php if( $blogquest_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="blogquest-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','blogquest' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogquest-ed-post-rating" name="blogquest_ed_post_rating" value="1" <?php if( $blogquest_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="blogquest-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','blogquest' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'blogquest_save_post_meta' );

if( ! function_exists( 'blogquest_save_post_meta' ) ):

    function blogquest_save_post_meta( $post_id ) {

        global $post, $blogquest_post_sidebar_fields, $blogquest_post_layout_options, $blogquest_header_overlay_options,  $blogquest_page_layout_options;

        if ( !isset( $_POST[ 'blogquest_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['blogquest_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $blogquest_post_sidebar_fields as $blogquest_post_sidebar_field ) {  
            

                $old = esc_html( get_post_meta( $post_id, 'blogquest_post_sidebar_option', true ) ); 
                $new = isset( $_POST['blogquest_post_sidebar_option'] ) ? blogquest_sanitize_sidebar_option_meta( wp_unslash( $_POST['blogquest_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'blogquest_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'blogquest_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? blogquest_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $blogquest_post_layout_options as $blogquest_post_layout_option ) {  
            
            $blogquest_post_layout_old = esc_html( get_post_meta( $post_id, 'blogquest_post_layout', true ) ); 
            $blogquest_post_layout_new = isset( $_POST['blogquest_post_layout'] ) ? blogquest_sanitize_post_layout_option_meta( wp_unslash( $_POST['blogquest_post_layout'] ) ) : '';

            if ( $blogquest_post_layout_new && $blogquest_post_layout_new != $blogquest_post_layout_old ){

                update_post_meta ( $post_id, 'blogquest_post_layout', $blogquest_post_layout_new );

            }elseif( '' == $blogquest_post_layout_new && $blogquest_post_layout_old ) {

                delete_post_meta( $post_id,'blogquest_post_layout', $blogquest_post_layout_old );

            }
            
        }



        foreach ( $blogquest_header_overlay_options as $blogquest_header_overlay_option ) {  
            
            $blogquest_header_overlay_old = esc_html( get_post_meta( $post_id, 'blogquest_header_overlay', true ) ); 
            $blogquest_header_overlay_new = isset( $_POST['blogquest_header_overlay'] ) ? blogquest_sanitize_header_overlay_option_meta( wp_unslash( $_POST['blogquest_header_overlay'] ) ) : '';

            if ( $blogquest_header_overlay_new && $blogquest_header_overlay_new != $blogquest_header_overlay_old ){

                update_post_meta ( $post_id, 'blogquest_header_overlay', $blogquest_header_overlay_new );

            }elseif( '' == $blogquest_header_overlay_new && $blogquest_header_overlay_old ) {

                delete_post_meta( $post_id,'blogquest_header_overlay', $blogquest_header_overlay_old );

            }
            
        }


        $blogquest_ed_post_views_old = esc_html( get_post_meta( $post_id, 'blogquest_ed_post_views', true ) ); 
        $blogquest_ed_post_views_new = isset( $_POST['blogquest_ed_post_views'] ) ? absint( wp_unslash( $_POST['blogquest_ed_post_views'] ) ) : '';

        if ( $blogquest_ed_post_views_new && $blogquest_ed_post_views_new != $blogquest_ed_post_views_old ){

            update_post_meta ( $post_id, 'blogquest_ed_post_views', $blogquest_ed_post_views_new );

        }elseif( '' == $blogquest_ed_post_views_new && $blogquest_ed_post_views_old ) {

            delete_post_meta( $post_id,'blogquest_ed_post_views', $blogquest_ed_post_views_old );

        }



        $blogquest_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'blogquest_ed_post_read_time', true ) ); 
        $blogquest_ed_post_read_time_new = isset( $_POST['blogquest_ed_post_read_time'] ) ? absint( wp_unslash( $_POST['blogquest_ed_post_read_time'] ) ) : '';

        if ( $blogquest_ed_post_read_time_new && $blogquest_ed_post_read_time_new != $blogquest_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'blogquest_ed_post_read_time', $blogquest_ed_post_read_time_new );

        }elseif( '' == $blogquest_ed_post_read_time_new && $blogquest_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'blogquest_ed_post_read_time', $blogquest_ed_post_read_time_old );

        }



        $blogquest_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'blogquest_ed_post_like_dislike', true ) ); 
        $blogquest_ed_post_like_dislike_new = isset( $_POST['blogquest_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['blogquest_ed_post_like_dislike'] ) ) : '';

        if ( $blogquest_ed_post_like_dislike_new && $blogquest_ed_post_like_dislike_new != $blogquest_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'blogquest_ed_post_like_dislike', $blogquest_ed_post_like_dislike_new );

        }elseif( '' == $blogquest_ed_post_like_dislike_new && $blogquest_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'blogquest_ed_post_like_dislike', $blogquest_ed_post_like_dislike_old );

        }



        $blogquest_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'blogquest_ed_post_author_box', true ) ); 
        $blogquest_ed_post_author_box_new = isset( $_POST['blogquest_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['blogquest_ed_post_author_box'] ) ) : '';

        if ( $blogquest_ed_post_author_box_new && $blogquest_ed_post_author_box_new != $blogquest_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'blogquest_ed_post_author_box', $blogquest_ed_post_author_box_new );

        }elseif( '' == $blogquest_ed_post_author_box_new && $blogquest_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'blogquest_ed_post_author_box', $blogquest_ed_post_author_box_old );

        }



        $blogquest_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'blogquest_ed_post_social_share', true ) ); 
        $blogquest_ed_post_social_share_new = isset( $_POST['blogquest_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['blogquest_ed_post_social_share'] ) ) : '';

        if ( $blogquest_ed_post_social_share_new && $blogquest_ed_post_social_share_new != $blogquest_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'blogquest_ed_post_social_share', $blogquest_ed_post_social_share_new );

        }elseif( '' == $blogquest_ed_post_social_share_new && $blogquest_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'blogquest_ed_post_social_share', $blogquest_ed_post_social_share_old );

        }



        $blogquest_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'blogquest_ed_post_reaction', true ) ); 
        $blogquest_ed_post_reaction_new = isset( $_POST['blogquest_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['blogquest_ed_post_reaction'] ) ) : '';

        if ( $blogquest_ed_post_reaction_new && $blogquest_ed_post_reaction_new != $blogquest_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'blogquest_ed_post_reaction', $blogquest_ed_post_reaction_new );

        }elseif( '' == $blogquest_ed_post_reaction_new && $blogquest_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'blogquest_ed_post_reaction', $blogquest_ed_post_reaction_old );

        }



        $blogquest_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'blogquest_ed_post_rating', true ) ); 
        $blogquest_ed_post_rating_new = isset( $_POST['blogquest_ed_post_rating'] ) ? absint( wp_unslash( $_POST['blogquest_ed_post_rating'] ) ) : '';

        if ( $blogquest_ed_post_rating_new && $blogquest_ed_post_rating_new != $blogquest_ed_post_rating_old ){

            update_post_meta ( $post_id, 'blogquest_ed_post_rating', $blogquest_ed_post_rating_new );

        }elseif( '' == $blogquest_ed_post_rating_new && $blogquest_ed_post_rating_old ) {

            delete_post_meta( $post_id,'blogquest_ed_post_rating', $blogquest_ed_post_rating_old );

        }

        foreach ( $blogquest_page_layout_options as $blogquest_post_layout_option ) {  
        
            $blogquest_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'blogquest_page_layout', true ) ); 
            $blogquest_page_layout_new = isset( $_POST['blogquest_page_layout'] ) ? blogquest_sanitize_post_layout_option_meta( wp_unslash( $_POST['blogquest_page_layout'] ) ) : '';

            if ( $blogquest_page_layout_new && $blogquest_page_layout_new != $blogquest_page_layout_old ){

                update_post_meta ( $post_id, 'blogquest_page_layout', $blogquest_page_layout_new );

            }elseif( '' == $blogquest_page_layout_new && $blogquest_page_layout_old ) {

                delete_post_meta( $post_id,'blogquest_page_layout', $blogquest_page_layout_old );

            }
            
        }

        $blogquest_ed_header_overlay_old = absint( get_post_meta( $post_id, 'blogquest_ed_header_overlay', true ) ); 
        $blogquest_ed_header_overlay_new = isset( $_POST['blogquest_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['blogquest_ed_header_overlay'] ) ) : '';

        if ( $blogquest_ed_header_overlay_new && $blogquest_ed_header_overlay_new != $blogquest_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'blogquest_ed_header_overlay', $blogquest_ed_header_overlay_new );

        }elseif( '' == $blogquest_ed_header_overlay_new && $blogquest_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'blogquest_ed_header_overlay', $blogquest_ed_header_overlay_old );

        }

    }

endif;   