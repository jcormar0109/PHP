<?php
declare (strict_types = 1);
require_once '../../vendor/autoload.php';

use App\Model\Db;

session_start();

$db = Db::getInstance();

if (isset($_SESSION['msg'])) {
    echo "<h3>".$_SESSION['msg']."</h3>";
    echo "<hr/>";
    unset($_SESSION['msg']);
}

$user = $_SESSION["user"];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
Administrador: Sesion iniciada como <?php echo $user->getName()?>
<a href="../Controller/logout-controller.php">Cerrar Sesión</a>
<form action="../Controller/getBooks-controller.php" method="POST">
    <button name="getBooksAdmin">Ver libros</button>
</form>
</body>
</html>

<?php


if(isset($_SESSION["booksArray"]) && $_SESSION["booksArray"] !== null){
    $books = $_SESSION["booksArray"];
    foreach ($books as $book) {
        echo "<h4> LIBRO ".$book["ID"].":</h4>";
        echo "Titulo: ".$book["TITLE"]."</br>";
        echo "Autor: ".$book["AUTHOR"]."</br>";
        echo "Precio: ".$book["PVP"]."€</br>";
        echo "<hr/>";
    }
} else  if(isset($_SESSION["booksMsg"])){
    echo "<h3>".$_SESSION["booksMsg"]."</h3>";
}
?>

<!doctype html>
<html lang="en">
<body>
    <a href="adminHome.php">Volver al inicio</a>
</form>
</body>
</html>
