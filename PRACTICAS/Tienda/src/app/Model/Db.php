<?php

namespace App\Model;

use PDO;
use PDOException;

const HOSTNAME = "db";
const DBNAME = "my_application_db";
const USERNAME = "app_user";
const PASSWORD = "app_password";
class Db
{
    private static ?Db $instance = null;
    private static ?PDO $pdo = null;

    private function __construct(){
        self::conectar();
    }
    public static function getInstance(): self{
        if(self::$instance ===null) {
            self::$instance = new Db();
        }
        return self::$instance;
    }
    private static function conectar(): void{
        $dsn = "mysql:host=" . HOSTNAME . ";dbname=" . DBNAME;
        try {
            if (self::$pdo == null) {
                self::$pdo = new PDO(
                    $dsn,
                    USERNAME,
                    PASSWORD,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function getAllBooks()
    {
        $sql = "SELECT * FROM BOOKS LIMIT 10";
        try {
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll();
            return $row;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function getBookByTitle(string $title):array{
        try {
            $sql = "SELECT * FROM BOOKS WHERE TITLE LIKE :title";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([":title" => "%$title%"]);
            $row = $stmt->fetchAll();
            return $row;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
    public function createUser(User $user ): bool{
        try {
            $sql = "INSERT INTO USERS (DNI, USERNAME, PASSWD, FIRST_NAME, SECOND_NAME, EMAIL, ADDRESS) VALUES (
                                                                                           :dni,
                                                                                           :name,
                                                                                           :password,
                                                                                           :firstname,
                                                                                           :lastname,
                                                                                           :email,
                                                                                           :address)";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                ":dni" => $user->getDni(),
                ":name" => $user->getUsername(),
                ":password" => $user->getPasswd(),
                "firstname" => $user->getFirstName(),
                "lastname" => $user->getSecondName(),
                "email" => $user->getEmail(),
                "address" => $user->getAddress()]);
            $rows = $stmt->rowCount();
            if ($rows !== 0) {
                return true;
            } else {
                return false;
            }
        }catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function validUser(User $user ): bool|User
    {
        try {
            $sql = "SELECT * FROM USERS WHERE USERNAME = :name AND PASSWD = :password";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                ":name" => $user->getUsername(),
                ":password" => $user->getPasswd()
            ]);
            $rows = $stmt->fetchAll();
            if (empty($rows)) {
                return false;
            } else {
                $newUser = new User($rows[0]["ID"], $rows[0]["DNI"], $rows[0]["USERNAME"], $rows[0]["PASSWD"], $rows[0]["FIRST_NAME"], $rows[0]["SECOND_NAME"], $rows[0]["EMAIL"], $rows[0]["ADDRESS"],);
            }
            return $newUser;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }


    public function validBook(Book $book): bool|Book{
        try{
            $sql = "SELECT * FROM BOOKS WHERE ISBN = :isbn";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                ":isbn" => $book->getIsbn()
            ]);
            $rows = $stmt->fetchAll();
            if (empty($rows)) {
                return false;
            } else {
                $newBook = new Book($rows[0]["ID"],$rows[0]["ISBN"],$rows[0]["TITLE"], $rows[0]["AUTHOR"],$rows[0]["PVP"],$rows[0]["RESUME"],$rows[0]["STOCK"]);
            }
            return $newBook;
        }catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function getStock(Book $book): int {
        try {
            $sql = "SELECT * FROM BOOKS WHERE ISBN = :isbn";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                ":isbn" => $book->getIsbn()
            ]);
            $rows = $stmt->fetchAll();
            if (empty($rows)) {
                return 0;
            } else {
                return $rows[0]["STOCK"];
            }
        }
        catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function countInvoices():int{
        try {
            $sql = "SELECT COUNT(*) FROM INVOICES";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            if (empty($rows)) {
                return 0;
            } else{
                return $rows[0]["COUNT(*)"];
            }
        }catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function createInvoice(Invoice $invoice):bool
    {
        try {
            $sql = "INSERT INTO INVOICES (DT, N_INVOICE, CLIENT_ID, DNI, FIRST_NAME, SECOND_NAME, ADDRESS, IVA) VALUES (
                                                                                                    :dt, 
                                                                                                    :n_invoice, 
                                                                                                    :client_id,
                                                                                                    :dni,
                                                                                                    :firstname,
                                                                                                    :lastname,
                                                                                                    :address,
                                                                                                    :iva)";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                ":dt" => $invoice->getDate(),
                ":n_invoice" => $invoice->getNInvoice(),
                ":client_id" => $invoice->getClientId(),
                ":dni" => $invoice->getDni(),
                ":firstname" => $invoice->getFirstName(),
                ":lastname" => $invoice->getSecondName(),
                ":address" => $invoice->getAddress(),
                ":iva" => $invoice->getIva()
            ]);
            return true;

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function createDetail(Detail $detail):bool
    {
        try {
            $sql = "INSERT INTO INVOICE_DETAILS (INVOICE_ID,BOOK_ID,ISBN,TITLE,PVP,QUANT,TOTAL, TOTAL_IVA, TOTAL_WITH_IVA) VALUES (
                                                                                                               :invoice_id,
                                                                                                               :book_id,
                                                                                                               :isbn,
                                                                                                               :title,
                                                                                                               :pvp,
                                                                                                               :quant,
                                                                                                               :total,
                                                                                                               :total_iva,
                                                                                                               :total_with_iva)";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                ":invoice_id" => $detail->getInvoiceId(),
                ":book_id" => $detail->getBookId(),
                ":isbn" => $detail->getIsbn(),
                ":title" => $detail->getTitle(),
                ":pvp" => $detail->getPvp(),
                ":quant" => $detail->getQuant(),
                ":total" => $detail->getTotal(),
                ":total_iva" => $detail->getTotalIva(),
                ":total_with_iva" => $detail->getTotalWithIva()
            ]);
            return true;

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function updateStock(Book $book):bool{
        try{
            $stock = $this->getStock($book);
            $stock = $stock - $book->getQuantity();
            $sql = "UPDATE BOOKS SET STOCK = :stock WHERE ISBN = :isbn";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                ":stock" => $stock,
                ":isbn" => $book->getIsbn()
            ]);
            return true;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function getMostSellers():array|bool{
        try {
            $sql = "SELECT BOOK_ID, TITLE, ISBN, SUM(QUANT) AS TOTAL_VENDIDO FROM INVOICE_DETAILS GROUP BY BOOK_ID, TITLE, ISBN ORDER BY TOTAL_VENDIDO DESC LIMIT 10";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            if (empty($rows)) {
                return false;
            } else
                return $rows;
        }
        catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function getInvoice(string $nInvoice): false|Invoice
    {
        try {
            $sql = "SELECT * FROM INVOICES WHERE N_INVOICE = '{$nInvoice}'";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([]);
            $rows = $stmt->fetchAll();
            if (empty($rows)) {
                return false;
            } else{
                return $invoice = new Invoice($rows[0]["ID"],$rows[0]["DT"],$rows[0]["N_INVOICE"],$rows[0]["CLIENT_ID"],$rows[0]["DNI"],$rows[0]["FIRST_NAME"],$rows[0]["SECOND_NAME"],$rows[0]["ADDRESS"],$rows[0]["IVA"]);
            }
        }catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function getDetails(Invoice $invoice): false|array{
        try{
            $sql = "SELECT * FROM INVOICE_DETAILS WHERE INVOICE_ID = :invoice_id";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                ":invoice_id" => $invoice->getId()
            ]);
            $rows = $stmt->fetchAll();
            $details = [];
            if (empty($rows)) {
                return false;
            } else {
                foreach ($rows as $row){
                    $detail = new Detail($row["ID"],$row["INVOICE_ID"],$row["BOOK_ID"],$row["ISBN"],$row["TITLE"],$row["PVP"],$row["QUANT"],$row["TOTAL"],$row["TOTAL_IVA"],$row["TOTAL_WITH_IVA"]);
                    $details[] = $detail;
                }
                return $details;
            }
        }catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function getUserOrders(User $user):array|bool{
        try {
            $sql = "SELECT * FROM INVOICES WHERE CLIENT_ID = :user_id";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                ":user_id" => $user->getId()
            ]);
            $rows = $stmt->fetchAll();
            if (empty($rows)) {
                return false;
            } else {
                return $rows;
            }

        }catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function getTotalInvoice(Invoice $invoice): float {
        try {
            $sql = "SELECT SUM(TOTAL_WITH_IVA) AS total FROM INVOICE_DETAILS WHERE INVOICE_ID = :invoice_id";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                ":invoice_id" => $invoice->getId()
            ]);
            $total = $stmt->fetchColumn();
            if (empty($total)) {
                return 0;
            } else {
                return $total;
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
}