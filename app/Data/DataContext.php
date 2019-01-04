<?php

class Database
{
    //TODO: webconfig

    private static $db = 'mansheart';
    private static $host = 'localhost';
    private static $port = 3306;
    private static $user = 'root';
    private static $password = '';

    private static $cont = null;

    public function __construct()
    {
        die('Init function is not allowed');
    }

    public static function connect()
    {

        // temporär für die locale Entwicklungsumgebung, to be deleted
        if($_SERVER['SERVER_PORT'] == '8080') {
            self::$host = '127.0.0.1';
            self::$port = 32780;
        }

        // Verhindern das ein Client mehrere Verbindungen aufbaut
        if (null == self::$cont) {
            try
            {
                self::$cont = new PDO("mysql:host=" . self::$host . ";" . "dbname=" . self::$db. ";port=" . self::$port . ";charset=utf8", self::$user, self::$password );
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
