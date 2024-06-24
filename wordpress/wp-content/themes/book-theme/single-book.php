<?php get_header(); ?>

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        $author = get_post_meta( get_the_ID(), 'book_author', true );
        $year = get_post_meta( get_the_ID(), 'book_year', true );
        $genre = get_post_meta( get_the_ID(), 'book_genre', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <div class="entry-content">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="book-featured-image">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>
        
        <div class="book-details">
            <p><strong>Author:</strong> <?php echo esc_html( $author ); ?></p>
            <p><strong>Publication Year:</strong> <?php echo esc_html( $year ); ?></p>
            <p><strong>Genre:</strong> <?php echo esc_html( $genre ); ?></p>
        </div>
        
        <div class="book-content">
            <?php the_content(); ?>
        </div>
    </div>

    
</article>

<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>
