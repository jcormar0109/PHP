<?php
    declare(strict_types = 1);

    require_once '../../vendor/autoload.php';

    use App\Model\Db;
    use App\Model\User;

    session_start();

    $db = Db::getInstance();

    if(isset($_POST["login"])){
        $username = filter_var($_POST["username"], FILTER_SANITIZE_SPECIAL_CHARS);
        $passwd = filter_var($_POST["passwd"], FILTER_SANITIZE_SPECIAL_CHARS);

        $user = new User("0", $username, $passwd);

        if($db->validUser($user)){
            $user = $db->validUser($user);
            $_SESSION["user"] = $user;
            $_SESSION["msg"] = "Sesion iniciada";
            header("Location: ../Controller/role-controller.php");
        } else {
            $_SESSION["msg"] = "ERROR, los datos introducidos no son correctos";
            header("Location: ../index.php");
        }

    } else if (isset($_POST["register"])){
        $username = filter_var($_POST["username"], FILTER_SANITIZE_SPECIAL_CHARS);
        $passwd1 = filter_var($_POST["passwd1"], FILTER_SANITIZE_SPECIAL_CHARS);
        $passwd2 = filter_var($_POST["passwd2"], FILTER_SANITIZE_SPECIAL_CHARS);

        if($user = "" || $passwd1 == "" || $passwd2 == ""){
            $_SESSION["msg"] = "Ha ocurrido un error al crear el usuario";
            header("Location: ../index.php");
        } else {

            if ($passwd1 === $passwd2){
                $user = new User("0", $username, $passwd1);
                $db->createUser($user);
                $_SESSION["msg"] = "Usuario creado";
                header("Location: ../index.php");
            }
            else {
                $_SESSION["msg"] = "ERROR, las contraseñas no coinciden";
                header("Location: ../register.php");
            }
        }
    } else {
        $_SESSION["msg"] = "Ha ocurrido un error al iniciar sesion";
        header("Location: ../index.php");
    }