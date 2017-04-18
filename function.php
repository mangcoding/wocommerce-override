<?php
/*
Use to override abstract function get_price_html_from_to
*/
add_filter( 'woocommerce_get_price_html_from_to', 'my_price_html', 10, 3 );
function my_price_html($price, $from, $to) {
	$price = '<h2>' . ( ( is_numeric( $to ) ) ? wc_price( $to ) : $to ) . '</h2><h3 class="discounted-price">' . ( ( is_numeric( $from ) ) ? wc_price( $from ) : $from ) . '</h3> ';
	return $price;
}


//Use to override shipping base on weight

add_filter('woocommerce_package_rates','overwrite_shipping_by_weight',100,2);

function overwrite_shipping_by_weight($rates,$package) {
    
    global $woocommerce;

    foreach ($rates as $rate) {
        //Set the price
        if ($woocommerce->cart->cart_contents_weight > 0 ){
            $rate->cost = $rate->cost*ceil($woocommerce->cart->cart_contents_weight);
        }else{
            $rate->cost = $rate->cost;
        }
        
    }
    return $rates;
}


