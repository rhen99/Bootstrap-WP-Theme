<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                _nx(
                    'One comment on “%2$s”',
                    '%1$s comments on “%2$s”',
                    get_comments_number(),
                    'comments title',
                    'bootstrapwptheme'
                ),
                number_format_i18n(get_comments_number()),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2>

        <ul class="list-group">
            <?php
            wp_list_comments(array(
                'style'      => 'ul',
                'short_ping' => true,
                'callback' => 'bootstrapwptheme_comment_callback'
            ));
            ?>
        </ul>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php

    if (! comments_open()) :
    ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'bootstrapwptheme'); ?></p>
    <?php endif; ?>

    <?php comment_form(array(
        'comment_field' => '<div class="mb-3"><label for="comment" class="form-label">' . __('Message*', 'bootstrapwptheme') . '</label><textarea class="form-control" id="comment" name="comment" required="required"></textarea></div>',
        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        'title_reply'          => __('Leave a Reply'),
        'title_reply_to'       => __('Reply to %s'),
        'cancel_reply_link'    => __('Cancel Reply'),
        'label_submit'         => __('Post Comment'),
        'class_submit'  => 'btn btn-primary',
    )); ?>

</div>