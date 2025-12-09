<?php
    declare(strict_types=1);

    namespace app;
    use PDO;

    const HOSTNAME = "db";
    const DBNAME = "my_application_db";
    const USERNAME = "app_user";
    const PASSWORD = "app_password";

    class Bd{
        private static ?Bd $instance = null;
        private static ?PDO $pdo = null;

        private function __construct(){
            self::conectar();
        }
        public static function getInstance(): Bd{
            if (self::$instance === null) {
                self::$instance = new Bd();
            }
            return self::$instance;
        }
        private static function conectar(): void{
            $dsn="mysql:host=".HOSTNAME.";dbname=".DBNAME.";charset=utf8";
            if (self::$pdo === null) {
                self::$pdo = new PDO(
                    $dsn,
                    USERNAME,
                    PASSWORD,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Si hay error genera una excepcion
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            }
        }
    }