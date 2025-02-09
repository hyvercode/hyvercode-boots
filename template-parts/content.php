<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>
        <div class="entry-meta">
            <?php
            bootstrap_tutorial_theme_posted_on();
            bootstrap_tutorial_theme_posted_by();
            ?>
        </div>
    </header>

    <div class="entry-content">
        <?php
        the_content(sprintf(
            wp_kses(
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'bootstrap-tutorial-theme'),
                array('span' => array('class' => array()))
            ),
            get_the_title()
        ));

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'bootstrap-tutorial-theme'),
            'after'  => '</div>',
        ));
        ?>
    </div>

    <footer class="entry-footer">
        <?php bootstrap_tutorial_theme_tag_post(); ?>
    </footer>
</article>