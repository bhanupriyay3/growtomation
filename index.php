<?php get_header(); ?>

<div class="main-content">
    <div class="main-column">
        <!-- Main content loop -->
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        else :
            echo '<p>No content found</p>';
        endif;
        ?>
    </div>
    <div class="sidebar">
        <?php get_sidebar(); ?>
        
    </div>
</div>

<?php get_footer(); ?>
