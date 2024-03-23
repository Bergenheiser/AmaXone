<?php

namespace App\E_Commerce\Config;

class Conf
{

    static private array $databases = array(
        'hostname' => 'localhost',
        'database' => 'caronf',
        'login' => 'caronf',
        'password' => '080087921DC'
    );
    private static $debug = false;

    static public function getLogin(): string
    {
        return self::$databases['login'];
    }

    static public function getHostname(): string
    {
        return self::$databases['hostname'];
    }

    static public function getDatabase(): string
    {
        return self::$databases['database'];
    }

    static public function getPassword(): string
    {
        return self::$databases['password'];
    }

    static public function getAbsoluteURL() : string
    {
        return "/web/frontController.php"; //à retravailler.
    }

    static public function getDebug() : string
    {
        return self::$debug;
    }

}