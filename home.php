<?php get_header(); ?>

<?php
    $posts_page = get_option( 'page_for_posts' );
    $post_thumbnail_id = get_post_thumbnail_id( $posts_page );
    $url = wp_get_attachment_image_src( $post_thumbnail_id, '' );
    $blog_pagetitle = get_the_title( $posts_page );
?>

<header class="header header__single" style="background: url(<?php echo $url[0]; ?>) center center">
    <div class="header__logo-box"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="Logo" class="header__logo"/></a></div>
    <div class="header__text-box">
        <h1 class="heading-primary"><span class="heading-primary--main"><?php echo $blog_pagetitle; ?></span><span class="heading-primary--sub-1">Lorem ipsum dolor sit amet.</span></h1>
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
                            if( have_posts() ) :
                                $i = 1;
                                while( have_posts() ) : the_post();
//                                    if($i === 1):
                                ?>

                                    <div class="col-md-12">

                                        <?php get_template_part('template-parts/content', get_post_format()); ?>

                                        <hr>

                                    </div>

<!--                                --><?php // else: ?>
<!--                                    <div class="col-md-6">-->
<!--                                        -->
<!--                                        <div class="post-small">-->
<!--                                            <a href="--><?php //the_permalink(); ?><!--">-->
<!--                                                <img src="--><?php //the_post_thumbnail_url(); ?><!--" alt="" class="post-small__img">-->
<!--                                                <span class="post-small__author">Posted by: --><?php //the_author(); ?><!--</span>-->
<!--                                                <h3 class="post-small__title">--><?php //echo the_title(); ?><!--</h3>-->
<!--                                            </a>-->
<!--                                            <p class="post-small__excerpt">--><?php //echo wp_trim_words(get_the_content(), 30 ) ?><!--</p>-->
<!---->
<!--                                            <div class="post-small__meta">-->
<!--                                                <span class="post-small__meta--left float-left">-->
<!--                                                    --><?php //the_tags('<strong>Tags: </strong>', ', ',''); ?>
<!--                                                </span>-->
<!---->
<!--                                                <span class="post-small__meta--right float-right"><i class="fas fa-comments"></i> --><?php //comments_number(); ?><!--</span>-->
<!--                                            </div>-->
<!---->
<!--                                        </div>-->
<!---->
<!--                                    </div>-->
                                <?php /*endif;*/ $i++;
                                endwhile;
                            endif;?>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row">
                        <div class="widget-area">
                            <?php if( dynamic_sidebar('beer-sidebar') ) : endif; ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="pagination mt-5 justify-content-center">
                <?php echo paginate_links(); ?>
            </div>

        </div>

    </section>

</main>

<?php get_footer(); ?>
