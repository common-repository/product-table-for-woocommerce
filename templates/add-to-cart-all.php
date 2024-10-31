<?php
$btn_label = ! empty( $add_all_to_cart_txt ) ? $add_all_to_cart_txt : 'Add to cart';
$gcart_btn_html = '<div class="awcpt-cart-all-wrap">';
    $gcart_btn_html .= '<div class="awcpt-cart-all-check-wrap">';
    $gcart_btn_html .= '<label for="awcpt-cart-all-checkbox" class="awcpt-cart-all-checklbl">';
    $gcart_btn_html .= '<input type="checkbox" name="awcpt_cartall_checkbox" id="awcpt-cart-all-checkbox" class="awcpt-universal-checkbox awcpt-cart-all-checkbox" />';
    $gcart_btn_html .= '<span></span>';
    $gcart_btn_html .= '</label>';
    $gcart_btn_html .= '</div>';

    $gcart_btn_html .= '<a href="#" class="awcpt-button add-to-cart-all add-to-cart-all-'.$table_id.'">';
    $gcart_btn_html .= __( $btn_label, 'product-table-for-woocommerce' );
    $gcart_btn_html .= '<i class="awcpt-cart-all-badge">0</i>';
    $gcart_btn_html .= '</a>';
$gcart_btn_html .= '</div>';

echo $gcart_btn_html;