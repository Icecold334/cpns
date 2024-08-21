<?php

if (!function_exists('intToAlphabet')) {
  function intToAlphabet($number, $uppercase = false)
  {
    $alphabet = '';
    while ($number > 0) {
      $mod = ($number - 1) % 26;
      $alphabet = chr(65 + $mod) . $alphabet; // 65 adalah ASCII untuk 'A'
      $number = (int)(($number - $mod) / 26);
    }

    // Return alphabet in uppercase or lowercase based on the $uppercase parameter
    return $uppercase ? strtoupper($alphabet) : strtolower($alphabet);
  }
}
