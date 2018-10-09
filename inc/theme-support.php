<?php
/**
 * 
 * Theme Support
 * 
 * @package Beer theme
 * 
 */

//featured images
add_theme_support( 'post-thumbnails' );

//post types
add_theme_support('post-formats', array('image'));

//menus
 function register_menus(){
     register_nav_menus( array(

        'primary'   => esc_html__( 'Primary', 'beer' )

     ) );
 }
 add_action( 'after_setup_theme', 'register_menus' );

//html 5 support
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));


//sidebar

function beer_sidebar(){

    register_sidebar(array(
       'name'           => esc_html__('Sidebar Widget', 'beer'),
        'id'            => 'beer-sidebar',
        'description'   => 'Prawy sidebar na podstronach',
        'before_widget' => '<section id="%1$s" class="beer-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'aftrer_title'  => '</h3>'
    ));

}

add_action( 'widgets_init', 'beer_sidebar' );

//featured mage
function featured_image(){

    $featured_image = '';

    if(has_post_thumbnail()):

        $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

    else:

        $attachments = get_posts(array(
            'post_type'         => 'attachment',
            'posts_per_page'    => 1,
            'post_parent'      => get_the_ID()
        ));

        if($attachments):
            foreach($attachments as $attachment):
                $featured_image = wp_get_attachment_url($attachment->ID);
            endforeach;
        endif;

    endif;

    return $featured_image;

}