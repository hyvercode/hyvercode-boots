<?php
get_header();
?>

<main class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <header class="author-header mb-5">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <?php echo get_avatar(get_the_author_meta('ID'), 96, '', '', array('class' => 'rounded-circle')); ?>
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h1 class="author-name mb-1"><?php the_author(); ?></h1>
                        <p class="author-bio mb-0"><?php echo get_the_author_meta('description'); ?></p>
                    </div>
                </div>
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
                    <?php
                endwhile;

                // Pagination
                the_posts_pagination(array(
                    'prev_text' => __('Previous', 'bootstrap-tutorial-theme'),
                    'next_text' => __('Next', 'bootstrap-tutorial-theme'),
                    'mid_size'  => 2,
                ));
            else :
                // If no posts are found
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php
get_footer();
?>