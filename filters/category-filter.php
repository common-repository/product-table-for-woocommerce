<?php
$label = ! empty( $elem['fldLabel'] ) ? $elem['fldLabel'] : 'Category';
$display_as = ! empty( $elem['display'] ) ? $elem['display'] : 'dropdown';
$hide_empty = $elem['hideEmpty'];
$multi_select = $elem['multiSelect'];
$exclude = $elem['exclude'];
if( ! empty( $exclude ) ){
    $exclude_array = explode( ",", $exclude );
}
$any_cat_label = ! empty( $elem['anyCatText'] ) ? $elem['anyCatText'] : 'Any';
$selected_val = array();

// handling selected val url
if( ! empty( $_GET[$table_id . '_categories'] ) ){
    $selected_val_str = sanitize_text_field( $_GET[$table_id . '_categories'] );
    if( $selected_val_str ){
        $selected_val = array_map( 'intval', explode( ",", $selected_val_str ) );
    }
}

// getting cats
$prd_cats = get_terms( array(
    'taxonomy' => 'product_cat',
    'orderby' => 'name',
    'hide_empty' => $hide_empty,
    'fields' => 'id=>name',
    'number' => 0
));

if( $prd_cats && !is_wp_error($prd_cats) ){
    $cat_html = '<div class="awcpt-filter awcpt-catfilter-wrap">';
    if( $display_as == 'dropdown' ) {
        $multi_select_attr = '';
        $select_class = 'awcpt-dropdown awcpt-filter-fld awcpt-cat-filter';
        if( $multi_select ){
            $multi_select_attr = 'multiple';
            $select_class .= ' awcpt-multi-select';
        }
        
        $cat_html .= '<select name="cat_filter" class="'.$select_class.'" data-type="category" '.$multi_select_attr.' data-placeholder="'.__( $label, 'product-table-for-woocommerce' ).'">';
        if( ! $multi_select ){
            $cat_html .= '<option value="" selected disabled>'.__( $label, 'product-table-for-woocommerce' ).'</option>';
        }
        foreach( $prd_cats as $id => $name ){
            $selected = '';
            if( empty( $exclude_array ) || ! in_array( $id, $exclude_array ) ) {
                if( in_array( $id, $selected_val ) ){
                    $selected = 'selected';
                }
                $cat_html .= '<option value="'.$id.'" '.$selected.'>'.$name.'</option>';
            }
        }

        if( ! $multi_select ){
            $selected = '';
            if( in_array( "any", $selected_val ) ){
                $selected = 'selected';
            }
            $cat_html .= '<option value="any" '.$selected.'>'.__( $any_cat_label, 'product-table-for-woocommerce' ).'</option>';
        }

        $cat_html .= '</select>';
    } else {
        $cat_html .= '<div class="awcpt-filter-row-heading">';
        $cat_html .= __( $label, 'product-table-for-woocommerce' );
        $cat_html .= '</div>';
        $cat_html .= '<div class="awcpt-filter-row-grp">';
        foreach( $prd_cats as $id => $name ){
            $checked = '';
            if( in_array( $id, $selected_val ) ){
                $checked = 'checked="checked"';
            }
            if( empty( $exclude_array ) || ! in_array( $id, $exclude_array ) ) {
                if( $multi_select ){
                    $cat_html .= '<div class="awcpt-filter-row">';
                    $cat_html .= '<label for="awcpt-cat-filter'.$id.'" class="awcpt-checkbox-label">';
                        $cat_html .= $name;
                        $cat_html .= '<input type="checkbox" name="cat_filter[]" class="awcpt-filter-checkbox awcpt-filter-fld awcpt-cat-filter" id="awcpt-cat-filter'.$id.'" data-type="category" value="'.$id.'" '.$checked.' />';
                        $cat_html .= '<span></span>';
                    $cat_html .= '</label>';
                    $cat_html .= '</div>';
                } else {
                    $cat_html .= '<div class="awcpt-filter-row">';
                    $cat_html .= '<label for="awcpt-cat-filter'.$id.'" class="awcpt-radio-label">';
                        $cat_html .= $name;
                        $cat_html .= '<input type="radio" name="cat_filter" class="awcpt-filter-radio awcpt-filter-fld awcpt-cat-filter" id="awcpt-cat-filter'.$id.'" data-type="category" value="'.$id.'" '.$checked.' />';
                        $cat_html .= '<span></span>';
                    $cat_html .= '</label>';
                    $cat_html .= '</div>';
                }
            }
        }

        if( ! $multi_select ){
            $checked = '';
            if( in_array( "any", $selected_val ) ){
                $checked = 'checked="checked"';
            }
            $cat_html .= '<div class="awcpt-filter-row">';
            $cat_html .= '<label for="awcpt-cat-filter-any" class="awcpt-radio-label">';
                $cat_html .= __( $any_cat_label, 'product-table-for-woocommerce' );
                $cat_html .= '<input type="radio" name="cat_filter" class="awcpt-filter-radio awcpt-filter-fld awcpt-cat-filter" id="awcpt-cat-filter-any" data-type="category" value="any" '.$checked.' />';
                $cat_html .= '<span></span>';
            $cat_html .= '</label>';
            $cat_html .= '</div>';
        }
        $cat_html .= '</div>';
    }
    $cat_html .= '</div>';

    echo $cat_html;
} else {
    return;
}