<?php

/**
 * Display single video reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/masvideos/single-video-reviews.php.
 *
 * HOWEVER, on occasion MasVideos will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @package     MasVideos/Templates
 * @version     1.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $video;

if (!comments_open()) {
    return;
}

?>
<div id="reviews" class="streamit-reviews">

    <div id="comments" class="comments-area validate-form">

        <?php if (have_comments()) : ?>

            <ol class="commentlist">
                <?php wp_list_comments(apply_filters('masvideos_video_review_list_args', array('callback' => 'masvideos_video_comments'))); ?>
            </ol>

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) :
                echo '<nav class="masvideos-pagination">';
                paginate_comments_links(apply_filters('masvideos_comment_pagination_args', array(
                    'prev_text' => '&larr;',
                    'next_text' => '&rarr;',
                    'type'      => 'list',
                )));
                echo '</nav>';
            endif; ?>

        <?php else : ?>

            <p class="masvideos-noreviews"><?php _e('There are no comments yet.', 'streamit'); ?></p>

        <?php endif; ?>
    </div>
    <div id="review_form_wrapper">
        <div id="review_form">
            <?php
            $commenter = wp_get_current_commenter();

            $comment_form = array(
                'title_reply'          => have_comments() ? __('Comments', 'streamit') : sprintf(__('Be the first to comment &ldquo;%s&rdquo;', 'streamit'), get_the_title()),
                'title_reply_to'       => __('Leave a Reply to %s', 'streamit'),
                'title_reply_before'   => '<h5 id="reply-title" class="comment-reply-title">',
                'title_reply_after'    => '</h5>',
                'comment_notes_after'  => '',
                'fields'               => array(
                    'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__('Name', 'streamit') . '&nbsp;<span class="required">*</span></label> ' .
                        '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" required /></p>',
                    'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__('Email', 'streamit') . '&nbsp;<span class="required">*</span></label> ' .
                        '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" required /></p>',
                ),
                'label_submit'  => __('Submit', 'streamit'),
                'submit_button'  => '<button name="%1$s" type="submit" id="%2$s" class="btn btn-hover iq-button" value="%4$s" >
                        <span><i class="fas fa-play mr-1" aria-hidden="true"></i>' . esc_html__('Submit', 'streamit') . '</span>
                        </button>',
                'logged_in_as'  => '',
                'comment_field' => '',
            );

            if ($account_page_url = wp_login_url()) {
                $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf(__('You must be <a href="%s">logged in</a> to post a comment.', 'streamit'), esc_url($account_page_url)) . '</p>';
            }

            $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__('Your comment', 'streamit') . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="20" rows="8" required></textarea></p>';

            comment_form(apply_filters('masvideos_video_review_comment_form_args', $comment_form));
            ?>
        </div>
    </div>
    <div class="clear"></div>
</div>