<?php
$out_stock_msg = $column['outStockMsg'];
$single_stock_msg = $column['singleStockMsg'];
if( $column['stockThreshold'] && $column['stockThreshold'] >= 0 ){
    $low_stock_threshold = $column['stockThreshold'];
} else {
    $low_stock_threshold = $prd_data['low_stock_amount'];
}
$low_stock_msg = $column['lowStockMsg'];
$in_stock_msg = $column['inStockMsg'];
$manage_stock = $prd_data['manage_stock'];
$stock_status = $prd_data['stock_status'];
$availability_html = '<div class="awcpt-stock-availability">';
if( $manage_stock ){
    $stock_quantity = $prd_data['stock_quantity'];
    if( $stock_status == 'outofstock' ){
        $availability_html .= '<p>'.__( $out_stock_msg, 'product-table-for-woocommerce' ).'</p>';
    } elseif( $stock_status == 'instock' ) {
        if( $stock_quantity == 1 ){
            $single_stock_msg = str_replace( '{stock}', $stock_quantity, $single_stock_msg );
            $availability_html .= '<p>'.__( $single_stock_msg, 'product-table-for-woocommerce' ).'</p>';
        } elseif( $stock_quantity <= $low_stock_threshold ) {
            $low_stock_msg = str_replace( '{stock}', $stock_quantity, $low_stock_msg );
            $availability_html .= '<p>'.__( $low_stock_msg, 'product-table-for-woocommerce' ).'</p>';
        } else {
            $in_stock_msg = str_replace( '{stock}', $stock_quantity, $in_stock_msg );
            $availability_html .= '<p>'.__( $in_stock_msg, 'product-table-for-woocommerce' ).'</p>';
        }
    } else {
        $availability_html .= '<p>'.__( $stock_status, 'product-table-for-woocommerce' ).'</p>';
    }
} else {
    if( $stock_status == 'outofstock' ){
        $availability_html .= '<p>'.__( $out_stock_msg, 'product-table-for-woocommerce' ).'</p>';
    } else {
        $availability_html .= '<p>'.__( $stock_status, 'product-table-for-woocommerce' ).'</p>';
    }
}
$availability_html .= '</div>';

echo $availability_html;