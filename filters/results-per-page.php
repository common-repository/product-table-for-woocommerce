<?php
$label = ! empty( $elem['optionLabel'] ) ? $elem['optionLabel'] : '{limit} per page';
$limit = ! empty( $elem['maxLimit'] ) ? $elem['maxLimit'] : 20;
$start = ! empty( $elem['initialVal'] ) ? $elem['initialVal'] : 1;
$step = ! empty( $elem['incrementBy'] ) ? $elem['incrementBy'] : 1;
$display_as = ! empty( $elem['display'] ) ? $elem['display'] : 'row';
$selected_val = '';

// handling selected val url
if( ! empty( $_GET[$table_id . '_results_per_page'] ) ){
    $selected_val = sanitize_text_field( $_GET[$table_id . '_results_per_page'] );
}

$results_html = '<div class="awcpt-filter awcpt-results-per-page-wrap">';
if( $display_as == 'dropdown' ){
    $results_html .= '<select name="results_per_page" class="awcpt-dropdown awcpt-filter-fld awcpt-results-per-page" data-placeholder="'.__( 'Results per page', 'product-table-for-woocommerce' ).'" data-type="results_per_page">';
    $results_html .= '<option value="" disabled selected>'.__( 'Results per page', 'product-table-for-woocommerce' ).'</option>';

    $c = $start;
    $flag = true;
    while( $c <= $limit ){
        // including posts per page
        if( ! empty( $products_per_page ) && ( $products_per_page < $c ) && $flag ) {
            $flag = false;
            $fld_label = str_replace( '{limit}', $products_per_page, $label );
            $results_html .= '<option value="'.$products_per_page.'" selected>'.__( $fld_label, 'product-table-for-woocommerce' ).'</option>';
        }

        // options
        if( $products_per_page != $c ) {
            $fld_label = str_replace( '{limit}', $c, $label );
            $selected = '';
            if( $selected_val == $c ){
                $selected = 'selected';
            }
            $results_html .= '<option value="'.$c.'" '.$selected.'>'.__( $fld_label, 'product-table-for-woocommerce' ).'</option>';
        }
        $c = $c + $step;
    }
    $results_html .= '</select>';
} else {
    $results_html .= '<div class="awcpt-filter-row-heading">';
    $results_html .= __( 'Results per page', 'product-table-for-woocommerce' );
    $results_html .= '</div>';
    $results_html .= '<div class="awcpt-filter-row-grp">';

    $c = $start;
    $flag = true;
    while( $c <= $limit ){
        // including posts per page
        if( ! empty( $products_per_page ) && ( $products_per_page < $c ) && $flag ) {
            $flag = false;
            $fld_label = str_replace( '{limit}', $products_per_page, $label );
            $results_html .= '<div class="awcpt-filter-row">';
            $results_html .= '<label for="awcpt-results-per-page'.$products_per_page.'" class="awcpt-radio-label">';
                $results_html .= __( $fld_label, 'product-table-for-woocommerce' );
                $results_html .= '<input type="radio" name="results_per_page" class="awcpt-filter-radio awcpt-filter-fld awcpt-results-per-page" id="awcpt-results-per-page'.$products_per_page.'" data-type="results_per_page" value="'.$products_per_page.'" checked="checked" />';
                $results_html .= '<span></span>';
            $results_html .= '</label>';
            $results_html .= '</div>';
        }

        // options
        if( $products_per_page != $c ) {
            $fld_label = str_replace( '{limit}', $c, $label );
            $checked = '';
            if( $selected_val == $c ){
                $checked = 'checked="checked"';
            }
            $results_html .= '<div class="awcpt-filter-row">';
            $results_html .= '<label for="awcpt-results-per-page'.$c.'" class="awcpt-radio-label">';
                $results_html .= __( $fld_label, 'product-table-for-woocommerce' );
                $results_html .= '<input type="radio" name="results_per_page" class="awcpt-filter-radio awcpt-filter-fld awcpt-results-per-page" id="awcpt-results-per-page'.$c.'" data-type="results_per_page" value="'.$c.'" '.$checked.' />';
                $results_html .= '<span></span>';
            $results_html .= '</label>';
            $results_html .= '</div>';
        }
        $c = $c + $step;
    }
    $results_html .= '</div>';
}
$results_html .= '</div>';

echo $results_html;