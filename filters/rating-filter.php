<?php
$label = ! empty( $elem['fldLabel'] ) ? $elem['fldLabel'] : 'Rating';
$display_as = ! empty( $elem['display'] ) ? $elem['display'] : 'dropdown';
$any_rate_lbl = ! empty( $elem['anyRateText'] ) ? $elem['anyRateText'] : 'Show all';
$selected_val = array();

// handling selected val url
if( ! empty( $_GET[$table_id . '_rated'] ) ){
    $selected_val_str = sanitize_text_field( $_GET[$table_id . '_rated'] );
    if( $selected_val_str ){
        $selected_val = explode( ",", $selected_val_str );
    }
}

$rating_filter = '<div class="awcpt-filter awcpt-rating-filter-wrap">';
if( $display_as == 'dropdown' ) {
    $rating_filter .= '<select name="rating_filter" class="awcpt-dropdown awcpt-filter-fld awcpt-rating-filter" data-placeholder="'.__( $label, 'product-table-for-woocommerce' ).'" data-type="rating">';
    $rating_filter .= '<option value="" disabled selected>'.__( $label, 'product-table-for-woocommerce' ).'</option>';

    $selected = '';
    if( in_array( "1", $selected_val ) ){
        $selected = 'selected';
    }
    $rating_filter .= '<option value="1" '.$selected.'>1</option>';

    $selected = '';
    if( in_array( "2", $selected_val ) ){
        $selected = 'selected';
    }
    $rating_filter .= '<option value="2" '.$selected.'>2</option>';

    $selected = '';
    if( in_array( "3", $selected_val ) ){
        $selected = 'selected';
    }
    $rating_filter .= '<option value="3" '.$selected.'>3</option>';

    $selected = '';
    if( in_array( "4", $selected_val ) ){
        $selected = 'selected';
    }
    $rating_filter .= '<option value="4" '.$selected.'>4</option>';

    $selected = '';
    if( in_array( "5", $selected_val ) ){
        $selected = 'selected';
    }
    $rating_filter .= '<option value="5" '.$selected.'>5</option>';
    
    $selected = '';
    if( in_array( "any", $selected_val ) ){
        $selected = 'selected';
    }
    $rating_filter .= '<option value="any" '.$selected.'>'.__( $any_rate_lbl, 'product-table-for-woocommerce' ).'</option>';
    $rating_filter .= '</select>';
} else {
    $rating_filter .= '<div class="awcpt-filter-row-heading">';
    $rating_filter .= __( $label, 'product-table-for-woocommerce' );
    $rating_filter .= '</div>';
    $rating_filter .= '<div class="awcpt-filter-row-grp">';

    $checked = '';
    if( in_array( "1", $selected_val ) ){
        $checked = 'checked="checked"';
    }
    $rating_filter .= '<div class="awcpt-filter-row">';
    $rating_filter .= '<label for="awcpt-rating1" class="awcpt-checkbox-label">';
        $rating_filter .= __( 'Rated', 'product-table-for-woocommerce' ).' 1';
        $rating_filter .= '<input type="checkbox" name="rating_filter" class="awcpt-filter-checkbox awcpt-filter-fld awcpt-rating-filter" id="awcpt-rating1" data-type="rating" value="1" '.$checked.' />';
        $rating_filter .= '<span></span>';
    $rating_filter .= '</label>';
    $rating_filter .= '</div>';

    $checked = '';
    if( in_array( "2", $selected_val ) ){
        $checked = 'checked="checked"';
    }
    $rating_filter .= '<div class="awcpt-filter-row">';
    $rating_filter .= '<label for="awcpt-rating2" class="awcpt-checkbox-label">';
        $rating_filter .= __( 'Rated', 'product-table-for-woocommerce' ).' 2';
        $rating_filter .= '<input type="checkbox" name="rating_filter" class="awcpt-filter-checkbox awcpt-filter-fld awcpt-rating-filter" id="awcpt-rating2" data-type="rating" value="2" '.$checked.' />';
        $rating_filter .= '<span></span>';
    $rating_filter .= '</label>';
    $rating_filter .= '</div>';

    $checked = '';
    if( in_array( "3", $selected_val ) ){
        $checked = 'checked="checked"';
    }
    $rating_filter .= '<div class="awcpt-filter-row">';
    $rating_filter .= '<label for="awcpt-rating3" class="awcpt-checkbox-label">';
        $rating_filter .= __( 'Rated', 'product-table-for-woocommerce' ).' 3';
        $rating_filter .= '<input type="checkbox" name="rating_filter" class="awcpt-filter-checkbox awcpt-filter-fld awcpt-rating-filter" id="awcpt-rating3" data-type="rating" value="3" '.$checked.' />';
        $rating_filter .= '<span></span>';
    $rating_filter .= '</label>';
    $rating_filter .= '</div>';

    $checked = '';
    if( in_array( "4", $selected_val ) ){
        $checked = 'checked="checked"';
    }
    $rating_filter .= '<div class="awcpt-filter-row">';
    $rating_filter .= '<label for="awcpt-rating4" class="awcpt-checkbox-label">';
        $rating_filter .= __( 'Rated', 'product-table-for-woocommerce' ).' 4';
        $rating_filter .= '<input type="checkbox" name="rating_filter" class="awcpt-filter-checkbox awcpt-filter-fld awcpt-rating-filter" id="awcpt-rating4" data-type="rating" value="4" '.$checked.' />';
        $rating_filter .= '<span></span>';
    $rating_filter .= '</label>';
    $rating_filter .= '</div>';

    $checked = '';
    if( in_array( "5", $selected_val ) ){
        $checked = 'checked="checked"';
    }
    $rating_filter .= '<div class="awcpt-filter-row">';
    $rating_filter .= '<label for="awcpt-rating5" class="awcpt-checkbox-label">';
        $rating_filter .= __( 'Rated', 'product-table-for-woocommerce' ).' 5';
        $rating_filter .= '<input type="checkbox" name="rating_filter" class="awcpt-filter-checkbox awcpt-filter-fld awcpt-rating-filter" id="awcpt-rating5" data-type="rating" value="5" '.$checked.' />';
        $rating_filter .= '<span></span>';
    $rating_filter .= '</label>';
    $rating_filter .= '</div>';
    $rating_filter .= '</div>';
}
$rating_filter .= '</div>';

echo $rating_filter;
