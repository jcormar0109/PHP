<?php
    require_once '../../vendor/autoload.php';
    use app\Model\Db;
    session_start();
    $db = Db::getInstance();

    if ($_POST['book']!== "") {
        $title = $_POST['book'];
        $books = $db->getBooksByTitle($title);

        if (empty($books)) {
            $_SESSION["msg"] = "No hay resultados";
            header("location: ../index.php");
        } else {
            $_SESSION['books'] = $books;
            header("location: ../View/search-view.php");
        }

    } else {
        header("Location: ../index.php");
        exit();
    }
?>

