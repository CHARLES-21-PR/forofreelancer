<?php
if (!function_exists('highlight2')) {
    function highlight2($text, $word)
    {
        if (!$word) {
            return $text;
        }
        return preg_replace('/(' . preg_quote($word) . ')/i', '<span class="highlight2">$1</span>', $text);
    }
}