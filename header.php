<?php

/**
 * Header
 * 
 * @package Starter Pack
 */

?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php if(is_singular() && pings_open( get_queried_object() )): ?>
    <link rel="pingback" href="<?php bloginfo( "pingback_url" ); ?>">
    <?php endif; ?>

    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="navigation">
        <input type="checkbox" class="navigation__checkbox" id="navi-toggle">
        <label for="navi-toggle" class="navigation__button">
            <span class="navigation__icon">&nbsp;</span>
        </label>

        <div class="navigation__background">&nbsp;</div>
        <nav class="navigation__nav">
            <?php wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'         => false,
                'menu_class'        => 'navigation__list',
                'walker'            => new Walker_Nav_Primary()
            )); ?>


            <div class="home-search">
                <?php get_search_form(); ?>
            </div>

        </nav>

    </div>

<!--        <div class="navigation__background">&nbsp;</div>-->
<!--        <nav class="navigation__nav">-->
<!--            <ul class="navigation__list">-->
<!--                <li class="navigation__item"><a href="#" class="navigation__link">Home</a></li>-->
<!--                <li class="navigation__item"><a href="#" class="navigation__link">O nas</a></li>-->
<!--                <li class="navigation__item"><a href="#" class="navigation__link">Pakiety</a></li>-->
<!--                <li class="navigation__item"><a href="#" class="navigation__link">Kontakt</a></li>-->
<!--            </ul>-->
<!--        </nav>-->
<!--    </div>-->

