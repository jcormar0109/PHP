<?php

namespace App\Model;

const HOSTNAME = "localhost";
const DBNAME = "bd";

const USERNAME = "root";
const PASSWORD = "";

use PDO;
class Bd
{
    private static ?Bd $instance = null;
    private static ?PDO $pdo = null;

    private function __construct(){
        self::conectar();
    }

    private static function conectar(){
        if (self::$pdo == null) {
            $dsn = "mysql:host=" . HOSTNAME . ";dbname=" . DBNAME;
            self::$pdo = new PDO($dsn,
                USERNAME,
                PASSWORD,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }
    }

    public static function getInstance(){
        if (is_null(self::$instance)) {
            self::$instance = new Bd();
        }
        return self::$instance;
    }
}