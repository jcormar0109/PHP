<?php
    require_once "../../vendor/autoload.php";
    use App\Model\Db;
    use App\Model\User;
    session_start();

    $db = Db::getInstance();

    if (isset($_POST['username']) && isset($_POST['passwd'])) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $passwd = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!empty(["pictures"]["name"])){
            $name = "../img/" . basename($_FILES["pictures"]["name"]);
            move_uploaded_file($_FILES["pictures"]["tmp_name"], "$name");
            $img = $_FILES["pictures"]["name"];
        }
        try {
            $user = new User(0, $username, $passwd);
            $user = $db->validUser($user);

            if (!$user) {
                $_SESSION['msg'] = "Error al iniciar sesion";
                header("Location: ../index.php");
                exit();

            } else {
                $_SESSION['user'] = $user;
                header('Location: ../View/home.php');
                exit();
            }

        } catch (Exception $e) {
            $_SESSION['msg'] = "Error al iniciar sesion";
            header("Location: ../index.php");
            exit();
        }

    } else {
        $_SESSION['msg'] = "Error al iniciar sesion";
        header("Location: ../index.php");
        exit();
    }