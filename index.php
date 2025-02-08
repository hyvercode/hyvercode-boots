<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */
get_header(); // Include the header
?>
<main class="container py-5">
    <div class="row">
        <div class="col-md-4 mobile-hidden">
            <?php get_sidebar(); ?>
        </div>
        <div class="col-md-8 col-xs-12">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('mb-3'); ?>>
                        <header class="entry-header">
                            <?php
                            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                            ?>
                            <div class="entry-meta mobile-hidden">
                                <?php
                                echo get_avatar(get_the_author_meta('ID'), 64, '', '', array('class' => 'rounded-circle'));
                                bootstrap_tutorial_theme_posted_on();
                                bootstrap_tutorial_theme_posted_by();
                                ?>
                            </div>
                        </header>
                        <div class="row">
                            <div class="col-md-3">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium=', ['class' => 'img-fluid img-thumbnail']);
                                }
                                ?>
                            </div>
                            <div class="col-md-9">
                                <div class="entry-summary">
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                                </div>
                                <div class="entry-footer">
                                    <?php bootstrap_tutorial_theme_tag_post(); ?>
                                </div>
                            </div>
                        </div>
                    </article>
                    <hr class="bg-info border-1 border-top border-info" />
            <?php
                endwhile;

                // Pagination
                the_posts_pagination(array(
                    'prev_text' => __('Previous', 'bootstrap-tutorial-theme'),
                    'next_text' => __('Next', 'bootstrap-tutorial-theme'),
                    'mid_size'  => 2, // Number of page numbers to show on either side of the current page
                ));
            else :
                // If no posts are found
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
    </div>
</main>
<?php
get_footer(); // Include the footer
?>