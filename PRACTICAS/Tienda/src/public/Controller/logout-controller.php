<?php
session_start();
unset($_SESSION['user']);

try {
    $_SESSION['msg'] = "Has cerrado sesion";
    header("location: ../index.php");

}  catch (Exception $error) {
    $_SESSION['msg'] = "Ha ocurrido un error al cerrar sesion";
    header("location: ../index.php");
}