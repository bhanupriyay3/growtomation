<?php
/* Template Name: Sample Page */
get_header();
?>

<div class="main-content">
    <div class="main-column">
        <div id="drag-and-drop-area" class="drag-and-drop-area">
            <!-- JavaScript module content will go here -->
            <p>Drag and drop content here.</p>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const area = document.getElementById('drag-and-drop-area');
                    area.ondrop = function(e) {
                        e.preventDefault();
                        const data = e.dataTransfer.getData('text');
                        area.innerHTML += `<div>${data}</div>`;
                    };
                    area.ondragover = function(e) {
                        e.preventDefault();
                    };
                });
            </script>
        </div>
        <!-- Display custom plugin content -->
        <?php echo do_shortcode('[simple_contact_form]'); ?>
    </div>
    <div class="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
