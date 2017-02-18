<?php

if (post_password_required()) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if (have_comments()) { ?>
        <h2 class="comments-title">
            <?php
                $comments_number = get_comments_number();
                if ( '1' === $comments_number ) {
                    /* translators: %s: post title */
                    printf( __( 'One Reply to &ldquo;%s&rdquo;', 'oseo' ), get_the_title() );
                } else {
                    printf(
                        /* translators: 1: number of comments, 2: post title */
                        __(
                            '%1$s Replies to &ldquo;%2$s&rdquo;',
                            'oseo'
                        ),
                        number_format_i18n( $comments_number ),
                        get_the_title()
                    );
                }
            ?>
        </h2>
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) { // are there comments to navigate through  ?>
            <h3 class="screen-reader-text sr-only"><?php _e('Comment navigation', 'oseo'); ?></h3>
            <ul id="comment-nav-above" class="comment-navigation pager" role="navigation">
                <li class="nav-previous previous"><?php previous_comments_link(__('&larr; Older Comments', 'oseo')); ?></li>
                <li class="nav-next next"><?php next_comments_link(__('Newer Comments &rarr;', 'oseo')); ?></li>
            </ul>
        <?php } // check for comment navigation  ?>
        <ul class="media-list">
            <?php
            /* Loop through and list the comments. Tell wp_list_comments()
             * to use bootstrapBasicComment() to format the comments.
             * If you want to override this in a child theme, then you can
             * define bootstrapBasicComment() and that will be used instead.
             * See bootstrapBasicComment() in inc/template-tags.php for more.
             */
            wp_list_comments(array('avatar_size' => '48', 'callback' => 'bootstrapBasicComment'));
            ?>
        </ul><!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) { // are there comments to navigate through  ?>
            <h3 class="screen-reader-text sr-only"><?php _e('Comment navigation', 'oseo'); ?></h3>
            <ul id="comment-nav-below" class="comment-navigation comment-navigation-below pager" role="navigation">
                <li class="nav-previous previous"><?php previous_comments_link(__('&larr; Older Comments', 'oseo')); ?></li>
                <li class="nav-next next"><?php next_comments_link(__('Newer Comments &rarr;', 'oseo')); ?></li>
            </ul>
        <?php } // check for comment navigation  ?>
    <?php } // have_comments()  ?>
    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) { ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'oseo'); ?></p>
    <?php
    } //endif;
    ?>
    <?php
    $req      = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');
    $html5 = true;

    // re-format comment allowed tags
    $comment_allowedtags = allowed_tags();
    $comment_allowedtags = str_replace(array("\r\n", "\r", "\n"), '', $comment_allowedtags);
    $comment_allowedtags_array = explode('&gt; &lt;', $comment_allowedtags);
    $formatted_comment_allowedtags = '';
    foreach ($comment_allowedtags_array as $item) {
        $formatted_comment_allowedtags .= '<code>';

        if ($comment_allowedtags_array[0] != $item) {
            $formatted_comment_allowedtags .= '&lt;';
        }

        $formatted_comment_allowedtags .= $item;

        if (end($comment_allowedtags_array) != $item) {
            $formatted_comment_allowedtags .= '&gt;';
        }

        $formatted_comment_allowedtags .= '</code> ';
    }
    $comment_allowed_tags = $formatted_comment_allowedtags;
    unset($comment_allowedtags, $comment_allowedtags_array, $formatted_comment_allowedtags);

    ob_start();
    comment_form(
        array(
            'class_submit' => 'btn btn-primary',
            'fields' => array(
                'author' => '<div class="form-group"><div class="col-md-6">' .
                            '<div class="row">' .
                            '<label class="control-label col-md-12" for="author">' . __('Name', 'oseo') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' .
                            '<div class="col-md-12">' .
                            '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' class="form-control" />' .
                            '</div>' .
                            '</div>',
                            '</div>',
                'email'  => '<div class="col-md-6">' .
                            '<div class="row">' .
                            '<label class="control-label col-md-12" for="email">' . __('Email', 'oseo') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' .
                            '<div class="col-md-12">' .
                            '<input id="email" name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' class="form-control" />' .
                            '</div>' .
                            '</div>' .
                            '</div>' .
                            '</div>',
                'url'    => '',
            ),
            'comment_field' => '<div class="form-group">' .
                            '<label class="control-label col-md-12" for="comment">' . __('Comment', 'oseo') . '</label> ' .
                            '<div class="col-md-12">' .
                            '<textarea id="comment" name="comment" aria-required="true" class="form-control"></textarea>' .
                            '</div>' .
                            '</div>',
            'comment_notes_after' => '<p class="help-block sr-only">' .
                            sprintf(__('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'oseo'), $comment_allowed_tags) .
                            '</p>'
        )
    );


    /**
     * WordPress comment form does not support action/filter form and input submit elements. Rewrite these code when there is support available.
     * @todo Change form class modification to use WordPress hook action/filter when it's available.
     */
    $comment_form = str_replace('class="comment-form', 'class="comment-form form form-horizontal', ob_get_clean());
    echo $comment_form;
    unset($comment_allowed_tags, $comment_form);
    ?>
</div>