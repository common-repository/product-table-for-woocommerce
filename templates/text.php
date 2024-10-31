<?php
$text_val = $column['value'];
if( $text_val ){
	$text_html = '<div class="awcpt-txt-wrap">';
	$text_html .= $text_val;
	$text_html .= '</div>';

	echo $text_html;
} else {
	return;
}