<?php

/**
 * Declare function named clean, that accepts one argument named $input
 * 
 * This function will determine if the $input argument is an array, or a single value
 * 
 */

function clean($input) {
  if (is_array($input)) {
    foreach ($input as $key => $val) {
      $output[$key] = clean($val);
    }
  } else {
    $output = strip_tags((string) $input);
  }
  return $output;
}


