<?php
/*
Use to override abstract function get_price_html_from_to
*/
add_filter( 'woocommerce_get_price_html_from_to', 'my_price_html', 10, 3 );
function my_price_html($price, $from, $to) {
	$price = '<h2>' . ( ( is_numeric( $to ) ) ? wc_price( $to ) : $to ) . '</h2><h3 class="discounted-price">' . ( ( is_numeric( $from ) ) ? wc_price( $from ) : $from ) . '</h3> ';
	return $price;
}


