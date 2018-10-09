<?php
/*
 * Template Name: Front-page
 * */
?>

<?php get_header() ?>

    <?php if( get_theme_mod('header_options_type') == 'h_img' ):  ?>

        <header class="header" style="background: url(<?php echo get_theme_mod('header_content_img_setting');?>) no-repeat center center /cover;">
            <div class="header__logo-box"><img src=" <?php echo get_theme_mod('beer_logo'); ?>" alt="Logo" class="header__logo"/></div>
            <div class="header__text-box">
                <h1 class="heading-primary"><span class="heading-primary--main"><?php echo get_theme_mod('header_content_title'); ?></span><span class="heading-primary--sub-1"><?php echo get_theme_mod('header_content_subtitle'); ?></span><span class="heading-primary--sub-2"><?php echo get_theme_mod('header_content_author'); ?></span></h1>
            </div>
            <div class="header__scroll-box">
                <div class="header__scroll-content"><span class="header__scroll-content--text">scroll down</span><span class="header__scroll-content--icon"> <i class="fas fa-angle-down fa-2x"></i></span></div>
            </div>
        </header>
    <?php else:  ?>

    <header class="header header__video">

        <div class="bg-video">
            <video class="bg-video__content" autoplay muted loop>
                <source src="<?php bloginfo('template_directory'); ?>/img/video.mp4" type="video/mp4" >
                Twoja przeglądarka nie wspiera odtwarzania video
            </video>
        </div>

        <div class="header__logo-box"><img src=" <?php echo get_theme_mod('beer_logo'); ?>" alt="Logo" class="header__logo"/></div>
        <div class="header__text-box">
            <h1 class="heading-primary"><span class="heading-primary--main"><?php echo get_theme_mod('header_content_title'); ?></span><span class="heading-primary--sub-1"><?php echo get_theme_mod('header_content_subtitle'); ?></span><span class="heading-primary--sub-2"><?php echo get_theme_mod('header_content_author'); ?></span></h1>
        </div>
        <div class="header__scroll-box">
            <div class="header__scroll-content"><span class="header__scroll-content--text">scroll down</span><span class="header__scroll-content--icon"> <i class="fas fa-angle-down fa-2x"></i></span></div>
        </div>
    </header>

    <?php endif; ?>

<main class="main--home">
      <section class="section-info">
        <div class="section-info__text-box">
          <h2 class="heading-secondary u-ml-8">The joy of brewing</h2>
          <p class="sub-heading u-ml-8">We develop recipes, imported materials, experiment, and spills brew beer in the friendly breweries.</p>
        </div><img src="<?php bloginfo('template_directory'); ?>/img/photo_right.png" alt="Piwny świat" class="section-info__img-right"/><img src="<?php bloginfo('template_directory'); ?>/img/butelka.png" alt="Butelka z piwem" class="section-info__img-bottle"/>
        <div class="section-info__banner">
          <h2 class="heading-secondary u-ml-8">Zeus - Best Quality</h2>
          <p class="sub-heading u-ml-8">This fancy beer in the style of American India Pale Ale. Red-copper-bodied, with citrus flavor and aroma, floral, resin, pine and fruit derived from American hops.</p><a href="#" class="btn btn--black u-ml-8">CHECK MORE</a>
        </div>
      </section>
      <section class="section-banner-1">
        <div class="section-banner-1__text-box">
          <h2>Lorem ipsum </br> dolor sit amet</h2>
        </div>
      </section>
      <section class="section-handcraft">
        <div class="col-6">
          <div class="section-handcraft__text-box">
            <h2 class="heading-secondary u-ml-8">HANDCRAFTED QUALITY</h2>
            <p class="sub-heading u-ml-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel ornare dui, a sodales massa. Donec ut gravida enim, non vestibulum magna. Mauris libero sapien, faucibus vel odio non, bibendum facilisis eros. Pellentesque eget orci congue, tempor augue ultrices, pellentesque libero.</p>
            <p class="sub-heading u-ml-8"> Morbi commodo, lectus ac vulputate pharetra, libero elit aliquet tortor, ac imperdiet tortor nibh eu nunc. </p>
          </div>
        </div><img src="<?php bloginfo('template_directory');?>/img/photo_right_2.png" alt="" class="section-handcraft__img-right float-right"/>
      </section>
      <section class="section-banner-2">
        <div class="section-banner-2__text-box">
          <h2 class="heading-secondary">Start your journey now</h2>
          <p class="sub-heading">Beer, now there’s a temporary solution</p><a href="#" class="btn btn--black">ORDER NOW</a>
        </div>
      </section>
    </main>

<?php get_footer() ?>