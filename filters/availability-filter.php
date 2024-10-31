<?php
$label = ! empty( $elem['fldLabel'] ) ? $elem['fldLabel'] : 'Availability';
$display_as = ! empty( $elem['display'] ) ? $elem['display'] : 'dropdown';
$instock_lbl = ! empty( $elem['inStockLabel'] ) ? $elem['inStockLabel'] : 'In stock';
$out_stock_lbl = ! empty( $elem['outStockLabel'] ) ? $elem['outStockLabel'] : 'Out of stock';
$any_stock_label = ! empty( $elem['anyStatusText'] ) ? $elem['anyStatusText'] : 'Any';
$selected_val = array();

// handling selected val url
if( ! empty( $_GET[$table_id . '_stock_status'] ) ){
    $selected_val_str = sanitize_text_field( $_GET[$table_id . '_stock_status'] );
    if( $selected_val_str ){
        $selected_val = explode( ",", $selected_val_str );
    }
}

$availability_filter = '<div class="awcpt-filter awcpt-availability-filter-wrap">';
if( $display_as == 'dropdown' ) {
    $availability_filter .= '<select name="availability_filter" class="awcpt-filter-fld awcpt-dropdown awcpt-availability-filter" data-placeholder="'.__( $label, 'product-table-for-woocommerce' ).'" data-type="availability">';
    $availability_filter .= '<option value="" selected disabled>'.__( $label, 'product-table-for-woocommerce' ).'</option>';

    $selected = '';
    if( in_array( "instock", $selected_val ) ){
        $selected = 'selected';
    }
    $availability_filter .= '<option value="instock" '.$selected.'>'.__( $instock_lbl, 'product-table-for-woocommerce' ).'</option>';

    $selected = '';
    if( in_array( "outofstock", $selected_val ) ){
        $selected = 'selected';
    }
    $availability_filter .= '<option value="outofstock" '.$selected.'>'.__( $out_stock_lbl, 'product-table-for-woocommerce' ).'</option>';

    $selected = '';
    if( in_array( "any", $selected_val ) ){
        $selected = 'selected';
    }
    $availability_filter .= '<option value="any" '.$selected.'>'.__( $any_stock_label, 'product-table-for-woocommerce' ).'</option>';
    $availability_filter .= '</select>';
} else {
    $availability_filter .= '<div class="awcpt-filter-row-heading">';
    $availability_filter .= __( $label, 'product-table-for-woocommerce' );
    $availability_filter .= '</div>';

    $availability_filter .= '<div class="awcpt-filter-row-grp">';

    $checked = '';
    if( in_array( "instock", $selected_val ) ){
        $checked = 'checked="checked"';
    }
    $availability_filter .= '<div class="awcpt-filter-row">';
    $availability_filter .= '<label for="awcpt-filter-instock" class="awcpt-checkbox-label">';
        $availability_filter .= __( $instock_lbl, 'product-table-for-woocommerce' );
        $availability_filter .= '<input type="checkbox" name="availability_filter[]" class="awcpt-filter-fld awcpt-filter-checkbox awcpt-availability-filter" id="awcpt-filter-instock" data-type="availability" value="instock" '.$checked.' />';
        $availability_filter .= '<span></span>';
    $availability_filter .= '</label>';
    $availability_filter .= '</div>';

    $checked = '';
    if( in_array( "outofstock", $selected_val ) ){
        $checked = 'checked="checked"';
    }
    $availability_filter .= '<div class="awcpt-filter-row">';
    $availability_filter .= '<label for="awcpt-filter-outofstock" class="awcpt-checkbox-label">';
        $availability_filter .= __( $out_stock_lbl, 'product-table-for-woocommerce' );
        $availability_filter .= '<input type="checkbox" name="availability_filter[]" class="awcpt-filter-fld awcpt-filter-checkbox awcpt-availability-filter" id="awcpt-filter-outofstock" data-type="availability" value="outofstock" '.$checked.' />';
        $availability_filter .= '<span></span>';
    $availability_filter .= '</label>';
    $availability_filter .= '</div>';

    $availability_filter .= '</div>';
}
$availability_filter .= '</div>';

echo $availability_filter;