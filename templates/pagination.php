<?php
if ( $products_query->max_num_pages <= 1 ) {
	return;
}

$p_args = array(
    'format' => '?'. $table_id .'_paged=%#%',
    'type' => 'plain',
    'mid_size'  => 3,
    'prev_next' => true,
    'current' => max( 1, $current_page ),
    'total' => $products_query->max_num_pages
);

$pagination_class = 'awcpt-pagination awcpt-pagination-'.$table_id;
if( $ajax_pagination_status ){
    $pagination_class .= ' awcpt-ajax-pagination';
}

$pagination_output = '<div class="'.$pagination_class.'">';
$pagination_output .= paginate_links( $p_args );
$pagination_output .= '</div>';

echo $pagination_output;