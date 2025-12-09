<?php

session_start();
ini_set('display_errors', 1);
?>
<html>
<head>
</head>
<body>

<h2>Datos del formulario</h2>
<hr>

<?php
    require_once("tools.php");

    $filtros = array(
        "name" => array(
            "filter" => FILTER_SANITIZE_SPECIAL_CHARS
        ),
        "age" => array(
            "filter" => FILTER_VALIDATE_INT
        )
    );

    if(isset($_POST["registro"])){
        $campos = filter_input_array(INPUT_POST, $filtros);
        echo "El nombre es: {$campos['name']}<br/>";
        echo "La edad es: {$campos['age']}<br/>";
    }
    else {
        print("No vienes del formulario");
    }

    $username = $_COOKIE["username"] ?? "No existe";
    echo "<br>Hola {$username}";

?>

</body>
</html>
