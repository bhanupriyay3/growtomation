<?php
function display_recent_posts() {
    // Query recent posts
    $recent_posts = new WP_Query(array(
        'posts_per_page' => 5, // Number of recent posts to display
        'post_status'    => 'publish', // Only show published posts
    ));
    
    if ($recent_posts->have_posts()) {
        echo '<div class="recent-posts">';
        echo '<h2>Recent Posts</h2>';
        echo '<ul>';
        while ($recent_posts->have_posts()) {
            $recent_posts->the_post();
            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }
        echo '</ul>';
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<p>No recent posts available.</p>';
    }
}
?>

<div id="sidebar">
    <?php display_recent_posts(); ?>
</div>
