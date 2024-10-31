<?php
if ( $product->has_dimensions() ) {
    $dimension_html = '<div class="awcpt-dimensions">';
    $dimension_html .= wc_format_dimensions( $product->get_dimensions( false ) );
    $dimension_html .= '</div>';

    echo $dimension_html;
} else {
    return;
}