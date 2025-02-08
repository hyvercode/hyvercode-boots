<?php get_header(); ?>

<main class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <article>
                            <h1 class="display-6"><?php the_title(); ?></h1>
                            <div class="my-4"><?php the_content(); ?></div>
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
                <?php endwhile;
                endif; ?>
                <div class="my-5">
                    <?php comments_template(); ?>
                </div>
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
    </div>
    </div>
    </div>
</main>

<?php get_footer(); ?>