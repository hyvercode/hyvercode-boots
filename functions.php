<?php

require_once get_template_directory() . '/class-bootstrap-nav-menu-walker.php';

function bootstrap_tutorial_theme_enqueue_styles()
{
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    // Enqueue custom styles
    wp_enqueue_style('custom-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'bootstrap_tutorial_theme_enqueue_styles');

function bootstrap_tutorial_theme_enqueue_scripts()
{
    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Enqueue dark mode script
    wp_enqueue_script('dark-mode-script', get_template_directory_uri() . '/js/dark-mode.js', array(), null, true);

     // Enqueue Prism.js CSS
     wp_enqueue_style('prism-css', get_template_directory_uri() . '/css/prism.css');

     // Enqueue Prism.js JS
     wp_enqueue_script('prism-js', get_template_directory_uri() . '/js/prism.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'bootstrap_tutorial_theme_enqueue_scripts');

function bootstrap_tutorial_theme_register_menus()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'bootstrap-tutorial-theme'),
    ));
}
add_action('init', 'bootstrap_tutorial_theme_register_menus');

function bootstrap_tutorial_theme_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );

    echo '<span class="posted-on">' . $time_string . '</span>';
}


function bootstrap_tutorial_theme_posted_by() {
    echo '<span class="byline"> by ' . esc_html(get_the_author()) . '</span>';
}

function bootstrap_tutorial_theme_tag_post() {
    if ('post' === get_post_type()) {
        $tags_list = get_the_tag_list('', esc_html__(', ', 'bootstrap-tutorial-theme'));
        if ($tags_list) {
            echo '<span class="tags-links>' . $tags_list . '</span>';
        }
    }
}


function bootstrap_tutorial_theme_category_post() {
    if ('post' === get_post_type()) {
        $categories_list = get_the_category_list(esc_html__(', ', 'bootstrap-tutorial-theme'));
        if ($categories_list) {
            echo '<span class="cat-links">' . $categories_list . '</span>';
        }
    }
}

function bootstrap_tutorial_theme_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'bootstrap-tutorial-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'bootstrap-tutorial-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'bootstrap_tutorial_theme_widgets_init');

function bootstrap_tutorial_theme_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query()) {
        $query->set('posts_per_page', 10); // Limit to 10 posts per page
    }
}
add_action('pre_get_posts', 'bootstrap_tutorial_theme_posts_per_page');

function bootstrap_tutorial_theme_custom_excerpt_length($length) {
    return 20; // Change this number to your desired excerpt length
}
add_filter('excerpt_length', 'bootstrap_tutorial_theme_custom_excerpt_length');


//Prism.js
function bootstrap_tutorial_theme_code_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'language' => 'plaintext', // Default language
    ), $atts, 'code');

    return '<pre><code class="language-' . esc_attr($atts['language']) . '">' . esc_html($content) . '</code></pre>';
}
add_shortcode('code', 'bootstrap_tutorial_theme_code_shortcode');

function bootstrap_tutorial_theme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media mb-4'); ?>>
        <div class="media-body">
            <div class="d-flex align-items-center mb-2">
                <div class="flex-shrink-0">
                    <?php echo get_avatar($comment, 64, '', '', array('class' => 'rounded-circle')); ?>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="mt-0 mb-0"><?php comment_author(); ?></h5>
                    <small class="text-muted">
                        <?php
                        printf(
                            __('%1$s at %2$s', 'bootstrap-tutorial-theme'),
                            get_comment_date(),
                            get_comment_time()
                        );
                        ?>
                    </small>
                </div>
            </div>
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
            <div class="comment-reply">
                <?php
                comment_reply_link(array_merge($args, array(
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<div class="reply">',
                    'after'     => '</div>',
                )));
                ?>
            </div>
        </div>
    </li>
    <?php
}