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

const IVA = 21;

try {
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $nInvoice = "FAC-".date("Y")."-".$db->countInvoices()+1;
        $invoice = new Invoice(0, date('Y-m-d H:i:s'), $nInvoice, $user->getId(), $user->getDni(), $user->getFirstName(), $user->getSecondName(), $user->getAddress(), IVA );

        if(!$db->createInvoice($invoice)){
            $_SESSION['msg'] = "ERROR, no se ha logrado realizar el pago";
            header('location: ../View/cart-view.php');
            exit();

        } else {

            foreach ($cart as $book) {
                $stock = $db->getStock($book);

                if($book->getQuantity() <= $stock){
                    $total = $book->getPvp() * $book->getQuantity();
                    $total_iva = $book->getPvp() * $book->getQuantity() * (IVA / 100);
                    $total_with_iva = $total + $total_iva;
                    $detail = new Detail(0, $db->countInvoices(), $book->getId(), $book->getIsbn(), $book->getTitle(), $book->getPvp(), $book->getQuantity(), $total, $total_iva, $total_with_iva);

                    if ($db->createDetail($detail)){
                        if (!$db->updateStock($book)){
                            $_SESSION['msg'] = "ERROR, no se ha podido realizar el pago";
                            header('location: ../View/cart-view.php');
                            exit();
                        }
                    } else {
                        $_SESSION['msg'] = "ERROR, no se ha podido realizar el pago";
                        header('location: ../View/cart-view.php');
                        exit();
                    }

                } else {
                    $_SESSION['msg'] = "ERROR, no hay stock suficiente";
                    header('location: ../View/cart-view.php');
                    exit();
                }
            }
        }
        $_SESSION['msg'] = "Pago realizado. <a href='../View/invoice-view.php?nInvoice={$nInvoice}'>Ver factura</a>";
        unset($_SESSION['cart']);

    } else {
        $_SESSION['msg'] = "ERROR, Necesitas inciar sesion para pagar";
        header('location: ../View/cart-view.php');
        exit();
    }

    header('location: ../View/loading.html');

}catch (Exception $error) {
    throw new PDOException($error->getMessage());
    header("location: ../View/cart-view.php");
}
