<?php

namespace DevRIFT\Utilities;

/**
 * Utilities Class
 */
abstract class Utilities
{
    private static $isHashEqualsAvailable = null;

    /**
     * Summary of secureCompare
     * @param mixed $a
     * @param mixed $b
     * @return bool
     */
    public static function secureCompare($a, $b)
    {
        if (null === self::$isHashEqualsAvailable) {
            self::$isHashEqualsAvailable = \function_exists('hash_equals');
        }

        if (self::$isHashEqualsAvailable) {
            return \hash_equals($a, $b);
        }
        if (\strlen($a) !== \strlen($b)) {
            return false;
        }

        $result = 0;
        for ($i = 0; $i < \strlen($a); ++$i) {
            $result |= \ord($a[$i]) ^ \ord($b[$i]);
        }

        return 0 === $result;
    }
}