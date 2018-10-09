<div class="post-big">

    <a href="<?php esc_url(the_permalink()); ?>" class="">
        <h2 class="post-big__title heading-secondary"><?php echo the_title(); ?></h2>
        <span class="post-big__author">Posted by: <?php the_author(); ?></span>
        <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="post-big__img">
    </a>

    <p class="post-big__excerpt sub-heading"><?php echo wp_trim_words(get_the_content(), 150) ?></p>


    <a href="<?php the_permalink(); ?>" class="btn btn--black"><?php _e('Read more...') ?></a>

</div>
