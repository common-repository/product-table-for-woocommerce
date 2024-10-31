<?php
if ( $products_query->found_posts <= $products_per_page ) {
	return;
}

$loadmore_btn_html = '<div class="awcpt-loadmore-btn-wrapper">';
$loadmore_btn_html .= '<a href="#" class="awcpt-button awcpt-loadmore-btn awcpt-loadmore-btn-'.$table_id.'" data-offset="'.$products_per_page.'">';
$loadmore_btn_html .= __( $load_more_btn_txt, 'acowebs-woo-product-table' );
$loadmore_btn_html .= '</a>';
$loadmore_btn_html .= '</div>';

echo $loadmore_btn_html;