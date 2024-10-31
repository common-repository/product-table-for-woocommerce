<?php
$label = ! empty( $elem['fldLabel'] ) ? $elem['fldLabel'] : 'Sale';
$display_as = ! empty( $elem['display'] ) ? $elem['display'] : 'dropdown';
$onsale_lbl = ! empty( $elem['onSaleLabel'] ) ? $elem['onSaleLabel'] : 'On sale';
$any_sale_lbl = ! empty( $elem['anySaleText'] ) ? $elem['anySaleText'] : 'Any';
$selected_val = '';

// handling selected val url
if( ! empty( $_GET[$table_id . '_onsale'] ) ){
    $selected_val = sanitize_text_field( $_GET[$table_id . '_onsale'] );
}

$onsale_filter = '<div class="awcpt-filter awcpt-onsale-filter-wrap">';
if( $display_as == 'dropdown' ) {
    $onsale_filter .= '<select name="onsale_filter" class="awcpt-dropdown awcpt-filter-fld awcpt-onsale-filter" data-placeholder="'.__( $label, 'product-table-for-woocommerce' ).'" data-type="onsale">';
    $onsale_filter .= '<option value="" disabled selected>'.__( $label, 'product-table-for-woocommerce' ).'</option>';

    $selected = '';
    if( ! empty( $selected_val ) && $selected_val != 'any' ){
        $selected = 'selected';
    }
    $onsale_filter .= '<option value="true" '.$selected.'>'.__( $onsale_lbl, 'product-table-for-woocommerce' ).'</option>';

    $selected = '';
    if( $selected_val == 'any' ){
        $selected = 'selected';
    }
    $onsale_filter .= '<option value="any" '.$selected.'>'.__( $any_sale_lbl, 'product-table-for-woocommerce' ).'</option>';
    $onsale_filter .= '</select>';
} else {
    $onsale_filter .= '<div class="awcpt-filter-row-heading">';
    $onsale_filter .= __( $label, 'product-table-for-woocommerce' );
    $onsale_filter .= '</div>';
    $onsale_filter .= '<div class="awcpt-filter-row-grp">';

    $checked = '';
    if( ! empty( $selected_val ) && $selected_val != 'any' ){
        $checked = 'checked="checked"';
    }
    $onsale_filter .= '<div class="awcpt-filter-row">';
    $onsale_filter .= '<label for="awcpt-filter-onsale" class="awcpt-checkbox-label">';
        $onsale_filter .= __( $onsale_lbl, 'product-table-for-woocommerce' );
        $onsale_filter .= '<input type="checkbox" name="onsale_filter" class="awcpt-filter-checkbox awcpt-filter-fld awcpt-onsale-filter" id="awcpt-filter-onsale" data-type="onsale" value="true" '.$checked.' />';
        $onsale_filter .= '<span></span>';
    $onsale_filter .= '</label>';
    $onsale_filter .= '</div>';
    $onsale_filter .= '</div>';
}
$onsale_filter .= '</div>';

echo $onsale_filter;