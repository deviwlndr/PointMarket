<?php

// File: app/Helpers/CommonHelpers.php

if (!function_exists('limitWords')) {
    /**
     * Limit the number of words in a string.
     *
     * @param string $string
     * @param int $limit
     * @return string
     */
    function limitWords($string, $limit = 5)
    {
        $words = explode(' ', $string, $limit + 1);

        if (count($words) > $limit) {
            array_pop($words);
        }

        return implode(' ', $words);
    }
}
