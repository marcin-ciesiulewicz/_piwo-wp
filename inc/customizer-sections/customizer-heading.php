<?php

function beer_custom_heading( $wp_customize ){

    //dodanie nadpisanej klasy Customizer_Control
    require_once 'Beer_Info.php';

    //dodaje panel
    $wp_customize->add_panel( 'header_panel', array(
        'title'         => 'Nagłówek',
        'priority'      => 27
    ) );

    //sekcja opcji
    $wp_customize->add_section( 'header_options', array(
        'title'         => 'Opcje nagłówka',
        'description'   => 'Tutaj możesz zmienić typ nagłówka, masz do wyboru 2 opcje: 1.Zdjęcie 2.Wideo',
        'panel'         => 'header_panel'
    ) );

    $wp_customize->add_setting( 'header_options_type', array(
        'default'       => 'h_img',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'type_options_sanitize'
    ) );

    $wp_customize->add_control( 'header_options_type', array(
        'type'          => 'radio',
        'section'       => 'header_options',
        'label'         => 'Typ nagłówka strony głównej',
        'description'   => 'Wybierz typ nagłówka',
        'choices'       => array(
            'h_img'     => __('Zdjęcie'),
            'h_video'   => __('Wideo')
        )

    ) );

    //sekcja dodawania tresci
    $wp_customize->add_section( 'header_content_img', array(
        'title'         => 'Zdjęcie',
        'description'   => 'Tutaj możesz zmienić zawartość nagłówka',
        'panel'         => 'header_panel'
    ) );

    //zdjęcie

    //label do zdjęcia
    $wp_customize->add_setting('beer_options[info]',array(
        'type'          => 'info',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr'
    ));

    $wp_customize->add_control(new Beer_Info($wp_customize, 'header_img_label', array(
        'label'         => __('Tło nagłówka', 'beer'),
        'section'       => 'header_content_img',
        'settings'      => 'beer_options[info]'
    )));

    $wp_customize->add_setting( 'header_content_img_setting', array(
        'default'       => get_template_directory_uri() . '/img/header_background.png'

    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_content_img_control', array(
        'label'         => '',
        'description'   => 'Zmień tło nagłówka',
        'settings'      => 'header_content_img_setting',
        'section'       => 'header_content_img'
    ) ) );

    //duży tytuł

    //label do tytuł
    $wp_customize->add_setting('beer_options[info]',array(
        'type'          => 'info',
    ));

    $wp_customize->add_control(new Beer_Info($wp_customize, 'header_title_label', array(
        'label'         => __('Tytuł', 'beer'),
        'section'       => 'header_content_img',
        'settings'      => 'beer_options[info]'
    )));

    $wp_customize->add_setting('header_content_title',array(
       'default'        => 'Beer',
       'capability'     => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('header_content_title',array(
        'type'          => 'text',
        'description'   => 'Zmień głowny tytuł nagłówka',
        'section'       => 'header_content_img'
    ));

    //podtytuł

    //label do podtytuł
    $wp_customize->add_setting('beer_options[info]',array(
        'type'          => 'info',
    ));

    $wp_customize->add_control(new Beer_Info($wp_customize, 'header_subtitle_label', array(
        'label'         => __('Podtytuł', 'beer'),
        'section'       => 'header_content_img',
        'settings'      => 'beer_options[info]'
    )));

    $wp_customize->add_setting('header_content_subtitle',array(
        'default'        => 'Now there\'s a temporary solution.',
        'capability'     => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('header_content_subtitle',array(
        'type'          => 'text',
        'description'   => 'Zmień podtytuł nagłówka',
        'section'       => 'header_content_img'
    ));

    //autor

    //label do autor
    $wp_customize->add_setting('beer_options[info]',array(
        'type'          => 'info',
    ));

    $wp_customize->add_control(new Beer_Info($wp_customize, 'header_author_label', array(
        'label'         => __('Autor', 'beer'),
        'section'       => 'header_content_img',
        'settings'      => 'beer_options[info]'
    )));

    $wp_customize->add_setting('header_content_author',array(
        'default'        => 'Dan Castellaneta',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('header_content_author',array(
        'type'          => 'text',
        'description'   => 'Zmień autora',
        'section'       => 'header_content_img'
    ));

}

add_action('customize_register','beer_custom_heading');

//sanityzacja radiobuttona
function type_options_sanitize( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}