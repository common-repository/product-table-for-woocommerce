<?php
$hide_sold_individually = $column['hideSoldIndividually'];
if( ! empty( $hide_sold_individually ) && $product->is_sold_individually() ){
    return;
}

$display_field = $column['displayField'];
$input_value = apply_filters( 'woocommerce_quantity_input_min', 1, $product );
$min_value = apply_filters( 'woocommerce_quantity_input_min', 0, $product );
$max_value = apply_filters( 'woocommerce_quantity_input_max', -1, $product );
$step = apply_filters( 'woocommerce_quantity_input_step', 1, $product );
$max_quantity = ! empty( $column['maxQty'] ) ? $column['maxQty'] : $max_value;

$quantity_html = '<div class="awcpt-quantity-wrap">';
if( $display_field == 'inputNumber' ){
    $quantity_html .= '<div class="awcpt-qty-field">';
    $quantity_html .= '<input type="number" name="awcpt_qty" class="awcpt-quantity" step="'.$step.'" min="'.$min_value.'" max="'.$max_quantity.'" value="1" />';
    $quantity_html .= '</div>';
} else {
    $dropdown_label = __( $column['dropdownLabel'], 'product-table-for-woocommerce' );

    $quantity_html .= '<div class="awcpt-qty-field awcpt-qty-select-wrap">';
        $quantity_html .= '<select name="awcpt_qty" class="awcpt-quantity awcpt-qty-select">';
            $quantity_html .= '<option value="'.$min_value.'">'.$dropdown_label.$min_value.'</option>';
            $v = $min_value;
            while( $v < $max_quantity ){
                $v += $step;
                $quantity_html .= '<option value="'.$v.'">'.$v.'</option>';
            }
        $quantity_html .= '</select>';
    $quantity_html .= '</div>';
}
$quantity_html .= '</div>';

echo $quantity_html;
