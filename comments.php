<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area mt-5">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title mb-4">
            <?php
            printf(
                esc_html(_n('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'bootstrap-tutorial-theme')),
                number_format_i18n(get_comments_number()),
                get_the_title()
            );
            ?>
        </h2>

        <ol class="comment-list list-unstyled">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 64,
                'callback'    => 'bootstrap_tutorial_theme_comment', // Custom comment callback
            ));
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply' => __('Leave a Reply', 'bootstrap-tutorial-theme'),
        'title_reply_to' => __('Leave a Reply to %s', 'bootstrap-tutorial-theme'),
        'cancel_reply_link' => __('Cancel Reply', 'bootstrap-tutorial-theme'),
        'label_submit' => __('Post Comment', 'bootstrap-tutorial-theme'),
        'class_form' => 'comment-form',
        'class_submit' => 'btn btn-primary',
        'comment_field' => '<div class="form-group mb-3">
            <textarea id="comment" name="comment" class="form-control" rows="5" required></textarea>
        </div>',
        'fields' => array(
            'author' => '<div class="form-group mb-3">
                <input id="author" name="author" type="text" class="form-control" placeholder="' . __('Name', 'bootstrap-tutorial-theme') . '" required>
            </div>',
            'email' => '<div class="form-group mb-3">
                <input id="email" name="email" type="email" class="form-control" placeholder="' . __('Email', 'bootstrap-tutorial-theme') . '" required>
            </div>',
            'url' => '<div class="form-group mb-3">
                <input id="url" name="url" type="url" class="form-control" placeholder="' . __('Website', 'bootstrap-tutorial-theme') . '">
            </div>',
        ),
    ));
    ?>
</div>