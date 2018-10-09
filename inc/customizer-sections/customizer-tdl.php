<?php
/**
 * Customizer title/description/logo section
 */

function beer_custom_tdl( $wp_customize )
{
    //usunięcie defaultowej sekcji tożsamość witryny
    $wp_customize->remove_section('title_tagline');

    //dodanie sekcji informacji o witrynie
    $wp_customize->add_section('beer_title_tagline', array(
        'title'         => 'Tytuł/Opis/Logo Strony',
        'description'   => 'Zmień tytuł, opis, logo oraz favicon strony',
        'priority'      => 26
    ));

    //ustawienia nazwy strony
    $wp_customize->add_setting('blogname', array(
        'default'       => get_option('blogname'),
        'type'          => 'option',
        'capability'    => 'manage_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('blogname', array(
        'label'         => __('Tytuł strony'),
        'section'       => 'beer_title_tagline'
    ));

    //ustawienia opisu strony
    $wp_customize->add_setting('blogdescription',array(
        'default'       => get_option('blogdescription'),
        'type'          => 'option',
        'capability'    => 'manage_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('blogdescription', array(
        'label'         => __('Dodaj opis strony'),
        'section'       => 'beer_title_tagline'
    ));

    //ustawienia logo strony
    $wp_customize->add_setting('beer_logo', array(
        'default'       => get_template_directory_uri() . '/img/logo.png'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'beer_logo', array(
        'label'         => __('Dodaj logo'),
        'description'   => 'Tutaj możesz zmienic logo , które będzie wyświetlane na stronie',
        'section'       => 'beer_title_tagline'
    ) ));

    //ustawienia faviconu
    $wp_customize->add_setting('site_icon', array(
        'type'          => 'option',
        'capability'    => 'manage_options',
        'transport'     => 'postMessage'  //za pomocą js i ajax'u pozwala na preview bez odswieżania
    ));

    $wp_customize->add_control(new WP_Customize_Site_Icon_Control($wp_customize, 'site_icon', array(
        'label'         => __('Favicon strony'),
        'description'   => sprintf(
            /* translators: %s: site icon size in pixels */
            __('The Site Icon is used as a browser and app icon for your site. Icons must be square, and at least %s pixels wide and tall.'),
            '<strong>512</strong>'
        ),
        'section'       => 'beer_title_tagline',
        'priority'      => 60,
        'height'        => 512,
        'width'        => 512,
    )));
}

add_action('customize_register', 'beer_custom_tdl');