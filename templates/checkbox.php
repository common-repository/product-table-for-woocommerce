<?php
$product_type = $product->get_type();
$product_id = $prd_data['id'];
$disabled = '';
if( $product_type == 'grouped' || $product_type == 'variable' || $product_type == 'external' || ( $prd_data['stock_status'] != 'instock' && $prd_data['stock_status'] != 'onbackorder' ) ) {
    $disabled = 'disabled';
}
$checkbox_html = '<div class="awcpt-product-checkbox-wrp">';
$checkbox_html .= '<label for="awcpt-product-checkbox'.$key.'-'.$product_id.'" class="awcpt-prdcheck-label">';
$checkbox_html .= '<input type="checkbox" name="awcpt_product_checkbox[]" id="awcpt-product-checkbox'.$key.'-'.$product_id.'" class="awcpt-product-checkbox" value="'.$product_id.'" '.$disabled.' />';
$checkbox_html .= '<span></span>';
$checkbox_html .= '</label>';
$checkbox_html .= '</div>';

echo $checkbox_html;