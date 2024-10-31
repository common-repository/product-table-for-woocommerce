<?php
$product_id = $prd_data['id'];

if( empty( $column['taxSlug'] ) ){
	return;
} else {
    $taxonomy = $column['taxSlug'];
}

if( ! empty( $column['separator'] ) ){
    $terms_separator = $column['separator'];
} else {
    $terms_separator = ', ';
}

if( ! empty( $column['noTermsMsg'] ) ){
    $terms_notfound_msg = $column['noTermsMsg'];
} else {
    $terms_notfound_msg = 'Terms not found!';
}

$terms = get_the_terms( $product_id, $taxonomy );
$terms_html = '<div class="awcpt-tax-terms">';
if( $terms ){
    $i = 0;
    $terms_count = count( $terms );
    $terms_html .= '<p>';
    foreach( $terms as $term ){
        $terms_html .= $term->name;
        if( $i < ( $terms_count - 1 ) ){
            $terms_html .= $terms_separator;
        }
        $i++;
    }
    $terms_html .= '</p>';

} else {
    $terms_html .= '<div class="awcpt-terms-notfound">'.__( $terms_notfound_msg, 'product-table-for-woocommerce' ).'</div>';
}
$terms_html .= '</div>';

echo $terms_html;