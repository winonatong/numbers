<?php
include 'includes.php';
require_once('Numbers/Words.php');

$metric = false; // set as true to omit "and" from character count

$start = 1;
$end = 1000;
echo number_sequence_char_count($start, $end);

function number_sequence_char_count($start, $end) {
	 $string_length = 0;
	 $current_number = new Numbers_Words;
	 for ($i = $start; $i<=$end; $i++) {
	     $words = $current_number->toWords($i);
	     $words = str_replace(array(' ', '-'), '', $words);
	     if (($i > 100) && (!$metric) && ($i % 100 != 0)) {
 	     	$words .= 'and';
	     }
    	     $string_length += strlen($words);
	 }
return $string_length;
}
?>