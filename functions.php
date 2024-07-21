<?php
function demo_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'demo-theme'),
    ));
}
add_action('after_setup_theme', 'demo_theme_setup');

function demo_theme_scripts() {
    wp_enqueue_style('demo-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'demo_theme_scripts');



function add_drag_drop_meta_box() {
    add_meta_box(
        'drag_drop_meta_box', // ID of the meta box
        'Drag and Drop Content', // Title of the meta box
        'display_drag_drop_meta_box', // Callback function
        'page', // Post type where the meta box should appear
        'normal', // Context where the meta box should appear (normal, side, advanced)
        'high' // Priority of the meta box
    );
}
add_action('add_meta_boxes', 'add_drag_drop_meta_box');

function display_drag_drop_meta_box($post) {
    // Retrieve current meta value
    $drag_drop_content = get_post_meta($post->ID, '_drag_drop_content', true);

    // Nonce field for security
    wp_nonce_field(basename(__FILE__), 'drag_drop_nonce');

    echo '<textarea id="drag_drop_content" name="drag_drop_content" rows="5" style="width:100%;">' . esc_textarea($drag_drop_content) . '</textarea>';
}

function save_drag_drop_meta_box($post_id) {
    // Verify nonce
    if (!isset($_POST['drag_drop_nonce']) || !wp_verify_nonce($_POST['drag_drop_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // Check user permissions
    if ('page' === $_POST['post_type'] && !current_user_can('edit_page', $post_id)) {
        return $post_id;
    }

    // Sanitize and save the meta value
    $new_meta_value = (isset($_POST['drag_drop_content']) ? sanitize_textarea_field($_POST['drag_drop_content']) : '');
    update_post_meta($post_id, '_drag_drop_content', $new_meta_value);
}
add_action('save_post', 'save_drag_drop_meta_box');



// Register navigation menu
function register_my_menus() {
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu')
        )
    );
}
add_action('init', 'register_my_menus');

// Include the necessary files and add theme support
function my_theme_setup() {
    // Add theme support for title tag
    add_theme_support('title-tag');

    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'my_theme_setup');

// Enqueue styles and scripts
function my_theme_enqueue_styles() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');


?>