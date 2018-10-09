<div class="col-md-6">
    <div class="post-small">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url(); ?>" alt=""
                 class="post-small__img">
            <span
                class="post-small__author">Posted by: <?php the_author(); ?></span>
            <h3 class="post-small__title"><?php echo the_title(); ?></h3>
        </a>
        <p class="post-small__excerpt"><?php echo wp_trim_words(get_the_content(), 30) ?></p>

        <div class="post-small__meta">
            <span class="post-small__meta--left float-left">
                 <?php the_tags('<strong>Tags: </strong>', ', ', ''); ?>
            </span>

            <span class="post-small__meta--right float-right"><i class="fas fa-comments"></i> <?php comments_number(); ?></span>
        </div>

    </div>
</div>