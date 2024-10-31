<?php
$product_id = $prd_data['id'];
$shortcode = $column['sCode'];
if( ! empty( $shortcode ) ) {
	if( strpos( $shortcode, '{productID}' ) !== false ) {
		$shortcode = str_replace( '{productID}', $product_id, $shortcode );
	}

	if( strpos( $shortcode, '{variationID}' ) !== false ) {
		$shortcode = str_replace( '{variationID}', $product_id, $shortcode );
	}

	$shortcode_output = '<div class="awcpt-shortcode-wrap">';
	$shortcode_output .= do_shortcode( $shortcode );
	$shortcode_output .= '</div>';

	echo $shortcode_output;
} else {
	return;
}