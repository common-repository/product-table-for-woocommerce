<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! WC()->cart ){
	return;
}

// gen settings
$gen_settings_serialize = get_option( 'awcpt_general_settings' );
if( $gen_settings_serialize ){
	$gen_settings = maybe_unserialize( $gen_settings_serialize );
	if( $gen_settings ){
		$cart_settings = $gen_settings['cart'];
		$gen_labels = $gen_settings['labels'];
	}
}

// labels
$single_item_lbl = ! empty( $gen_labels['cartWidgetSingleItem'] ) ? $gen_labels['cartWidgetSingleItem'] : 'Item';
$multiple_items_lbl = ! empty( $gen_labels['cartWidgetMultiItems'] ) ? $gen_labels['cartWidgetMultiItems'] : 'Items';
$view_cart_lbl = ! empty( $gen_labels['cartWidgetView'] ) ? $gen_labels['cartWidgetView'] : 'View Cart';

// styles
$styles = '';
if( ! empty( $cart_settings['bottom'] ) ){
	$styles .= 'bottom: '.$cart_settings['bottom'].';';
}
if( ! empty( $cart_settings['right'] ) ){
	$styles .= 'right: '.$cart_settings['right'].';';
}
if( ! empty( $cart_settings['bgColor'] ) ){
	$styles .= 'background-color: '.$cart_settings['bgColor'].';';
}
if( ! empty( $cart_settings['borderColor'] ) ){
	$styles .= 'border-color: '.$cart_settings['borderColor'].';';
}
if( ! empty( $cart_settings['borderWidth'] ) ){
	$styles .= 'border-width: '.$cart_settings['borderWidth'].'px;';
}
if( ! empty( $cart_settings['borderRadius'] ) ){
	$styles .= 'border-radius: '.$cart_settings['borderRadius'].'px;';
}
if( ! empty( $cart_settings['fontColor'] ) ){
	$styles .= 'color: '.$cart_settings['fontColor'].';';
}
if( ! empty( $cart_settings['fontSize'] ) ){
	$styles .= 'font-size: '.$cart_settings['fontSize'].';';
}
if( ! empty( $cart_settings['width'] ) ){
	$styles .= 'width: '.$cart_settings['width'].';';
}

// cart quantities
$total_qty = WC()->cart->cart_contents_count;
$total_price = WC()->cart->get_cart_subtotal();
$cart_url = wc_get_cart_url();

// classes
$fcw_class = 'awcpt-cart-widget';
if( empty( $total_qty ) ){
	$fcw_class .= ' awcpt-cw-hide';
} ?>

<div class="<?php echo $fcw_class; ?>" style="<?php echo $styles; ?>">
  	<div class="awcpt-cw-half awcpt-fcart-info">
		<span class="wcpt-cw-qty-total">
			<span class="awcpt-cw-qty"><?php echo $total_qty; ?></span>
			<span class="awcpt-cw-text">
				<?php
					if( $total_qty > 1 ){
						echo __( $multiple_items_lbl, 'product-table-for-woocommerce' );
					}else{
						echo __( $single_item_lbl, 'product-table-for-woocommerce' );
					}
				?>
			</span>
		</span>
		<span class="awcpt-cw-separator">|</span>
		<span class="awcpt-cw-price">
			<?php echo $total_price; ?>
		</span>
	</div>
	<a href="<?php echo $cart_url;?>" class="awcpt-cw-half awcpt-fcart-link">
      <span class="awcpt-cw-loading-icon"></span>
      <span class="awcpt-cw-view-label"><?php echo __( $view_cart_lbl, 'product-table-for-woocommerce' ); ?></span>
      <span class="awcpt-cw-cart-icon">
	  	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
		  <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
		  <line x1="3" y1="6" x2="21" y2="6"></line>
		  <path d="M16 10a4 4 0 0 1-8 0"></path>
		</svg>
	  </span>
  	</a>
</div>