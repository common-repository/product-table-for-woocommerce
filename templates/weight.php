<?php
if( $prd_data['weight'] ){
    $weight_html = '<div class="awcpt-weight">';
    $weight_html .= $prd_data['weight'].get_option( 'woocommerce_weight_unit' );
    $weight_html .= '</div>';

    echo $weight_html;
} else {
    return;
}