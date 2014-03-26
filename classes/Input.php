<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 3/25/14
 * Time: 9:23 PM
 */


class Input {
    static function get($key, $default = null)
    {
        if (!array_key_exists($key, $_GET))
        {
            if ($default == null)
                return null;
            else
                $_GET[$key] = $default;
        }
        return $_GET[$key];
    }
}


?>