<?php
function pr($data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

function in_range($number, $min, $max, $inclusive = FALSE){
    if (is_int($number) && is_int($min) && is_int($max)){
        return $inclusive
            ? ($number >= $min && $number <= $max)
            : ($number > $min && $number < $max) ;
    }

    return FALSE;
    }

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
