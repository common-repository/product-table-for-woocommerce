<?php
$label = ! empty( $elem['fldLabel'] ) ? $elem['fldLabel'] : 'Price range';
$display_as = ! empty( $elem['display'] ) ? $elem['display'] : 'dropdown';
$initial_price = ( isset( $elem['initialVal'] ) && $elem['initialVal'] != '' ) ? $elem['initialVal'] : 0;
$max_price = ( isset( $elem['maxVal'] ) && $elem['maxVal'] != '' ) ? $elem['maxVal'] : 50;
$step = ! empty( $elem['incrementBy'] ) ? $elem['incrementBy'] : 10;
$any_price_label = ! empty( $elem['anyPriceText'] ) ? $elem['anyPriceText'] : 'Any price';
$custom_input = $elem['inputBox'];
$min_input_lbl = 'Min';
$max_input_lbl = 'Max';
$separator_label = 'to';
$btn_label = 'GO';
$selected_val = '';

// handling selected val url
if( ! empty( $_GET[$table_id . '_price_range'] ) ){
    $selected_val = sanitize_text_field( $_GET[$table_id . '_price_range'] );
}

$price_filter = '<div class="awcpt-filter awcpt-price-filter-wrap">';
if( $display_as == 'dropdown' ) {
    $min = $initial_price;
    $max = $initial_price + $step;
    $price_filter .= '<select name="price_filter" class="awcpt-dropdown awcpt-filter-fld awcpt-price-filter" data-placeholder="'.__( $label, 'product-table-for-woocommerce' ).'" data-type="price">';
    $price_filter .= '<option value="" disabled selected>'.__( $label, 'product-table-for-woocommerce' ).'</option>';
    while( $max <= $max_price ){
        $val = $min.'-'.$max;
        $lbl = strip_tags( wc_price( $min, array( 'decimals' => 0 ) ) ).' - '.strip_tags( wc_price( $max, array( 'decimals' => 0 ) ) );
        $selected = '';
        if( $selected_val == $val ){
            $selected = 'selected';
        }
        $price_filter .= '<option value="'.$val.'" '.$selected.'>'.$lbl.'</option>';
        // incremnting ranges
        $min = $max + 1;
        $max = $max + $step;
    }

    $selected = '';
    if( $selected_val == 'any' ){
        $selected = 'selected';
    }
    $price_filter .= '<option value="any" '.$selected.'>'.__( $any_price_label, 'product-table-for-woocommerce' ).'</option>';
    $price_filter .= '</select>';
} else {
    $min = $initial_price;
    $max = $initial_price + $step;
    $price_filter .= '<div class="awcpt-filter-row-heading">';
    $price_filter .= __( $label, 'product-table-for-woocommerce' );
    $price_filter .= '</div>';
    $price_filter .= '<div class="awcpt-filter-row-grp">';
    while( $max <= $max_price ){
        $val = $min.'-'.$max;
        $lbl = strip_tags( wc_price( $min, array( 'decimals' => 0 ) ) ).' - '.strip_tags( wc_price( $max, array( 'decimals' => 0 ) ) );
        $checked = '';
        if( $selected_val == $val ){
            $checked = 'checked="checked"';
        }
        $price_filter .= '<div class="awcpt-filter-row">';
        $price_filter .= '<label for="awcpt-price-filter'.$val.'" class="awcpt-radio-label">';
            $price_filter .= $lbl;
            $price_filter .= '<input type="radio" name="price_filter" class="awcpt-filter-radio awcpt-filter-fld awcpt-price-filter" id="awcpt-price-filter'.$val.'" data-type="price" value="'.$val.'" '.$checked.' />';
            $price_filter .= '<span></span>';
        $price_filter .= '</label>';
        $price_filter .= '</div>';
        // incremnting ranges
        $min = $max + 1;
        $max = $max + $step;
    }

    $checked = '';
    if( $selected_val == 'any' ){
        $checked = 'checked="checked"';
    }
    $price_filter .= '<div class="awcpt-filter-row">';
    $price_filter .= '<label for="awcpt-price-filter-any" class="awcpt-radio-label">';
        $price_filter .= __( $any_price_label, 'product-table-for-woocommerce' );
        $price_filter .= '<input type="radio" name="price_filter" class="awcpt-filter-radio awcpt-filter-fld awcpt-price-filter" id="awcpt-price-filter-any" data-type="price" value="any" '.$checked.' />';
        $price_filter .= '<span></span>';
    $price_filter .= '</label>';
    $price_filter .= '</div>';

    if( $custom_input ) {
        $price_filter .= '<div class="awcpt-price-range-wrap">';
        $price_filter .= '<input type="number" class="awcpt-price-input-min" name="min_price" placeholder="'.__( $min_input_lbl, 'product-table-for-woocommerce' ).'" min="0" />';
        $price_filter .= '<span class="awcpt-price-range-separator">'.__( $separator_label, 'product-table-for-woocommerce' ).'</span>';
        $price_filter .= '<input type="number" class="awcpt-price-input-max" name="max_price" placeholder="'.__( $max_input_lbl, 'product-table-for-woocommerce' ).'" min="1" />';
        $price_filter .= '<a href="#" class="awcpt-button awcpt-price-range-btn">'.__( $btn_label, 'product-table-for-woocommerce' ).'</a>';
        $price_filter .= '</div>';
    }
    $price_filter .= '</div>';
}
$price_filter .= '</div>';

echo $price_filter;