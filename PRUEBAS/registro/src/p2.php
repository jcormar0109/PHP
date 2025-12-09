<?php
declare(strict_types=1);
ini_set('display_errors', 1);
?>
<html>
<head>
</head>
<body>

    <h2>Datos del formulario</h2>
    <hr>

        <?php

        $dni = $_POST['dni'];
        $name = $_POST['name'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $email = $_POST['email'];
        $pass1 = $_POST['psw1'];
        $pass2 = $_POST['psw2'];
        $transporte = $_POST['transporte'] ?? "No usas transporte";
        $beca = $_POST['beca'] ?? false;
        echo "DNI: <b>$dni</b><br>";
        echo "Nombre: <b>$name</b><br>";
        echo "Apellido: <b>$apellido</b><br>";
        echo "Edad: <b>$edad</b><br>";
        echo "Email: <b>$email</b><br>";

        if ($pass1 != $pass2) {
            echo "Las contraseñas no coinciden<br/>";
        } else{
            echo "Las contraseñas coinciden<br/>";
        }

        echo "Te mueves en: <b>$transporte</b><br>";

        if ($beca){
            echo "Tienes beca";
        } else{
            echo "No tienes beca";
        }


        ?>

</body>
</html>
