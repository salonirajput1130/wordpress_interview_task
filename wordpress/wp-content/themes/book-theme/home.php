<?php
/*
Template Name: home
*/

get_header(); 

?>

<div class="custom-homepage">
    <section class="hero-section">
        <h1>Books List</h1>
    </section>
    <section class="features-section">
        <div class="features">
            <?php echo do_shortcode('[book_list]'); ?>
        </div>
    </section>
</div>
<?php
get_footer();
?>
