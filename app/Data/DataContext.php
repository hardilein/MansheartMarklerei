<?php

class Database
{
    private static $db = 'mansheart' ;
    private static $host = 'localhost' ;
    private static $user = 'root';
    private static $password = 'My102118910';

    private static $dbFile = 'db/jurijphp.sqlite';

    private static $cont = null;

    public function __construct()
    {
        die('Init function is not allowed');
    }

    public static function connect()
    {
        // Verhindern das ein Client mehrere Verbindungen aufbaut
        if (null == self::$cont) {
            try
            {
                self::$cont = new PDO("mysql:host=" . self::$host . ";" . "dbname=" . self::$db, self::$user, self::$password);
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
