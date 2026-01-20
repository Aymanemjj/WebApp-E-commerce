<?php

namespace app\models;
use \PDO;
use App\Core\Env;

class Database
{
    protected static ?PDO $connexion = null;
    private function __construct(){}

    public static function getConnexion()
    {
        Env::load(__DIR__."../../../.env");
        if (self::$connexion === null) {
            self::$connexion = new PDO("mysql:host=" . Env::get('DB_HOST') .";port=" . Env::get('DB_PORT') .";dbname=" . Env::get('DB_NAME') .";charset=utf8mb4",Env::get('DB_USER'),Env::get('DB_PASSWORD'));
        }
        return self::$connexion;
    }
}

