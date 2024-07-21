<?php
/* Template Name: Sample Page */
get_header();

// Retrieve current page's drag-and-drop content
$drag_drop_content = get_post_meta(get_the_ID(), '_drag_drop_content', true);
?>

<div class="main-content" style="display: flex;">
    <div class="main-column" style="flex: 2; padding: 20px;">
        <!-- Drag-and-Drop Area -->
        <div id="drag-and-drop-area" class="drag-and-drop-area" style="border: 1px dashed #ccc; padding: 20px; min-height: 200px;">
            <?php echo nl2br(esc_html($drag_drop_content)); ?>
        </div>
        <script>
            function allowDrop(ev) {
                ev.preventDefault();
            }

            function drag(ev) {
                ev.dataTransfer.setData("text", ev.target.id);
            }

            function drop(ev) {
                ev.preventDefault();
                var data = ev.dataTransfer.getData("text");
                var nodeCopy = document.getElementById(data).cloneNode(true);
                ev.target.appendChild(nodeCopy);
            }

            document.addEventListener('DOMContentLoaded', function() {
                var area = document.getElementById('drag-and-drop-area');
                area.ondrop = drop;
                area.ondragover = allowDrop;
            });
        </script>

        <!-- Display custom plugin content -->
        <div class="contact-form">
            <?php echo do_shortcode('[simple_contact_form]'); ?>
        </div>
    </div>

    <div class="sidebar" style="flex: 1; padding: 20px; border-left: 1px solid #ccc;">
        <!-- JavaScript Module Area -->
        <div id="js-module-area">
            <h2>JavaScript Module</h2>
            <button id="js-button">Click Me</button>
            <p id="js-result"></p>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('js-button').addEventListener('click', function() {
                    document.getElementById('js-result').textContent = 'Button was clicked!';
                });
            });
        </script>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
