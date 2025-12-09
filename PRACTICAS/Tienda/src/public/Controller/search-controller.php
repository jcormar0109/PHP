<?php
    require_once "../../vendor/autoload.php";

use App\Model\Book;
use App\Model\Db;
    $db = Db::getInstance();
    session_start();


    try{
        if(isset($_POST['search'])){
            $title = filter_input(INPUT_POST, 'book', FILTER_SANITIZE_SPECIAL_CHARS);
            $books = $db->getBookByTitle($title);
            if (empty($books)) {
                $_SESSION['msg'] = "No se ha podido encontrar el libro";
                header("location: ../index.php");
            } else {
                $_SESSION['books'] = $books;
                header("location: ../View/selected-books-view.php");
            }

        } else if (isset($_GET['title'])){
            $title = filter_input(INPUT_GET, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
            $books = $db->getBookByTitle($title);
            $book = new Book($books[0]['ID'],$books[0]['ISBN'], $books[0]['TITLE'],$books[0]['AUTHOR'],$books[0]['PVP'],$books[0]['STOCK']);
            $_SESSION['book'] = $book;
            header("location: ../View/book-info.php");
            exit();
        }
    } catch (Exception $e){
        $_SESSION['msg'] = "ERROR: ".$e->getMessage();
        header("location: ../index.php");
    }


