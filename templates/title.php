<?php
$title = $prd_data['name'];
$target = '';
$link_enable = $column['link'];
$open_new_tab = $column['newTab'];
if( $open_new_tab ){
    $target = 'target="_blank"';
}

if( $link_enable ){
    $link = get_the_permalink( $prd_data['id'] );
    $title_html = '<a class="awcpt-title" href="'.$link.'" '.$target.' title="'.$title.'">'. $title .'</a>';
} else {
    $title_html = '<span class="awcpt-title">'.$title.'</span>';
}

echo $title_html;