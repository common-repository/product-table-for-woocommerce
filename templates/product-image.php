<?php
$img_size = $column['imgSize'];
$click_action = $column['clickAction'];
$use_placeholder = $column['placeholder'];
$img_zoom = $column['zoomImg'];
if( $product->get_type() == 'variation' && get_post_thumbnail_id( $prd_data['id'] ) ) {
	$object_id = $prd_data['id'];
} else {
	$object_id = wp_get_post_parent_id( $prd_data['id'] );
}
$post_thumbnail_id = get_post_thumbnail_id( $object_id );

$prd_img_output = '<div class="awcpt-product-image-wrapper">';
if( ! $post_thumbnail_id && $use_placeholder ) {
	$img_html = wc_placeholder_img( $img_size );
	$lg_img_url = wc_placeholder_img_src('full');
} else {
	$img_html = get_the_post_thumbnail( $object_id, $img_size );
	$lg_img_url = get_the_post_thumbnail_url( $object_id, 'full' );
}

if( $click_action == 'product_page' ) {
	$image_main = '<a class="awcpt-product-image" data-awcpt-image-size="'. $img_size .'" href="'. get_the_permalink( $prd_data['id'] ) .'">';
	$image_main .= $img_html;
	$image_main .= '</a>';
} elseif( $click_action == 'product_page_newtab' ) {
	$image_main = '<a class="awcpt-product-image" data-awcpt-image-size="'. $img_size .'" href="'. get_the_permalink( $prd_data['id'] ) .'" target="_blank">';
	$image_main .= $img_html;
	$image_main .= '</a>';
} elseif( $click_action == 'lightbox' ) {
	$image_main = '<a class="awcpt-product-image awcpt-prdimage-lightbox" data-awcpt-image-size="'. $img_size .'" href="'.$lg_img_url.'">';
	$image_main .= $img_html;
	$image_main .= '</a>';
} else {
	$image_main = '<div class="awcpt-product-image" data-awcpt-image-size="'. $img_size .'">';
	$image_main .= $img_html;
	$image_main .= '</div>';
}
$prd_img_output .= $image_main;
$prd_img_output .= '</div>';

echo $prd_img_output;