<?php declare(strict_types=1);

namespace App\Model;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use PDO;
use Traversable;

const HOSTNAME = "db";
const DBNAME = "db_login";
const USERNAME = "app_user";
const PASSWORD = "app_password";

class Bd implements IteratorAggregate, Countable {
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



    public function count():int{
        return count(self::getLibros());
    }

    public function getIterator():Traversable{
        return new ArrayIterator(self::getLibros());
    }

    public function isUserValdid(User $user): bool | User
    {
        $sql = "SELECT * FROM USERS WHERE USERNAME = :username AND PASSWD = :passwd";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([
            ":username" => $user->getUsername(),
            ":passwd" => $user->getPasswd()
        ]);

        $row = $stmt->fetch();

        if ($row === false){
            return false;
        }

        return new User($row["ID"], $row["USERNAME"], $row["PASSWD"]);
    }


}
