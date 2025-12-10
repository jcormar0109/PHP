<?php
    declare(strict_types=1);

    require_once "../../vendor/autoload.php";

    use App\Model\Book;
    use App\Model\Cart;
    use App\Model\Db;
use App\Model\Invoice;

session_start();

    $db = Db::getInstance();

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }  else {
        $_SESSION['msg'] = "ERROR, Necesitas inciar sesion para ver tus pedidos";
        header('location: ../index.php');
        exit();
    }

    $cart = $_SESSION["cart"] ?? new Cart();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = $cart;
    }

$invoices = $db->getUserOrders($user);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis Pedidos</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f1f3f4;
            margin: 0;
            padding: 0;
            color: #263238;
        }

        /* HEADER */
        header {
            background: #263238;
            padding: 15px 50px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.25);
        }

        header a {
            color: white;
            text-decoration: none;
            font-size: 17px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: 0.25s ease;
            padding: 6px 10px;
            border-radius: 6px;
        }

        header a:hover {
            background: rgba(255,255,255,0.12);
            transform: translateY(-2px);
        }

        .left-nav, .right-nav {
            display: flex;
            gap: 28px;
            align-items: center;
        }

        /* PEDIDOS WRAPPER */
        .orders-wrapper {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        }

        h2 {
            margin: 0 0 20px;
            color: #263238;
            font-weight: 700;
            font-size: 28px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
        }

        th {
            background: #0288d1;
            color: white;
            padding: 13px;
            font-weight: 600;
            text-align: left;
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #e0e0e0;
        }

        tr:nth-child(even) {
            background: #f7fafd;
        }

        tr:hover {
            background: #e1f5fe;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            background: #0288d1;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.25s ease;
        }

        .btn:hover {
            background: #0277bd;
            transform: translateY(-2px);
        }

        @media (max-width: 800px) {
            .orders-wrapper {
                padding: 20px;
            }
            table, th, td {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="left-nav">
        <a href="../index.php"><span class="material-symbols-outlined">home</span>Inicio</a>
        <a href="cart-view.php"><span class="material-symbols-outlined">shopping_cart</span>Carrito</a>
    </div>

    <div class="right-nav">
        <?php if (!$user) {
            echo"
            a href = 'login.php' ><span class='material-symbols-outlined' > login</span > Login</a >";
        }else{
            echo"
            <a href='../Controller/logout-controller.php'><span class='material-symbols-outlined'>logout</span>{$user->getUsername()}</a>";
        }
        ?>
    </div>
</header>
<?php
        if (!$invoices) {
            echo "<div class='orders-wrapper'><h3>Aun no tienes pedidos</h3></div>";
        } else {
            echo"
                <div class='orders-wrapper'>
                <h2>Mis Pedidos</h2>
            
                <table>
                    <tr>
                        <th>Número de Factura</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
            ";
            foreach ($invoices as $invoice) {
                $invoice = new Invoice($invoice['ID'], $invoice['DT'], $invoice['N_INVOICE'], $invoice['CLIENT_ID'], $invoice['DNI'], $invoice['FIRST_NAME'], $invoice['SECOND_NAME'], $invoice['ADDRESS'], $invoice['IVA']);
                $total = $db->getTotalInvoice($invoice);
                echo "<tr>
                    <td>{$invoice->getNInvoice()}</td>
                    <td>{$invoice->getDate()}</td>
                    <td>{$total}€</td>
                    <td><a class='btn' href='invoice-view.php?nInvoice={$invoice->getNInvoice()}'>Ver Factura</a></td>
                </tr>";
            }

        }

        ?>
    </table>
</div>

</body>
</html>

