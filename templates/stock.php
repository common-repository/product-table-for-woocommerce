<?php
$stock_html = '<div class="awcpt-stock">';
$stock_html .= wc_get_stock_html( $product );
$stock_html .= '</div>';

echo $stock_html;