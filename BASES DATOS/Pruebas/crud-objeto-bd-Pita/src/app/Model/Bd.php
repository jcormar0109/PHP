<?php declare(strict_types=1);

namespace App\Model;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use PDO;
use Traversable;

const HOSTNAME = "db";
const DBNAME = "my_application_db";
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

    public function eliminarLibro(int $id):bool{
        $sql = "DELETE FROM LIBROS WHERE ID = $id";
        $stmt = self::$pdo->prepare($sql);
        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function insertarLibro(Libro $libro):void{
        $sql = "INSERT INTO LIBROS(ID, TITULO, AUTOR, PVP) VALUES (:id, :titulo, :autor, :pvp)";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(["id"=>$libro->getId(),"titulo"=>$libro->getTitulo(), "autor"=>$libro->getAutor(), "pvp"=>$libro->getPvp()]);
    }

    public function actualizarLibro(Libro $newLibro, int $id):bool{
        $sql = "UPDATE LIBROS SET TITULO = :titulo, AUTOR = :autor, PVP = :pvp WHERE ID =".$id;
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(["titulo"=>$newLibro->getTitulo(), "autor"=>$newLibro->getAutor(), "pvp"=>$newLibro->getPvp()]);
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        return false;
    }

    public function buscarLibro(int $id):mixed{
        $sql = "SELECT * FROM LIBROS WHERE ID = $id";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLibros(){
        $sql = "SELECT * FROM LIBROS";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count():int{
        return count(self::getLibros());
    }

    public function getIterator():Traversable{
        return new ArrayIterator(self::getLibros());
    }
}
