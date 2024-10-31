<?php
if( get_option( 'woocommerce_enable_review_rating' ) === 'no' ){
	return;
}

$template = $column['template'];
$not_rated_msg = $column['notRatedMsg'];
$avg_rating = $prd_data['average_rating'];
$review_count = $prd_data['review_count'];
$stars_width = ( $avg_rating / 5 ) * 100;
// rating number html
$rating_num_html = '<div class="awcpt-average-rating">';
	if( $template == 'number_only' ){
		$rating_num_html .= $avg_rating.' '.__( 'out of 5 stars', 'product-table-for-woocommerce' );
	} else {
		$rating_num_html .= $avg_rating;
	}
$rating_num_html .= '</div>';
// review count html
$review_count_html = '<div class="awcpt-review-count">('.$review_count.')</div>';
// rating stars html
$stars_html = '<div class="awcpt-rating-stars star-rating">';
	$stars_html .= '<span style="width:'.$stars_width.'%"></span>';
$stars_html .= '</div>';
// rating template final output html
$rating_html = '<div class="awcpt-rating" title="'.$avg_rating.' '.__( 'out of 5 stars', 'product-table-for-woocommerce' ).'">';
if( ! empty( $avg_rating ) || ( empty( $avg_rating ) && empty( $not_rated_msg ) ) ){
	if( $template == 'number_first' ){
		$rating_html .= $rating_num_html.$stars_html.$review_count_html;
	} elseif( $template == 'stars_first' ){
		$rating_html .= $stars_html.$rating_num_html.$review_count_html;
	} elseif( $template == 'count_first' ){
		$rating_html .= $review_count_html.$stars_html.$rating_num_html;
	} elseif( $template == 'count_middle' ){
		$rating_html .= $rating_num_html.$review_count_html.$stars_html;
	} elseif( $template == 'star_only' ){
		$rating_html .= $stars_html;
	} elseif( $template == 'no_number' ){
		$rating_html .= $stars_html.$review_count_html;
	} elseif( $template == 'no_count' ){
		$rating_html .= $rating_num_html.$stars_html;
	} elseif( $template == 'no_star' ){
		$rating_html .= $rating_num_html.$review_count_html;
	} elseif( $template == 'count_only' ){
		$rating_html .= $review_count_html;
	} elseif( $template == 'number_only' ){
		$rating_html .= $rating_num_html;
	} else {
		$rating_html .= $rating_num_html;
	}
} else {
	if( ! empty( $not_rated_msg ) ){
		$rating_html .= __( $not_rated_msg, 'product-table-for-woocommerce' );
	}
}
$rating_html .= '</div>';

echo $rating_html;