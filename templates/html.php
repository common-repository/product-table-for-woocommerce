<?php
$html_val = $column['value'];
if( $html_val ){
	$html_output = '<div class="awcpt-html-wrap">';
	$html_output .= $html_val;
	$html_output .= '</div>';

	echo $html_output;
} else {
	return;
}