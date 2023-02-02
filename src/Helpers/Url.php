<?php

namespace Nookest\Source\Helpers;

class Url
{
	/**
	 * Return host name without www.
	 *
	 * @param  string  $url
	 * @return string
	 */
    public static function host(string $url)
    {
        $parts = parse_url($url);

        if ($parts === false || ! isset($parts['host'])) {
            return '';
        }

        return self::replaceFirst('www.', '', $parts['host']);
    }

    /**
     * Replace the first occurrence of a given value in the string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $subject
     * @return string
     */
    public static function replaceFirst($search, $replace, $subject)
    {
        if ($search == '') {
            return $subject;
        }

        $position = strpos($subject, $search);

        if ($position !== false) {
            return substr_replace($subject, $replace, $position, strlen($search));
        }

        return $subject;
    }
}
