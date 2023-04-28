<?php

/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 5.2.0
 */

namespace Streamit\Utility;

defined('ABSPATH') || exit;

do_action('woocommerce_before_mini_cart'); ?>

<?php if (!WC()->cart->is_empty()) : ?>
	<div id="sidebar-scrollbar">
		<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">
			<?php
			do_action('woocommerce_before_mini_cart_contents');

			foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
				$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
				$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

				if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
					$product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
					$thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
					$product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
					$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
					$remove_item_link = apply_filters(
						'woocommerce_cart_item_remove_link',
						sprintf(
							'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="far fa-times-circle remove-icon"></i><span class="streamit_remove_text">Remove</span></a>',
							esc_url(wc_get_cart_remove_url($cart_item_key)),
							esc_attr__('Remove this item', 'streamit'),
							esc_attr($product_id),
							esc_attr($cart_item_key),
							esc_attr($_product->get_sku())
						),
						$cart_item_key
					);
					$widget_cart_item_quantity = apply_filters(
						'woocommerce_widget_cart_item_quantity',
						'<div class="product-price">' . $product_price . '</div>',
						$cart_item,
						$cart_item_key
					);

					if ( $_product->is_sold_individually() ) {
						$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
					} else {
						$product_quantity = woocommerce_quantity_input(
							array(
								'input_name'   => "cart[{$cart_item_key}][qty]",
								'input_value'  => $cart_item['quantity'],
								'max_value'    => $_product->get_max_purchase_quantity(),
								'min_value'    => '0',
								'product_name' => $_product->get_name(),
							),
							$_product,
							false
						);
					}
			?>
					<li class="woocommerce-mini-cart-item <?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)); ?>">

						<div class="streamit-cart-img">
							<?php if (empty($product_permalink)) : ?>
								<?php echo wp_kses_post($thumbnail); ?>
							<?php else : ?>
								<a href="<?php echo esc_url($product_permalink); ?>">
									<?php echo wp_kses_post($thumbnail); ?>
								</a>
							<?php endif; ?>
						</div>
						<div class="streamit-cart-content">
							<?php
							echo wp_kses_post($remove_item_link);
							?>
							<a class="d-block" href="<?php echo esc_url($product_permalink); ?>">
								<h6 class="streamit-product-title"><?php echo esc_html($product_name); ?></h6>
							</a>
							<?php 
							echo wp_kses_post(wc_get_formatted_cart_item_data($cart_item)); 

							
	
							echo wp_kses_post($widget_cart_item_quantity); 
							
							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
							?>
						</div>

					</li>
			<?php
				}
			}

			do_action('woocommerce_mini_cart_contents');
			?>
		</ul>
	</div>
	<div class="streamit_mini_cart_button_footer">
		<p class="woocommerce-mini-cart__total total">
			<?php
			/**
			 * Hook: woocommerce_widget_shopping_cart_total.
			 *
			 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
			 */
			do_action('woocommerce_widget_shopping_cart_total');
			?>
		</p>

		<?php do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>

		<p class="woocommerce-mini-cart__buttons buttons"><?php do_action('woocommerce_widget_shopping_cart_buttons'); ?></p>

		<?php do_action('woocommerce_widget_shopping_cart_after_buttons'); ?>
	</div>
<?php else : ?>
	<div class="streamit-empty-cart ">
		<div class="empty-wrapper">

			<img src="<?php echo  get_template_directory_uri() . '/assets/images/redux/empty-cart-img.png' ?>" alt="" srcset="">
			<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e('Your Bag is empty. Add few items.', 'streamit'); ?></p>
			<?php
			echo streamit()->streamit_get_comment_btn($tag = "a",  $label = 'Shop Now', $show_icon = false, $attr = array(
				'href' => get_permalink(wc_get_page_id('shop')),
				'class' => 'streamit-btn btn btn-hover',
			));
			?>
		</div>
	</div>

<?php endif; ?>

<?php do_action('woocommerce_after_mini_cart');
