<?php
/*********************************************************************

 Author: Winona Tong

 number_sequence_char_count($start, $end)

 $start - first number in sequence
 $end - last number in sequence

 This function takes 2 integer numbers, and finds the sum of the 
 number of characters in the word representation of the sequence of 
 numbers between the specified numbers. Spaces and dashes are removed

*********************************************************************/

include 'includes.php';
require_once('Numbers/Words.php');


// configuration settings - in actual use, these would probably be in a different file i.e. where the function is being called

$and = 'and'; 		// separator word i.e. one hunderd "and" one
$locale = 'en_US'; 	// see https://github.com/pear/Numbers_Words for valid locales

$start = 1; 		// number from which to start counting
$end = 1000; 		// last number in sequence

// function call... woo!

echo number_sequence_char_count($start, $end, $and, $locale);

// the function itself

function number_sequence_char_count($start, $end, $and, $locale) {
	 if ($start > $end) return -1;						// error condition if starting value exceeds last number			
	 $string_length = 0;
	 $current_number = new Numbers_Words;
	 for ($i = $start; $i<=$end; $i++) {
	     $words = $current_number->toWords($i, $locale);			// convert digits to word representation
	     $words = str_replace(array(' ', '-'), '', $words);			// remove spaces and dashes	
	     if (($i > 100) && ($and) && ($i % 100 != 0)) $words .= $and;	// add separator word if defined
    	     $string_length += strlen($words); 	      	  	    		// sum string length with all previous numbers
	 }
	 return $string_length;
}
?>