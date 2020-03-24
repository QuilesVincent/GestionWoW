<?php

namespace App\Pdo;
use PDO;

class DBManager
{
    //function pour se connecter à sql

    public static $pdo;

    /**
     * @return PDO
     */
    public function dbConnect(): PDO
    {
        if (!self::$pdo) {
            self::$pdo = new PDO('mysql:host=localhost;dbname=combat1;charset=utf8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
        return self::$pdo;
    }
}
/*
if (!self::$pdo) {
    self::$pdo = new PDO('mysql:host=localhost;dbname=phpopcproject;charset=utf-8', 'root','', [
        PDO:: ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC,
        PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION
    ]);
}
return self::$pdo;

*/