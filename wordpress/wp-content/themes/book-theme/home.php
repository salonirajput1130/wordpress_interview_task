<?php
/*
Template Name: home
Template Post Type: post, page, event
*/
?>



<?php
get_header(); 
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php 
        // Display the book list
        echo do_shortcode('[book_list]');
        ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php
get_footer();
?>
