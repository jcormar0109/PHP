<?php
    session_start();
    unset($_SESSION['user']);

    $_SESSION['msg'] = "Has cerrado sesion";
    header("location: ../index.php");
