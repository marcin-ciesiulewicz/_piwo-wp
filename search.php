<?php get_header() ?>

    <header class="header header__single" style="background: url(<?php bloginfo('template_directory'); ?>/img/header_background.png) center center">
        <div class="header__logo-box"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="Logo" class="header__logo"/></a></div>
        <div class="header__text-box">
            <h1 class="heading-primary"><span class="heading-primary--main"></span><span class="heading-primary--sub-1">Search</span></h1>
        </div>
        <div class="header__scroll-box">
            <div class="header__scroll-content"><span class="header__scroll-content--text">scroll down</span><span class="header__scroll-content--icon"> <i class="fas fa-angle-down fa-2x"></i></span></div>
        </div>
    </header>

    <main>
        <section class="main-blog">

            <div class="container">

                <div class="row">

                    <div class="col-md-9">
                        <div class="row">

                            <?php

                                if ($search->have_posts()) :
                                    while ($search->have_posts()) : $search->the_post();
                            ?>

                                        <?php get_template_part('template-parts/content','search'); ?>

                                <?php
                                    endwhile;
                                endif;

                            ?>

                        </div>

                        <div class="row mt-5">
                            <div class="col-md-6 text-left">
                                <?php next_posts_link('<< Prev') ?>
                            </div>

                            <div class="col-md-6 text-right">
                                <?php previous_posts_link('Next >>') ?>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="row">
                            <div class="widget-area">
                                <?php if (dynamic_sidebar('beer-sidebar')) : endif; ?>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </section>
    </main>

<?php get_footer() ?>