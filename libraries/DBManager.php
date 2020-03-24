<?php

class DBManager
{
    protected static $pdo;
    /**
     * @return PDO
     */
    public static function dbConnect(): PDO
    {
        if (!self::$pdo) {
            self::$pdo = new \PDO('mysql:host=localhost;dbname=combat1;charset=utf8', 'root', '', [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ]);
        }
        return self::$pdo;
    }
}