<?php
declare(strict_types=1);
require_once("../../vendor/autoload.php");
use App\Model\Db;
use App\Model\User;
use App\Model\Detail;
use App\Model\Invoice;
use App\Model\Cart;

session_start();
$cart = $_SESSION['cart'];
$db = Db::getInstance();

try {
    if (isset($_SESSION['user'])) {

        foreach ($cart as $book) {
            $stock = $db->getStock($book);

            if($book->getQuantity() > $stock){
                $_SESSION['msg'] = "ERROR, no hay stock suficiente";
                header('location: ../View/cart-view.php');
                exit();
            }
        }

    }else {
        $_SESSION['msg'] = "ERROR, Necesitas inciar sesion para pagar";
        header('location: ../View/cart-view.php');
        exit();
    }

    header('location: pay-controller.php');

}catch (Exception $error) {
    $_SESSION['msg'] = "Ha ocurrido un error al realizar el pago";
    header("location: ../View/cart-view.php");
}