<?php get_header(); ?>

<div class="main-content">
    <div class="main-column">
        <?php
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        ?>
    </div>
    <div class="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
