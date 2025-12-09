<?php

require_once("../../vendor/autoload.php");
use app\Model\Cart;
use app\Model\Book;
use App\Model\Db;

session_start();

$db= Db::getInstance();
$cart = $_SESSION['cart'] ?? new Cart();
$book = $_SESSION['book'];
try{
    if (isset($_POST['carrito'])) {
        $has = $cart->hasBook($book);
        if (!$has) {
            $cart->add($book);
        } else {
            $cart->sumBookQuant($book);
        }
        $_SESSION['cart'] = $cart;
        $_SESSION['msg'] = "Libro añadido al carrito";
        $_SESSION['added'] = true;
        header("location: ../View/book-info.php");
    }

    if (isset($_GET['isbn']))  {
        $isbn = $_GET['isbn'];
        $book = new Book(0, $isbn, "example","example",0,0,0);
        $book = $db->validBook($book);
        if ($cart->remove($book)){
            $_SESSION['msg'] = "Libro elminado del carrito";
            header("location: ../View/cart-view.php");
        } else {
            $_SESSION['msg'] = "ERROR, no se ha podido eliminar el libro";
            header("location: ../View/cart-view.php");
        }
    }

} catch (Exception $error) {
    $_SESSION['msg'] = "Ha ocurrido un error";
    header("location: ../View/book-info.php");
}


