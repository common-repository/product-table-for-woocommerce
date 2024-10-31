<?php
echo '<div class="awcpt-head-nav awcpt-head-nav-'.$nav_layout.'">';
if( ! empty( $nav_head_left_elems ) && ! empty( $nav_layout ) && $nav_layout == '100-0' || $nav_layout == '70-30' || $nav_layout == '50-50' || $nav_layout == '30-70' ) {
    include( $this->templates_dir.'/head-left-filters.php' );
}
if( ! empty( $nav_head_right_elems ) && ! empty( $nav_layout ) && $nav_layout != '100-0' ) {
    include( $this->templates_dir.'/head-right-filters.php' );
}
echo '</div>';