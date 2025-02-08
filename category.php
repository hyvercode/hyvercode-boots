<?php

get_header(); // Include the header
?>
<main class="container py-5">
    <div class="row">
        <div class="col-md-4 mobile-hidden">
            <?php get_sidebar(); ?>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="breadcrumbs mb-4">
                <?php
                if (function_exists('bcn_display')) {
                    bcn_display();
                }
                ?>
            </div>
            <header class="page-header mb-5">
                <h1 class="page-title">
                    <?php
                    single_cat_title('Category: '); // Display the category name
                    ?>
                </h1>
            </header>

            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
                        <header class="entry-header">
                            <?php
                            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                            ?>
                            <div class="entry-meta">
                                <?php
                                echo get_avatar(get_the_author_meta('ID'), 64, '', '', array('class' => 'rounded-circle'));
                                bootstrap_tutorial_theme_posted_on();
                                bootstrap_tutorial_theme_posted_by();
                                ?>
                            </div>
                        </header>

                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div>

                        <footer class="entry-footer">
                            <?php bootstrap_tutorial_theme_tag_post(); ?>
                        </footer>
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