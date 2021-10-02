<?php

/**
 * Declare function named clean, that accepts one argument named $input
 *
 * This function will determine if the $input argument is an array, object or a single value
 * The function will then remove tags and other signs that might be harmful for the API
 *
 */

function clean($input)
{
    if (is_array($input)) {
        foreach ($input as $key => $val) {
            $output[$key] = clean($val);
        }
    } elseif (is_object($input)) {
        foreach ($input as $key => $val) {
            $output[$key] = clean($val);
        }
    } else {
        $output = strip_tags((string) $input);
    }
    return $output; 
}