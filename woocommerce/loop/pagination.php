<?php

/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.1
 */

namespace Streamit\Utility;

if (!defined('ABSPATH')) {
	exit;
}
global $wp_query;

global $streamit_options; 

if (!is_singular()) {
	if (isset($streamit_options['streamit_woocommerce_display_pagination'])) {
		$options = $streamit_options['streamit_woocommerce_display_pagination'];
		if ($wp_query->max_num_pages > 1) {
			streamit()->streamit_ajax_product_load_scripts();
			if ($options == "load_more") {
				echo '<a class="streamit_loadmore_product btn btn-hover iq-button" tabindex="0" data-loading-text="' . $streamit_options['streamit_display_blog_loadmore_text_2'] . '"><span>' . $streamit_options['streamit_display_blog_loadmore_text'] . '</span></a>';
			} elseif ($options == "infinite_scroll") {
				echo '<div class="loader-wheel-container"></div>';
			} else {
				get_template_part('template-parts/wocommerce/pagination');
			}
		}
	} else {
		get_template_part('template-parts/wocommerce/pagination');
	}
}
