<?php
declare(strict_types=1);
require_once("../../vendor/autoload.php");
use App\Model\Db;
use App\Model\User;
use App\Model\Book;

session_start();
$db= Db::getInstance();

    $choice = filter_input(INPUT_GET, 'choice', FILTER_SANITIZE_FULL_SPECIAL_CHARS  );
    $place = filter_input(INPUT_GET, 'place', FILTER_VALIDATE_INT);
    $quantity = filter_input(INPUT_GET, 'quantity', FILTER_VALIDATE_INT);

    try {
        $cart = $_SESSION['cart'];
        $book = $cart->getBook($place);
        $has = $cart->hasBook($book);
        if (!$has) {
            $cart->add($book);
        } else {
            if ($choice === "sum") {
                if ($quantity < ($db->getStock($book))) {
                    $cart->sumBookQuant($book);
                } else {
                    $_SESSION['msg'] = "Error: no puedes superar la cantidad de stock disponible" ;
                    header('location: ../View/cart-view.php');
                }
            }
            else {
                if ($quantity > 0) {
                    $cart->restBookQuant($book);
                }
            }
        }
    $_SESSION['cart'] = $cart;
        header('location: ../View/cart-view.php');

    } catch (PDOException $e) {
        $_SESSION['msg'] = "Error: " . $e->getMessage();
        header('location: ../View/cart-view.php');
    }