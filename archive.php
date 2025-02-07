<?php get_header(); ?>

<main class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <article>
                            <h1 class="display-6"><?php the_title(); ?></h1>
                            <div class="my-4"><?php the_content(); ?></div>
                        </article>
                <?php endwhile;
                endif; ?>
                <div class="my-5">
                    <?php comments_template(); ?>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col-md-2 text-right">
                <div class="shadow-sm">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('medium=', ['class' => '']);
                }
                ?>
                <div class="entry-meta">
                    <?php
                    echo get_avatar(get_the_author_meta('ID'), 64, '', '', array('class' => 'rounded-circle '));
                    bootstrap_tutorial_theme_posted_on();
                    bootstrap_tutorial_theme_posted_by();
                    ?>
                </div>
                </div>          
            </div>
        </div>
    </div>
    </div>
</main>

<?php get_footer(); ?>