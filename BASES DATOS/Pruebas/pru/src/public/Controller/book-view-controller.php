<?php
    require_once "../../vendor/autoload.php";

    use app\Model\Db;
    use app\Model\Book;
    $db = Db::getInstance();
    session_start();

    if (isset($_POST['book'])) {
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

        $book = new Book(0, $title, $author,0, $price);
        $book = $db->validBook($book);
        $_SESSION['book'] = $book;
        header('Location: ../View/book-view.php');
    }