<?php
declare(strict_types=1);
require_once("../../vendor/autoload.php");
use App\Model\Db;
use App\Model\User;
session_start();

$db = Db::getInstance();

if(isset($_POST["register"])){
    $dni = filter_input(INPUT_POST, "dni", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password1 = filter_input(INPUT_POST, "passwd1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password2 = filter_input(INPUT_POST, "passwd2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $firstName = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $secondName = filter_input(INPUT_POST, "second_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($dni === "" || $username === "" || $password1 === "" || $firstName === "" || $secondName === "" || $email === "" || $address === ""){
        $_SESSION['msg'] = "ERROR, es necesario rellenar todos los campos";
        header('Location: ../View/register.php');

    }else {

        if ($password1 !== $password2) {
            $_SESSION['msg'] = "ERROR, las contraseñas no coinciden";
            header('Location: ../View/register.php');

        }else {
            $user = new User(0,$dni,$username, $password1, $firstName, $secondName, $email, $address);

            try{

                if ($db->createUser($user)){
                    $_SESSION['msg'] = "Usuario creado correctamente";
                } else{
                    $_SESSION['msg'] = "ERROR, el usuario ya existe";
                }

            } catch (PDOException $e) {
                $_SESSION['msg'] = "ERROR, el usuario ya existe";
                header('Location: ../View/register.php');
                exit();
            }


            header('Location: ../View/login.php');
        }
    }

} else {
    $_SESSION['msg'] = "Se ha producido un error al registrarse";
    header('Location: ../View/register.php');
}