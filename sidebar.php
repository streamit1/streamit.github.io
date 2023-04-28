<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package streamit
 */

namespace Streamit\Utility;

if (!streamit()->is_primary_sidebar_active()) {
	return;
}

if (class_exists('WooCommerce') && is_shop() || is_tax()) {    ?>
	<div class="col-xl-3 col-sm-12 mt-xl-0 sidebar-service-right streamit-woo-sidebar">
		<div class="streamit-filter-close shop-filter-sidebar">
			<i class="fas fa-times"></i>
		</div>
	<?php
} else { ?>
		<div class="col-xl-4 col-sm-12 mt-5 mt-xl-0 sidebar-service-right">
		<?php
	} ?>

		<aside id="secondary" class="primary-sidebar widget-area">
			<h2 class="screen-reader-text"><?php esc_html_e('Asides', 'streamit'); ?></h2>
			<?php streamit()->display_primary_sidebar(); ?>
		</aside><!-- #secondary -->
		</div>