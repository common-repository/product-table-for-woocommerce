<?php
if( $product->is_on_sale() ) {
	$regular_price = $prd_data['regular_price'];
	$sale_price = $prd_data['sale_price'];
	if( isset( $sale_price ) && $sale_price != '' && $sale_price !== false ){
		$onsale_template = $column['template'];
		$price_off = $regular_price - $sale_price;
		$percentage_off = round( ( $price_off / $regular_price ) * 100 );
		$price_off_formatted = wc_price( $price_off );
		if( strpos( $onsale_template, '{PriceOff}' ) !== false ) {
			$onsale_template = str_replace( '{PriceOff}', $price_off_formatted, $onsale_template );
		}

		if( strpos( $onsale_template, '{PercentOff}' ) !== false ) {
			$onsale_template = str_replace( '{PercentOff}', $percentage_off, $onsale_template );
		}

		$onsale_html = '<div class="awcpt-onsale-wrap">';
		$onsale_html .= $onsale_template;
		$onsale_html .= '</div>';

		echo $onsale_html;
	} else {
		return;
	}
} else {
	return;
}