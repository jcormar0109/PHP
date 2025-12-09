<?php

require_once("../../vendor/autoload.php");
use app\Model\Cart;

session_start();

    $cart = $_SESSION['cart'] ?? new Cart();
    $book = $_SESSION['book'];

    if (isset($_POST['carrito'])) {
        $cart->add($book);
        $_SESSION['cart'] = $cart;
        $_SESSION['msg'] = "Libro añadido al carrito";
        header("location: ../View/book-view.php");
    }
