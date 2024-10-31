<?php
$placeholder = ! empty( $elem['placeholder'] ) ? $elem['placeholder'] : 'Search';
$button_lbl = ! empty( $elem['btnText'] ) ? $elem['btnText'] : 'Search';
$selected_val = '';
$clear_val_style = '';

// handling selected val url
if( ! empty( $_GET[$table_id . '_search'] ) ){
    $selected_val = sanitize_text_field( $_GET[$table_id . '_search'] );
    $clear_val_style = 'style="display: block;"';
}

$search_html = '<div class="awcpt-search-wrapper">';
$search_html .= '<div class="awcpt-search-input-wrp">';
$search_html .= '<input type="search" name="awcpt_search" class="awcpt-search-input" placeholder="'.__( $placeholder, 'product-table-for-woocommerce' ).'" value="'.$selected_val.'" />';
$search_html .= '<span class="awcpt-search-clear" '.$clear_val_style.'>x</span>';
$search_html .= '</div>';
$search_html .= '<div class="awcpt-search-submit-wrp">';
$search_html .= '<input type="submit" name="awcpt_search_submi" class="awcpt-search-submit awcpt-search-submit-'.$table_id.'" value="'.__( $button_lbl, 'product-table-for-woocommerce' ).'" />';
$search_html .= '</div>';
$search_html .= '</div>';

echo $search_html;