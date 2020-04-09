<?php

namespace App\DB;

use mysqli;
use Exception;

class DB
{
    private static $connection;

    public static function connect()
    {
        self::$connection = new mysqli(
            getenv('MYSQL_HOST'),
            getenv('MYSQL_USER'),
            getenv('MYSQL_PASSWORD'),
            getenv('MYSQL_DATABASE')
        );
        if (self::$connection->connect_errno) {
            throw new Exception(self::$connection->connect_error);
        }
    }

    public static function disconnect()
    {
        if (self::$connection) {
            self::$connection->close();
            self::$connection = null;
        }
    }

    public static function getConnection()
    {
        if (!self::$connection) {
            self::connect();
        }
        return self::$connection;
    }

    public static function query(string $query)
    {
        return self::getConnection()->query($query);
    }
}