<?php
$label = ! empty( $elem['clearLabel'] ) ? $elem['clearLabel'] : 'Clear filters';

$clear_filter = '<div class="awcpt-filter awcpt-clr-filter-wrap">';
$clear_filter .= '<a href="#" class="awcpt-clear-filter">'.__( $label, 'product-table-for-woocommerce' ).'</a>';
$clear_filter .= '</div>';

echo $clear_filter;