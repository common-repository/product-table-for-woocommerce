<?php
$result_found_msg = $elem['resultFound'];
$single_page_msg = $elem['singlePageResult'];
$single_result_msg = $elem['singleResult'];
$no_result_msg = $elem['noResult'];
$total_result_count = $products_query->found_posts;
$total_no_pages = $products_query->max_num_pages;
$first_result_count = ( $products_query->query_vars['posts_per_page'] * $paged ) - ( $products_query->query_vars['posts_per_page'] - 1 );

if( ( $products_query->query_vars['posts_per_page'] * $paged ) <= $total_result_count ) {
    $last_result_count = ( $products_query->query_vars['posts_per_page'] * $paged );
} else {
    $last_result_count = $total_result_count;
}

$result_count = '<div class="awcpt-result-count">';
$result_count .= '<span class="awcpt-result-msg">';
if( $total_result_count == 1 ) {
    $result_count .= __( $single_result_msg, 'product-table-for-woocommerce' );
} elseif( $total_no_pages == 1 && $total_result_count != 1 ){
    $single_page_msg = str_replace( '{totalResults}', $total_result_count, $single_page_msg );
    $result_count .= __( $single_page_msg, 'product-table-for-woocommerce' );
} elseif( $total_result_count <= 0 ) {
    $result_count .= __( $no_result_msg, 'product-table-for-woocommerce' );
} else {
    // adjusting last result count for load more case
    if( ! $pagination_status ) {
        $last_result_count = $offset;
    }
    $result_found_msg = str_replace( '{firstResult}', $first_result_count, $result_found_msg );
    $result_found_msg = str_replace( '{lastResult}', $last_result_count, $result_found_msg );
    $result_found_msg = str_replace( '{totalResults}', $total_result_count, $result_found_msg );
    $result_count .= __( $result_found_msg, 'product-table-for-woocommerce' );
}
$result_count .= '</span>';
$result_count .= '</div>';

echo $result_count;