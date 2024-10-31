<?php
$meta_key = $column['metaKey'];
$managed_by = $column['manageBy'];
if( ! empty( $column['noValMsg'] ) ){
	$no_value_msg = $column['noValMsg'];
} else {
	$no_value_msg = 'Value not found';
}
$product_id = $prd_data['id'];

if( empty( $managed_by ) || empty( $meta_key ) ){
	return;
} else {
	$cf_html = '<div class="awcpt-customfield-wrap">';
	if( $managed_by == 'wp' ){
		$display = $column['display'];
		$field_value = get_post_meta( $product_id, $meta_key, true );
		if( $field_value ){
			switch ( $display ) {
				case 'text':
					$cf_html .= '<p class="awcpt-cf-text">'. htmlentities( $field_value ) .'</p>';
					break;

				case 'html':
					$cf_html .= '<div class="awcpt-cf-html">'.do_shortcode( $field_value ).'</div>';
					break;

				case 'link':
					$label = rtrim( preg_replace("(^https?://)", "", $field_value ), '/' );
					$cf_html .= '<a class="awcpt-cf-link" href="'. $field_value .'">'. $label .'</a>';
					break;

				case 'link_new_tab':
					$label = rtrim( preg_replace("(^https?://)", "", $field_value ), '/' );
					$cf_html .= '<a class="awcpt-cf-link" href="'. $field_value .'" target="_blank">'. $label .'</a>';
					break;

				case 'phoneNo':
					$cf_html .= '<a class="awcpt-cf-phone" href="tel:'. $field_value .'">'. $field_value .'</a>';
					break;

				case 'email':
					$cf_html .= '<a class="awcpt-cf-email" href="mailto:'. $field_value .'">'. $field_value .'</a>';
					break;
			
				case 'pdfLink':
					$label = basename( rtrim( preg_replace("(^https?://)", "", $field_value ), '/' ) );
					$cf_html .= '<a class="awcpt-cf-pdf-link" href="'. $field_value .'" download="'. esc_attr( basename( $field_value ) ) .'">'. $label .'</a>';
					break;

				case 'image':
					$cf_html .= '<img class="awcpt-cf-image" src="'. $field_value .'" alt="'.$column['columnLabel'].'" />';
					break;
				default:
					return;
			}
		} else {
			$cf_html .= '<div class="awcpt-nocfval-msg">'. __( $no_value_msg, 'product-table-for-woocommerce' ) . '</div>';
		}
	} elseif( $managed_by == 'acf' && function_exists( 'get_field' ) ) {
		$field_value = get_field( $meta_key, $product_id, true );
		$field_object = get_field_object( $meta_key );
		if( $field_value && $field_object ){
			if( $field_object['type'] == 'link' && $field_object['return_format'] === 'array' && ! empty( $field_value['url'] ) && ! empty( $field_value['title'] ) ) {
				$cf_html .= '<a class="awcpt-acf-link" href="'. $field_value['url'] .'" target="'. $field_value['target'] .'">'. $field_value['title'] .'</a>';
			} elseif( $field_object['type'] == 'file' && $field_object['return_format'] === 'array' ) {
				$cf_html .= '<a class="awcpt-acf-file" href="'. $field_value['url'] .'" download="'. esc_attr( $field_value['filename'] ) .'">'. $field_value['filename'] .'</a>';
			} elseif( $field_object['type'] == 'image' && $field_object['return_format'] === 'array' && ! empty( $field_value['url'] ) ) {
				$cf_html .= '<img class="awcpt-acf-image" src="'. $field_value['url'] .'" alt="'.$column['columnLabel'].'" />';
			} elseif( $field_object['type'] == 'text' && ! empty( $field_value ) ) {
				$cf_html .= '<p class="awcpt-acf-text">'. $field_value .'</p>';
			} elseif( $field_object['type'] == 'textarea' && ! empty( $field_value ) ) {
				$cf_html .= '<div class="awcpt-acf-textarea">'. wpautop( $field_value ) .'</div>';
			} elseif( $field_object['type'] == 'wysiwyg' && ! empty( $field_value ) ) {
				$cf_html .= '<div class="awcpt-acf-wysiwyg">'. $field_value .'</div>';
			} elseif( $field_object['type'] == 'link' && $field_object['return_format'] === 'url' && ! empty( $field_value ) ) {
				$label = rtrim( preg_replace("(^https?://)", "", $field_value ), '/' );
				$cf_html .= '<a class="awcpt-acf-link" href="'. $field_value.'">'. $label .'</a>';
			} elseif( $field_object['type'] == 'url' && ! empty( $field_value ) ) {
				$label = rtrim( preg_replace("(^https?://)", "", $field_value ), '/' );
				$cf_html .= '<a class="awcpt-acf-link" href="'. $field_value.'">'. $label .'</a>';
			} elseif( $field_object['type'] == 'email' && ! empty( $field_value ) ) {
				$cf_html .= '<a class="awcpt-acf-email" href="mailto:'. $field_value .'">'. $field_value .'</a>';
			} elseif( $field_object['type'] == 'number' && ! empty( $field_value ) ) {
				$cf_html .= '<a class="awcpt-acf-phone" href="tel:'. $field_value .'">'. $field_value .'</a>';
			} else {
				return;
			}
		} else {
			$cf_html .= '<div class="awcpt-nocfval-msg">'. __( $no_value_msg, 'product-table-for-woocommerce' ) . '</div>';
		}
	} else {
		$cf_html .= '<div class="awcpt-nocfval-msg">'. __( $no_value_msg, 'product-table-for-woocommerce' ) . '</div>';
	}
	$cf_html .= '</div>';

	echo $cf_html;
}
