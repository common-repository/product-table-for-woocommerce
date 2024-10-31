<?php
$product_id = $prd_data['id'];

if( ! empty( $column['separator'] ) ){
    $cat_separator = $column['separator'];
} else {
    $cat_separator = ', ';
}

if( ! empty( $column['nocatsMsg'] ) ){
    $cats_notfound_msg = $column['nocatsMsg'];
} else {
    $cats_notfound_msg = 'Categories not found!';
}

$categories = get_the_terms( $product_id, 'product_cat' );
$cat_html = '<div class="awcpt-categories">';
if( $categories ){
    $i = 0;
    $categories_count = count( $categories );
    $cat_html .= '<p>';
    foreach( $categories as $category ){
        $cat_html .= $category->name;
        if( $i < ( $categories_count - 1 ) ){
            $cat_html .= $cat_separator;
        }
        $i++;
    }
    $cat_html .= '</p>';
} else {
    $cat_html .= '<div class="awcpt-cats-notfound">'.__( $cats_notfound_msg, 'product-table-for-woocommerce' ).'</div>';
}
$cat_html .= '</div>';

echo $cat_html;