
<?php
    $featured_image = featured_image();
?>

<div class="post-img" style="background: url(<?php echo $featured_image; ?>) center center /cover">

    <a href="<?php the_permalink(); ?>" class="post-img__link">
        <h1 class="post-img__title heading-secondary">
            <?php the_title(); ?>
            <span class="post-img__title--subheading"><?php echo get_post_format(); ?> post type</span>
        </h1>

        <span class="post-img__excerpt">
            <?php echo get_the_excerpt(); ?>
        </span>

    </a>

</div>
