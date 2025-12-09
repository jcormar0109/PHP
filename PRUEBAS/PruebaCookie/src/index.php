<?php
    $tiempo = time() + (3600*4);
    session_start();
    setcookie("username", "alice123",$tiempo);
?>
<html>
<style>
</style>
<body>

<h2>Registro</h2>
<hr>
<?php

    $lista = [
        "nombre" => "Alice",
        "edad" => 17
    ];

    $cadena = json_encode($lista);

    $lista2 = json_decode($cadena);
    echo "<pre>";
    var_dump($lista2);
    echo "</pre>";
    echo "<pre>";
    var_dump($lista);
?>
<a href="p2.php">siguiente</a>

</body>

</html>


