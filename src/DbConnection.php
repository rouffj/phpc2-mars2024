<?php

namespace App;

class DbConnection
{
    private static $instance;

    private function __construct()
    {
        echo "Start DB Connection\n";
    }

    public static function getInstance()
    {
        //return new DbConnection();

        if (!self::$instance) {
            self::$instance = new DbConnection();
        }

        return self::$instance;
    }

    public function query($sql)
    {
        echo sprintf("Execute query '%s' in DB\n", $sql);
        sleep(1);
    }

    public function __destruct()
    {
        echo "\nClose DB Connection\n";
    }
}