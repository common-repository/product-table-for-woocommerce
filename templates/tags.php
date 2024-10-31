<?php
$product_id = $prd_data['id'];

if( ! empty( $column['separator'] ) ){
    $tag_separator = $column['separator'];
} else {
    $tag_separator = ', ';
}

if( ! empty( $column['noTagsMsg'] ) ){
    $tags_notfound_msg = $column['noTagsMsg'];
} else {
    $tags_notfound_msg = 'Tags not found!';
}

$tags = get_the_terms( $product_id, 'product_tag' );
$tags_html = '<div class="awcpt-tags">';
if( $tags ){
    $i = 0;
    $tags_count = count( $tags );
    $tags_html .= '<p>';
    foreach( $tags as $tag ){
        $tags_html .= $tag->name;
        if( $i < ( $tags_count - 1 ) ){
            $tags_html .= $tag_separator;
        }
        $i++;
    }
    $tags_html .= '</p>';
} else {
    $tags_html .= '<div class="awcpt-tags-notfound">'.__( $tags_notfound_msg, 'product-table-for-woocommerce' ).'</div>';
}
$tags_html .= '</div>';

echo $tags_html;