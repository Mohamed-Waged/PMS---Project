<?php


class Session
{
    public static function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function getSession($key)
    {
        $value = $_SESSION[$key];

        unset($_SESSION[$key]);

        return $value;
    }

    public static function checkSession($key)
    {
        return isset($_SESSION[$key]);
    }
}
