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

        <section class="single-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">

                        <div class="row">

                            <?php
                                if(have_posts()) : while(have_posts()) : the_post();
                            ?>

                                <div class="col-md-12">

                                <div class="post-big">


                                    <h2 class="post-big__title heading-secondary"><?php the_title(); ?></h2>
                                    <span class="post-big__author">Posted by:<?php the_author(); ?></span>
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="post-big__img">

                                    <div class="post-big__excerpt sub-heading">
                                        <?php the_content(); ?>
                                    </div>

                                </div>

                            </div>

                            <?php
                                endwhile; endif;
                            ?>

                        </div>
                    </div>

                    <div class="col-md-3">

                        <?php if( dynamic_sidebar('beer-sidebar') ) : endif; ?>

                    </div>

                </div>
            </div>
        </section>

    </main>

<?php get_footer(); ?>