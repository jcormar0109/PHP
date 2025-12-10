<?php
declare(strict_types=1);

require_once("../../vendor/autoload.php");

use App\Model\Db;
use App\Model\User;

session_start();
$db = DB::getInstance();

$nInvoice = $_GET['nInvoice'];
$invoice = $db->getInvoice($nInvoice);
$details = $db->getDetails($invoice);

const providerName = "Librería S.L";
const providerAddress = "C/ Libros, 14";
const providerAddress2 = "29130, Alhaurín de la Torre";
const providerCIF = "B7311123";
const providerPhone = "123 456 789";
const providerMail = "info@libreria.es";

$user = $_SESSION['user'] ?? null;

if ($user->getId() !== $invoice->getClientId()){
    $_SESSION["msg"] = "ERROR, est factura no te pertenece";
    header("location: ../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Factura <?= $invoice->getNInvoice() ?></title>

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

        /* FACTURA WRAPPER */
        .invoice-wrapper {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
            position: relative;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            border-bottom: 2px solid #ececec;
            padding-bottom: 20px;
        }

        .logo {
            font-size: 30px;
            font-weight: 700;
            color: #0288d1;
        }

        h2 {
            margin: 0;
            color: #263238;
            font-weight: 700;
            font-size: 28px;
        }

        /* SECCIONES DOS COLUMNAS */
        .two-columns {
            display: flex;
            justify-content: space-between;
            gap: 40px;
            margin-bottom: 30px;
        }

        .info-box {
            width: 50%;
            background: #fafafa;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
        }

        .info-title {
            font-size: 17px;
            font-weight: 700;
            color: #0288d1;
            margin-bottom: 10px;
            border-bottom: 1px solid #d6d6d6;
            padding-bottom: 6px;
        }

        .info-row {
            font-size: 15px;
            margin: 6px 0;
        }

        .info-row strong {
            color: #263238;
        }

        /* TABLA DE PRODUCTOS */
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            font-size: 15px;
        }

        th {
            background: #0288d1;
            color: white;
            padding: 13px;
            font-size: 15px;
            text-align: left;
            font-weight: 600;
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

        /* TOTALES */
        .totals-box {
            margin-top: 30px;
            padding: 20px;
            background: #fafafa;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            width: 300px;
            margin-left: auto;
        }

        .totals-row {
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            margin: 8px 0;
        }

        .totals-row strong {
            color: #263238;
            font-weight: 700;
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {
            .two-columns {
                flex-direction: column;
            }
            .info-box {
                width: 100%;
            }
            .totals-box {
                width: 100%;
                margin-left: 0;
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
            <a href='../Controller/logout-controller.php'><span class='material-symbols-outlined'>logout</span>{$user->getUsername()}</a>
            <a href='orders-view.php'><span class='material-symbols-outlined'>receipt</span>Pedidos</a>";
        }
        ?>
    </div>
</header>

<div class="invoice-wrapper">
    <div class="header-section">
        <div class="logo">Librería S.L</div>
        <h2>Nº <?= $invoice->getNInvoice() ?></h2>
    </div>

    <div class="two-columns">
        <div class="info-box">
            <div class="info-title">Datos del Proveedor</div>
            <p class="info-row"><strong>Nombre:</strong> <?= providerName ?></p>
            <p class="info-row"><strong>Dirección:</strong> <?= providerAddress ?></p>
            <p class="info-row"><strong>Población:</strong> <?= providerAddress2 ?></p>
            <p class="info-row"><strong>CIF:</strong> <?= providerCIF ?></p>
            <p class="info-row"><strong>Tel:</strong> <?= providerPhone ?></p>
            <p class="info-row"><strong>Mail:</strong> <?= providerMail ?></p>
        </div>

        <div class="info-box">
            <div class="info-title">Datos del Cliente</div>
            <p class="info-row"><strong>Nombre:</strong> <?= $invoice->getFirstName() . " " . $invoice->getSecondName() ?></p>
            <p class="info-row"><strong>DNI:</strong> <?= $invoice->getDni() ?></p>
            <p class="info-row"><strong>Dirección:</strong> <?= $invoice->getAddress() ?></p>
            <p class="info-row"><strong>Fecha:</strong> <?= $invoice->getDate() ?></p>
        </div>
    </div>

    <table>
        <tr>
            <th>Título</th>
            <th>ISBN</th>
            <th>PVP</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>IVA</th>
            <th>Total</th>
        </tr>

        <?php
        $sumBase = 0;
        $sumIva = 0;
        $sumTotal = 0;

        foreach ($details as $detail){
            $sumBase   += $detail->getTotal();
            $sumIva    += $detail->getTotalIva();
            $sumTotal  += $detail->getTotalWithIva();
            echo"
            <tr>
                <td>{$detail->getTitle()} </td>
                <td> {$detail->getIsbn()} </td>
                <td> {$detail->getPvp()}€</td>
                <td>{$detail->getQuant()}</td>
                <td>{$detail->getTotal()}€</td>
                <td>{$detail->getTotalIva()}</td>
                <td><strong>{$detail->getTotalWithIva()}€</strong></td>
            </tr>";
            }
        ?>
    </table>

    <div class="totals-box">
        <div class="totals-row">
            <span>Base imponible:</span>
            <strong><?= $sumBase ?>€</strong>
        </div>
        <div class="totals-row">
            <span>IVA total:</span>
            <strong><?= $sumIva ?>€</strong>
        </div>
        <div class="totals-row">
            <span>Total a pagar:</span>
            <strong><?= $sumTotal ?>€</strong>
        </div>
    </div>

</div>

</body>
</html>
