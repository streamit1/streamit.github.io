<?php

/**
 * Template part for displaying a post's page
 *
 * @package streamit
 */

namespace Streamit\Utility;


the_content();
if (post_type_supports(get_post_type(), 'comments') && (comments_open() || get_comments_number())) {
	comments_template();
}

wp_link_pages(array(
	'before' => '<div class="page-links">' . esc_html__('Pages:', 'streamit'),
	'after'  => '</div>',
));
