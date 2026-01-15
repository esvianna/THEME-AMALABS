<?php
/**
 * The main template file
 */

get_header();
?>

<main id="primary" class="site-main container" style="margin-top: 50px; margin-bottom: 50px;">

    <?php
    if ( have_posts() ) :

        if ( is_home() && ! is_front_page() ) :
            ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
            <?php
        endif;

        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 40px;">
                <header class="entry-header">
                    <?php
                    if ( is_singular() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;
                    ?>
                </header><!-- .entry-header -->
                
                <div class="entry-content">
                    <?php
                    if ( is_singular() ) {
                        the_content();
                    } else {
                        the_excerpt();
                    }
                    ?>
                </div>
            </article>
            <?php

        endwhile;

        the_posts_navigation();

    else :

        echo '<p>Nenhum conteúdo encontrado.</p>';

    endif;
    ?>

</main><!-- #main -->

<?php
get_footer();
