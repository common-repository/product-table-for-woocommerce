<?php
$html_val = $elem['value'];
if( $html_val ){
	$html_output = '<div class="awcpt-filter awcpt-filter-html-wrap">';
	$html_output .= $html_val;
	$html_output .= '</div>';

	echo $html_output;
} else {
	return;
}