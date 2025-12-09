<?php
declare(strict_types = 1);

require_once '../../vendor/autoload.php';

use App\Model\Db;
use App\Model\User;

session_start();

$db = Db::getInstance();

if(isset($_POST["getBooks"])){
    $books = $db->getBooks();
    if($books != null){
        $_SESSION['booksArray'] = $books;
    } else {
        $_SESSION['booksMsg'] = "No hay libros";
    }

    header("location: ../View/userHome.php");
}

if(isset($_POST["getBooksAdmin"])){
    $books = $db->getBooks();
    if($books != null){
        $_SESSION['booksArray'] = $books;
    } else {
        $_SESSION['booksMsg'] = "No hay libros";
    }

    header("location: ../View/listar-view.php");
}

if(isset($_POST["hideBooks"])){
    unset($_SESSION['booksArray']);
    header("location: ../View/userHome.php");
}