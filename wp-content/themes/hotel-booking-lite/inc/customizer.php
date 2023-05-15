<?php
/**
 * Hotel Booking Lite Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Hotel Booking Lite
 */

use WPTRT\Customize\Section\Hotel_Booking_Lite_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Hotel_Booking_Lite_Button::class );

    $manager->add_section(
        new Hotel_Booking_Lite_Button( $manager, 'hotel_booking_lite_pro', [
            'title'       => __( 'Hotel Booking Pro', 'hotel-booking-lite' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'hotel-booking-lite' ),
            'button_url'  => esc_url( 'https://www.themagnifico.net/themes/hotel-booking-wordpress-theme/', 'hotel-booking-lite')
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'hotel-booking-lite-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'hotel-booking-lite-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hotel_booking_lite_customize_register($wp_customize){
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('hotel_booking_lite_logo_title', array(
        'default' => true,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_logo_title',array(
        'label'          => __( 'Enable Disable Title', 'hotel-booking-lite' ),
        'section'        => 'title_tagline',
        'settings'       => 'hotel_booking_lite_logo_title',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('hotel_booking_lite_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'hotel-booking-lite' ),
        'section'        => 'title_tagline',
        'settings'       => 'hotel_booking_lite_theme_description',
        'type'           => 'checkbox',
    )));

    // General Settings
     $wp_customize->add_section('hotel_booking_lite_general_settings',array(
        'title' => esc_html__('General Settings','hotel-booking-lite'),
        'description' => esc_html__('General settings of our theme.','hotel-booking-lite'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('hotel_booking_lite_preloader_hide', array(
        'default' => false,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'hotel-booking-lite' ),
        'section'        => 'hotel_booking_lite_general_settings',
        'settings'       => 'hotel_booking_lite_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('hotel_booking_lite_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'hotel-booking-lite' ),
        'section'        => 'hotel_booking_lite_general_settings',
        'settings'       => 'hotel_booking_lite_sticky_header',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('hotel_booking_lite_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'hotel-booking-lite' ),
        'section'        => 'hotel_booking_lite_general_settings',
        'settings'       => 'hotel_booking_lite_scroll_hide',
        'type'           => 'checkbox',
    )));

    // Top Header
    $wp_customize->add_section('hotel_booking_lite_top_header',array(
        'title' => esc_html__('Top Header','hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_phone',array(
        'default' => '',
        'sanitize_callback' => 'hotel_booking_lite_sanitize_phone_number'
    ));
    $wp_customize->add_control('hotel_booking_lite_phone',array(
        'label' => esc_html__('Add Phone Number','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_top_header',
        'setting' => 'hotel_booking_lite_phone',
        'type'  => 'text'
    ));

    // Social Link
    $wp_customize->add_section('hotel_booking_lite_social_link',array(
        'title' => esc_html__('Social Links','hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('hotel_booking_lite_facebook_url',array(
        'label' => esc_html__('Facebook Link','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_social_link',
        'setting' => 'hotel_booking_lite_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('hotel_booking_lite_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('hotel_booking_lite_twitter_url',array(
        'label' => esc_html__('Twitter Link','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_social_link',
        'setting' => 'hotel_booking_lite_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('hotel_booking_lite_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('hotel_booking_lite_intagram_url',array(
        'label' => esc_html__('Intagram Link','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_social_link',
        'setting' => 'hotel_booking_lite_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('hotel_booking_lite_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('hotel_booking_lite_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_social_link',
        'setting' => 'hotel_booking_lite_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('hotel_booking_lite_youtube_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('hotel_booking_lite_youtube_url',array(
        'label' => esc_html__('YouTube Link','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_social_link',
        'setting' => 'hotel_booking_lite_pintrest_url',
        'type'  => 'url'
    ));

    //Slider
    $wp_customize->add_section('hotel_booking_lite_top_slider',array(
        'title' => esc_html__('Slider Option','hotel-booking-lite')
    ));

    for ( $hotel_booking_lite_count = 1; $hotel_booking_lite_count <= 3; $hotel_booking_lite_count++ ) {
        $wp_customize->add_setting( 'hotel_booking_lite_top_slider_page' . $hotel_booking_lite_count, array(
            'default'           => '',
            'sanitize_callback' => 'hotel_booking_lite_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'hotel_booking_lite_top_slider_page' . $hotel_booking_lite_count, array(
            'label'    => __( 'Select Slide Page', 'hotel-booking-lite' ),
            'section'  => 'hotel_booking_lite_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    // Popular Room Section
    $wp_customize->add_section('hotel_booking_lite_popular_rooms',array(
        'title' => esc_html__('Popular Room Section','hotel-booking-lite')
    ));

    $wp_customize->add_setting('hotel_booking_lite_popular_room_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hotel_booking_lite_popular_room_heading', array(
        'label' => __('Add Heading', 'hotel-booking-lite'),
        'section' => 'hotel_booking_lite_popular_rooms',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('hotel_booking_lite_popular_room_post_loop',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hotel_booking_lite_popular_room_post_loop',array(
        'label' => esc_html__('No of Popular Rooms to show','hotel-booking-lite'),
        'section'   => 'hotel_booking_lite_popular_rooms',
        'type'      => 'number',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 0,
            'max'              => 12,
        ),
    ));

    $team_post_loop = get_theme_mod('hotel_booking_lite_popular_room_post_loop');

    $hotel_booking_lite_args = array('numberposts' => -1);
    $post_list = get_posts($hotel_booking_lite_args);
    $i = 1;
    $pst_sls[]= __('Select','hotel-booking-lite');
    foreach ($post_list as $key => $p_post) {
        $pst_sls[$p_post->ID]=$p_post->post_title;
    }
    for ( $i = 1; $i <= $team_post_loop; $i++ ) {
        $wp_customize->add_setting('hotel_booking_lite_popular_room_post_section'.$i,array(
            'sanitize_callback' => 'hotel_booking_lite_sanitize_choices',
        ));
        $wp_customize->add_control('hotel_booking_lite_popular_room_post_section'.$i,array(
            'type'    => 'select',
            'choices' => $pst_sls,
            'label' => __('Select Post','hotel-booking-lite'),
            'section' => 'hotel_booking_lite_popular_rooms',
        ));
    }
    wp_reset_postdata();

    // Footer
    $wp_customize->add_section('hotel_booking_lite_site_footer_section', array(
        'title' => esc_html__('Footer', 'hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hotel_booking_lite_footer_text_setting', array(
        'label' => __('Replace the footer text', 'hotel-booking-lite'),
        'section' => 'hotel_booking_lite_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
}
add_action('customize_register', 'hotel_booking_lite_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function hotel_booking_lite_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function hotel_booking_lite_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hotel_booking_lite_customize_preview_js(){
    wp_enqueue_script('hotel-booking-lite-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'hotel_booking_lite_customize_preview_js');
