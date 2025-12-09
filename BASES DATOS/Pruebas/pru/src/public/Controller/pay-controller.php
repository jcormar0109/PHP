<?php
    session_start();
    if (isset($_SESSION['user'])) {
        $_SESSION['msg'] = "Pago realizado";
        unset($_SESSION['cart']);
    } else {
        $_SESSION['msg'] = "ERROR, Necesitas inciar sesion para pagar";
    }

    header('location: ../View/cart-view.php');