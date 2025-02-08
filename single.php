<?php

/**
 * The template for displaying single posts.
 */
get_header(); // Include the header
?>

<main class="container py-5">
    <div class="row">
        <div class="col-9">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
                        <header class="entry-header">
                            <?php
                            the_title('<h1 class="entry-title">', '</h1>');
                            ?>
                            <div class="entry-meta mobile-hidden">
                                <?php
                                bootstrap_tutorial_theme_posted_on();
                                bootstrap_tutorial_theme_posted_by();
                                ?>
                            </div>
                        </header>

                        <div class="entry-content">
                            <?php
                            the_content();

                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'bootstrap-tutorial-theme'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>

                        <footer class="entry-footer clear-both">
                            <div class="mb-4">
                                <?php bootstrap_tutorial_theme_tag_post(); ?>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-between">
                                    <li class="page-item post-page">
                                        <?php previous_post_link('%link'); ?>
                                    </li>
                                    <li class="page-item post-page">
                                        <?php next_post_link('%link'); ?>
                                    </li>
                                </ul>
                            </nav>
                        </footer>

                    </article>

                    <!-- Author Information -->
                    <div class="author-info mt-5">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <?php echo get_avatar(get_the_author_meta('ID'), 64, '', '', array('class' => 'rounded-circle')); ?>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="author-name mb-1"><?php the_author(); ?></h4>
                                <p class="author-bio mb-0"><?php echo get_the_author_meta('description'); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Comments -->
                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
            <?php
                endwhile;
            else :
                // If no posts are found
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
        <div class="col-3 text-right mt-4">
            <div class="shadow-sm border-0 text-center p-2">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('medium=', ['class' => 'mb-3']);
                }
                ?>
                <div class="entry-meta">
                    <?php
                    echo get_avatar(get_the_author_meta('ID'), 64, '', '', array('class' => 'rounded-circle'));
                    bootstrap_tutorial_theme_posted_on();
                    bootstrap_tutorial_theme_posted_by();
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer(); // Include the footer
?>