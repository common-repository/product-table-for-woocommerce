<?php
$display_as = ! empty( $elem['display'] ) ? $elem['display'] : 'dropdown';
$options = $elem['options'];
$selected_val = '';

// handling selected val url
if( ! empty( $_GET[$table_id . '_order_by'] ) ){
    $selected_val = sanitize_text_field( $_GET[$table_id . '_order_by'] );
}

$sort_html = '<div class="awcpt-filter awcpt-sortby-wrap">';
if( $display_as == 'dropdown' ) {
    $sort_html .= '<select name="sort_by" class="awcpt-dropdown awcpt-filter-fld awcpt-sort-by" data-placeholder="'.__( 'Sort by', 'product-table-for-woocommerce' ).'" data-type="order_by">';
    $sort_html .= '<option value="" disabled selected>'.__( 'Sort by', 'product-table-for-woocommerce' ).'</option>';
    foreach( $options as $key => $option ) {
        if( $option['status'] ) {
            $label = $option['label'];
            $selected = '';
            if( $selected_val == $key ){
                $selected = 'selected';
            }
            $sort_html .= '<option value="'.$key.'" '.$selected.'>'.__( $label, 'product-table-for-woocommerce' ).'</option>';
        }
    }
    $sort_html .= '</select>';
} else {
    return;
}
$sort_html .= '</div>';

echo $sort_html;